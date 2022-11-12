<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Http;
use App\Models\Store;
use App\Models\OrderProduct;
use DB;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\StorePackage;

class SalesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $stores = Store::where('is_delete',0)->orderBy('created_at', 'desc')->get();
     $countries = Country::where('status', 'active')->where('is_delete', 0)->get();
    $packages = StorePackage::where('package_status', 'active')->where('is_delete', 0)->get();
    
    return view('AdminPanel.sales.index')->with('data', $stores)
    ->with('countries', $countries)->with('packages', $packages);
  }
  
  
  public function best_sales()
  {
    $stores = Store::where('is_delete',0)->withCount('order_products')->orderBy('order_products_count', 'desc')->get();
     $countries = Country::where('status', 'active')->where('is_delete', 0)->get();
    $packages = StorePackage::where('package_status', 'active')->where('is_delete', 0)->get();
    
    return view('AdminPanel.sales.best_sales')->with('data', $stores)
    ->with('countries', $countries)->with('packages', $packages);
  }

  
  public function lowest_selling()
  {
    $stores = Store::where('is_delete',0)->withCount('order_products')->orderBy('order_products_count', 'asc')->get();
     $countries = Country::where('status', 'active')->where('is_delete', 0)->get();
    $packages = StorePackage::where('package_status', 'active')->where('is_delete', 0)->get();
    
    return view('AdminPanel.sales.lowest_selling')->with('data', $stores)
    ->with('countries', $countries)->with('packages', $packages);
  }

  
  
  public function search(Request $request)
  {
      
      if($request->ajax())
      {
        
        $date = request()->query('date',''); //input()
        $store_name = request()->query('store_name',''); //input()
        $package_id = request()->query('package_id',''); //input()
        $country_id = request()->query('country_id',''); //input()
        $city_id = request()->query('city_id',''); //input()
        if($request->city_id == "null"){
          $city_id = null;
        }
        $store_name = str_replace(" ", "%", $store_name);
          $data = Store::where('is_delete',0)
          ->when($package_id,function($query,$package_id) {
                          $query->where('subscription_package_id', $package_id);
                      })
                      ->when($country_id,function($query,$country_id) {
                        $query->where('store_country', $country_id);
                    })
                    ->when($city_id,function($query,$city_id) {
                      $query->where('store_city', $city_id);
                  })
                  ->when($store_name,function($query,$store_name) {
                    $query->where('store_name_en', 'like', '%'.$store_name.'%')
                    ->orWhere('store_name_ar', 'like', '%'.$store_name.'%');
                })
               
                      ->orderBy('created_at','desc')
                      ->get();
                      
                      return view('AdminPanel.sales.search', compact('data'))->render();
      
  }
  }

   
  public function lowest_selling_search(Request $request)
  {
      
      if($request->ajax())
      {
        
        $date = request()->query('date',''); //input()
        $store_name = request()->query('store_name',''); //input()
        $package_id = request()->query('package_id',''); //input()
        $country_id = request()->query('country_id',''); //input()
        $city_id = request()->query('city_id',''); //input()
        if($request->city_id == "null"){
          $city_id = null;
        }
        $store_name = str_replace(" ", "%", $store_name);
          $data = Store::where('is_delete',0)
          ->when($package_id,function($query,$package_id) {
                          $query->where('subscription_package_id', $package_id);
                      })
                      ->when($country_id,function($query,$country_id) {
                        $query->where('store_country', $country_id);
                    })
                    ->when($city_id,function($query,$city_id) {
                      $query->where('store_city', $city_id);
                  })
                  ->when($store_name,function($query,$store_name) {
                    $query->where('store_name_en', 'like', '%'.$store_name.'%')
                    ->orWhere('store_name_ar', 'like', '%'.$store_name.'%');
                })
               
                ->withCount('order_products')->orderBy('order_products_count', 'asc')
                      ->get();
                      
                      return view('AdminPanel.sales.search', compact('data'))->render();
      
  }
  }

   
  public function best_sales_search(Request $request)
  {
      
      if($request->ajax())
      {
       
        $date = request()->query('date',''); //input()
        $store_name = request()->query('store_name',''); //input()
        $package_id = request()->query('package_id',''); //input()
        $country_id = request()->query('country_id',''); //input()
        $city_id = request()->query('city_id',''); //input()
        if($request->city_id == "null"){
          $city_id = null;
        }
        $store_name = str_replace(" ", "%", $store_name);
          $data = Store::where('is_delete',0)
          ->when($package_id,function($query,$package_id) {
                          $query->where('subscription_package_id', $package_id);
                      })
                      ->when($country_id,function($query,$country_id) {
                        $query->where('store_country', $country_id);
                    })
                    ->when($city_id,function($query,$city_id) {
                      $query->where('store_city', $city_id);
                  })
                  ->when($store_name,function($query,$store_name) {
                    $query->where('store_name_en', 'like', '%'.$store_name.'%')
                    ->orWhere('store_name_ar', 'like', '%'.$store_name.'%');
                })
               
                ->withCount('order_products')->orderBy('order_products_count', 'desc')
                      ->get();
                      
                      return view('AdminPanel.sales.search', compact('data'))->render();
      
  }
  }
  
}
