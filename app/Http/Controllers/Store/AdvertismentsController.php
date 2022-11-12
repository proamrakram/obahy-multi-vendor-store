<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Hash;
use App\Models\Advertisement;
use DB;
use App\Http\Controllers\Controller;

class AdvertismentsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $advertisments = Advertisement::where('store_id','>',0)->where('is_delete',0)->orderBy('created_at', 'desc')->get();
    return view('Store.advertisments.index')->with('advertisments', $advertisments);
  }

  public function create()
  {
    return view('Store.advertisments.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'ads_type' => 'required|string|in:pop_up_window,side_window',
      'ads_place' => 'required|string|in:all-pages,home-page,inner-pages,home-primary-main-banner,home-top-primary-side-banner,
      home-bottom-primary-side-banner,home-first-secondary-banner,
      home-second-secondary-banner,inner-banner-start-categories-page,
      inner-banner-end-categories-page,inner-banner-start-product-details-page,
      inner-banner-end-product-details-page,inner-banner-start-stores-types-page
      ,inner-banner-end-stores-types-page,inner-banner-end-payment-page,
      inner-banner-start-cart-page,inner-banner-end-cart-page,
      inner-banner-start-payment-page,inner-banner-start-continue-payment-page,
      inner-banner-start-profile-page,inner-banner-end-continue-payment-page,inner-banner-end-profile-page',
      
      'link' => 'required|string|max:255',
      //'image' => 'nullable|mimes:jpeg,jpg,png,gif',
      'add_image' => 'required',
    ]);
    
    $advertisment = new Advertisement();
    $advertisment->add_image = $request->add_image;
    $advertisment->ads_type = $request->ads_type;
    $advertisment->ads_place = $request->ads_place;
    $advertisment->store_id = auth()->user()->store_id;
    $advertisment->link = $request->link;
    $advertisment->status = 'active';
    $advertisment->is_delete = 0;
    $advertisment->save();

    session()->flash('success', 'تم اضافة اعلان جديد بنجاح');
    return redirect()->route('store.advertisments.index');
  }

  public function edit($id)
  {
    $advertisment = Advertisement::find($id);
    if (is_null($advertisment)  || $advertisment->is_delete == 1 || $advertisment->store_id == 0) {
      session()->flash('error', 'الاعلان غير موجود');
      return redirect()->back();
    }
    return view('Store.advertisments.edit')->with('advertisment', $advertisment);
  }

  public function update(Request $request, $id)
  {
    $advertisment = Advertisement::find($id);
    if (is_null($advertisment)  || $advertisment->is_delete == 1|| $advertisment->store_id == 0) {
      session()->flash('error', 'الاعلان غير موجود');
      return redirect()->back();
    }

    $this->validate($request, [
      'ads_type' => 'required|string|in:pop_up_window,side_window',
      'ads_place' => 'required|string|in:all-pages,home-page,inner-pages,home-primary-main-banner,home-top-primary-side-banner,
      home-bottom-primary-side-banner,home-first-secondary-banner,
      home-second-secondary-banner,inner-banner-start-categories-page,
      inner-banner-end-categories-page,inner-banner-start-product-details-page,
      inner-banner-end-product-details-page,inner-banner-start-stores-types-page
      ,inner-banner-end-stores-types-page,inner-banner-end-payment-page,
      inner-banner-start-cart-page,inner-banner-end-cart-page,
      inner-banner-start-payment-page,inner-banner-start-continue-payment-page,
      inner-banner-start-profile-page,inner-banner-end-continue-payment-page,inner-banner-end-profile-page',
      
      'link' => 'required|string|max:255',
      //'image' => 'nullable|mimes:jpeg,jpg,png,gif',
      'add_image' => 'nullable',
    ]);

  
    if(!is_null($request->add_image)){
    $advertisment->add_image = $request->add_image;
    }
    $advertisment->ads_type = $request->ads_type;
    $advertisment->ads_place = $request->ads_place;
    $advertisment->link = $request->link;
    $advertisment->save();
    session()->flash('success', 'تم تعديل بيانات الاعلان بنجاح');
    return redirect()->route('store.advertisments.index');
  }

  public function destroy($id)
  {
    $advertisment = Advertisement::find($id);
    if (is_null($advertisment)  || $advertisment->is_delete == 1|| $advertisment->store_id == 0) {
      session()->flash('error', 'الاعلان غير موجود');
      return redirect()->back();
    }

    $advertisment->is_delete =1;
    $advertisment->save();
    session()->flash('success', 'تم حذف الاعلان بنجاح');
    return redirect()->back();
  }

  public function change_status($id)
  {
    $advertisment = Advertisement::find($id);

    if (is_null($advertisment)  || $advertisment->is_delete == 1|| $advertisment->store_id == 0) {
      session()->flash('error', 'الاعلان غير موجود');
      return redirect()->back();
    }
    if($advertisment->status == 'active'){
      $advertisment->status ='inactive';
    }else{
      $advertisment->status ='active';
    }
    $advertisment->save();
    session()->flash('success', 'تم تغيير حالة الاعلان بنجاح');
    return redirect()->back();
  }

}
