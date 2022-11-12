<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Hash;
use App\Models\PaymentType;
use DB;
use App\Http\Controllers\Controller;

class PaymentTypesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $paymentTypes = PaymentType::where('is_delete',0)->get();
    return view('AdminPanel.paymentTypes.index')->with('paymentTypes', $paymentTypes);
  }

  

    
  public function change_status($id)
  {
    $paymentType = PaymentType::find($id);
    if (is_null($paymentType)  || $paymentType->is_delete == 1) {
      $this->massage('error','Payment Type not found', 'طريقة الدفع غير موجود');
      return redirect()->back();
    }
    if($paymentType->status == 'active'){
      $paymentType->status ='inactive';
    }else{
      $paymentType->status ='active';
    }
    $paymentType->save();
    $this->massage('success','Payment method status changed successfully', 'تم تغيير حالة طريقة الدفع بنجاح');
    return redirect()->back();
  }
}
