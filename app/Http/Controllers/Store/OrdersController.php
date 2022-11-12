<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use Http;
use App\Models\Order;
use App\Models\OrderProduct;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Copon;
use App\Models\Product;
use App\Models\User;

class OrdersController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $orders_count_awaiting_payment = Order::where('is_delete',0)->where('status','awaiting_payment')->count();
    $orders_count_underway = Order::where('is_delete',0)->where('status','underway')->count();
    $orders_count_done = Order::where('is_delete',0)->where('status','done')->count();
    $orders_count_delivery_in_progress = Order::where('is_delete',0)->where('status','delivery_in_progress')->count();
    $orders_count_delivered = Order::where('is_delete',0)->where('status','delivered')->count();
    $services_count = Order::where('is_delete',0)
    ->whereHas('products',function($query){
      $query->whereHas('product',function($query){
      $query->where('product_type','service');
    });})->count();

    $orders = Order::where('is_delete',0)
    ->whereHas('products',function($query){
      $query->whereHas('product',function($query){
      $query->where('store_id', auth()->user()->store_id);
    });})->orderBy('created_at', 'desc')->get();

    
    return view('Store.orders.index')->with('data', $orders)
    ->with('orders_count_awaiting_payment', $orders_count_awaiting_payment)
    ->with('orders_count_underway', $orders_count_underway)
    ->with('orders_count_done', $orders_count_done)
    ->with('orders_count_delivery_in_progress', $orders_count_delivery_in_progress)
    ->with('orders_count_delivered', $orders_count_delivered)
    ->with('services_count', $services_count);
  }


  public function services()
  {
    $orders_count_awaiting_payment = Order::where('is_delete',0)->where('status','awaiting_payment')->count();
    $orders_count_underway = Order::where('is_delete',0)->where('status','underway')->count();
    $orders_count_done = Order::where('is_delete',0)->where('status','done')->count();
    $orders_count_delivery_in_progress = Order::where('is_delete',0)->where('status','delivery_in_progress')->count();
    $orders_count_delivered = Order::where('is_delete',0)->where('status','delivered')->count();
    $services_count = Order::where('is_delete',0)
    ->whereHas('products',function($query){
      $query->whereHas('product',function($query){
      $query->where('product_type','service');
    });})->count();

    $orders = Order::where('is_delete',0)
    ->whereHas('products',function($query){
      $query->whereHas('product',function($query){
      $query->where('product_type', 'service');
    });})->orderBy('created_at', 'desc')->get();
    return view('Store.orders.service')->with('data', $orders)
    ->with('orders_count_awaiting_payment', $orders_count_awaiting_payment)
    ->with('orders_count_underway', $orders_count_underway)
    ->with('orders_count_done', $orders_count_done)
    ->with('orders_count_delivery_in_progress', $orders_count_delivery_in_progress)
    ->with('orders_count_delivered', $orders_count_delivered)
    ->with('services_count', $services_count);
  }

  public function details($id)
  {
    $order = Order::where('is_delete',0)->find($id);
    return view('Store.orders.details')->with('order', $order);
  }

  public function create()
  {
    $customers = User::where('is_delete',0)->where('user_status','active')->where('user_type','customer')->get();
    $products = Product::where('is_delete',0)->where('product_status','active')->where('store_id',auth()->user()->store_id)->get();
    $copons = Copon::where('is_delete',0)->where('status','active')->where('expire_date','>=',date('Y-m-d'))->get();
    return view('Store.orders.create')->with('products', $products)->with('copons', $copons)->with('customers', $customers);
  }


  public function store(Request $request)
  {
    $this->validate($request,[
      
        'product.*.id' => 'required|exists:products,id',
        'product.*.amount' => 'required|string',
    ]);
    
    $price =0;
    foreach(array_column($request->product, 'id') as $p_id){
      $price +=Product::find($p_id)->product_price_after_vat;
    }
    dd($price);
    Order::create([
      'user_id'=>$request->cumstomer_id,
      'status'=>$request->status,
      'created_at'=>$request->cumstomer_id,
      'product_count'=>array_sum(array_column($request->product, 'amount')),
      'total_price'=>$price,
    ]);
    
    $this->massage('success','Order have been added successfully', 'تم اضافة الطلب  بنجاح');
    return redirect()->route('store.orders.index');
  }

  
}
