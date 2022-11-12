<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Order;
use App\Models\StorePackage;
use DB;
use App\Models\Country;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  
   public function search(Request $request)
    {
       
      if (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'admin_employee'){
        $return ='AdminPanel.customers.index'   ;
    }else{
      
      $return ='Store.customers.index'   ;
    }
        $search = request()->query('search',''); //input()
        if($request->page == 'customers'){
            $customers = User::where('is_delete',0)->where('user_type','customer')->where('name','like', '%'.$search.'%')
                      ->orderBy('created_at','desc')
                      ->get();
                      
                      
    $countries = Country::where('status', 'active')->where('is_delete',0)->get();
    $customer_count =  User::where('is_delete',0)->where('user_status', 'active')->where('user_type','customer')->count();
                      
                      return view($return)->with('customers', $customers)
    ->with('customer_count',$customer_count)->with('countries', $countries);
        }
                    
        if (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'admin_employee'){
          $return ='AdminPanel.orders.index'   ;
      }else{
        
        $return ='Store.orders.index'   ;
      }
    $new_orders = Order::where('is_delete',0)->whereMonth('created_at',date('m'))->count();
    $pending_orders = Order::where('is_delete',0)->where('status','awaiting_payment')->count();
    $executed_orders = Order::where('is_delete',0)->whereIn('status',['done','delivery_in_progress','delivered'])->count();
    $countries = Country::where('status', 'active')->where('is_delete', 0)->get();
   $packages = StorePackage::where('package_status', 'active')->where('is_delete', 0)->get();
   
            $orders = Order::where('is_delete',0)
          ->when($search,function($query,$search) {
            
            $query->whereHas('user',function($query) use ($search) {
                          $query->where('name','like', '%'.$search.'%');
                      });})
                      
                      
                      ->orderBy('created_at','desc')
                      ->get();
                      
                      return view($return)->with('data', $orders)
    ->with('countries', $countries)->with('packages', $packages)
    ->with('new_orders', $new_orders)->with('pending_orders', $pending_orders)->with('executed_orders', $executed_orders);
        
        
          
                      
      
        
    
    }

}
