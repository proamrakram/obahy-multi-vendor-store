<?php

namespace App\Http\Controllers\AdminPanel;

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
    $orders = OrderProduct::where('status','reference')->where('is_delete',0)->orderBy('created_at', 'desc')->get();
    return view('AdminPanel.returns.index')->with('data', $orders);
  }

  public function search(Request $request)
  {
      
      if($request->ajax())
      {
        
        $date = request()->query('date',''); //input()
        $search = request()->query('search_input',''); //input()
        $search = str_replace(" ", "%", $search);
          $data = OrderProduct::where('is_delete',0)->where('status','reference')
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
                      
                      return view('AdminPanel.returns.search', compact('data'))->render();
      
  }
}
  
  
}
