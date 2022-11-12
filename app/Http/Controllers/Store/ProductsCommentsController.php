<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Http\Controllers\Controller;
use App\Models\ProductComment;
use App\Models\Product;
use App\Models\User;

class ProductsCommentsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $comments = ProductComment::where('is_delete',0)->whereHas('product',function($query){
      $query->where('store_id',auth()->user()->store_id);
    })
    ->get();
    return view('Store.products_comments.index')->with('comments', $comments);
  }

  
  public function create()
  {
    $users = User::where('user_status','active')->where('user_type', 'customer')->where('is_delete',0)->get();
    $products = Product::where('product_status', 'active')->where('store_id',auth()->user()->store_id)->where('is_delete',0)->get();
    return view('Store.products_comments.create')->with('users',$users)->with('products',$products);
  }


  public function store(Request $request)
  {
    $this->validate($request,[
      'product_id' => 'required|exists:products,id',
      'user_id' => 'nullable|exists:users,id',
      'stars' => 'required|numeric',
        'comment' => 'required|string',
    ]);


    $comment = ProductComment::create([
      'product_id'=>$request->product_id,
      'user_id'=>$request->user_id,
      'stars'=>$request->stars,
      'comment'=>$request->comment,
      'status'=>'active',
    ]);
    

    $this->massage('success','Comments have been added successfully', 'تم اضافة التعليق  بنجاح');
    return redirect()->route('store.products-comments.index');
  }

  public function edit($id)
  {
    $comment = ProductComment::find($id);
    if(is_null($comment) || $comment->is_delete == 1|| $comment->product->store_id != auth()->user()->store_id) {
      $this->massage('error', 'Comment not found','التعليق غير موجود');
      return redirect()->back();
    }
    
    $users = User::where('user_status','active')->where('user_type', 'customer')->where('is_delete',0)->get();
    $products = Product::where('product_status', 'active')->where('store_id',auth()->user()->store_id)->where('is_delete',0)->get();
    return view('Store.products_comments.edit')->with('comment', $comment)->with('users',$users)->with('products',$products);
  }

  public function update(Request $request, $id)
  {
    
    $comment = ProductComment::find($id);
    if (is_null($comment)  || $comment->is_delete == 1 || $comment->product->store_id != auth()->user()->store_id) {
      $this->massage('error','Comment not found', 'التعليق غير موجود');
      return redirect()->back();
    }
      
    $this->validate($request,[
      'product_id' => 'required|exists:products,id',
      'user_id' => 'nullable|exists:users,id',
      'stars' => 'required|numeric',
        'comment' => 'required|string',
  ]);


    $comment->update([
      'product_id'=>$request->product_id,
      'user_id'=>$request->user_id,
      'stars'=>$request->stars,
      'comment'=>$request->comment,
    ]);

    $this->massage('success','Comment data has been modified successfully', 'تم تعديل بيانات التعليق  بنجاح');
    return redirect()->route('store.products-comments.index');
  }

  public function destroy($id)
  {

      
    $comment = ProductComment::find($id);
    if (is_null($comment)  || $comment->is_delete == 1 || $comment->product->store_id != auth()->user()->store_id) {
      $this->massage('error','Commenty not found', 'التعليق غير موجود');
      return redirect()->back();
    }

    $comment->is_delete = 1;
    $comment->save();
    $this->massage('success','The Comment has been removed successfully', 'تم حذف التعليق بنجاح');
    return redirect()->back();
  }

  
  public function change_status($id)
  {
    $comment = ProductComment::find($id);
    if (is_null($comment)  || $comment->is_delete == 1 || $comment->product->store_id != auth()->user()->store_id) {
      $this->massage('error','Comment not found', 'التعليق غير موجود');
      return redirect()->back();
    }
    if($comment->status == 'active'){
      $comment->status ='inactive';
    }else{
      $comment->status ='active';
    }
    $comment->save();
    $this->massage('success','Comment status changed successfully', 'تم تغيير حالة التعليق بنجاح');
    return redirect()->back();
  }
}
