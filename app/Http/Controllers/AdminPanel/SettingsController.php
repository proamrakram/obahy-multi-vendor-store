<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Hash;
use App\Models\Setting;
use App\Models\Faq;
use App\Models\Currency;
use App\Models\StorePackage;
use App\Models\WebsiteSetting;
use DB;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('AdminPanel.settings.index');
  }
  
  
  public function global()
  {
    $setting = Setting::select('key', 'value')->pluck('value', 'key')->toArray();
    return view('AdminPanel.settings.global')->with('setting', $setting);
  }

  public function  update_global(Request $request)
  {
    $this->validate($request, [
      'platform_name_ar' => 'required|string|max:255',
      'platform_name_en' => 'required|string|max:255',
      'platform_details_ar' => 'required|string',
      'platform_details_en' => 'required|string',
      'platform_email' => 'required|email',
      'platform_phone_number' => 'required|string|max:255',
      'footer_logo' => 'required',
      'header_logo' => 'required',
    ]);

    return $this->update($request);
  }
 

  
  public function about()
  {
    
    $setting = Setting::select('key', 'value')->pluck('value', 'key')->toArray();
    return view('AdminPanel.settings.about')->with('setting', $setting);
  }
  

  public function  update_about(Request $request)
  {
    $this->validate($request, [
      'about_page_name_ar' => 'required|string|max:255',
      'about_page_name_en' => 'required|string|max:255',
      'about_page_details_ar' => 'required|string',
      'about_page_details_en' => 'required|string',
    ]);

    return $this->update($request);
  }
 

  
  public function social()
  {
    
    $setting = Setting::select('key', 'value')->pluck('value', 'key')->toArray();
    return view('AdminPanel.settings.social')->with('setting', $setting);
  }
  

  public function  update_social(Request $request)
  {
    $this->validate($request, [
      'platform_twitter' => 'required|string|max:255',
      'platform_facebook' => 'required|string|max:255',
      'platform_linkedin' => 'required|string|max:255',
      'platform_instagram' => 'required|string|max:255',
    ]);

    return $this->update($request);
  }
 

  
  public function faq()
  {
    
    $setting = Setting::select('key', 'value')->pluck('value', 'key')->toArray();
    
    $faq_ar = Faq::where('is_delete', 0)->where('lang', 'ar')->get();
    $faq_en = Faq::where('is_delete', 0)->where('lang', 'en')->get();

    return view('AdminPanel.settings.faq')->with('setting', $setting)->with('faq_ar', $faq_ar)->with('faq_en', $faq_en);
  }
  

  public function  update_faq(Request $request)
  { 
   // dd($request);
    $this->validate($request, [
      'faq_page_name_ar' => 'required|string|max:255',
      'faq_page_name_en' => 'required|string|max:255',
      'faq_ar' => 'required|array',
      'faq_ar.*.question' => 'required|string',
      'faq_ar.*.answer' => 'required|string',
      'faq_en' => 'required|array',
      'faq_en.*.question' => 'required|string',
      'faq_en.*.answer' => 'required|string',
    ]);
    $array = array();
    
    if(!is_null($request->faq_ar))
    foreach ($request->faq_ar as $r) {
      $array[] = $r['id'];
    }

    
    if(!is_null($request->faq_en))
    foreach ($request->faq_en as $r) {
      $array[] = $r['id'];
    }


    $result = array_diff(Faq::all()->pluck(['id'])->toArray(), $array);
    foreach ($result as $r) {
      $faq = Faq::find($r);
      $faq->delete();
    }


    if(!is_null($request->faq_ar))
    foreach ($request->faq_ar as $faq) {

      Faq::updateOrCreate([
        'id' => $faq['id']
      ], [

        'question' => $faq['question'],
        'answer' => $faq['answer'],
        'lang' => 'ar'
      ]);
    }

    if(!is_null($request->faq_en))
    foreach ($request->faq_en as $faq) {

      Faq::updateOrCreate([
        'id' => $faq['id']
      ], [

        'question' => $faq['question'],
        'answer' => $faq['answer'],
        'lang' => 'en'
      ]);
    }
   
    Setting::updateOrCreate([
      'key'=>'faq_page_name_ar'
    ],[
        'value' => $request->faq_page_name_ar
    ]);
    Setting::updateOrCreate([
      'key'=>'faq_page_name_en'
    ],[
        'value' => $request->faq_page_name_en
    ]);
    
    
    $this->massage('success', 'The data has been modified successfully','تم تعديل البيانات بنجاح');
    return redirect()->back();
  }
 

  
  public function privacy()
  {
    
    $setting = Setting::select('key', 'value')->pluck('value', 'key')->toArray();
    return view('AdminPanel.settings.privacy')->with('setting', $setting);
  }
  

  public function  update_privacy(Request $request)
  {
    $this->validate($request, [
      'privacy_page_name_ar' => 'required|string|max:255',
      'privacy_page_name_en' => 'required|string|max:255',
      'privacy_page_details_ar' => 'required|string',
      'privacy_page_details_en' => 'required|string',
    ]);

    return $this->update($request);
  }
 



  public function update($request)
  {

    foreach($request->all() as $key => $input)
        {
          if($key == 'logo' || $key == 'footer_logo' || $key == 'header_logo')
            {
              $i = $input->store('images/setting', 'public');
              $input = $input->hashName();
            }

            Setting::updateOrCreate([
              'key'=>$key
            ],[
                'value' => $input
            ]);
        }


    $this->massage('success', 'The data has been modified successfully','تم تعديل البيانات بنجاح');
    return redirect()->back();
  }

 public function currency()
    {

        $currencies = Currency::where('is_delete', 0)->get();
        $setting = WebsiteSetting::first();
        return view('AdminPanel.settings.currency')->with('setting', $setting)
            ->with('currencies', $currencies);
    }

    public function  update_currency(Request $request)
    {
        $this->validate($request, [
            'currency' => 'required|numeric|exists:currencies,id',
        ]);


       $setting = WebsiteSetting::first();
        $setting->default_currency = $request->currency;
        $setting->save();

 $this->massage('success', 'The data has been modified successfully', 'تم تعديل عملة المنصة بنجاح ');
        return redirect()->back();
    }
    
    
 public function package()
    {

        $packages = StorePackage::where('is_delete', 0)->get();
        $setting = WebsiteSetting::first();
        return view('AdminPanel.settings.package')->with('setting', $setting)
            ->with('packages', $packages);
    }

    public function  update_package(Request $request)
    {
        $this->validate($request, [
            'package' => 'required|numeric|exists:store_packages,id',
            'period' => 'required|numeric',
        ]);


       $setting = WebsiteSetting::first();
        $setting->default_package = $request->package;
        $setting->package_period = $request->period;
        $setting->save();

 $this->massage('success', 'The data has been modified successfully', 'تم تعديل الباقة التجريبية بنجاح ');
        return redirect()->back();
    }
  
 public function package_settings()
 {

     $setting = WebsiteSetting::first();
     return view('AdminPanel.settings.package_settings')->with('setting', $setting);
 }

 public function  update_package_settings(Request $request)
 {
     $this->validate($request, [
         'default_products_num' => 'required|numeric',
         'default_services_num' => 'required|numeric',
         'default_orders_num' => 'required|numeric',
         'default_customers_num' => 'required|numeric',
         'default_copons_num' => 'required|numeric',
     ]);


    $setting = WebsiteSetting::first();
     $setting->default_products_num = $request->default_products_num;
     $setting->default_services_num = $request->default_services_num;
     $setting->default_orders_num = $request->default_orders_num;
     $setting->default_customers_num = $request->default_customers_num;
     $setting->default_copons_num = $request->default_copons_num;
     $setting->save();

$this->massage('success', 'The data has been modified successfully', 'تم تعديل اعدادات الباقة بنجاح ');
     return redirect()->back();
 }

 
}
