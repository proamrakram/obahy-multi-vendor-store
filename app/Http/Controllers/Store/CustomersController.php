<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Country;

class CustomersController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $customers = User::where('is_delete',0)->where('user_status', 'active')->where('user_type','customer')->orderBy('created_at', 'desc')->paginate(10);
    $countries = Country::where('status', 'active')->where('is_delete',0)->get();
    $customer_count =  User::where('is_delete',0)->where('user_status', 'active')->where('user_type','customer')->count();
    return view('Store.customers.index')->with('customers', $customers)
    ->with('customer_count',$customer_count)->with('countries', $countries);
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users',
      'phone_number' => 'required|string|max:14|unique:users',
      'password' => 'required|string|min:6|max:20',
      'image' => 'nullable',
      'birthdate' => 'required',
      'postCode' => 'required|string|max:12',
      'gender' => 'required|string|max:12',
      'country_id' => 'required|numeric|exists:countries,id',
    ]);

    $customer = new User();
    $customer->name = $request->name;
    $customer->phone_number = $request->phone_number;
    $customer->country_id = $request->country_id;
    $customer->birthdate = $request->birthdate;
    $customer->email = $request->email;
    $customer->password = Hash::make($request->password);
    $customer->postCode = $request->postCode;
    $customer->gender = $request->gender;
    $customer->user_type = 'customer';

    if(!is_null($request->image)){
      $customer->image = $request->image;
    }

    $customer->save();

    session()->flash('success', 'تم اضافة عميل جديد بنجاح');
    return redirect()->route('store.customers.index');
  }

}
