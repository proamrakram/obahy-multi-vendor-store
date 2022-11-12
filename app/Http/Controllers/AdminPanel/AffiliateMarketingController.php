<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\AffiliateMarketing;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AffiliateMarketingController extends Controller
{
    public function index()
    {
        $category = ProductCategory::where('is_delete', 0)->where('parent_id', 0)->orderBy('created_at', 'desc')->get();
         $affiliate = AffiliateMarketing::where('store_id', 0)->with(['user' => function ($q) {
            $q->with('country');
        }, 'currency'])->paginate(10);

            return view('AdminPanel.affiliate.index')->with('category', $category)->with('affiliate', $affiliate);

    }

    public function add_affiliate()
    {
        $category = ProductCategory::where('is_delete', 0)->where('parent_id', 0)->orderBy('created_at', 'desc')->get();
        $currency = Currency::where('is_delete', 0)->orderBy('created_at', 'desc')->get();
        $countries = Country::where('is_delete', 0)->where('status', 'active')->get();
        $city = City::where('is_delete', 0)->where('status', 'active')->get();
        return view('AdminPanel.affiliate.add_affiliate')
            ->with('countries', $countries)
            ->with('currency', $currency)
            ->with('city', $city)
            ->with('category', $category);
    }
    public function getCities(Request $request)
    {
        $this->validate($request, ['id' => 'required|exists:countries,id']);

        return   City::where('country_id', $request->id)->where('is_delete', 0)->get();
        //  ->map(function ($q){ return ['id'=>$q->id  , 'name'=>$q->city_name_ar];});
        $result['status'] = 200;
        return  $result;
    }
    public function storeAffilate(Request $request)
    {
        $test = User::where('email', $request->email)->first();
        $id = $test ? $test->id : null;
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'city_id' => 'required|exists:cities,id',
            'country_id' => 'required|exists:countries,id',
            'email' => 'required|email|unique:users,email,' . $id,
            'link_type' => 'required',
            'issue_date' => 'required',
            'affiliate_type' => 'required',
            'affiliate_value' => 'required',
            'affiliate_currency' => 'required',
            'apply_affiliate' => 'required',
            'link' => 'required',

        ]);
        if (!$test || $test->user_type == 'affiliate_marketer') {
            try {
                $request['store_id'] =0;
                $request['user_type'];

                $store1 =    User::updateOrCreate(['email' => $request->email], $request->all());

                $request['user_id'] = $store1->id;
                $request['link_reference'] = $store1->id;
                $store2 =  AffiliateMarketing::create($request->all());
                return redirect()->route('admin.affiliate.index');
                dd([$store1, $store2]);
            } catch (\Throwable $th) {
                $store1->delete();
                throw $th;
            }
        } else {
            $this->validate($request, [
                'email' => 'required|email|unique:users,email,',
            ]);
        }
    }


    public function edit_affiliate(Request $request, $id)
    {
        $affiliate = AffiliateMarketing::find($id);
        $user = User::where('id', $affiliate->user_id)->with(['city', 'country'])->first();
        if ($affiliate) {
            if ($user) {
                $category = ProductCategory::where('is_delete', 0)->where('parent_id', 0)->orderBy('created_at', 'desc')->get();
                $currency = Currency::where('is_delete', 0)->orderBy('created_at', 'desc')->get();
                $countries = Country::where('is_delete', 0)->where('status', 'active')->get();
                return view('AdminPanel.affiliate.edit_affiliate')
                    ->with('countries', $countries)
                    ->with('currency', $currency)
                    ->with('affiliate', $affiliate)
                    ->with('user', $user)
                    ->with('category', $category);
            }
        }

        return view('home');
    }
    public function delete_affiliate(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:affiliate_marketings,id',
        ]);
        $ch = AffiliateMarketing::find($request->id);
        $check = User::where('id', $ch->user_id)->update(['is_delete' => 1]);
        $ch = AffiliateMarketing::destroy($request->id);
        if (!$check) {
            $result['status'] = false;
            $result['message'] = trans('affiliate.delete_faild');
        } else {
            $result['status'] = true;
            $result['message'] = trans('affiliate.delete_successfully');
        }
        echo json_encode($result);
    }
    public function active_deactive_affiliate(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:affiliate_marketings,id',
        ]);
        $aff = AffiliateMarketing::find($request->id);
        $check = User::find($aff->user_id);
        if ($check->user_status == 'active') {
            DB::table('users')->where('id', $check->id)->update(['active' => 0]);
            $result['status'] = true;
            $result['message'] = trans('affiliate.update_successfully');
        } elseif ($check->user_status == 'inactive') {
            DB::table('users')->where('id', $check->id)->update(['active' => 1]);

            $result['status'] = true;
            $result['message'] = trans('affiliate.update_successfully');
        } else {
            $result['status'] = false;
            $result['message'] = trans('affiliate.update_faild');
        }
        echo json_encode($result);
    }
}
