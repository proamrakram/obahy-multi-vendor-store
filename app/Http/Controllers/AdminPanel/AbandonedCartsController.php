<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use App\Http\Controllers\Controller;
use App\Models\AbandonedCartSettings;
use Illuminate\Support\Facades\Auth;

class AbandonedCartsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('AdminPanel.abandoned_carts');
  }


  public function settings()
  {

    $setting = AbandonedCartSettings::select('key', 'value')->pluck('value', 'key')->toArray();
    return view('AdminPanel.abandoned_carts_settings')->with('setting', $setting);
  }




  public function  general_settings_update(Request $request)
  {
    $this->validate($request, [
      'activate_abandoned_carts' => 'nullable|in:0,1',
      'abandoned_carts_time' => 'required|numeric',
      'abandoned_carts_time_type' => 'required|in:minute,hour,day',
      'abandoned_carts_mail_time' => 'required|numeric',
      'abandoned_carts_mail_time_type' => 'required|in:minute,hour,day',
      'abandoned_carts_default' => 'required|in:auto,reminder',
    ]);


    return $this->update($request);
  }




  public function  automail_settings_update(Request $request)
  {
    $this->validate($request, [
      'automail_title_ar' => 'required|string|max:255',
      'automail_title_en' => 'required|string|max:255',
      'automail_details_ar' => 'required|string',
      'automail_details_en' => 'required|string',
    ]);

    return $this->update($request);
  }




  public function  remindermail_settings_update(Request $request)
  {
    $this->validate($request, [
      'remindermail_title_ar' => 'required|string|max:255',
      'remindermail_title_en' => 'required|string|max:255',
      'remindermail_details_ar' => 'required|string',
      'remindermail_details_en' => 'required|string',
    ]);

    return $this->update($request);
  }


  public function update($request)
  {
    if(!$request->has('activate_abandoned_carts')){
      AbandonedCartSettings::updateOrCreate([
        'key'=>'activate_abandoned_carts'
      ],[
          'value' => 0
      ]);
    }
    foreach($request->all() as $key => $input)
        {

          if($key != "_token"){

          AbandonedCartSettings::updateOrCreate([
            'key'=>$key
          ],[
              'value' => $input
          ]);
          }
        }


    $this->massage('success', 'The data has been modified successfully','تم تعديل البيانات بنجاح');
    return redirect()->back();
  }


}
