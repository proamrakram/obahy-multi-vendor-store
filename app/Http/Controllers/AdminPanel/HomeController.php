<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Http;
use App\Models\Order;
use App\Models\OrderProduct;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Store;
use App\Models\StorePackage;
use App\Models\WebsiteSetting;

class HomeController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $months = array();
    $orders = array();
    $stores = array();
    $sales = array();
    for($i=7 ; $i>=0 ; $i--){
      $months[]=\Carbon\Carbon::now()->startOfMonth()->subMonth($i)->format('M');
      $sales[]=OrderProduct::where('is_delete',0)->where('status','delivered')->whereMonth('created_at',\Carbon\Carbon::now()->startOfMonth()->subMonth($i)->format('m'))->count();
      $orders[]=Order::where('is_delete',0)->whereMonth('created_at',\Carbon\Carbon::now()->startOfMonth()->subMonth($i)->format('m'))->count();
      $stores[]=Store::where('is_delete',0)->whereMonth('created_at',\Carbon\Carbon::now()->startOfMonth()->subMonth($i)->format('m'))->count();
    }
    $packages = StorePackage::where('package_status','active')->where('is_delete',0)->get();

    $sales_count = OrderProduct::where('is_delete',0)->where('status','delivered')->count();
    $orders_count = Order::where('is_delete',0)->count();
    $stores_count = Store::where('store_status','active')->where('is_delete',0)->count();
    $free_stores_count = Store::where('store_status','active')->where('is_delete',0)->where('subscription_package_id',WebsiteSetting::first()->default_package)->count();
    $first_package = StorePackage::where('package_status','active')->where('is_delete',0)->first();
    $first_package_stores_count = Store::where('store_status','active')->where('is_delete',0)->where('subscription_package_id',$first_package->id)->count();
    $secound_package = StorePackage::where('package_status','active')->where('is_delete',0)->skip(1)->first();
    $secound_package_stores_count = Store::where('store_status','active')->where('is_delete',0)->where('subscription_package_id',$secound_package->id)->count();
   return view('AdminPanel.home')->with('sales_count',$sales_count)
   ->with('orders_count',$orders_count)->with('stores_count',$stores_count)->with('months',$months)->with('stores',$stores)
   ->with('orders',$orders)->with('sales',$sales)->with('free_stores_count',$free_stores_count)
   ->with('first_package',$first_package)->with('first_package_stores_count',$first_package_stores_count)
   ->with('secound_package',$secound_package)
   ->with('secound_package_stores_count',$secound_package_stores_count)
   ->with('packages',$packages);


  }



}
