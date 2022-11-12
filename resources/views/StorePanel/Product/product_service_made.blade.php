@extends('partials.layout')
@section('title')
    Obaya - Dashboard
@endsection

@section('content')
    <!-- Start Page Content -->
    {{-- <main class="page-content bg-light"> --}}
    @include('partials.top-header')

    <div class="container-fluid">
        <div class="layout-specing">
            <div class="bg-white mt-3">
                <div class="d-flex justify-content-between p-4  bg-soft-dark   rounded-top border-bottom heading-with-shape">
                    <h6 class="fw-bold mb-0 h4"> المنتجات </h6>
                </div>

                <div class="p-4">
                    <div class="tab-obahy">
                        <ul class='nav border d-inline-block'>
                            <li><a href="{{ route('products.add.ready_made') }}"> منتج جاهز </a></li>
                            <li><a href="{{ route('products.add.custom_made') }}"> تصميم خاص </a></li>
                            <li class='active'><a href="{{ route('products.add.service_made') }}"> منتج خدمة </a></li>
                        </ul>
                    </div> <!-- / end tab-->
                    <hr>

                    <!-- Start Form -->
                    <form action="{{ route('products.add.add_product') }}" method="POST" id="add_product">
                        @csrf
                        <input type="hidden" name="product_type" value="service">
                        <div class="row mt-3 mt-md-5">
                            <div class="col-md-10">

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="product_name" class="col-3 col-form-label"> اسم المنتج <span
                                                    class='text-danger'> * </span> </label>
                                            <div class="col-9">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input type="text" class="form-control" id="product_name_ar"
                                                            name="product_name_ar" placeholder="اسم المنتج بالعربية">
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" class="form-control" id="product_name_en"
                                                            name="product_name_en" placeholder="اسم المنتج بالانجليزية">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- / End Product Name -->


                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="product_serial_number" class="col-3 col-form-label"> الرقم التسلسلي
                                                <span class='text-danger'> * </span> </label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="product_serial_number"
                                                    name="product_serial_number" placeholder="الرقم التسلسلي">
                                            </div>
                                        </div>
                                    </div> <!-- / End Serial Number -->

                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="product_category" class="col-3 col-form-label"> تصنيف المنتج <span
                                                    class='text-danger'> * </span> </label>
                                            <div class="col-9">
                                                <select name="product_category" id="" class='form-control form-select'>
                                                    @if (isset($category))
                                                        @foreach ($category as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->category_name_ar }} </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="product_sub_category" class="col-3 col-form-label"> تصنيف المنتج الفرعي
                                                <span class='text-danger'> * </span> </label>
                                            <div class="col-9">
                                                <select name="product_category" id="product_category"
                                                    class='form-control form-select'>
                                                    @if (isset($sub_category))
                                                        @foreach ($sub_category as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->category_name_ar }} </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- / End productCat -->



                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="product_vat" class="col-3 col-form-label"> الضريبة </label>
                                            <div class="col-9">
                                                <input type="number"  onchange="funcount(this);" class="form-control" id="product_vat"
                                                    name="product_vat" placeholder="الضريبة">
                                            </div>
                                        </div>
                                    </div> <!-- / End tax Product -->

                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="product_price" class="col-3 col-form-label"> سعر البيع <span
                                                    class='text-danger'> * </span> </label>
                                            <div class="col-9">
                                                <input type="number" onchange="funcount(this);" class="form-control" id="product_price"
                                                    name="product_price" placeholder="سعر البيع ">
                                            </div>
                                        </div>
                                    </div> <!-- / End product Price -->

                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="product_price_after_vat" class="col-3 col-form-label"> السعر بعد
                                                الضريبة </label>
                                            <div class="col-9">
                                                <input type="number" class="form-control" id="product_price_after_vat" disabled placeholder="السعر بعد الضريبة ">
                                                <input type="hidden" class="form-control" id="product_price_after_vat_hidden" name="product_price_after_vat" value="{{ old('product_price_after_vat')??0 }}" placeholder="السعر بعد الضريبة ">

                                            </div>
                                        </div>
                                    </div> <!-- / End price After Tax -->

                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="in_stock" class="col-3 col-form-label"> في المتجر </label>
                                            <div class="col-9">
                                                <select name="in_stock" id="in_stock" class='form-control form-select'>
                                                    <option value="1"> نعم </option>
                                                    <option value="0"> لا </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> <!-- / End In Store -->


                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="product_3d_image" class="col-3 col-form-label"> صورة ثلاثية
                                                الابعاد </label>
                                            <div class="col-9">
                                                <div class="input-group mb-3" dir='ltr'>
                                                    <input type="file" class="form-control" id="product_3d_image"
                                                        name="product_3d_image">
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- / End Uploade 3D -->

                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="product_images" class="col-3 col-form-label"> صور المنتج </label>
                                            <div class="col-9">
                                                <div class="input-group mb-3" dir='ltr'>
                                                    <input type="file" multiple class="form-control"
                                                        id="product_images" name="product_images[]">
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- / End Uplodes Images -->


                                    <div class="col-12 mt-4">
                                        <h3 class='h5'> تفاصيل المنتج </h3>
                                        <hr>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="row mb-3 align-items-center">
                                            <label for="productDetails" class="col-2 col-form-label"> وصف المنتج <span
                                                    class='text-danger'> * </span> </label>
                                            <div class="col-7">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <textarea class="form-control" id="custom_made_description" name="product_description_ar"
                                                            placeholder="وصف المنتج بالعربية "></textarea>
                                                    </div>
                                                    <div class="col-6">
                                                        <textarea class="form-control" id="custom_made_description_en" name="product_description_en"
                                                            placeholder="وصف المنتج بالانجليزية "></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div> <!-- / End product Details -->

                                    <hr class='mt-3'>
                                    <div class="col-md-4">
                                        <button class='btn btn-dark px-4 mx-4 py-2' type="submit" id="add_product_sbtn"> إضافة المنتج </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- End  Form -->


                </div>

            </div>
            <!--end bg-white-->

        </div>
    </div>
    <!--end container-->
