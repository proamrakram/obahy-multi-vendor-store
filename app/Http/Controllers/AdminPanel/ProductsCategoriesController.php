<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Hash;
use App\Models\ProductCategory;
use DB;
use App\Http\Controllers\Controller;

class ProductsCategoriesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $categories = ProductCategory::where('is_delete',0)->get();
    return view('AdminPanel.products_categories.index')->with('categories', $categories);
  }

  
  public function create()
  {
    $categories = ProductCategory::where('status', 'active')->where('parent_id',null)->where('is_delete',0)->get();
    return view('AdminPanel.products_categories.create')->with('categories', $categories);
  }


  public function store(Request $request)
  {
    $this->validate($request,[
        'category_name_en' => 'required|string|max:255',
        'category_name_ar' => 'required|string|max:255',
        'type' => 'required|in:category,subcategory',
        'category_image' => 'required',
        'category_icon' => 'required',
        'parent_id' => 'required_if:type,subcategory|numeric|exists:product_categories,id',
    ]);

    if($request->type == 'category'){

      $parent_id = null;
    }else{
  $parent_id = $request->parent_id;
    }

    $category = ProductCategory::create([
      'category_name_en'=>$request->category_name_en,
      'category_name_ar'=>$request->category_name_ar,
      'category_icon'=>$request->category_icon,
      'category_image'=>$request->category_image,
      'status'=>'active',
      'parent_id'=>$parent_id,
    ]);
    

    $this->massage('success','Categories have been added successfully', 'تم اضافة التصنيفات  بنجاح');
    return redirect()->route('admin.products-categories.index');
  }

  public function edit($id)
  {
    $category = ProductCategory::find($id);
    if(is_null($category) || $category->is_delete == 1) {
      $this->massage('error', 'Category not found','التصنيف غير موجود');
      return redirect()->back();
    }
    $categories = ProductCategory::where('status', 'active')->where('parent_id',null)->where('is_delete',0)->get();
    
    return view('AdminPanel.products_categories.edit')->with('category', $category)->with('categories', $categories);
  }

  public function update(Request $request, $id)
  {
    
    $category = ProductCategory::find($id);
    if (is_null($category)  || $category->is_delete == 1) {
      $this->massage('error','Category not found', 'التصنيف غير موجود');
      return redirect()->back();
    }
      
    $this->validate($request,[
      'category_name_en' => 'required|string|max:255',
      'category_name_ar' => 'required|string|max:255',
        'category_image' => 'nullable',
        'category_icon' => 'nullable',
      'type' => 'required|in:category,subcategory',
      'parent_id' => 'nullable|numeric|exists:product_categories,id',
  ]);

  if($request->type == 'category'){

    $parent_id = null;
  }else{
    
  $this->validate($request,[
    'parent_id' => 'required',
]);
$parent_id = $request->parent_id;
  }
    //dd($request->permissions);


    $category->update([
      'category_name_en'=>$request->category_name_en,
      'category_name_ar'=>$request->category_name_ar,
      'category_icon'=>$request->category_icon,
      'category_image'=>$request->category_image,
      'parent_id'=>$parent_id,
    ]);

    $this->massage('success','Category data has been modified successfully', 'تم تعديل بيانات التصنيف  بنجاح');
    return redirect()->route('admin.products-categories.index');
  }

  public function destroy($id)
  {

      
    $category = ProductCategory::find($id);
    if (is_null($category)  || $category->is_delete == 1) {
      $this->massage('error','Category not found', 'التصنيف غير موجود');
      return redirect()->back();
    }

    $category->is_delete = 1;
    $category->save();
    $this->massage('success','The category has been removed successfully', 'تم حذف التصنيف بنجاح');
    return redirect()->back();
  }

  
  public function change_status($id)
  {
    $category = ProductCategory::find($id);
    if (is_null($category)  || $category->is_delete == 1) {
      $this->massage('error','Category not found', 'التصنيف غير موجود');
      return redirect()->back();
    }
    if($category->status == 'active'){
      $category->status ='inactive';
    }else{
      $category->status ='active';
    }
    $category->save();
    $this->massage('success','Category status changed successfully', 'تم تغيير حالة التصنيف بنجاح');
    return redirect()->back();
  }
}
