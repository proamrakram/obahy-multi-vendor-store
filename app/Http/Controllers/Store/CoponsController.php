<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Hash;
use App\Models\Copon;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CoponsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $copons = Copon::where('is_delete',0)->where('store_id',Auth::user()->store_id)->orderBy('created_at', 'desc')->paginate(10);
    return view('Store.copons.index')->with('copons', $copons);
  }
  

  public function store(Request $request)
  {
    $this->validate($request, [
      'copon_code' => 'required|string|max:255',
      'copon_amount' => 'required|numeric',
      'copon_type' => 'required|string|in:fixed,percentage',
      'is_free_shipping' => 'required|in:0,1',
      'exclode_offers' => 'required|in:0,1',
      'copon_limit' => 'required|numeric',
      'use_count_all' => 'required|numeric',
      'user_use_count' => 'required|numeric',
      'expire_date' => 'required|date',
    ]);

    $copon = new Copon();
    $copon->copon_code = $request->copon_code;
    $copon->copon_amount = $request->copon_amount;
    $copon->copon_type = $request->copon_type;
    $copon->is_free_shipping = $request->is_free_shipping;
    $copon->exclode_offers = $request->exclode_offers;
    $copon->copon_limit = $request->copon_limit;
    $copon->use_count_all = $request->use_count_all;
    $copon->user_use_count = $request->user_use_count;
    $copon->expire_date = $request->expire_date;
    $copon->store_id = Auth::user()->store_id ;
    $copon->status = "active";

    $copon->save();

    
    
    session()->flash('success', 'تم اضافة كوبون جديد بنجاح');
    return redirect()->route('store.copons.index');
  }
    
     public function edit(Request $request)
  {
    $copon = Copon::find($request->id);
    if (is_null($copon)  || $copon->is_delete == 1 ||$copon->store_id != Auth::user()->store_id  ) {
      session()->flash('error', 'الكوبون غير موجود');
      return redirect()->back();
    }
    return view('Store.copons.edit')->with('copon', $copon);
  }

  public function update(Request $request, $id)
  {
    $copon = Copon::find($id);
    if (is_null($copon)  || $copon->is_delete == 1 ||$copon->store_id != Auth::user()->store_id ) {
      session()->flash('error', 'الكوبون غير موجود');
      return redirect()->back();
    }

  $this->validate($request, [
    'update_copon_code' => 'required|string|max:255',
    'update_copon_amount' => 'required|numeric',
    'update_copon_type' => 'required|string|in:fixed,percentage',
    'update_is_free_shipping' => 'required|in:0,1',
    'update_exclode_offers' => 'required|in:0,1',
    'update_copon_limit' => 'required|numeric',
    'update_use_count_all' => 'required|numeric',
    'update_user_use_count' => 'required|numeric',
    'update_expire_date' => 'required|date',
  ]);

  
  $copon->copon_code = $request->update_copon_code;
  $copon->copon_amount = $request->update_copon_amount;
  $copon->copon_type = $request->update_copon_type;
  $copon->is_free_shipping = $request->update_is_free_shipping;
  $copon->exclode_offers = $request->update_exclode_offers;
  $copon->copon_limit = $request->update_copon_limit;
  $copon->use_count_all = $request->update_use_count_all;
  $copon->user_use_count = $request->update_user_use_count;
  $copon->expire_date = $request->update_expire_date;
  $copon->save();
  


  session()->flash('success', 'تم تعديل بيانات الكوبون بنجاح');
  return redirect()->route('store.copons.index');
  }

  public function destroy($id)
  {
    $copon = Copon::find($id);
    if (is_null($copon)  || $copon->is_delete == 1||$copon->store_id != Auth::user()->store_id  ) {
      session()->flash('error', 'الكوبون غير موجود');
      return redirect()->back();
    }

    $copon->is_delete =1;
    $copon->save();
    session()->flash('success', 'تم حذف الكوبون بنجاح');
    return redirect()->back();
  }



  public function change_status($id)
  {
    $copon = Copon::find($id);
    if (is_null($copon)  || $copon->is_delete == 1 ||$copon->store_id != Auth::user()->store_id ) {
      session()->flash('error', 'الكوبون غير موجود');
      return redirect()->back();
    }
    if($copon->status == 'inactive'){
      $copon->status ='active';
    }else{
      $copon->status ='inactive';
    }
    $copon->save();
    session()->flash('success', 'تم تغيير حالة الكوبون بنجاح');
    return redirect()->back();
  }
}
