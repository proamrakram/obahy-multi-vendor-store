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
                            <li class='active'><a href="{{ route('products.add.custom_made') }}"> تصميم خاص </a></li>
                            <li><a href="{{ route('products.add.service_made') }}"> منتج خدمة </a></li>
                        </ul>
                    </div> <!-- / end tab-->
                    <hr>

                    <!-- Start Form -->
                    <form action="{{ route('products.add.add_product') }}" method="POST" id="add_product">
                        @csrf
                        <input type="hidden" name="product_type" value="custom_made">
                        <div class="row mt-3 mt-md-5">
                            <div class="col-md-11">
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
                                                <select name="product_category"id=""
                                                    class='form-control form-select'>
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
                                            <label for="product_category" class="col-3 col-form-label"> تصنيف المنتج الفرعي
                                                <span class='text-danger'> * </span> </label>
                                            <div class="col-9">
                                                <select name="product_sub_category" id="product_category"
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
                                                <input type="text" class="form-control" id="product_vat"
                                                    name="product_vat" placeholder="الضريبة">
                                            </div>
                                        </div>
                                    </div> <!-- / End tax Product -->

                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="product_price" class="col-3 col-form-label"> سعر البيع <span
                                                    class='text-danger'> * </span> </label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="product_price"
                                                    name="product_price" placeholder="سعر البيع ">
                                            </div>
                                        </div>
                                    </div> <!-- / End product Price -->

                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="product_price_after_vat" class="col-3 col-form-label"> السعر بعد
                                                الضريبة </label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="product_price_after_vat"
                                                    name="product_price_after_vat" placeholder="السعر بعد الضريبة ">
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


                                    <div class="col-md-12">
                                        <div class="row mb-3">
                                            <label for="availableColors" class="col-3 col-form-label"> الالوان المتاحة
                                            </label>
                                            <div class="col-9">
                                                <div class="input-group mb-3" id="color_contianer">
                                                    @if (isset($product_color))
                                                        @foreach ($product_color as $item)
                                                            <div class="form-check form-check-inline form-check-fill">
                                                                <div class="mb-0">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="product_colors[]"
                                                                            value="{{ $item->id }}" id="">
                                                                        <label class="form-check-label"
                                                                            for="colorRed">{{ $item->color_name_ar }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif


                                                </div>
                                                <div class="form-check form-check-inline form-check-fill ">
                                                    <a href="#" class='icon-dots' data-bs-toggle="modal"
                                                        data-bs-target="#addNewColor">
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
                                                        <textarea class="form-control" id="custom_made_description" name="custom_made_description"
                                                            placeholder="وصف المنتج بالعربية "></textarea>
                                                    </div>
                                                    <div class="col-6">
                                                        <textarea class="form-control" id="custom_made_description_en" name="custom_made_description_en"
                                                            placeholder="وصف المنتج بالانجليزية "></textarea>
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

                                    <div class="col-md-12">
                                        <div class="row mb-3 align-items-center">
                                            <label for="Fabricoptions" class="col-2 col-form-label"> خيارات الأقمشة <span
                                                    class='text-danger'> * </span> </label>
                                            <div class="col-7">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <textarea class="form-control" id="fabric_options" name="fabric_options" placeholder="خيارات الأقمشة بالعربية "></textarea>
                                                    </div>
                                                    <div class="col-6">
                                                        <textarea class="form-control" id="fabric_options_en" name="fabric_options_en"
                                                            placeholder="خيارات الأقمشة بالانجليزية "></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 align-self-end">
                                                <label for="" class='font-sm mb-2'> إضافة صورة </label>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="fabric_image"
                                                        name="fabric_image">
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- / End Fabric options -->

                                    <div class="col-md-12">
                                        <div class="row mb-3 align-items-center">
                                            <label for="Embroideryoptions" class="col-2 col-form-label"> خيارات التطريز
                                                <span class='text-danger'> * </span> </label>
                                            <div class="col-7">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <textarea class="form-control" id="embroidery_options" name="embroidery_options"
                                                            placeholder="خيارات التطريز بالعربية "></textarea>
                                                    </div>
                                                    <div class="col-6">
                                                        <textarea class="form-control" id="embroidery_options_en" name="embroidery_options_en"
                                                            placeholder="خيارات التطريز بالانجليزية "></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 align-self-end">
                                                <label for="" class='font-sm mb-2'> إضافة صورة </label>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="embroidery_image"
                                                        name="embroidery_image">
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- / End Embroidery options -->

                                    <div class="col-md-12">
                                        <div class="row mb-3 align-items-center">
                                            <label for="Optionsaccessories" class="col-2 col-form-label"> خيارات
                                                الاكسسوارات <span class='text-danger'> * </span> </label>
                                            <div class="col-7">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <textarea class="form-control" id="accessories_options" name="accessories_options"
                                                            placeholder="خيارات الاكسسوارات  بالعربية"></textarea>
                                                    </div>
                                                    <div class="col-6">
                                                        <textarea class="form-control" id="accessories_options_en" name="accessories_options_en"
                                                            placeholder="خيارات الاكسسوارات  بالانجليزية"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 align-self-end">
                                                <label for="" class='font-sm mb-2'> إضافة صورة </label>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="accessories_image"
                                                        name="accessories_image">
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- / End Options accessories -->


                                    <div class="col-md-9">
                                        <div class="row mb-3">
                                            <label for="Executiontime" class="col-3 col-form-label"> مدة التنفيذ <span
                                                    class="text-danger"> * </span> </label>
                                            <div class="col-8">
                                                <input type="text" class="form-control" id="implementation_period"
                                                    name="implementation_period" placeholder="مدة التنفيذ ">
                                            </div>
                                        </div>
                                    </div> <!-- // End Execution time -->

                                    <div class="col-12 mt-4">
                                        <h3 class='h5'> تفاصيل المنتج </h3>
                                        <hr>
                                    </div>
                                    <!-- Nav Tabs Start -->

                                    <div class="col-12 mt-4" id="nav-tabs">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <ul class="nav nav-pills nav-justified flex-column flex-sm-row rounded"
                                                    id="pills-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link rounded active" id="AdditionalMeasurements-tab"
                                                            data-bs-toggle="pill" href="#AdditionalMeasurements"
                                                            role="tab" aria-controls="AdditionalMeasurements"
                                                            aria-selected="false">
                                                            <div class="text-center py-2">
                                                                <h6 class="mb-0">نوع المقاسات</h6>
                                                            </div>
                                                        </a>
                                                        <!--end nav link-->
                                                    </li>
                                                    <!--end nav item-->

                                                    <li class="nav-item">
                                                        <a class="nav-link rounded" id="sizeType-tab"
                                                            data-bs-toggle="pill" href="#sizeType" role="tab"
                                                            aria-controls="sizeType" aria-selected="false">
                                                            <div class="text-center py-2">
                                                                <h6 class="mb-0">قياسات إضافية</h6>
                                                            </div>
                                                        </a>
                                                        <!--end nav link-->
                                                    </li>
                                                    <!--end nav item-->

                                                    <li class="nav-item">
                                                        <a class="nav-link rounded" id="addNotes-tab"
                                                            data-bs-toggle="pill" href="#addNotes" role="tab"
                                                            aria-controls="addNotes" aria-selected="false">
                                                            <div class="text-center py-2">
                                                                <h6 class="mb-0">إضافة ملاحظة</h6>
                                                            </div>
                                                        </a>
                                                        <!--end nav link-->
                                                    </li>
                                                    <!--end nav item-->
                                                </ul>
                                                <!--end nav pills-->
                                            </div>
                                        </div>


                                        <div class="tab-content" id="pills-tabContent">

                                            <div class="tab-pane fade show active" id="AdditionalMeasurements"
                                                role="tabpanel" aria-labelledby="AdditionalMeasurements">
                                                <div class="bg-soft-dark p-3 rounded">
                                                    <div class="row">
                                                        <label for="Requiredsizename" class="col-4 col-form-label"> اسم
                                                            المقاس المطلوب <span class="text-danger"> * </span> </label>
                                                        <div class="col-8">
                                                            <select name="custom_made_size_id" id="custom_made_size_id"
                                                                class='form-group form-select'>
                                                                <option value="1"> فساتين </option>
                                                                <option value="2"> عبايات </option>
                                                                <option value="3"> اطفال </option>
                                                                <option value="4"> رجالي </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> <!-- // Required size name -->
                                            </div>
                                            <!--end teb pane-->

                                            <div class="tab-pane fade  " id="sizeType" role="tabpanel"
                                                aria-labelledby="sizeType">
                                                <div class="bg-soft-dark p-3 rounded">
                                                    <div class="row mb-3">
                                                        <label for="Sizename" class="col-3 col-form-label"> اسم المقاس
                                                            <span class="text-danger"> * </span> </label>
                                                        <div class="col-9">
                                                            <div class="row">
                                                                <div class="col"><input type="text"
                                                                        class="form-control" id="custom_made_other_size"
                                                                        name="custom_made_other_size"
                                                                        placeholder="قياس ذيل الفستان بالعربية "></div>
                                                                <div class="col"><input type="text"
                                                                        class="form-control"
                                                                        id="custom_made_other_size_en"
                                                                        name="custom_made_other_size_en"
                                                                        placeholder="قياس ذيل الفستان بالانجليزية "></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="HowUseSize" class="col-3 col-form-label"> طريقة
                                                            استخدام المقاس <span class="text-danger"> * </span> </label>
                                                        <div class="col-9">
                                                            <div class="row">
                                                                <div class="col"><input type="text"
                                                                        class="form-control" id="other_size_instructions"
                                                                        name="other_size_instructions"
                                                                        placeholder="طريقة الاستخدام بالعربية "></div>
                                                                <div class="col"><input type="text"
                                                                        class="form-control"
                                                                        id="other_size_instructions_en"
                                                                        name="other_size_instructions_en"
                                                                        placeholder="طريقة الاستخدام بالانجليزية "></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputGroupFile05" class="col-3 col-form-label"> رفع
                                                            صورة توضيحية <span class='text-danger'> * </span> </label>
                                                        <div class="col-9">
                                                            <div class="input-group mb-3" dir="ltr">
                                                                <input type="file" class="form-control"
                                                                    id="custom_made_other_size_image"
                                                                    name="custom_made_other_size_image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- // Size name -->
                                            </div>
                                            <!--end teb pane-->

                                            <div class="tab-pane fade" id="addNotes" role="tabpanel"
                                                aria-labelledby="addNotes-tab">
                                                <div class="bg-soft-dark p-3 rounded">
                                                    <div class="row align-items-center">
                                                        <label for="addNotesText" class="col-3 col-form-label"> إضافة
                                                            ملاحظة <span class="text-danger"> * </span> </label>
                                                        <div class="col-9">
                                                            <textarea class="form-control mb-2" id="other_size_notes" name="other_size_notes"
                                                                placeholder="إضافة ملاحظة بالعربية "></textarea>
                                                            <textarea class="form-control mb-2" id="other_size_notes_en" name="other_size_notes_en"
                                                                placeholder="إضافة ملاحظة بالانجليزية "></textarea>
                                                        </div>
                                                    </div>
                                                </div> <!-- // Add Notes -->
                                            </div>
                                            <!--end teb pane-->

                                        </div>
                                        <!--end tab content-->

                                    </div>
                                    <!--end col-->
                                    <!-- Nav Tabs End -->


                                    <hr class='mt-3'>
                                    <div class="col-md-4">
                                        <button class='btn btn-dark px-4 mx-4 py-2' type="submit" id="add_product_sbtn">
                                            إضافة المنتج </button>
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
                                <form action="{{ route('products.add.add_product_color') }}" method="POST"
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
    {{-- </main> --}}
    <!--End page-content" -->
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

                        // DisplayToastrMessage_General("success",resp.message, 3000);
                        display_error_messages("success", resp.message);

                        $('#addNewColor').modal('hide');
                        get_colors();


                  

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
                                item['id'] + '"  id="colorRed"> ' +
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
                    console.log(resp);
                    // if (resp.status == false) {
                    //     $.each(resp.message, function (i, error) {
                    //         // DisplayToastrMessage_General("error", error[0] , 3000);
                    //         // display_error_messages

                    //     });

                    // } else {

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
