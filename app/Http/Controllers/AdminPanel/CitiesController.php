<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Hash;
use App\Models\City;
use App\Models\Country;
use DB;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $cities = City::where('is_delete',0)->get();
    return view('AdminPanel.cities.index')->with('cities', $cities);
  }

  
  public function create()
  {
    $countries = Country::where('status', 'active')->where('is_delete',0)->get();
    return view('AdminPanel.cities.create')->with('countries', $countries);
  }


  public function store(Request $request)
  {
    $this->validate($request,[
        'city_name_en' => 'required|string|max:255',
        'city_name_ar' => 'required|string|max:255',
        'country_id' => 'required|numeric|exists:countries,id',
    ]);


    $city = City::create([
      'city_name_en'=>$request->city_name_en,
      'city_name_ar'=>$request->city_name_ar,
      'status'=>'active',
      'country_id'=>$request->country_id,
    ]);
    

    $this->massage('success', 'The city has been added successfully','تم اضافة المدينة  بنجاح');
    return redirect()->route('admin.cities.index');
  }

  public function edit($id)
  {
    $city = City::find($id);
    if(is_null($city) || $city->is_delete == 1) {
      $this->massage('error','City not found', 'المدينة غير موجودة');
      return redirect()->back();
    }
    $countries = Country::where('status', 'active')->where('is_delete',0)->get();
    
    return view('AdminPanel.cities.edit')->with('city', $city)->with('countries', $countries);
  }

  public function update(Request $request, $id)
  {
    
    $city = City::find($id);
    if (is_null($city)  || $city->is_delete == 1) {
      $this->massage('error','City not found', 'المدينة غير موجودة');
      return redirect()->back();
    }
      
    $this->validate($request,[
      'city_name_en' => 'required|string|max:255',
      'city_name_ar' => 'required|string|max:255',
      'country_id' => 'required|numeric|exists:countries,id',
  ]);

    $city->update([
      'city_name_en'=>$request->city_name_en,
      'city_name_ar'=>$request->city_name_ar,
      'country_id'=>$request->country_id,
    ]);

    $this->massage('success','The city data has been modified successfully', 'تم تعديل بيانات المدينة  بنجاح');
    return redirect()->route('admin.cities.index');
  }

  public function destroy($id)
  {
    $city = City::find($id);
    if (is_null($city)  || $city->is_delete == 1) {
      $this->massage('error','City not found', 'المدينة غير موجودة');
      return redirect()->back();
    }

    $city->is_delete = 1;
    $city->save();
    $this->massage('success', 'City deleted successfully','تم حذف المدينة بنجاح');
    return redirect()->back();
  }

  
  public function change_status($id)
  {
    $city = City::find($id);
    if (is_null($city)  || $city->is_delete == 1) {
      $this->massage('error','City not found', 'المدينة غير موجودة');
      return redirect()->back();
    }
    if($city->status == 'active'){
      $city->status ='inactive';
    }else{
      $city->status ='active';
    }
    $city->save();
    $this->massage('success','City status changed successfully', 'تم تغيير حالة المدينة بنجاح');
    return redirect()->back();
  }
}
