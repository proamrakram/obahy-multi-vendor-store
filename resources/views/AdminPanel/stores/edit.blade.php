@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
<div class="container-fluid">
        <div class="layout-specing">
        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4">@lang('adminPanel.edit-subscription')  </h6>
            </div>

            <div class="p-4">
            <form action="{{ route('admin.stores.update',['id'=>$store->id]) }}" enctype="multipart/form-data" method="POST">
                                @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <label for="Name" class="col-2 col-form-label"> 
                                @lang('adminPanel.name')  <span class="text-danger"> * </span> 
                                </label>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" value="{{$store->store_name_ar }}" name="store_name_ar" class="form-control @error('store_name_ar') is-invalid @enderror" id="NameAr" placeholder=" @lang('adminPanel.name-ar')">
                                       
                                                    @error('store_name_ar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                        </div>
                                        <div class="col-6">
                                             <input type="text" value="{{ $store->store_name_en}}" name="store_name_en" class="form-control col-6   @error('store_name_en') is-invalid @enderror" id="NameEn" placeholder=" @lang('adminPanel.name-en')">
                                             @error('store_name_en')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <label for="Phone" class="col-2 col-form-label"> 
                                @lang('adminPanel.mobile-no') <span class="text-danger"> * </span> 
                                </label>
                                <div class="col-10">
                                    <input type="text"  value="{{ $store->phone_number}}" name="phone_number" class="form-control   @error('phone_number') is-invalid @enderror " id="Phone" placeholder=" @lang('adminPanel.mobile-no')">
                                    @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <label for="admin" class="col-2 col-form-label"> 
                                @lang('adminPanel.store-manager') <span class="text-danger"> * </span> 
                                </label>
                                <div class="col-10">
                                   <select name="store_admin"  id="" class="form-select form-control  @error('store_admin') is-invalid @enderror">
                                   @foreach($admins as $admin)
                                                        <option value="{{$admin->id}}" @if($store->store_admin==$admin->id )selected @endif>{{$admin->name}} </option>
                                                        @endforeach
                                   </select>
                                   @error('store_admin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                </div>
                            </div>
                        </div>  
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <label for="Country" class="col-2 col-form-label"> 
                                @lang('adminPanel.country') <span class="text-danger"> * </span> 
                                </label>
                                <div class="col-10">
                                   <select name="store_country"  id="country-dropdown"  class="form-select form-control  @error('store_country') is-invalid @enderror">
                                   <option value="">@lang('adminPanel.choose-country') </option>
                                   @foreach($countries as $country)
                                                        <option value="{{$country->id}}" @if($store->store_country==$country->id )selected @endif>{{$country->getName()}} </option>
                                                        @endforeach
                                   </select>
                                   @error('store_country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                </div>
                            </div>
                        </div>  
                        
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <label for="City" class="col-2 col-form-label"> 
                                @lang('adminPanel.city') <span class="text-danger"> * </span> 
                                </label>
                                <div class="col-10">
                                   <select name="store_city"   id="state-dropdown" class="form-select form-control  @error('store_city') is-invalid @enderror">
                                       <option value="">@lang('adminPanel.choose-city') </option>
                                 @foreach($cities as $city)
                                                        <option value="{{$city->id}}" @if($store->store_city==$city->id )selected @endif>{{$city->getName()}} </option>
                                                        @endforeach
                                   </select>
                                   @error('store_city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                </div>
                            </div>
                        </div>   
                        
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <label for="Phone" class="col-2 col-form-label"> 
                                @lang('adminPanel.subscription-start-date')    <span class="text-danger"> * </span> 
                                </label>
                                <div class="col-10">
                                    <input type="date"  value="{{ $store->subscription_start_date}}" name="subscription_start_date" class="form-control   @error('subscription_start_date') is-invalid @enderror" id="Phone" placeholder=" @lang('adminPanel.subscription-start-date')">
                                    @error('subscription_start_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                            </div>
                        </div>   
                        
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <label for="Date" class="col-2 col-form-label"> 
                                @lang('adminPanel.domain-name')<span class="text-danger"> * </span> 
                                </label>
                                <div class="col-10">
                                    <input type="text"  value="{{ $store->store_domain }}" name="store_domain" class="form-control   @error('store_domain') is-invalid @enderror" id="Date" placeholder="@lang('adminPanel.domain-name')">
                                    @error('store_domain')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                            </div>
                        </div>   
                      
                        <div class="col-md-6 mb-3">
                                <div class="row">
                                    <label for="City" class="col-2 col-form-label">
                                        نوع الاشتراك
                                        <span class="text-danger"> * </span>

                                    </label>
                                    <div class="col-10">
                                        <select name="store_type_id" id="store_type"
                                            class="form-select form-control   @error('store_type') is-invalid @enderror">

                                            @foreach ($stores_types as $store_type)
                                                <option value="{{ $store_type->id }}"
                                                    @if ($store_type->id == $store->store_type_id) selected @endif>
                                                    {{ $store_type->store_type_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('store_type_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="row">
                                    <label for="City" class="col-2 col-form-label">
                                        عملة المتجر
                                        <span class="text-danger"> * </span>

                                    </label>
                                    <div class="col-10">
                                        <select name="currency_id" id="currency_id"
                                            class="form-select form-control   @error('currency_id') is-invalid @enderror">
                                            @foreach ($currencies as $currency)
                                                <option value="{{ $currency->id }}">{{ $currency->getName() }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('currency_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="row">
                                    <label for="store_description_ar" class="col-2 col-form-label">
                                        وصف المتجر بالعربية
                                        <span class="text-danger"> * </span>

                                    </label>
                                    <div class="col-10">
                                        <textarea type="text" name="store_description_ar"
                                            class="form-control   @error('store_description_ar') is-invalid @enderror" id=""
                                            placeholder="الوصف بالعربية">{{ $store->store_details_ar }}</textarea>
                                        @error('store_description_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="row">

                                    <label for="store_description_en" class="col-2 col-form-label">
                                        وصف المتجر بالانجليزية
                                        <span class="text-danger"> * </span>

                                    </label>
                                    <div class="col-10">
                                        <textarea type="text" name="store_description_en"
                                            class="form-control   @error('store_description_en') is-invalid @enderror" id=""
                                            placeholder="الوصف   بالانجليزية"> {{ $store->store_details_en }}</textarea>
                                        @error('store_description_en')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="row">
                                    <label for="address_ar" class="col-2 col-form-label">
                                        العنوان بالعربية <span class="text-danger"> * </span>
                                    </label>
                                    <div class="col-10">
                                        <input type="text" value="{{ $store->store_address_ar }}" name="address_ar"
                                            class="form-control   @error('address_ar') is-invalid @enderror "
                                            id="Phone" placeholder="العنوان بالعربية">
                                        @error('address_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="row">
                                    <label for="address_en" class="col-2 col-form-label">
                                        العنوان بالانجليزية <span class="text-danger"> * </span>
                                    </label>
                                    <div class="col-10">
                                        <input type="text" value="{{ $store->store_address_en }}" name="address_en"
                                            class="form-control   @error('address_en') is-invalid @enderror "
                                            id="Phone" placeholder="العنوان بالانجليزية">
                                        @error('address_en')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-6 mb-3">
                                <div class="row">
                                    <label for="Date" class="col-2 col-form-label">
                                        رقم التسجيل الموثق <span class="text-danger"> * </span>
                                    </label>
                                    <div class="col-10">
                                        <input type="text" value="{{ $store->registration_number_in_trusted }}"
                                            name="registration_number_in_trusted"
                                            class="form-control   @error('registration_number_in_trusted') is-invalid @enderror"
                                            id="registration_number_in_trusted" placeholder="اكتب رقم التسجيل الموثق">
                                        @error('registration_number_in_trusted')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="row">
                                    <label for="Date" class="col-2 col-form-label">
                                        رابط السجل التجاري<span class="text-danger"> * </span>
                                    </label>
                                    <div class="col-10">
                                        <input type="text" value="{{ $store->commercial_record }}"
                                            name="commercial_record"
                                            class="form-control   @error('commercial_record') is-invalid @enderror"
                                            id="commercial_record" placeholder="أدخل رابط السجل التجاري">
                                        @error('commercial_record')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="row">
                                    <label for="Date" class="col-2 col-form-label">
                                        رقم الهوية <span class="text-danger"> * </span>
                                    </label>
                                    <div class="col-10">
                                        <input type="text" value="{{ $store->id_number }}" name="id_number"
                                            class="form-control   @error('id_number') is-invalid @enderror"
                                            id="id_number" placeholder="ادخل رقم الهوية">
                                        @error('id_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                    
                    </div>

                    <div class="choose-package my-4 ">
                        <div class="row algin-items-center">
                            <div class="col-md-3">
                                <h5>@lang('adminPanel.choose-package')</h5>
                                <p class='text-muted'>@lang('adminPanel.choose-the-package-that-suits-you') </p>
                            </div>
                            @foreach($packages as $package)
                            <div class="col-md-3">
                                <div class="box-backage">
                                    <input type="radio" value="{{$package->id}}" @if($store->subscription_package_id == $package->id) checked @endif name='subscription_package_id'>
                                    <label for="">
                                        <h6>{{$package->getName()}}</h6>
                                        <p>
                                        {{$package->getDescription()}}
                                        </p>    
                                    </label>
                                </div>
                            </div>
                            @endforeach                           
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label for="City" class="col-2 col-form-label"> 
                                @lang('adminPanel.payment-methods')   <span class="text-danger"> * </span> 
                                </label>
                                <div class="col-10">
                                <select name="payment_type_id" id="" class="form-select form-control   @error('payment_type_id') is-invalid @enderror">
                                    <option value="">@lang('adminPanel.choose-payment-methods')</option>
                                    @foreach($payment_types as $type) 
                                     <option value="{{$type->id}}" @if($store->payment_type_id==$type->id )selected @endif>{{$type->getName()}} </option>
                                                       
                                    @endforeach
                                </select>
                                @error('payment_type_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                </div>
                            </div>                            
                        </div>

                        <div class="col-md-6">
                            <div class="row align-items-center">
                                <label for="Name" class="col-2 col-form-label"> 
                                @lang('adminPanel.status') <span class="text-danger"> * </span> 
                                </label>
                                <div class="col-md-10">
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input name="store_status" class="form-check-input   @error('store_status') is-invalid @enderror" type="checkbox" id="flexSwitchCheckChecked" @if($store->store_status =="active") checked="" @endif>
                                        @error('store_status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                </div>
                            </div>                            
                        </div>
                    </div>


                    <hr class="mt-5 mb-4">
                    <button class="btn btn-dark px-4 mx-4 py-2">  @lang('adminPanel.edit-data') </button>  

                </form>                
            </div>


 
            
            </div> <!--end bg-white-->
        </div>   
    </div><!--end container-->



@endsection

@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
$('#country-dropdown').on('change', function() {
var country_id = this.value;
$("#state-dropdown").html('');
$.ajax({
url:"{{url('/admin/get-cities-by-country')}}",
type: "POST",
data: {
country_id: country_id,
_token: '{{csrf_token()}}' 
},
dataType : 'json',
success: function(result){
$('#state-dropdown').html('<option value="">@lang("adminPanel.choose-city")</option>'); 
$.each(result.states,function(key,value){
    $("#state-dropdown").append('<option value="'+value.id+'"> @if (\App::getLocale()=="ar")'+value.city_name_ar+'@endif @if (\App::getLocale()=="en")'+value.city_name_en+'@endif</option>');
}); 
}
});
});   
});
</script>
@endsection