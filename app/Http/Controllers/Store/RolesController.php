<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use DB;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $roles = Role::where('type','store')->where('name','!=','store_admin')->get();
    return view('Store.roles.index')->with('roles', $roles);
  }

  
  public function create()
  {
    $permissions = Permission::where('type','store')->get();
    return view('Store.roles.create')->with('permissions', $permissions);
  }

  public function store(Request $request)
  {
    $this->validate(
      $request,
      [
        'role_name' => 'required|string|max:255|unique:roles,name',
        'permissions' => 'required|array',
        'permissions.*' => 'nullable|numeric',
      ]
    );

    //dd($request->permissions);


    $role = Role::create(['name'=>$request->role_name,
                          'type'=>'store']);
    $role->syncPermissions($request->permissions);


    session()->flash('success', 'تم اضافة الصلاحية  بنجاح');
    return redirect()->route('store.roles.index');
  }

  public function edit($id)
  {
    $role = Role::find($id);
    if(is_null($role) || $role->name == 'store_admin' ||  $role->type != 'store') {
      session()->flash('error', 'الصلاحية غير موجودة');
      return redirect()->back();
    }
    $permissions = Permission::where('type','store')->get();
    return view('Store.roles.edit')->with('role', $role)
                                        ->with('permissions', $permissions);
  }

  public function update(Request $request, $id)
  {
    
    $role = Role::find($id);
    if (is_null($role)|| $role->name == 'store_admin' ||  $role->type != 'store') {
      session()->flash('error', 'الصلاحية غير موجودة');
      return redirect()->back();
    }
      
    $this->validate(
      $request,
      [
        'role_name' => 'required|string|max:255|unique:roles,name,'.$role->id,
        'permissions' => 'required|array',
        'permissions.*' => 'nullable|numeric',
      ]
    );

    //dd($request->permissions);


    $role->update(['name'=>$request->role_name]);
    $role->syncPermissions($request->permissions);


    session()->flash('success', 'تم تعديل بيانات الصلاحية  بنجاح');
    return redirect()->route('store.roles.index');
  }

  public function destroy($id)
  {

      
    $role = Role::find($id);
    if (is_null($role) || $role->name == 'store_admin' || $role->type != 'store') {
      session()->flash('error', 'الصلاحية غير موجودة');
      return redirect()->back();
    }

    $item = Role::withCount('users')->findOrFail($id);
    if ($item->users_count) {
      session()->flash('error', 'الصلاحية ممنوحة للموظف');
      return redirect()->back();
    }
      
    $role->revokePermissionTo($role->permissions);
    $role->delete();
    session()->flash('success', 'تم حذف الصلاحية بنجاح');
    return redirect()->back();
  }
}
