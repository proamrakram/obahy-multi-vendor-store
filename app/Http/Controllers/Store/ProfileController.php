<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use Http;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function profile()
  {
    return view('Store.profile');
  }
  
  

  public function  update_profile(Request $request)
  {
    $user = User::find(auth()->user()->id);
    $this->validate($request, [
      'name' => 'required|string|max:255',
      'email' => 'required|string|max:255|email|unique:users,email,'.$user->id,
      'password' => 'nullable|string|min:8|confirmed',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    
    if(!is_null($request->password)){
      $user->password = Hash::make($request->password);
    }
    

    session()->flash('success', 'تم تعديل البيانات بنجاح');
    return redirect()->back();
  }
 


  
 
}
