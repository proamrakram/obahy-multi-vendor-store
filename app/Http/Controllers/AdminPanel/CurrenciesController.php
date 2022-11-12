<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Hash;
use App\Models\Currency;
use App\Models\WebsiteSetting;
use DB;
use App\Http\Controllers\Controller;

class CurrenciesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
    
    $this->setting = WebsiteSetting::first();
  }

  public function index()
  {
    $currencies = Currency::where('is_delete',0)->get();
    return view('AdminPanel.currencies.index')->with('currencies', $currencies)->with('setting', $this->setting);
  }

  
  public function create()
  {
    return view('AdminPanel.currencies.create')->with('setting', $this->setting);
  }


  public function store(Request $request)
  {
    $this->validate($request,[
        'currency_name_en' => 'required|string|max:255',
        'currency_name_ar' => 'required|string|max:255',
        'currency_symbol' => 'required|string|max:255',
        'currency_code' => 'required|string|max:255',
        'exchange' => 'required',
    ]);

    $currency = Currency::create([
      'currency_name_en'=>$request->currency_name_en,
      'currency_name_ar'=>$request->currency_name_ar,
      'currency_symbol'=>$request->currency_symbol,
      'currency_code'=>$request->currency_code,
      'exchange'=>$request->exchange,
    ]);
    

    $this->massage('success', 'Currency added successfully','تم اضافة العملة  بنجاح');
    return redirect()->route('admin.currencies.index');
  }

  public function edit($id)
  {
    $currency = Currency::find($id);
    if(is_null($currency)) {
      $this->massage('error', 'Currency not found','العملة غير موجودة');
      return redirect()->back();
    }
    
    return view('AdminPanel.currencies.edit')->with('currency', $currency)->with('setting', $this->setting);
  }

  public function update(Request $request, $id)
  {
    
    $currency = Currency::find($id);
    if (is_null($currency)) {
      $this->massage('error', 'Currency not found','العملة غير موجودة');
      return redirect()->back();
    }
      
    $this->validate($request,[
      'currency_name_en' => 'required|string|max:255',
      'currency_name_ar' => 'required|string|max:255',
      'currency_symbol' => 'required|string|max:255',
      'currency_code' => 'required|string|max:255',
        'exchange' => 'required',
  ]);

    //dd($request->permissions);


    $currency->update([
      'currency_name_en'=>$request->currency_name_en,
      'currency_name_ar'=>$request->currency_name_ar,
      'currency_symbol'=>$request->currency_symbol,
      'currency_code'=>$request->currency_code,
      'exchange'=>$request->exchange,
    ]);

    $this->massage('success', 'Currency data has been modified successfully','تم تعديل بيانات العملة  بنجاح');
    return redirect()->route('admin.currencies.index');
  }

  public function destroy($id)
  {

      
    $currency = Currency::find($id);
    if (is_null($currency)) {
      $this->massage('error','Currency not found', 'العملة غير موجودة');
      return redirect()->back();
    }

    $currency->is_delete = 1;
    $currency->save();
    $this->massage('success','The coin has been deleted successfully', 'تم حذف العملة بنجاح');
    return redirect()->back();
  }
}
