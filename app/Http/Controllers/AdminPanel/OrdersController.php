<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Http;
use App\Models\Order;
use App\Models\OrderProduct;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Copon;
use App\Models\Country;
use App\Models\PaymentType;
use App\Models\Product;
use App\Models\StorePackage;
use App\Models\User;

class OrdersController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $orders = Order::where('is_delete', 0)->orderBy('created_at', 'desc')->get();
    $new_orders = Order::where('is_delete', 0)->whereMonth('created_at', date('m'))->count();
    $pending_orders = Order::where('is_delete', 0)->where('status', 'awaiting_payment')->count();
    $executed_orders = Order::where('is_delete', 0)->whereIn('status', ['done', 'delivery_in_progress', 'delivered'])->count();
    $countries = Country::where('status', 'active')->where('is_delete', 0)->get();
    $packages = StorePackage::where('package_status', 'active')->where('is_delete', 0)->get();
    return view('AdminPanel.orders.index')->with('data', $orders)
      ->with('countries', $countries)->with('packages', $packages)
      ->with('new_orders', $new_orders)->with('pending_orders', $pending_orders)->with('executed_orders', $executed_orders);
  }



  public function search(Request $request)
  {

    if ($request->ajax()) {

      $date = request()->query('date', ''); //input()
      $store_name = request()->query('store_name', ''); //input()
      $package_id = request()->query('package_id', ''); //input()
      $country_id = request()->query('country_id', ''); //input()
      $city_id = request()->query('city_id', ''); //input()
      if ($request->city_id == "null") {
        $city_id = null;
      }
      $store_name = str_replace(" ", "%", $store_name);
      $data = Order::where('is_delete', 0)
        ->when($package_id, function ($query, $package_id) {

          $query->whereHas('products', function ($query) use ($package_id) {
            $query->whereHas('store', function ($query) use ($package_id) {
              $query->where('subscription_package_id', $package_id);
            });
          });
        })

        ->when($country_id, function ($query, $country_id) {

          $query->whereHas('products', function ($query) use ($country_id) {
            $query->whereHas('store', function ($query) use ($country_id) {
              $query->where('store_country', $country_id);
            });
          });
        })
        ->when($city_id, function ($query, $city_id) {

          $query->whereHas('products', function ($query) use ($city_id) {
            $query->whereHas('store', function ($query) use ($city_id) {
              $query->where('store_city', $city_id);
            });
          });
        })
        ->when($store_name, function ($query, $store_name) {

          $query->whereHas('products', function ($query) use ($store_name) {
            $query->whereHas('store', function ($query) use ($store_name) {
              $query->where('store_name_en', 'like', '%' . $store_name . '%')
                ->orWhere('store_name_ar', 'like', '%' . $store_name . '%');
            });
          });
        })->when($date, function ($query, $date) {
          $query->whereDate('created_at', $date);
        })
        ->orderBy('created_at', 'desc')
        ->get();

      return view('AdminPanel.orders.search', compact('data'))->render();
    }
  }


  public function create()
  {
    $customers = User::where('is_delete', 0)->where('user_status', 'active')->where('user_type', 'customer')->get();
    $products = Product::where('is_delete', 0)->where('product_status', 'active')->get();
    $payment_methods = PaymentType::where('is_delete', 0)->where('status', 'active')->get();
    $copons = Copon::where('is_delete', 0)->where('status', 'active')->where('expire_date', '>=', date('Y-m-d'))->get();
    return view('AdminPanel.orders.create')->with('products', $products)->with('copons', $copons)
      ->with('payment_methods', $payment_methods)->with('customers', $customers);
  }


  public function store(Request $request)
  {
    $this->validate($request, [

      'order_date' => 'required|date',
      'order_time' => 'required',
      'order_time' => 'required',
      'status' => 'required|in:awaiting_payment,underway,done,delivery_in_progress,delivered,reference,canceled',
      'customer_id' => 'required|exists:users,id',
      // 'shipping_id' => 'required',
      'shipping_price' => 'required',
      //'payment_method_id' => 'required',
      'product' => 'required|array',
      'product.*.id' => 'required|exists:products,id',
      'product.*.amount' => 'required|string',
    ]);

    $price = 0;
    foreach (array_column($request->product, 'id') as $key => $p_id) {

      $cost = Product::find($p_id)->product_price_after_vat * $request->product[$key]['amount'];
      $price += $cost;
    }

    $check_number = \App\Models\Order::orderBy('id', 'desc')->first();
    if (is_null($check_number)) {
      $check_number = 0000001;
    } else {

      $check_number = $check_number->order_number;
      $check_number = ((int) $check_number) + 1;
    }
    $order_number = str_pad($check_number, 6, '0', STR_PAD_LEFT);

    $order = Order::create([
      'order_number' => $order_number,
      'user_id' => $request->customer_id,
      'status' => $request->status,
      'created_at' => date('Y-m-d H:i:s', strtotime("$request->order_date $request->order_time")),
      'product_count' => array_sum(array_column($request->product, 'amount')),
      'shipping_price'=>$request->shipping_price,
      'total_price' => $price,
    ]);

    foreach (array_column($request->product, 'id') as $key => $p_id) {
      OrderProduct::create([
        'product_id' => $p_id,
        'store_id' => Product::find($p_id)->store_id,
        'order_id' => $order->id,
        'user_id' => $request->customer_id,
        'price' => Product::find($p_id)->product_price_after_vat,
        'amount' => $request->product[$key]['amount'],
        'status' => $request->status,
        'created_at' => date('Y-m-d H:i:s', strtotime("$request->order_date $request->order_time")),
      ]);
    }

    $this->massage('success', 'Order have been added successfully', 'تم اضافة الطلب  بنجاح');
    return redirect()->route('admin.orders.index');
  }

  
  public function edit($id)
  {
    $order = Order::find($id);
    
    if (is_null($order)  || $order->is_delete == 1) {
      $this->massage('error', 'Order not found', 'الطلب غير موجود');
      return redirect()->back();
    }
    $customers = User::where('is_delete', 0)->where('user_status', 'active')->where('user_type', 'customer')->get();
    $products = Product::where('is_delete', 0)->where('product_status', 'active')->get();
    $payment_methods = PaymentType::where('is_delete', 0)->where('status', 'active')->get();
    $copons = Copon::where('is_delete', 0)->where('status', 'active')->where('expire_date', '>=', date('Y-m-d'))->get();
    return view('AdminPanel.orders.edit')->with('products', $products)->with('copons', $copons)
      ->with('payment_methods', $payment_methods)->with('order', $order)->with('customers', $customers);
  }

  public function update($id,Request $request)
  {
    $order = Order::find($id);
    
    if (is_null($order)  || $order->is_delete == 1) {
      $this->massage('error', 'Order not found', 'الطلب غير موجود');
      return redirect()->back();
    }
    $this->validate($request, [

      'order_date' => 'required|date',
      'order_time' => 'required',
      'order_time' => 'required',
      'status' => 'required|in:awaiting_payment,underway,done,delivery_in_progress,delivered,reference,canceled',
      'customer_id' => 'required|exists:users,id',
      // 'shipping_id' => 'required',
      'shipping_price' => 'required',
      //'payment_method_id' => 'required',
      'product' => 'required|array',
      'product.*.id' => 'required|exists:products,id',
      'product.*.amount' => 'required|string',
    ]);

    $price = 0;
    foreach (array_column($request->product, 'id') as $key => $p_id) {

      $cost = Product::find($p_id)->product_price_after_vat * $request->product[$key]['amount'];
      $price += $cost;
    }

    $order->update([
      'user_id' => $request->customer_id,
      'status' => $request->status,
      'created_at' => date('Y-m-d H:i:s', strtotime("$request->order_date $request->order_time")),
      'product_count' => array_sum(array_column($request->product, 'amount')),
      'shipping_price'=>$request->shipping_price,
      'total_price' => $price,
    ]);

   
$result = array_diff(OrderProduct::where('order_id',$order->id)->get()->pluck(['id'])->toArray(),array_column($request->product, 'order_product_id') );
foreach ($result as $r) {
  $order_product = OrderProduct::find($r);
  $order_product->delete();
}


    foreach (array_column($request->product, 'id') as $key => $p_id) {
      OrderProduct::UpdateOrCreate([
        'id' => $request->product[$key]['order_product_id']
      ],[
        'product_id' => $p_id,
        'store_id' => Product::find($p_id)->store_id,
        'order_id' => $order->id,
        'user_id' => $request->customer_id,
        'price' => Product::find($p_id)->product_price_after_vat,
        'amount' => $request->product[$key]['amount'],
        'created_at' => date('Y-m-d H:i:s', strtotime("$request->order_date $request->order_time")),
        'status' => $request->status,
      ]);
    }

    $this->massage('success', 'Order have been added successfully', 'تم تعديل الطلب  بنجاح');
    return redirect()->route('admin.orders.index');
  }


  public function destroy($id)
  {
    $order = Order::find($id);
    if (is_null($order)  || $order->is_delete == 1) {
      $this->massage('error', 'Order not found', 'الطلب غير موجود');
      return redirect()->back();
    }
    foreach ($order->products as $product) {
      $product->is_delete = 1;
      $product->save();
    }
    $order->is_delete = 1;
    $order->save();
    $this->massage('success', 'Order has been deleted successfully', 'تم حذف الطلب بنجاح');
    return redirect()->back();
  }
}
