<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use App\Http\Controllers\Controller;

class AdminsStoreController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $admins = User::where('is_delete',0)->where('user_type','store_admin')->whereNotIn('id',[1,auth()->user()->id])->orderBy('created_at', 'desc')->get();
    return view('AdminPanel.admins_store.index')->with('admins', $admins);
  }
  
  
  /*  public function search(Request $request)
    {
        
        if($request->ajax())
        {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = User::where('id', '!=', 1)->where(function ($s) use ($query) {
                            $s->where('email', 'like', '%'.$query.'%');
                        })->orWhere(function ($s) use ($query) {
                            $s->where('name', 'like', '%'.$query.'%');
                        })
                        ->orderBy('created_at','desc')
                        ->get();
                        return view('users.search', compact('data'))->render();
        
    }
    }
*/

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|string|max:255',
      'phone_number' => 'required|string|max:14|unique:users',
      'email' => 'required|email|unique:users',
      'password' => 'required|string|min:6|max:20',
      'gender' => 'required|string|max:12',
      'address' => 'nullable|string|max:255',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->phone_number = $request->phone_number;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->address_1 = $request->address;
    $user->gender = $request->gender;
    $user->user_type = 'store_admin';
    $user->save();
    $user->assignRole('store_admin');


    $this->massage('success','A new employee has been added successfully', 'تم اضافة موظف جديد بنجاح');
    return redirect()->route('admin.admins-store.index');
  }

  public function edit(Request $request)
  {
    $admin = User::find($request->id);
    if (is_null($admin) || $admin->is_delete == 1  ||  $admin->user_type != 'store_admin') {
      $this->massage('error', 'Employee not found','الموظف غير موجود');
      return redirect()->back();
    }
  
    return view('AdminPanel.admins_store.edit')->with('admin', $admin);
  }

  public function update(Request $request, $id)
  {
  $user = User::find($id);

  if (is_null($user)  || $user->is_delete == 1  ||  $user->user_type != 'store_admin') {
    $this->massage('error','Employee not found', 'الموظف غير موجود');
    return redirect()->back();
  }

  $this->validate($request, [
    'update_name' => 'required|string|max:255',
    'update_phone_number' => 'required|string|max:14|unique:users,phone_number,'.$user->id,
    'update_email' => 'required|email|unique:users,email,'.$user->id,
    'update_password' => 'nullable|string|min:6|max:20',
    'update_gender' => 'required|string|max:12',
    'update_address' => 'nullable|string|max:255',
  ]);

  
  $user->name = $request->update_name;
  $user->phone_number = $request->update_phone_number;
  $user->email = $request->update_email;
  if(!is_null($request->update_password)){
    $user->password = Hash::make($request->update_password);
  }
  $user->address_1 = $request->update_address;
  $user->gender = $request->update_gender;
  $user->save();
  


  $this->massage('success', 'The employee`s data has been modified successfully','تم تعديل بيانات الموظف بنجاح');
  return redirect()->route('admin.admins-store.index');
  }

  public function destroy($id)
  {
    $user = User::find($id);
    if (is_null($user)  || $user->is_delete == 1  ||  $user->user_type != 'store_admin') {

      $this->massage('error', 'Employee not found','الموظف غير موجود');
      return redirect()->back();
    }

    $user->is_delete =1;
    $user->save();
    $this->massage('success','The employee has been successfully deleted', 'تم حذف الموظف بنجاح');
    return redirect()->back();
  }

  public function change_status($id)
  {
    $user = User::find($id);
    if (is_null($user)  || $user->is_delete == 1 ||  $user->user_type != 'store_admin') {
      $this->massage('error', 'Employee not found','الموظف غير موجود');
      return redirect()->back();
    }
    if($user->user_status == 'inactive'){
      $user->user_status ='active';
    }else{
      $user->user_status ='inactive';
    }
    $user->save();
    $this->massage('success','Employee status changed successfully', 'تم تغيير حالة الموظف بنجاح');
    return redirect()->back();
  }
}
