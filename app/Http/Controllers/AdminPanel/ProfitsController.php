<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Http;
use App\Models\Order;
use App\Models\OrderProduct;
use DB;

use App\Models\Currency;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\StorePackage;

class ProfitsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }



    function exchange($currency,$amount){
        $currency = Currency::find($currency);
        if(!is_null($currency)){
            $exchange = $currency->exchange;
            return $amount*$exchange;
        }
        return $amount;
    }

     
  public function index()
  {
      
      $products_cost =0;
      $sales_cost=0;
      $total_profit=0;
      $tax=0;
                          
                          foreach(OrderProduct::where('is_delete',0)->where('status','delivered')->get() as $o){
                              $products_cost += $this->exchange($o->store->store_currency , $o->product->product_price);
                              $sales_cost += $this->exchange($o->store->store_currency , $o->product->product_price_after_vat);
                              $total_profit += $this->exchange($o->store->store_currency , $o->product->product_price_after_vat);
                              $tax += $this->exchange($o->store->store_currency , $o->product->product_vat_value);
                          }
    return view('AdminPanel.profits.index')->with('products_cost',$products_cost)
    ->with('sales_cost',$sales_cost)
    ->with('total_profit',$total_profit)
    ->with('tax',$tax);
  }

 
  
  public function search(Request $request)
  {
      
      if($request->ajax())
      {
        
        $from_date = request()->query('from_date',''); //input()
        $to_date = request()->query('to_date',''); //input()
       
      $products_cost =0;
      $sales_cost=0;
      $total_profit=0;
      $tax=0;
      $orders = OrderProduct::where('is_delete',0)
                           ->when($from_date,function($query,$from_date) {
                    $query->whereDate('created_at', '>=', $from_date);
                })
                 ->when($to_date,function($query,$to_date) {
                    $query->whereDate('created_at', '<=',$to_date);
                })
                ->where('status','delivered')->get();
                          
                          foreach( $orders as $o){
                              $products_cost += $this->exchange($o->store->store_currency , $o->product->product_price);
                              $sales_cost += $this->exchange($o->store->store_currency , $o->product->product_price_after_vat);
                              $total_profit += $this->exchange($o->store->store_currency , $o->product->product_price_after_vat);
                              $tax += $this->exchange($o->store->store_currency , $o->product->product_vat_value);
                          }
                      return view('AdminPanel.profits.search', compact(['products_cost','sales_cost','total_profit','tax']))->render();
      
  }
  }
  
}
