@extends('partials.layout')
@section('title') Add Affiliate @endsection

@section('content')
    <!-- Start Page Content -->

    <div class="container-fluid">
        <div class="layout-specing">
            <div class="bg-white mt-3">
                <div class="d-flex justify-content-between p-3  bg-soft-dark   rounded-top border-bottom heading-with-shape">
                    <h6 class="fw-bold mb-0 h5 ps-4"> إعداد رابط تسويق جديد </h6>
                </div>

                <div class="p-4">

                    <!-- Start Form -->
                    <form action="{{ route('affiliates.update.update_affiliate',$affiliate->id) }}" method="POST">
                        @csrf
                        <h5> بيانات المسوق </h5>
                        <div class="bg-soft-dark p-3 rounded my-3">
                            <div class="row">

                                <div class="col-md-5">
                                    <div class="row mb-3">
                                        <label for="Marketer'sName" class="col-3 col-form-label"> اسم المسوق <span
                                                class="text-danger"> * </span> </label>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col"><input name="name" type="text"
                                                        class="form-control"  value="{{ $user->name }}" id="Marketer'sName"
                                                        placeholder="اسم المسوق"></div>
                                                
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- / End Marketer'sName -->

                                <div class="col-md-5">
                                    <div class="row mb-3">
                                        <label for="phone_number" class="col-3 col-form-label"> رقم الهاتف <span
                                                class="text-danger"> * </span> </label>
                                        <div class="col-9">
                                            <input type="text" name="phone_number"
                                                class="form-control  @error('phone_number') is-invalid @enderror"
                                                id="phone_number" value="{{ $user->phone_number }}" placeholder="0123456789 ">
                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- / End phone Number -->

                                <div class="col-md-5">
                                    <div class="row mb-3">
                                        <label for="country" class="col-3 col-form-label"> الدولة <span
                                                class='text-danger'> * </span> </label>
                                        <div class="col-9">
                                            <select onchange="getval(this);" name="country_id" id="country"
                                                class='form-control form-select @error('country_id') is-invalid @enderror'>
                                                @if ($user->country)

                                                <option  selected value="{{ $user->country_id }}"> {{ $user->country->country_name_ar}}</option>
                                                @else
                                                <option value=""> اختر الدوله </option>

                                                @endif

                                                @foreach ($countries as $con)
                                                    <option value="{{ $con->id }}">{{ $con->country_name_ar }}</option>
                                                @endforeach

                                            </select>
                                            @error('country_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- / End country -->

                                <div class="col-md-5">
                                    <div class="row mb-3">
                                        <label for="city" class="col-3 col-form-label"> المدينة <span
                                                class='text-danger'> * </span> </label>
                                        <div class="col-9">
                                            <select name="city_id" id="city"
                                                class='form-control form-select  @error('city_id') is-invalid @enderror'
                                                >
                                                @if ($user->city)

                                                <option  selected value="{{ $user->city_id }}"> {{ $user->city->city_name_ar}}</option>

                                                @endif
                                            </select>
                                            @error('city_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- / End country -->

                                <div class="col-md-5">
                                    <div class="row mb-3">
                                        <label for="Email" class="col-3 col-form-label"> البريد الالكتروني <span
                                                class='text-danger'> * </span> </label>
                                        <div class="col-9">
                                            <input type="text" name="email" value="{{ $user->email  }}"
                                                class="form-control  @error('email') is-invalid @enderror" id="Email"
                                                placeholder="mail@mail.com ">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- / End Email -->

                            </div>
                        </div>

                        <h5> إعدادات الرابط </h5>
                        <div class="bg-soft-dark p-3 rounded my-3">
                            <div class="row">

                                <div class="col-md-5">
                                    <div class="row mb-3">
                                        <label for="typeURL" class="col-3 col-form-label"> نوع الرابط <span
                                                class='text-danger'> * </span> </label>
                                        <div class="col-9">
                                            <select name="link_type" id="link_type" onchange="funlink(this);"
                                                class='form-control form-select @error('link_type') is-invalid @enderror'>
                                                <option> ادخل نوع الرابط </option>
                                                <option @if ($affiliate->link_type  == "product")
                                                    selected
                                                @endif value="product"> منتج </option>
                                                <option @if ($affiliate->link_type  == "store")
                                                    selected
                                                @endif  value="store"> متجر </option>

                                            </select>
                                            @error('link_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- / End typeURL -->

                                <div class="col-md-5">
                                    <div class="row mb-3">
                                        <label for="ActiveDate" class="col-3 col-form-label"> تاريخ التفعيل <span
                                                class="text-danger"> * </span> </label>
                                        <div class="col-9">

                                            <input type="date" name="issue_date"   value="{{ $affiliate->issue_date->format('Y-m-d') }}"
                                                class="form-control @error('issue_date') is-invalid @enderror"
                                                id="ActiveDate" placeholder="issue_date ">
                                            @error('link_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- / End ActiveDate -->
                                <div class="col-md-5" id="product">

                                </div> <!-- / End ActiveDate -->

                                <div class="col-md-10">
                                    <div class="row mb-3">
                                        <label for="CopyURL" class="col-2 col-form-label"> نسخ الرابط </label>
                                        <div class="col-9">
                                            <input type="text"  value="{{$affiliate->link}}" name="link" id="CopyURL" disabled placeholder="URL"
                                                class="form-control @error('link') is-invalid @enderror" >
                                            <input type="hidden"  value="{{$affiliate->link}}" name="link" id="CopyURL1"  placeholder="URL"
                                                class="form-control @error('link') is-invalid @enderror" >
                                            @error('link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-1 align-self-center">
                                            <a class="" onclick="copyToClipboard();"> <img
                                                    src="{{ asset('assets/images/icon/icon-copy.svg') }}" width="20">
                                            </a>
                                        </div>
                                    </div>
                                </div> <!-- / End CopyURL -->

                            </div>
                        </div>

                        <h5> إعدادات العمولة </h5>
                        <div class="bg-soft-dark p-3 rounded my-3">
                            <div class="row">

                                <div class="col-md-5">
                                    <div class="row mb-3">
                                        <label for="Commissiontype" class="col-3 col-form-label"> نوع العمولة <span
                                                class='text-danger'> * </span> </label>
                                        <div class="col-9">
                                            <select name="affiliate_type" id="Commissiontype"
                                                class='form-control form-select @error('affiliate_type') is-invalid @enderror'>
                                                <option @if ($affiliate->affiliate_type == 'fixed')
                                            selected
                                                @endif value="fixed"> مبلغ ثابت </option>
                                                <option @if ($affiliate->affiliate_type == 'ratro')
                                                selected
                                                    @endif value="ratio"> نسبة </option>
                                            </select>
                                            @error('affiliate_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- / End Commission type -->

                                <div class="col-md-5">
                                    <div class="row mb-3">
                                        <label for="CommissionAmount" class="col-3 col-form-label"> قيمة العمولة <span
                                                class="text-danger"> * </span> </label>
                                        <div class="col-9">
                                            <div class="form-text">
                                                <input type="text" name="affiliate_value" value="{{ $affiliate->affiliate_value }}" class="form-control  @error('affiliate_value') is-invalid @enderror"
                                                    id="CommissionAmount" placeholder="400">
                                                    @error('affiliate_value')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <span class='text'>

                                                    <select class='form-control form-select  @error('affiliate_currency') is-invalid @enderror' id="currency"
                                                        name="affiliate_currency">
                                                        @foreach ($currency as $cur)
                                                            <option @if ($affiliate->affiliate_currency == $cur->id)
                                                                selected
                                                            @endif value="{{ $cur->id }}">{{ $cur->currency_code }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('affiliate_currency')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </span>

                                                {{-- <span class='text'> * </span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- / End CommissionAmount -->

                                <div class="col-md-5">
                                    <div class="row mb-3">
                                        <label for="CommissionApplication" class="col-3 col-form-label"> تطبيق العمولة
                                            <span class='text-danger'> * </span> </label>
                                        <div class="col-9">
                                            <select name="apply_affiliate" id="CommissionApplication"
                                                class='form-control form-select  @error('apply_affiliate') is-invalid @enderror'>
                                                <option value="1" @if ($affiliate->apply_affiliate)
                                                    selected
                                                @endif> علي اول منتج يباع </option>
                                                <option value="2" @if ($affiliate->apply_affiliate)
                                                    selected
                                                @endif> علي اول منتج يباع </option>
                                            </select>
                                            @error('apply_affiliate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div> <!-- / End Commission type -->

                            </div>
                        </div>

                        <hr class='mt-3'>
                        <div class="col-md-4">
                            <button class='btn btn-dark px-4 mx-4 py-2'> إضافة المنتج </button>
                        </div>

                    </form>
                    <!-- End Form -->


                </div>

            </div>
            <!--end bg-white-->

        </div>
    </div>
    <!--end container-->

    <!--End page-content" -->

@endsection
@section('script')

    <script>
        var city = document.getElementById('city');

        function func(id) {
            $.ajax({
                url: '/store/admins/edit',
                dataType: 'html',
                method: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#editUser').modal('show');
                    $('#modal-body').html(data);

                }
            });
        }

        function func_change_status(id) {
            $.ajax({
                url: '/store/admins/change-status',
                dataType: 'html',
                method: 'GET',
                data: {
                    id: id
                },
                success: function(data) {

                }
            });
        }

        function getval(sel) {
            // var city = document.getElementById('city')
            $.ajax({
                url: '/affiliate/cities',
                dataType: 'html',
                method: 'GET',
                data: {
                    id: sel.value
                },
                success: function(resp) {
                    // $("#code").append('<option value=' + value.code + '>' +value.language_name+' : '+value.code + '</option>');
                    $('#city')
                        .find('option')
                        .remove()
                        .end()
                        .append('<option value=""> اختر المدينه </option>')
                        .val('');
                    $("#city").attr('disabled', false);

                    console.log(resp);
                    $.each(JSON.parse(resp), function(key, value) {
                        console.log(value);
                        $("#city").append('<option value="' + value['id'] + '">' + value[
                            'city_name_ar'] + '</option>');
                    });

                }
            });
        }
        function funlink(sel){
            var link = document.getElementById('product');
            console.log(link);
            // $('#link_type').attr('disabled',true);
            // console.log(sel);
            if(sel.value == 'product'){
                // $("#CopyURL").attr('disabled', true);
                $.ajax({
                url: '/product/get_products',
                dataType: 'html',
                method: 'GET',

                success: function(resp) {
                    console.log(resp);
                    $("#product")
                    .append(
                        '<div class="row mb-3" id="product_div"><label for="ActiveDate" class="col-3 col-form-label">  المنتجات المتاحه <span class="text-danger"> * </span> </label><div class="col-9" id="products"> <select name="link" id="product_make_link" onchange="funproduct(this);"class="form-control form-select is-invalid"><option > اختر المنتج المراد اضافته</option></select></div> </div>'
                        );
                    // $("#code").append('<option value=' + value.code + '>' +value.language_name+' : '+value.code + '</option>');
                    // $('#city')
                    //     .find('option')
                    //     .remove()
                    //     .end()
                    //     .append('<option value=""> اختر المدينه </option>')
                    //     .val('');
                    // $("#city").attr('disabled', false);

                    // console.log(resp);
                    $.each(JSON.parse(resp), function(key, value) {
                        console.log(value);
                        $("#product_make_link").append('<option value="' + value['product_name_ar'] + '">' + value[
                            'product_name_ar'] + '</option>');
                    });

                }
            });

            }else if(sel.value == 'store'){
                $('#product_div')
                        .remove()
                        .end()
                $("#CopyURL").val("{{ url('/affiliate/affiliates/add_affiliate') }}");
                $("#CopyURL1").val("{{ url('/affiliate/affiliates/add_affiliate') }}");
                // $("#CopyURL").attr('disabled', true);

            }else{
                $('#product_div')
                        .remove()
                        .end()
                $("#CopyURL").val("");
                $("#CopyURL1").val("");
                // $("#CopyURL").attr('disabled', true);

            }
        }
        function funproduct(sel){
            console.log(sel.value);
            var  li = sel.value ;
            $("#CopyURL").val("{{ url('/affiliate/affiliates/add_affiliate/') }}"+"/"+li);
            $("#CopyURL1").val("{{ url('/affiliate/affiliates/add_affiliate/') }}"+"/"+li);
        }
    </script>
