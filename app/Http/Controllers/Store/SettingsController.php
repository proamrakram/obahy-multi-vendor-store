<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Hash;
use App\Models\Store;
use App\Models\Currency;
use DB;
use App\Http\Controllers\Controller;
use App\Models\StoreSetting;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Store.settings.index');
    }


    public function general()
    {
        $store = Store::where('id', auth()->user()->store_id)->first();
        return view('Store.settings.general')->with('store', $store);
    }
    public function domain()
    {
        $store = Store::where('id', auth()->user()->store_id)->first();
        return view('Store.settings.domain')->with('store', $store);
    }
    public function updateDomain(Request $request)
    {
        if($request->input('obyah_domin')){

        }
        if($request->input('store_domain')){

        }
        return false ;
    }


    public function notification()
    {
        $store = StoreSetting::where('store_id', auth()->user()->store_id)->where('value','on')->where('key', 'like',  'notification' . '%')->get()->map(function ($q) {
        return
           $q->key;

       } )->toArray();

        return view('Store.settings.notification')->with('store', $store);
    }


    public function seo()
    {
        $seo = StoreSetting::where('store_id', auth()->user()->store_id)->get();
        $seo_keywords_en = $seo_store_title_en = $seo_store_description_en =
            $seo_store_url_en = $seo_keywords_ar = $seo_store_description_ar =
            $seo_store_title_ar = $seo_store_url_ar = null;
        foreach ($seo as $i) {
            ${$i->key} = $i->value;
        }
        return view('Store.settings.seo')->with('seo_keywords_en', $seo_keywords_en)
            ->with('seo_store_title_en', $seo_store_title_en)
            ->with('seo_store_description_en', $seo_store_description_en)
            ->with('seo_store_url_en', $seo_store_url_en)
            ->with('seo_keywords_ar', $seo_keywords_ar)
            ->with('seo_store_title_ar', $seo_store_title_ar)
            ->with('seo_store_description_ar', $seo_store_description_ar)
            ->with('seo_store_url_ar', $seo_store_url_ar);
    }


    public function  update_general(Request $request)
    {
        $this->validate($request, [
            'store_name_ar' => 'required|string|max:255',
            'store_name_en' => 'required|string|max:255',
            'store_details_ar' => 'required|string',
            'store_details_en' => 'required|string',
            'store_address_ar' => 'required|string|max:255',
            'store_address_en' => 'required|string|max:255',
            'logo' => 'nullable',
        ]);

        $store = Store::find(auth()->user()->store_id);
        $store->store_name_ar = $request->store_name_ar;
        $store->store_name_en = $request->store_name_en;
        $store->store_details_ar = $request->store_details_ar;
        $store->store_details_en = $request->store_details_en;
        $store->store_address_en = $request->store_address_en;
        $store->store_address_ar = $request->store_address_ar;
        if (!is_null($request->logo)) {

            $store->store_logo = $request->logo;
        }
        $store->save();



        session()->flash('success', 'تم تعديل بيانات المتجر بنجاح');
        return redirect()->back();
    }


    public function  update_seo_en(Request $request)
    {
        $this->validate($request, [
            'seo_keywords_en' => 'required|string|max:255',
            'seo_store_title_en' => 'required|string',
            'seo_store_description_en' => 'required|string|max:255',
            'seo_store_url_en' => 'required|string|max:255',
        ]);


        return $this->update($request);
    }

    public function  update_seo_ar(Request $request)
    {
        $this->validate($request, [
            'seo_keywords_ar' => 'required|string|max:255',
            'seo_store_title_ar' => 'required|string',
            'seo_store_description_ar' => 'required|string|max:255',
            'seo_store_url_ar' => 'required|string|max:255',
        ]);


        return $this->update($request);
    }
    public function update_notification(Request $request)
    {
        $this->validate($request , ['key'=>'required|array|in:on,off' ,'off'=>'required|array|in:on,off']);
        foreach ($request->off as $key => $input) {
            StoreSetting::updateOrCreate([
                'key' => $key,
                'store_id' => auth()->user()->store_id
            ], [
                'value' => $input
            ]);
        }
        foreach ($request->key as $key => $input) {
            StoreSetting::updateOrCreate([
                'key' => $key,
                'store_id' => auth()->user()->store_id
            ], [
                'value' => $input
            ]);
        }
        return StoreSetting::all();

    }

    public function update(Request $request)
    {
        $this->validate($request , ['key'=>'required|array|in:on,off']);
        return $request->all() ;
        foreach ($request->all() as $key => $input) {
            StoreSetting::updateOrCreate([
                'key' => $key,
                'store_id' => auth()->user()->store_id
            ], [
                'value' => $input
            ]);
        }



        session()->flash('success', 'تم تعديل بيانات محركات البحث للمتجر بنجاح');
        return redirect()->back();
    }

    public function currency()
    {

        $currencies = Currency::where('is_delete', 0)->get();
        $store = Store::where('id', auth()->user()->store_id)->first();
        return view('Store.settings.currency')->with('store', $store)
            ->with('currencies', $currencies);
    }

    public function  update_currency(Request $request)
    {
        $this->validate($request, [
            'currency' => 'required|numeric|exists:currencies,id',
        ]);


        $store = Store::find(auth()->user()->store_id);
        $store->store_currency = $request->currency;
        $store->save();


        session()->flash('success', 'تم تعديل عملة المتجر بنجاح');
        return redirect()->back();
    }
}
