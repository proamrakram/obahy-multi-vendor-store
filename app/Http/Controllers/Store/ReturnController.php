<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use Http;
use App\Models\Order;
use App\Models\OrderProduct;
use DB;
use App\Http\Controllers\Controller;

class ReturnController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $orders = OrderProduct::where('store_id',auth()->user()->store_id)->where('status','reference')->where('is_delete',0)->orderBy('created_at', 'desc')->get();
    return view('Store.returns.index')->with('data', $orders);
  }

  public function search(Request $request)
  {
      
    if($request->ajax())
    {
      
      $date = request()->query('date',''); //input()
      $search = request()->query('search_input',''); //input()
      $search = str_replace(" ", "%", $search);
        $data = OrderProduct::where('is_delete',0)->where('status','reference')->where('store_id',auth()->user()->store_id)
                ->when($search,function($query,$search) {
                  $query->whereHas('product',function($query) use ($search) {
                    $query->where('product_name_en', 'like', '%'.$search.'%')
                    ->orWhere('product_name_ar', 'like', '%'.$search.'%')
                    ->orWhere('product_serial_number', 'like', '%'.$search.'%');
                });
              })->when($date,function($query,$date) {
                  $query->where('reference_date', $date);
                })
                    ->orderBy('created_at','desc')
                    ->get();

                    
                    return view('Store.returns.search', compact('data'))->render();
    
}
}


}

