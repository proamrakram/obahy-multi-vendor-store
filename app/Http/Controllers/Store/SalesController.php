<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use Http;
use App\Models\Store;
use App\Models\OrderProduct;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class SalesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $stores = Order::where('is_delete', 0)->where('status', 'delivered')->whereHas('products', function ($q) {
      $q->where('store_id', auth()->user()->store_id);
    })->orderBy('created_at', 'desc')->get();
    $customers = User::where('is_delete', 0)->where('user_status', 'active')->where('user_type', 'customer')->orderBy('created_at', 'desc')->get();
    $products = Product::where('is_delete', 0)->where('store_id', auth()->user()->store_id)->orderBy('created_at', 'desc')->get();
    $countries = Country::where('status', 'active')->where('is_delete', 0)->get();

    return view('Store.sales.index')->with('data', $stores)->with('products', $products)
      ->with('customers', $customers)->with('countries', $countries);
  }


  public function best_sales()
  {
    $stores = OrderProduct::where('is_delete', 0)->where('store_id', auth()->user()->store_id)
      ->where('status', 'delivered')->groupBy('product_id')
      ->selectRaw('sum(amount) as total, sum(price*amount) as price, product_id')->orderBy('total','desc')->get();
    $customers = User::where('is_delete', 0)->where('user_status', 'active')->where('user_type', 'customer')->orderBy('created_at', 'desc')->get();
    $products = Product::where('is_delete', 0)->where('store_id', auth()->user()->store_id)->orderBy('created_at', 'desc')->get();
    $countries = Country::where('status', 'active')->where('is_delete', 0)->get();

    return view('Store.sales.best_sales')->with('data', $stores)->with('products', $products)
      ->with('customers', $customers)->with('countries', $countries);
  }

  public function lowest_selling()
  {
    $stores = OrderProduct::where('is_delete', 0)->where('store_id', auth()->user()->store_id)
      ->where('status', 'delivered')->groupBy('product_id')
      ->selectRaw('sum(amount) as total, sum(price*amount) as price, product_id')->orderBy('total')->get();
    $customers = User::where('is_delete', 0)->where('user_status', 'active')->where('user_type', 'customer')->orderBy('created_at', 'desc')->get();
    $products = Product::where('is_delete', 0)->where('store_id', auth()->user()->store_id)->orderBy('created_at', 'desc')->get();
    $countries = Country::where('status', 'active')->where('is_delete', 0)->get();

    return view('Store.sales.lowest_selling')->with('data', $stores)->with('products', $products)
      ->with('customers', $customers)->with('countries', $countries);
  }
  public function search(Request $request)
  {

    if ($request->ajax()) {

      $date = request()->query('date', ''); //input()
      $customer_id = request()->query('customer_id', ''); //input()
      $product_id = request()->query('product_id', ''); //input()
      $country_id = request()->query('country_id', ''); //input()
      $data = Order::where('is_delete', 0)->whereHas('products', function ($q) {
        $q->where('store_id', auth()->user()->store_id);
      })


        ->when($date, function ($query, $date) {
          $query->whereDate('created_at', $date);
        })
        ->when($customer_id, function ($query, $customer_id) {
          $query->where('user_id', $customer_id);
        })
        ->when($country_id, function ($query, $country_id) {
          $query->whereHas('user', function ($query) use ($country_id) {
            $query->where('country_id', $country_id);
          });
        })
        ->when($product_id, function ($query, $product_id) {
          $query->whereHas('products', function ($q)  use ($product_id) {
            $q->where('product_id', $product_id);
          });
        })
        ->orderBy('created_at', 'desc')->get();
      return view('Store.sales.search', compact('data'))->render();
    }
  }

  
  public function best_sales_search(Request $request)
  {

    if ($request->ajax()) {

      $date = request()->query('date', ''); //input()
      $customer_id = request()->query('customer_id', ''); //input()
      $product_id = request()->query('product_id', ''); //input()
      $country_id = request()->query('country_id', ''); //input()
      $data =  OrderProduct::where('is_delete', 0)->where('store_id', auth()->user()->store_id)
      ->where('status', 'delivered')->when($date, function ($query, $date) {
        $query->whereDate('created_at', $date);
      })
      ->when($customer_id, function ($query, $customer_id) {
        $query->where('user_id', $customer_id);
      })
      ->when($country_id, function ($query, $country_id) {
        $query->whereHas('user', function ($query) use ($country_id) {
          $query->where('country_id', $country_id);
        });
      })
      ->when($product_id, function ($query, $product_id) {
          $query->where('product_id', $product_id);
      })
      ->groupBy('product_id')
      ->selectRaw('sum(amount) as total, sum(price*amount) as price, product_id')->orderBy('total','desc')->get();
      
      
      return view('Store.sales.search2', compact('data'))->render();
    }
  }

  
  
  public function lowest_selling_search(Request $request)
  {

    if ($request->ajax()) {

      $date = request()->query('date', ''); //input()
      $customer_id = request()->query('customer_id', ''); //input()
      $product_id = request()->query('product_id', ''); //input()
      $country_id = request()->query('country_id', ''); //input()
      $data =  OrderProduct::where('is_delete', 0)->where('store_id', auth()->user()->store_id)
      ->where('status', 'delivered')->when($date, function ($query, $date) {
        $query->whereDate('created_at', $date);
      })
      ->when($customer_id, function ($query, $customer_id) {
        $query->where('user_id', $customer_id);
      })
      ->when($country_id, function ($query, $country_id) {
        $query->whereHas('user', function ($query) use ($country_id) {
          $query->where('country_id', $country_id);
        });
      })
      ->when($product_id, function ($query, $product_id) {
          $query->where('product_id', $product_id);
      })
      ->groupBy('product_id')
      ->selectRaw('sum(amount) as total, sum(price*amount) as price, product_id')->orderBy('total')->get();
      
      
      return view('Store.sales.search2', compact('data'))->render();
    }
  }
}
