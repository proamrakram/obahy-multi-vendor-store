<?php

namespace App\Http\Controllers\AdminPanel;

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
    $customers = User::where('is_delete',0)->where('user_type','customer')->orderBy('created_at', 'desc')->get();
    $countries = Country::where('status', 'active')->where('is_delete',0)->get();
    $customer_count =  User::where('is_delete',0)->where('user_status', 'active')->where('user_type','customer')->count();
    return view('AdminPanel.customers.index')->with('customers', $customers)
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
    
    $this->massage('success','A new customer has been added successfully', 'تم اضافة عميل جديد بنجاح');
    return redirect()->route('admin.customers.index');
  }

  
  public function edit(Request $request)
  {
    $customer = User::find($request->id);
    if (is_null($customer)  || $customer->is_delete == 1 ||  $customer->user_type != 'customer') {
      $this->massage('error','User not found', 'المستخدم غير موجود');
      return redirect()->back();
    }
    $countries = Country::where('status', 'active')->where('is_delete',0)->get();
    
    return view('AdminPanel.customers.edit')->with('customer', $customer)->with('countries', $countries);
  }

  public function update(Request $request, $id)
  {
  $customer = User::find($id);

  if (is_null($customer)  || $customer->is_delete == 1 ||  $customer->user_type != 'customer') {
    $this->massage('error','User not found', 'المستخدم غير موجود');
    return redirect()->back();
  }

  $this->validate($request, [
    'update_name' => 'required|string|max:255',
    'update_phone_number' => 'required|string|max:14|unique:users,phone_number,'.$customer->id,
    'update_email' => 'required|email|unique:users,email,'.$customer->id,
    'update_password' => 'nullable|string|min:6|max:20',
    'update_image' => 'nullable',
    'update_birthdate' => 'required',
    'update_postCode' => 'required|string|max:12',
    'update_gender' => 'required|string|max:12',
    'update_country_id' => 'required|numeric|exists:countries,id',
  ]);

  
  $customer->name = $request->update_name;
  $customer->phone_number = $request->update_phone_number;
  $customer->email = $request->update_email;
  if(!is_null($request->update_password)){
    $customer->password = Hash::make($request->update_password);
  }
  if(!is_null($request->update_image)){

    $customer->image = $request->update_image;
  }
  $customer->birthdate = $request->update_birthdate;
  $customer->postCode = $request->update_postCode;
  $customer->gender = $request->update_gender;
  $customer->country_id = $request->update_country_id;
  $customer->save();
  


  $this->massage('success','User data has been modified successfully', 'تم تعديل بيانات المستخدم بنجاح');
  return redirect()->route('admin.customers.index');
  }

  public function destroy($id)
  {
    $customer = User::find($id);
    if (is_null($customer)  || $customer->is_delete == 1 ||  $customer->user_type != 'customer') {
      $this->massage('error','User not found', 'المستخدم غير موجود');
      return redirect()->back();
    }

    $customer->is_delete =1;
    $customer->save();
    $this->massage('success','User deleted successfully', 'تم حذف المستخدم بنجاح');
    return redirect()->back();
  }

  public function change_status($id)
  {
    $customer = User::find($id);
    if (is_null($customer) || $customer->is_delete == 1  ||  $customer->user_type != 'customer') {
      $this->massage('error','User not found', 'المستخدم غير موجود');
      return redirect()->back();
    }
    if($customer->user_status == 'inactive'){
      $customer->user_status ='active';
    }else{
      $customer->user_status ='inactive';
    }
    $customer->save();
    $this->massage('success','User status changed successfully', 'تم تغيير حالة المستخدم بنجاح');
    return redirect()->back();
  } 

}
