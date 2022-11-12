<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use Http;
use App\Models\Order;
use App\Models\OrderProduct;
use DB;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
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
      $query->where('product_type','!=', 'service');
    });})->orderBy('created_at', 'desc')->get();
    return view('Store.reports.index')->with('data', $orders)
    ->with('orders_count_awaiting_payment', $orders_count_awaiting_payment)
    ->with('orders_count_underway', $orders_count_underway)
    ->with('orders_count_done', $orders_count_done)
    ->with('orders_count_delivery_in_progress', $orders_count_delivery_in_progress)
    ->with('orders_count_delivered', $orders_count_delivered)
    ->with('services_count', $services_count);
  }


  public function services()
  {
    $orders = Order::where('is_delete',0)
    ->whereHas('products',function($query){
      $query->whereHas('product',function($query){
      $query->where('product_type', 'service');
    });})->orderBy('created_at', 'desc')->get();
    return view('Store.orders.service')->with('data', $orders);
  }

  public function details($id)
  {
    $order = Order::where('is_delete',0)->find($id);
    return view('Store.orders.details')->with('order', $order);
  }

 
 
  
  
}
