<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Hash;
use App\Models\StorePackage;
use App\Models\PackageItem;
use App\Models\StorePackageItem;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Store;

class PackagesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $packages = StorePackage::where('is_delete',0)->get();
    return view('AdminPanel.packages.index')->with('packages', $packages);
  }

  
  public function create()
  {
    $currencies = Currency::where('is_delete',0)->get();
    $items_main = PackageItem::where('package_item_type', 'main')->where('package_item_status', 'active')->where('is_delete',0)->get();
    $items_marketing = PackageItem::where('package_item_type', 'marketing_tools')->where('package_item_status', 'active')->where('is_delete',0)->get();
    return view('AdminPanel.packages.create')->with('currencies', $currencies)
                                             ->with('items_main', $items_main)
                                             ->with('items_marketing', $items_marketing);
  }


  public function store(Request $request)
  {
    $this->validate($request,[
        'package_name_en' => 'required|string|max:255',
        'package_name_ar' => 'required|string|max:255',
        'package_description_en' => 'required|string',
        'package_description_ar' => 'required|string',
        'package_price' => 'required|numeric',
        'package_currency' => 'required|numeric|exists:currencies,id',
        'packages' => 'required|array',
        'packages.*' => 'required|numeric|exists:package_items,id',
    ]);

    $new_package = StorePackage::create([
      'package_name_en'=>$request->package_name_en,
      'package_name_ar'=>$request->package_name_ar,
      'package_description_en'=>$request->package_description_en,
      'package_description_ar'=>$request->package_description_ar,
      'package_price'=>$request->package_price,
      'package_currency'=>$request->package_currency,
      'package_status'=>'active',
    ]);
    foreach($request->packages as $package){
      $count =0;
      
      if(PackageItem::find($package)->count >0){
        $count = $request->{'count'.$package};
      }

    $package = StorePackageItem::create([
      'package_id'=>$new_package->id,
      'package_item_id'=>$package,
      'package_item_status'=>'active',
      'count'=>$count,
    ]);
    }
    

    $this->massage('success','Package added successfully', 'تم اضافة الباقة  بنجاح');
    return redirect()->route('admin.packages.index');
  }

  public function edit($id)
  {
    $package = StorePackage::find($id);
    if(is_null($package) || $package->is_delete == 1) {
      $this->massage('error','Package not found', 'الباقة غير موجودة');
      return redirect()->back();
    }
    $currencies = Currency::where('is_delete',0)->get(); $items_main = PackageItem::where('package_item_type', 'main')->where('package_item_status', 'active')->where('is_delete',0)->get();
    $items_marketing = PackageItem::where('package_item_type', 'marketing_tools')->where('package_item_status', 'active')->where('is_delete',0)->get();
    
    
    return view('AdminPanel.packages.edit')->with('currencies', $currencies)
                                           ->with('package', $package)
                                           ->with('items_main', $items_main)
                                           ->with('items_marketing', $items_marketing);
  }

  public function update(Request $request, $id)
  {
    
    $update_package = StorePackage::find($id);
    if (is_null($update_package)  || $update_package->is_delete == 1) {
      $this->massage('error','Package not found', 'الباقة غير موجودة');
      return redirect()->back();
    }
      
    $this->validate($request,[
      'package_name_en' => 'required|string|max:255',
      'package_name_ar' => 'required|string|max:255',
      'package_description_en' => 'required|string',
      'package_description_ar' => 'required|string',
      'package_price' => 'required|numeric|between:0,9999999.999',
      'package_currency' => 'required|numeric|exists:currencies,id',
  ]);


    $update_package->update([
      'package_name_en'=>$request->package_name_en,
      'package_name_ar'=>$request->package_name_ar,
      'package_description_en'=>$request->package_description_en,
      'package_description_ar'=>$request->package_description_ar,
      'package_price'=>$request->package_price,
      'package_currency'=>$request->package_currency,
    ]);

    foreach($update_package->items as $item){
      $item->delete();
    }

    foreach($request->packages as $package){
       $count =0;
      
      if(PackageItem::find($package)->count >0){
        $count = $request->{'count'.$package};
      }
      $package = StorePackageItem::create([
        'package_id'=>$update_package->id,
        'package_item_id'=>$package,
        'package_item_status'=>'active',
        'count'=>$count,
      ]);
      }

    $this->massage('success', 'Package information has been modified successfully','تم تعديل بيانات الباقة  بنجاح');
    return redirect()->route('admin.packages.index');
  }

  public function destroy($id)
  {
    $package = StorePackage::find($id);
    if (is_null($package)  || $package->is_delete == 1) {
      $this->massage('error','Package not found', 'الباقة غير موجودة');
      return redirect()->back();
    }

    $package->is_delete = 1;
    $package->save();
    $this->massage('success','Package has been deleted successfully', 'تم حذف الباقة بنجاح');
    return redirect()->back();
  }

  
  public function change_status($id)
  {
    $package = StorePackage::find($id);
    if (is_null($package)  || $package->is_delete == 1) {
      $this->massage('error','Package not found', 'الباقة غير موجودة');
      return redirect()->back();
    }
    if($package->package_status == 'active'){
      $package->package_status ='inactive';
    }else{
      $package->package_status ='active';
    }
    $package->save();
    $this->massage('success','Package status has been changed successfully', 'تم تغيير حالة الباقة بنجاح');
    return redirect()->back();
  }
}
