@extends('Website.partials.layout')
@section('content')
    <div class="heading-page pt-4 pb-4 mt-2 heading-page-dark" style="background-image: url('img/bg_size_details.png')">
        <div class="container">
            <div class="row align-items-center justify-contetn-center">
                <div class="col-md-6 position-static">
                    <h1 class='h2'> Size details </h1>
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                    <img src="{{ asset('img/icons/icon-brown-like.svg') }}" class='icon-like' alt="">
                    <img src="{{ asset('img/icons/icon-love-favorite.svg') }}" class='icon-love-favorite' alt="">
                </div>
                <div class="col-md-6 text-right">
                </div>
            </div>
        </div>
    </div>

    <div class="breadcrumb-filter mt-md-5 mt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 ">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb  mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Enter Size</a></li>
                            <li class="breadcrumb-item " aria-current="page">Dresses</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="size-details product-tabs pt-3">
        <div class="container">
            <div class="d-flex justify-content-between mobile-accordion">
                <ul class="nav nav-pills mb-3 tabs-ul" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#RelatedProducts"
                            role="tab" aria-controls="pills-home" aria-selected="true">Enter Your Size</a>
                    </li>
                </ul>
                <div class="btns">
                    <a href="#" class='btn btn-primary btn-sm'> <i class="fa fa-exclamation"></i> Hire a look expert
                    </a>
                    <a href="#" class='btn btn-outline-primary btn-sm'> Choose the new</a>
                </div>
            </div>
            <div class="mobile-accordion-content">
                <h3 class="h5 mb-3">Required size details</h3>
                <div class="row pb-3">
                    <div class="col-md-6 mb-2">
                        <div class="row align-items-center pr-0 pr-md-4">
                            <div class="col-6">
                                <span class='text-muted pr-md-3 pr-0'> Choose the type of design </span>
                            </div>
                            <div class="col-6">
                                <div class="select">
                                    <select class="select2" name="type">
                                        <option value="AL">Dress</option>
                                        <option value="AL">Dress</option>
                                        <option value="AL">Dress</option>
                                        <option value="AL">Dress</option>
                                        <option value="AL">Dress</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row align-items-center pl-0 pl-md-3">
                            <div class="col-6">
                                <span class='text-muted pr-2'> The unit of measure used </span>
                            </div>
                            <div class="col-6">
                                <div class="select">
                                    <select class="select2" name="type">
                                        <option value="AL">cm</option>
                                        <option value="AL">cm</option>
                                        <option value="AL">cm</option>
                                        <option value="AL">cm</option>
                                        <option value="AL">cm</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>

            <div class="row pt-md-3 pt-0 ">
                <div class="col-lg-6">
                    <div class="desc-tab">
                        <p class="">اتبع الطريقة الصحيحة لأخذ المقاسات</p>
                        <p class="">
                            لقياس (دوران الجسم) نقوم بلف شريط المتر حول الجزء المطلوب مع مراعاة الاتساع المناسب.
                        </p>
                        <p>
                            لقياس ( الطول والعرض) نقوم بوضع شريط المتر بشكل مستقيم مع اتباع نقاط البداية والنهاية.
                        </p>
                    </div>
                    <div id="accordion" class='py-4'>

                        <div class="card">
                            <div class="card-header" id="singleHeadingAccordion1">
                                <h5 class="mb-0">
                                    <button data-btn='abaya-rotation' class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseSingleAccordion1" aria-expanded="false"
                                        aria-controls="collapseSingleAccordion2">
                                        قياسات دوران الجسيم
                                        <i class='fa fa-angle-down'></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseSingleAccordion1" class="collapse show"
                                aria-labelledby="singleHeadingAccordion1" data-parent="#accordion">
                                <div class="card-body form-sizeing sizeing">
                                    <div class="box-table border mb-4">

                                        <div class="d-flex">
                                            <div class="w-50 border-bottom border-right p-3 tab-text">
                                                دوران الرقبة
                                            </div>
                                            <div class="border-bottom p-3 w-50">
                                                <input type="text" placeholder='Please Enter The Size' autofocus
                                                    data-size-name="size-2-neck-rotation" data-style='right:-3%;top:16%'
                                                    data-img-url="{{ asset('assets/images/sizing/img-sizeing-3/size-1-neck-rotation.png') }}">
                                            </div>
                                            <div class="check-done"></div>
                                        </div>

                                        <div class="d-flex">
                                            <div class="w-50 border-bottom border-right p-3 tab-text">
                                                دوران الصدر
                                            </div>
                                            <div class="border-bottom p-3 w-50">
                                                <input type="text" placeholder='Please Enter The Size' autofocus
                                                    data-size-name="chest-rotation" data-style='right: -17%;top:30%'
                                                    data-img-url="{{ asset('assets/images/sizing/img-sizeing-3/size-1-chest-rotation.png') }}">
                                            </div>
                                            <div class="check-done"></div>
                                        </div>

                                        <div class="d-flex">
                                            <div class="w-50 border-right p-3 tab-text">
                                                دوران الورك
                                            </div>
                                            <div class="p-3 w-50">
                                                <input type="text" placeholder='Please Enter The Size' autofocus
                                                    data-size-name="hip-rotation" data-style='right:-25%;top:49%'
                                                    data-img-url="{{ asset('assets/images/sizing/img-sizeing-3/size-1-hip-rotation.png') }}">
                                            </div>
                                            <div class="check-done"></div>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Body -->
                                <div class="size-top-part img position-relative text-right"></div>
                            </div>
                        </div>
                        <!-- End Card 1-->

                        <div class="card">
                            <div class="card-header" id="singleHeadingAccordion2">
                                <h5 class="mb-0">
                                    <button data-btn='abaya-length' class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseSingleAccordion2" aria-expanded="false"
                                        aria-controls="collapseSingleAccordion2">
                                        قياسات الكم
                                        <i class='fa fa-angle-down'></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseSingleAccordion2" class="collapse "
                                aria-labelledby="singleHeadingAccordion2" data-parent="#accordion">
                                <div class="card-body form-sizeing sizeing">
                                    <div class="box-table border mb-4">

                                        <div class="d-flex">
                                            <div class="w-50 border-bottom border-right p-3 tab-text">
                                                دوران اعلى الكم
                                            </div>
                                            <div class="border-bottom p-3 w-50">
                                                <input type="text" placeholder='Please Enter The Size' autofocus
                                                    data-size-name="size-2-top-sleeve-rotation"
                                                    data-style='right:-17%;top:18%'
                                                    data-img-url="{{ asset('assets/images/sizing/img-sizeing-3/size-1-top-sleeve-rotation.png') }}">
                                            </div>
                                            <div class="check-done"></div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="w-50 border-bottom border-right p-3 tab-text">
                                                دوران منتصف الكم
                                            </div>
                                            <div class="border-bottom p-3 w-50">
                                                <input type="text" placeholder='Please Enter The Size' autofocus
                                                    data-size-name="size-2-mid-sleeve-rotation"
                                                    data-style='right:-31%;top:31%'
                                                    data-img-url="{{ asset('assets/images/sizing/img-sizeing-3/size-1-mid-sleeve-rotation.png') }}">
                                            </div>
                                            <div class="check-done"></div>
                                        </div>

                                        <div class="d-flex">
                                            <div class="w-50 border-right p-3 tab-text">
                                                دوران اسفل الكم
                                            </div>
                                            <div class="p-3 w-50">
                                                <input type="text" placeholder='Please Enter The Size' autofocus
                                                    data-size-name="bottom-sleeve-rotation"
                                                    data-style='right: -45%;top:46%'
                                                    data-img-url="{{ asset('assets/images/sizing/img-sizeing-3/size-1-bottom-sleeve-rotation.png') }}">
                                            </div>
                                            <div class="check-done"></div>
                                        </div>


                                    </div>
                                </div>
                                <!-- End Body -->
                                <div class="size-top-part img position-relative text-right"></div>
                            </div>
                        </div>
                        <!-- End Card 2-->

                        <div class="card">
                            <div class="card-header" id="singleHeadingAccordion3">
                                <h5 class="mb-0">
                                    <button data-btn='abaya-length' class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseSingleAccordion3" aria-expanded="false"
                                        aria-controls="collapseSingleAccordion3">
                                        قياسات الطول
                                        <i class='fa fa-angle-down'></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseSingleAccordion3" class="collapse "
                                aria-labelledby="singleHeadingAccordion3" data-parent="#accordion">
                                <div class="card-body form-sizeing sizeing">
                                    <div class="box-table border mb-4">

                                        <div class="d-flex">
                                            <div class="w-50 border-bottom border-right p-3 tab-text">
                                                عرض الاكتاف
                                            </div>
                                            <div class="border-bottom p-3 w-50">
                                                <input type="text" placeholder='Please Enter The Size' autofocus
                                                    data-size-name="size-2-shoulder-width" data-style='right:-18%;top:17%'
                                                    data-img-url="{{ asset('assets/images/sizing/img-sizeing-3/size-1-top-shoulder-width.png') }}">
                                            </div>
                                            <div class="check-done"></div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="w-50 border-bottom border-right p-3 tab-text">
                                                الطول الكلي
                                            </div>
                                            <div class="border-bottom p-3 w-50">
                                                <input type="text" placeholder='Please Enter The Size' autofocus
                                                    data-size-name="size-2-totallength" data-style='right:-6%;top:30%'
                                                    data-img-url="{{ asset('assets/images/sizing/img-sizeing-3/size-1-totallength.png') }}">
                                            </div>
                                            <div class="check-done"></div>
                                        </div>

                                        <div class="d-flex">
                                            <div class="w-50 border-right p-3 tab-text">
                                                طول الكم
                                            </div>
                                            <div class="p-3 w-50">
                                                <input type="text" placeholder='Please Enter The Size' autofocus
                                                    data-size-name="SleeveLength" data-style='right:-36%;top:32%'
                                                    data-img-url="{{ asset('assets/images/sizing/img-sizeing-3/size-1-SleeveLength.png') }}">
                                            </div>
                                            <div class="check-done"></div>
                                        </div>


                                    </div>
                                </div>
                                <!-- End Body -->
                                <div class="size-top-part img position-relative text-right"></div>
                            </div>
                        </div>
                        <!-- End Card 3-->

                        <div class="box-size">
                            <p>For matching sizes, choose your size</p>
                            <div class="inputs-size d-flex">
                                <div class="input-size">
                                    <input type="radio" name='size1' class='input-size' checked>
                                    <label for="">52</label>
                                </div>
                                <div class="input-size">
                                    <input type="radio" name='size1' class='input-size'>
                                    <label for="">54</label>
                                </div>
                                <div class="input-size">
                                    <input type="radio" name='size1' class='input-size'>
                                    <label for="">56</label>
                                </div>
                                <div class="input-size">
                                    <input type="radio" name='size1' class='input-size'>
                                    <label for="">58</label>
                                </div>
                                <div class="input-size">
                                    <input type="radio" name='size1' class='input-size'>
                                    <label for="">60</label>
                                </div>


                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-lg-5 right-images-sizes align-self-center">
                    <div class="size-top-part img pl-4 ml-4 ">
                        <img src="" class='img-fluid img-size img-first-size' alt="">
                        <div class="desc-manikin" data-shape-img='{{ asset('assets/images/sizing/bg_size_text.png') }}'>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row Accrodrion -->


            <div class="desc-size-details my-5">
                <div class="py-4 px-md-4 px-0 border-top border-bottom ">
                    <h4>Suggested designs</h4>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem quisquam iure magnam nobis, esse
                        doloremque id asperiores sapiente illo doloribus tempore incidunt odio obcaecati necessitatibus
                        ducimus rem, ea quos eligendi repudiandae? Soluta nam inventore nulla at quia. Consequatur,
                        voluptas. Nulla!
                    </p>


                    <div action="/file-upload" class="dropzone" id="myFileUploade">
                        <!-- <input type="file" name="file" /> -->
                    </div>

                </div>

                <div class="py-4 px-md-4 px-0 border-top border-bottom mb-3">
                    <h4>Customer Feedback</h4>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem quisquam iure magnam nobis, esse
                        doloremque id asperiores sapiente illo doloribus tempore incidunt odio obcaecati necessitatibus
                        ducimus rem, ea quos eligendi repudiandae? Soluta nam inventore nulla at quia. Consequatur,
                        voluptas. Nulla!
                    </p>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex fuga ea eos eius aliquid nihil cumque
                        excepturi soluta, deserunt temporibus quae laborum quibusdam voluptates velit, quod aspernatur ad
                        quasi perferendis?
                    </p>
                </div>
                <button class='btn btn-primary btn-sm'>Send Request</button>
            </div>

        </div>
    </div>

    <script>
        // The constructor of Dropzone accepts two arguments:
        //
        // 1. The selector for the HTML element that you want to add
        //    Dropzone to, the second
        // 2. An (optional) object with the configuration
        let myDropzone = new Dropzone("#myFileUploade");
    </script>
@endsection
