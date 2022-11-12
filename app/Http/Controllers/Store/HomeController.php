<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use Http;
use App\Models\Order;
use App\Models\OrderProduct;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Product;
use App\Models\Store;
use App\Models\StorePackage;

class HomeController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $orders=Order::where('is_delete',0)->orderBy('created_at','desc')->paginate(10);


    $products_count = Product::where('is_delete',0)->where('product_status','active')->count();
   return view('Store.home')->with('products_count',$products_count)
   ->with('orders',$orders);


  }



}
