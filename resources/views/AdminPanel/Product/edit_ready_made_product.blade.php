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
                            <li class='active'><a href="{{ route('admin.products.add.ready_made') }}"> منتج جاهز </a></li>
                            <li><a href="{{ route('admin.products.add.custom_made') }}"> تصميم خاص </a></li>
                            <li><a href="{{ route('admin.products.add.service_made') }}"> منتج خدمة </a></li>
                        </ul>
                    </div> <!-- / end tab-->
                    <hr>

                    <!-- Start Form -->
                    <form action="{{route('admin.products.update.update_product',$product->id)}}" method="POST" id="add_product">
                        @csrf
                        <input type="hidden" name="product_type" value="ready_made">
                        <div class="row mt-3 mt-md-5">
                            <div class="col-md-10">

                                <div class="row">

                                <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="product_name" class="col-3 col-form-label"> اسم المتجر <span class='text-danger'> * </span> </label>
                                            <div class="col-9">
                                                <div class="row">
                                                    <div class="col-12">
                                                    <select name="update_store_id" id="" required   class="form-control form-select  mb-2 @error('update_store_id') is-invalid @enderror">
                                                    <option value="">@lang('adminPanel.store')   </option>
                                                    @foreach($stores as $store)
                                        <option value="{{$store->id}}" @if($product->store_id== $store->id )selected @endif>{{$store->getName()}} </option>
                                        @endforeach
                                    </select>@error('update_store_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- / End Product Name -->
                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="product_name" class="col-3 col-form-label"> اسم المنتج <span
                                                    class='text-danger'> * </span> </label>
                                            <div class="col-9">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input type="text" class="form-control" id="product_name_ar"
                                                            name="product_name_ar" value="{{ $product->product_name_ar }}" placeholder="اسم المنتج بالعربية">
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" class="form-control" id="product_name_en"
                                                            name="product_name_en" value="{{ $product->product_name_en }}" placeholder="اسم المنتج بالانجليزية">
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
                                                    name="product_serial_number" value="{{ $product->product_serial_number }}" placeholder="الرقم التسلسلي">
                                            </div>
                                        </div>
                                    </div> <!-- / End Serial Number -->

                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="product_category" class="col-3 col-form-label"> تصنيف المنتج <span
                                                    class='text-danger'> * </span> </label>
                                            <div class="col-9">
                                                <select name="product_sub_category" id="" class='form-control form-select'>
                                                    @if (isset($category))
                                                        @foreach ($category as $item)
                                                            <option @if ($product->product_category == $item->id)
                                                                selected

                                                            @endif value="{{ $item->id }}">
                                                                {{ $item->category_name_ar }} </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="product_category" class="col-3 col-form-label"> تصنيف المنتج الفرعي
                                                <span class='text-danger'> * </span> </label>
                                            <div class="col-9">
                                                <select name="product_category" id="product_category"
                                                    class='form-control form-select'>
                                                    @if (isset($category))
                                                        @foreach ($category as $item)
                                                            <option @if ($product->product_category == $item->id)
                                                                selected

                                                            @endif value="{{ $item->id }}">
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
                                                <input type="text" class="form-control" id="product_vat"
                                                    name="product_vat" value="{{ $product->product_vat }}" placeholder="الضريبة">
                                            </div>
                                        </div>
                                    </div> <!-- / End tax Product -->

                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="product_price" class="col-3 col-form-label"> سعر البيع <span
                                                    class='text-danger'> * </span> </label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="product_price"
                                                    name="product_price" value="{{ $product->product_price }}" placeholder="سعر البيع ">
                                            </div>
                                        </div>
                                    </div> <!-- / End product Price -->

                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="product_price_after_vat" class="col-3 col-form-label"> السعر بعد
                                                الضريبة </label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="product_price_after_vat"
                                                    name="product_price_after_vat" value="{{ $product->product_price_after_vat }}" placeholder="السعر بعد الضريبة ">
                                            </div>
                                        </div>
                                    </div> <!-- / End price After Tax -->

                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="in_stock" class="col-3 col-form-label"> في المتجر </label>
                                            <div class="col-9">
                                                <select name="in_stock" id="in_stock" class='form-control form-select'>
                                                    <option @if ($product->in_stock == 1)
                                                        selected

                                                    @endif value="1"> نعم </option>
                                                    <option @if ($product->in_stock == 0)
                                                        selected

                                                    @endif value="0"> لا </option>
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
                                    <div class="col-md-8">
                                        <div class="row mb-3">
                                            <label for="availableSizes" class="col-3 col-form-label"> المقاسات المتاحة  </label>
                                            <div class="col-9">
                                                <div class="input-group mb-3">

                                                    <div class="form-check form-check-inline form-check-fill">
                                                        <div class="mb-0">
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                @if (isset($product->product_size))

                                                                 @if (in_array('S', $product->product_size))
                                                                checked
                                                                @endif
                                                                @endif type="checkbox" name="size[]" value="S" id="sizeS">
                                                                <label class="form-check-label" for="sizeS">S</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline form-check-fill">
                                                        <div class="mb-0">
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                @if (isset($product->product_size))
                                                                @if (in_array('M', $product->product_size))
                                                                checked
                                                                @endif
                                                                @endif
                                                                type="checkbox"name="size[]" value="M" id="sizeM">
                                                                <label class="form-check-label" for="sizeM">M</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline form-check-fill">
                                                        <div class="mb-0">
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                @if (isset($product->product_size))
                                                                @if (in_array('L', $product->product_size))
                                                                checked
                                                                @endif
                                                                @endif
                                                                type="checkbox" name="size[]" value="L" id="sizeL">
                                                                <label class="form-check-label" for="sizeL">L</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline form-check-fill">
                                                        <div class="mb-0">
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                @if (isset($product->product_size))
                                                                @if (in_array('XL', $product->product_size))
                                                                checked
                                                                @endif
                                                                @endif
                                                                type="checkbox" name="size[]" value="XL" id="sizeXL">
                                                                <label class="form-check-label" for="sizeXL">XL</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline form-check-fill">
                                                        <div class="mb-0">
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                @if (isset($product->product_size))
                                                                @if (in_array('2XL', $product->product_size))
                                                                checked
                                                                @endif
                                                                @endif
                                                                type="checkbox" name="size[]" value="2XL" id="size2XL">
                                                                <label class="form-check-label" for="size2XL">2XL</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline form-check-fill">
                                                        <div class="mb-0">
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                @if (isset($product->product_size))
                                                                @if (in_array('3XL', $product->product_size))
                                                                checked
                                                                @endif
                                                                @endif
                                                                type="checkbox" name="size[]" value="3XL" id="size3XL">
                                                                <label class="form-check-label" for="size3XL">3XL</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                             </div>
                                        </div>
                                    </div> <!-- / End Available sizes -->


                                    <div class="col-md-12">
                                        <div class="row mb-3">
                                            <label for="availableColors" class="col-3 col-form-label"> الالوان المتاحة  </label>
                                            <div class="col-9">
                                                <div class="input-group mb-3"  id="color_contianer">
                                                  @if(isset($product_color))
                                                      @foreach($product_color as $item)
                                                    <div class="form-check form-check-inline form-check-fill">
                                                        <div class="mb-0">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" @if ($item['is_checked'] == "true")
                                                                checked

                                                                @endif
                                                                 name="product_colors[]" value="{{$item['id']}}" id="">
                                                                <label class="form-check-label" for="colorRed">{{$item['color_name_ar']}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        @endforeach
                                                            @endif


                                                </div>
                                                <div class="form-check form-check-inline form-check-fill ">
                                                    <a href="#" class='icon-dots' data-bs-toggle="modal" data-bs-target="#addNewColor">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- / End Available Colors -->



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
                                                            placeholder="وصف المنتج بالعربية ">{{ $product->product_description_ar }}</textarea>
                                                    </div>
                                                    <div class="col-6">
                                                        <textarea class="form-control" id="custom_made_description_en" name="product_description_en"
                                                            placeholder="وصف المنتج بالانجليزية ">{{ $product->product_description_en }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 align-self-end">
                                                <label for="" class='font-sm mb-2'> إضافة صورة </label>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="description_image"
                                                        name="description_image">
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- / End product Details -->

                                    <hr class='mt-3'>
                                    <div class="col-md-4">
                                        <button class='btn btn-dark px-4 mx-4 py-2' type="submit" id="add_product_sbtn">تعديل المنتج </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- End  Form -->


                    <!-- Modal Content Start -->
                    <div class="modal fade" id="addNewColor" tabindex="-1" aria-labelledby="LoginForm-title"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content rounded shadow border-0">
                                <div class="modal-header border-bottom bg-soft-dark">
                                    <h5 class="modal-title" id="LoginForm-title">إضافة لون جديد</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin.products.add.add_product_color') }}" method="POST"
                                    id="add_product_color">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="bg-white p-3 rounded box-shadow">

                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-3"><label for="colorName" class='font-sm'>اسم
                                                                اللون</label></div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <input type="text" id="colorName"
                                                                        name="color_name_ar" class='form-control'
                                                                        placeholder='اسم اللون بالعربية'>
                                                                </div>
                                                                <div class="col-6">
                                                                    <input type="text" id="colorName"
                                                                        name="color_name_en" class='form-control'
                                                                        placeholder='اسم اللون بالانجليزية'>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6"><label for="color_code"
                                                                class='font-sm'>درجة اللون</label></div>
                                                        <div class="col-md-6"> <input type="color" id="color_code"
                                                                name="color_code" class='form-control'> </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-dark px-5" id="add_color_sbtn">حفظ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Content End -->

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
                'url': '{{ route('admin.products.get.get_product_colors') }}',
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
    </script>
@endsection