@endsection
@section('script')
    <script>
        $("#add_product_color").submit(function(e) {
            e.preventDefault();
        });
        $("#add_product").submit(function(e) {
            e.preventDefault();
        });

        $("#add_color_sbtn").click(function(e) {
            e.preventDefault();
            var formData = new FormData($("#add_product_color")[0]);
            add_product_color(formData);

        });

        $("#add_product_sbtn").click(function(e) {

            e.preventDefault();
            var formData = new FormData($("#add_product")[0]);
            add_product(formData);

        });



        function add_product_color(formData) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $("#add_product_color").attr('action'),
                dataType: 'json',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(resp) {
                    display_error_messages('success', resp.message)
                    // DisplayToastrMessage_General("success",resp.message, 3000);
                    $('#addNewColor').modal('hide');
                    get_colors();


                    // }

                },
                error: function(resp) {

                    $.each(resp.responseJSON.errors, function(i, error) {
                        display_error_messages("error", error[0]);

                    });
                },
                'complete': function() {}
            });

        }

        function get_colors() {
            $.ajax({
                'url': '{{ route('products.get.get_product_colors') }}',
                'type': 'GET',
                'dataType': 'json',
                'success': function(response) {
                    if (response) {
                        var textToInsert = '';
                        $.each(response, function(count, item) {
                            textToInsert +=
                                ' <div class="form-check form-check-inline form-check-fill"> ' +
                                '<div class="mb-0"> ' +
                                '<div class="form-check"> ' +
                                '<input class="form-check-input" type="checkbox"   name="product_colors[]" value="' +
                                item['color_name_ar'] + '"  id="colorRed"> ' +
                                '<label class="form-check-label" for="colorRed">' + item[
                                    'color_name_ar'] + '</label> ' +
                                '</div> ' +
                                '</div> ' +
                                '</div>';
                        });
                        $('#color_contianer').replaceWith(textToInsert);
                    }

                },
                'complete': function() {}

            });
        }

        function add_product(formData) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $("#add_product").attr('action'),
                dataType: 'json',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(resp) {
                    display_error_messages('success', resp.message)
                    // DisplayToastrMessage_General("success",resp.message, 3000);
                    // $('#addNewColor').modal('hide');
                    // get_colors();


                    // }

                },
                error: function(resp) {

                    $.each(resp.responseJSON.errors, function(i, error) {
                        display_error_messages("error", error[0]);

                    });

                },
                'complete': function() {}
            });

        }

        function display_error_messages(type, msg) {

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            if (type == 'error') {
                toastr.error(msg);
            } else {
                toastr.success(msg);
            }

        }
        function funcount(sel){
            // var hidden_vat = document.getElementById('product_price_after_vat_hidden');
            // var  vis_vat = document.getElementById('product_price_after_vat');
            console.log(sel);
            var product = document.getElementById('product_price').value;
            var vat = document.getElementById('product_vat').value;

            // console.log(link);
            // $('#link_type').attr('disabled',true);
            // console.log(sel);
            if(sel.value > 0){
                // $("#CopyURL").attr('disabled', true);


                    $('#product_price_after_vat_hidden')
                        // .find('input')
                        // .remove()
                        // .end()
                        // .append('<option value=""> اختر المدينه </option>')
                        .val(parseFloat(product) + parseFloat(vat));
                    $('#product_price_after_vat')
                        // .find('option')
                        // .remove()
                        // .end()
                        // .append('<option value=""> اختر المدينه </option>')
                        .val(parseFloat(product) + parseFloat(vat));

                    // $("#city").attr('disabled', false);

                    // console.log(resp);
                    // $.each(JSON.parse(resp), function(key, value) {
                    //     console.log(value);
                    //     $("#product_make_link").append('<option value="' + value['product_name_ar'] + '">' + value[
                    //         'product_name_ar'] + '</option>');

            };


        }
    </script>
@endsection
