@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')


<div class="container-fluid">
        <div class="layout-specing">
 

            <div class="bg-white mt-3">
                <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                    <h6 class="fw-bold mb-0 h4"> اعدادات السلات المتروكة  </h6>
                </div>
 
              
                
                <div class="p-4">
                <form  action="{{ route('admin.abandoned-carts.general.settings.update') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                    <div class="mb-2">
                    <div class="form-check form-switch p-0 pt-1">
                    <label for="abandonedCart"> تفعيل السلات المتروكة </label>
                        <input name="activate_abandoned_carts" class="form-check-input" name="" type="checkbox" @if($setting['activate_abandoned_carts'] == 1)checked=""  @endif id="abandonedCart" value="1" >
                    </div>
                    </div>
                    <div class="mb-2">
                        ما هو الوقت الذي يتم فيه اعتبار السلات متروكة
                        <input name="abandoned_carts_time"  value="{{$setting['abandoned_carts_time'] ?? ''}}" type="text" style='width:70px'>
                        <select name="abandoned_carts_time_type" id="">
                            <option value="minute"  @if($setting['abandoned_carts_time_type'] == 'minute')  selected @endif> دقيقة</option>
                            <option value="hour"   @if($setting['abandoned_carts_time_type'] == 'hour')  selected @endif> ساعة </option>
                            <option value="day"   @if($setting['abandoned_carts_time_type'] == 'day')  selected @endif> يوم</option>
                        </select>                        
                    </div>
                    <div class="mb-2">
                        ارسال رسالة لمستخدمين السلات المتروكة بعد
                        <input   name="abandoned_carts_mail_time"  value="{{$setting['abandoned_carts_mail_time'] ?? ''}}"  type="text" style='width:70px'>
                        <select name="abandoned_carts_mail_time_type" id="">
                            <option value="minute"   @if($setting['abandoned_carts_mail_time_type'] == 'minute')  selected @endif> دقيقة</option>
                            <option value="hour"   @if($setting['abandoned_carts_mail_time_type'] == 'hour')  selected @endif> ساعة </option>
                            <option value="day"   @if($setting['abandoned_carts_mail_time_type'] == 'day')  selected @endif> يوم</option>
                        </select>                        
                    </div>
                        <p class='mt-3 mb-1'> ما هو نوع الرسائل الذي سيتم ارساله بشكل افتراضي؟ </p>
                        <select name="abandoned_carts_default" id="">
                            <option value="reminder"   @if($setting['abandoned_carts_default'] == 'reminder')  selected @endif> رسالة تذكير </option>
                            <option value="auto"  @if($setting['abandoned_carts_default'] == 'auto')  selected @endif> رسالة تلقائي مع كوبون </option>
                        </select>
                        
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-dark px-4   py-2"> حفظ </button>
                        </div>  
                </form>
                        <hr>    
                        <form  action="{{ route('admin.abandoned-carts.remindermail.settings.update') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                    <h5 class='mb-4'> بيانات البريد الخاصة برسالة التذكير  </h5>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <label for="productPrice" class="col-3 col-form-label"> عنوان الرسالة بالعربية <span class="text-danger"> * </span> </label>
                                <div class="col-9">
                                    <input type="text"    name="remindermail_title_ar"  class="form-control" id="productPrice" placeholder="هل نسيت إكمال عملية التسوق !"  value="{{$setting['remindermail_title_ar'] ?? ''}}">
                                </div>
                            </div>                                              
                        </div>
                        <div class="col-md-12">
                             <div class="row mb-3">
                                <label for="WholesalePrice" class="col-3 col-form-label"> عنوان الرسالة بالانجليزية <span class="text-danger"> * </span> </label>
                                <div class="col-9">
                                    <input type="text"   name="remindermail_title_en"  class="form-control" id="WholesalePrice" placeholder="  " value="{{$setting['remindermail_title_en'] ?? ''}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row mb-3 align-items-center">
                                <label for="productDetails" class="col-3 col-form-label">  محتوى الرسالة  <span class="text-danger"> * </span>  </label>
                                <div class="col-9">
                                    <textarea    name="remindermail_details_ar"  class="form-control mb-2" id="productDetails" placeholder="محتوى الرسالة بالعربية ">
                                    {{$setting['remindermail_details_ar'] ?? ''}}
                                    </textarea>
                                    <textarea   name="remindermail_details_en" class="form-control mb-2" id="productDetails" placeholder="محتوى الرسالة بالانجليزية ">   {{$setting['remindermail_details_en'] ?? ''}}</textarea>
                                </div>
                            </div>                                
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-dark px-4   py-2"> حفظ </button>
                        </div>                        
                    </div>
                    
                </form>

                    <hr>    
                    <form action="{{ route('admin.abandoned-carts.automail.settings.update') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                    <h5 class='mb-0'> بيانات البريد الخاصة برسالة تلقائية  </h5>
                    <p  class='mb-4 fs-12px'> يتم ارسال هذه الرسالة بشكل تلقائي بعد المدة التي يتم تحديدها </p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <label for="productPrice" class="col-3 col-form-label"> عنوان الرسالة بالعربية <span class="text-danger"> * </span> </label>
                                <div class="col-9">
                                    <input  name="automail_title_ar" type="text" class="form-control" id="productPrice" value="{{$setting['automail_title_ar'] ?? ''}}" placeholder="  ">
                                </div>
                            </div>                                              
                        </div>
                        <div class="col-md-12">
                             <div class="row mb-3">
                                <label for="WholesalePrice" class="col-3 col-form-label"> عنوان الرسالة بالانجليزية <span class="text-danger"> * </span> </label>
                                <div class="col-9">
                                    <input  name="automail_title_en" type="text" class="form-control" id="WholesalePrice"  value="{{$setting['automail_title_en'] ?? ''}}" placeholder="  ">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row  align-items-center">
                                <label for="productDetails" class="col-3 col-form-label">  محتوى الرسالة  <span class="text-danger"> * </span>  </label>
                                <div class="col-9">
                                    <textarea  name="automail_details_ar" class="form-control mb-2" id="productDetails" placeholder="محتوى الرسالة بالعربية ">  {{$setting['automail_details_ar'] ?? ''}}</textarea>
                                    <textarea  name="automail_details_en" class="form-control mb-2" id="productDetails" placeholder="محتوى الرسالة بالانجليزية "> {{$setting['automail_details_en'] ?? ''}}</textarea>
                                </div>
                            </div>                                
                        </div>
                         <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-dark px-4   py-2"> حفظ </button>
                        </div>                        
                    </div>                
                
                </div>
                </form>
            </div> <!--end bg-white-->

        </div>         
    </div><!--end container-->
    @endsection
