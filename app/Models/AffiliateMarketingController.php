<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\AffiliateMarketing;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliateMarketingController extends Controller
{
    public function index()
    {
        $category = ProductCategory::where('is_delete', 0)->where('parent_id', 0)->orderBy('created_at', 'desc')->get();
           $affiliate = AffiliateMarketing::where('store_id',Auth::user()->store_id)->with(['user'=>function ($q){$q->with('country');},'currency'])->get();
        return view('Store.affiliate.index')->with('category', $category)->with('affiliate', $affiliate);
    }

    public function add_affiliate()
    {
        $category = ProductCategory::where('is_delete', 0)->where('parent_id', 0)->orderBy('created_at', 'desc')->get();
        $currency = Currency::where('is_delete', 0)->orderBy('created_at', 'desc')->get();
         $countries = Country::where('is_delete',0)->where('status','active')->get();
        return view('Store.affiliate.add_affiliate')
        ->with('countries', $countries)
        ->with('currency', $currency)
        ->with('category', $category);
    }
    public function getCities(Request $request)
    {
        $this->validate($request,['id'=>'required|exists:countries,id']);

     return   City::where('country_id',$request->id)->where('is_delete',0)->get();
    //  ->map(function ($q){ return ['id'=>$q->id  , 'name'=>$q->city_name_ar];});
      $result['status'] = 200 ;
      return  $result ;
    }
    public function storeAffilate(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'phone_number'=>'required|unique:users,phone_number',
            'city_id'=>'required|exists:cities,id',
            'country_id'=>'required|exists:countries,id',
            'email'=>'required|email|unique:users,email',
            'link_type'=>'required',
            'issue_date'=>'required',
            'affiliate_type'=>'required',
            'affiliate_value'=>'required',
            'affiliate_currency'=>'required',
            'apply_affiliate'=>'required',
            'link'=>'required',

        ]);
        try {
             $request['store_id'] = Auth::user()->store_id;
            $store1 =    User::create($request->all());
            $request['user_id']= $store1->id;
            $request['link_reference']= $store1->id;
           $store2 =  AffiliateMarketing::create($request->all());
           return redirect()->route('affiliate.index');
           dd([$store1 , $store2]);
        } catch (\Throwable $th) {
            $store1->delete();
            throw $th;
        }

    }






}
