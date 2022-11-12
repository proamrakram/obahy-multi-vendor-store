@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')

<div class="container-fluid">
    <div class="layout-specing">

    <div class="filter-search mb-3">
            <div class="heading d-flex justify-content-between align-items-center pe-3">
                <h4 class="h5"> تصفية </h4>
                <i class="uil uil-filter"></i>
            </div>
            <div class="content p-4 border">
                <div class="row">


                    <div class="col-md-4 col-6">
                        <div class="row align-items-center mb-3">
                            <div class="col-3"><label for="">تاريخ الإحصائيات </label></div>
                            <div class="col-8">
                               <input type="date" class='form-control'>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="row align-items-center mb-3">
                            <div class="col-3"><label for="">مواقع التواصل</label></div>
                            <div class="col-8">
                                <select class="form-select form-control" aria-label="Default select example">
                                    <option selected="">مواقع التواصل</option>
                                    <option value="1">مواقع التواصل</option>
                                    <option value="2">مواقع التواصل</option>
                                    <option value="3">مواقع التواصل</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="row align-items-center mb-3">
                            <div class="col-3"><label for="">الدولة</label></div>
                            <div class="col-8">
                                <select class="form-select form-control" aria-label="Default select example">
                                    <option selected="">الدولة</option>
                                    <option value="1">الدولة</option>
                                    <option value="2">الدولة</option>
                                    <option value="3">الدولة</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="row align-items-center mb-3">
                            <div class="col-3"><label for="">المدينة</label></div>
                            <div class="col-8">
                                <select class="form-select form-control" aria-label="Default select example">
                                    <option selected="">المدينة</option>
                                    <option value="1">المدينة</option>
                                    <option value="2">المدينة</option>
                                    <option value="3">المدينة</option>
                                </select>
                            </div>
                        </div>
                    </div>

                     <div class="col-md-4 col-6">
                        <div class="row align-items-center mb-3">
                            <div class="col-3"><label for="">كوبونات الخصم </label></div>
                            <div class="col-8">
                                <select class="form-select form-control" aria-label="Default select example">
                                    <option selected="">كوبونات الخصم  </option>
                                    <option value="1">كوبونات الخصم  </option>
                                    <option value="2">كوبونات الخصم  </option>
                                    <option value="3">كوبونات الخصم  </option>
                                </select>
                            </div>
                        </div>
                     </div>

                     <div class="col-md-4 col-6">
                        <div class="row align-items-center mb-3">
                            <div class="col-3"><label for="">حملة إعلانية </label></div>
                            <div class="col-8">
                                <select class="form-select form-control" aria-label="Default select example">
                                    <option selected="">حملة إعلانية  </option>
                                    <option value="1">حملة إعلانية  </option>
                                    <option value="2">حملة إعلانية  </option>
                                    <option value="3">حملة إعلانية  </option>
                                </select>
                            </div>
                        </div>
                     </div>


                </div>
            </div>
        </div>  <!-- /. end Filter -->



        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4"> تفاصيل الزيارات  </h6>
            </div>

            <div class="p-4">
                <div class="row">
                    <div class="col-md-4 mt-4">
                        <a href="#!" class="bg-dark statistic statistic-users features feature-primary d-flex justify-content-between align-items-center rounded shadow p-4">
                            <div class="flex-1 ms-3">
                                <p class="fs-5 text-dark fw-bold mb-0">
                                    <span class="counter-value  text-white h3" data-target="{{ $visitors_today->count() }}">{{ $visitors_today->count() }}</span>
                                </p>
                                <h6 class="mb-0 text-main-color">الزيارات الآن </h6>
                            </div>
                            <div class="icon text-center rounded-pill">
                                <img src="{{ asset('assets/images/icon/icon-eye.svg') }}" width="90" alt="">
                            </div>
                        </a>
                    </div><!--end col-->

                    <div class="col-md-4 mt-4">
                        <a href="#!" class="bg-dark statistic statistic-users features feature-primary d-flex justify-content-between align-items-center rounded shadow p-4">
                            <div class="flex-1 ms-3">
                                <p class="fs-5 text-dark fw-bold mb-0">
                                    <span class="counter-value  text-white h3" data-target="{{ $visitors_today->where('device','browser')->count() }}">{{ $visitors_today->where('device','browser')->count() }}</span>
                                </p>
                                <h6 class="mb-0 text-main-color">عن طريق كمبيوتر </h6>
                            </div>
                            <div class="icon text-center rounded-pill">
                                <img src="{{ asset('assets/images/icon/icon-laptop.svg') }}" width="90" alt="">
                            </div>
                        </a>
                    </div><!--end col-->

                    <div class="col-md-4 mt-4">
                        <a href="#!" class="bg-dark statistic statistic-users features feature-primary d-flex justify-content-between align-items-center rounded shadow p-4">
                            <div class="flex-1 ms-3">
                                <p class="fs-5 text-dark fw-bold mb-0">
                                    <span class="counter-value  text-white h3" data-target="{{ $visitors_today->where('device','mobile')->count()  }}">{{ $visitors_today->where('device','mobile')->count()  }}</span>
                                </p>
                                <h6 class="mb-0 text-main-color">عن طريق الجوال </h6>
                            </div>
                            <div class="icon text-center rounded-pill">
                                <img src="{{ asset('assets/images/icon/icon-smartphone.svg') }}" width="40" alt="">
                            </div>
                        </a>
                    </div><!--end col-->

                    <div class="col-md-4 mt-4">
                        <a href="#!" class="bg-white border statistic statistic-users features feature-primary d-flex justify-content-between align-items-center rounded shadow p-4">
                            <div class="flex-1 ms-3">
                                <p class="fs-5 text-dark fw-bold mb-0">
                                    <span class="counter-value  text-dark h3" data-target="{{ $visitors->count() }}">{{ $visitors->count() }}</span>
                                </p>
                                <h6 class="mb-0 text-dark">إجمالي عدد الزيارات </h6>
                            </div>
                            <div class="icon text-center rounded-pill">
                                <img src="{{ asset('assets/images/icon/icon-abacus.svg') }}" width="90" alt="">
                            </div>
                        </a>
                    </div><!--end col-->

                    <div class="col-md-4 mt-4">
                        <a href="#!" class="bg-white border statistic statistic-users features feature-primary d-flex justify-content-between align-items-center rounded shadow p-4">
                            <div class="flex-1 ms-3">
                                <p class="fs-5 text-dark fw-bold mb-0">
                                    <span class="counter-value  text-dark h3" data-target="93">93</span>
                                </p>
                                <h6 class="mb-0 text-dark"> زيارة فعالة (الزائر اشترك) </h6>
                            </div>
                            <div class="icon text-center rounded-pill">
                                <img src="{{ asset('assets/images/icon/icon-handshake.svg') }}" width="90" alt="">
                            </div>
                        </a>
                    </div><!--end col-->

                    <div class="col-md-4 mt-4">
                        <a href="#!" class="bg-white border statistic statistic-users features feature-primary d-flex justify-content-between align-items-center rounded shadow p-4">
                            <div class="flex-1 ms-3">
                                <p class="fs-5 text-dark fw-bold mb-0">
                                    <span class="counter-value  text-dark h3" data-target="{{ $users }}">{{ $users }}</span>
                                </p>
                                <h6 class="mb-0 text-dark">  زيارة غير فعالة (الزائر لم يشترك) </h6>
                            </div>
                            <div class="icon text-center rounded-pill">
                                <img src="{{ asset('assets/images/icon/icon-failing.svg') }}" width="50" alt="">
                            </div>
                        </a>
                    </div><!--end col-->


                </div>
            </div>



            <div class="p-4">
                <div class="row">
                    <div class="col-md-4">
                        <h3  class='h6'> أكثر الدول زيارة </h3>
                        <div class="table-responsive   rounded-bottom mb-3">
                            <table class="table table-bordered table-center table-hover bg-white mb-0 table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center"> الدولة </th>
                                        <th class="text-center"> عدد الزيارات </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Start -->
                                    <tr>
                                        <td class="text-center p-2" >
                                            <span class="text-muted"> السعودية </span>
                                        </td>
                                        <td class="text-center p-2">
                                            <span class="text-muted">255 </span>
                                        </td>
                                    </tr>
                                    <!-- End -->

                                    <!-- Start -->
                                    <tr>
                                        <td class="text-center p-2">
                                            <span class="text-muted"> السعودية </span>
                                        </td>
                                        <td class="text-center p-2">
                                            <span class="text-muted">255 </span>
                                        </td>
                                    </tr>
                                    <!-- End -->

                                    <!-- Start -->
                                    <tr>
                                        <td class="text-center p-2">
                                            <span class="text-muted"> السعودية </span>
                                        </td>
                                        <td class="text-center p-2">
                                            <span class="text-muted">255 </span>
                                        </td>
                                    </tr>
                                    <!-- End -->
                                </tbody>
                            </table>
                        </div>
                        <a href="javascript:void(0)"   class="btn btn-outline-dark mt-2"> عرض المزيد  </a>
                    </div>

                    <div class="col-md-4">
                        <h3  class='h6'> أكثر المدن زيارة </h3>
                        <div class="table-responsive   rounded-bottom mb-3">
                            <table class="table table-bordered table-center table-hover bg-white mb-0 table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center"> المدينة </th>
                                        <th class="text-center"> عدد الزيارات </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Start -->
                                    <tr>
                                        <td class="text-center p-2" >
                                            <span class="text-muted"> جدة </span>
                                        </td>
                                        <td class="text-center p-2">
                                            <span class="text-muted">255 </span>
                                        </td>
                                    </tr>
                                    <!-- End -->

                                    <!-- Start -->
                                    <tr>
                                        <td class="text-center p-2">
                                            <span class="text-muted"> القاهرة </span>
                                        </td>
                                        <td class="text-center p-2">
                                            <span class="text-muted">255 </span>
                                        </td>
                                    </tr>
                                    <!-- End -->

                                    <!-- Start -->
                                    <tr>
                                        <td class="text-center p-2">
                                            <span class="text-muted"> الفيوم </span>
                                        </td>
                                        <td class="text-center p-2">
                                            <span class="text-muted">255 </span>
                                        </td>
                                    </tr>
                                    <!-- End -->
                                </tbody>
                            </table>
                        </div>
                        <a href="javascript:void(0)"   class="btn btn-outline-dark mt-2"> عرض المزيد  </a>
                    </div>

                    <div class="col-md-4">
                        <h3  class='h6'> الأكثر بحثًا </h3>
                        <div class="table-responsive   rounded-bottom mb-3">
                            <table class="table table-bordered table-center table-hover bg-white mb-0 table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center"> الكلمة </th>
                                        <th class="text-center"> عدد مرات البحث </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Start -->
                                    <tr>
                                        <td class="text-center p-2" >
                                            <span class="text-muted"> تجارة </span>
                                        </td>
                                        <td class="text-center p-2">
                                            <span class="text-muted">255 </span>
                                        </td>
                                    </tr>
                                    <!-- End -->

                                    <!-- Start -->
                                    <tr>
                                        <td class="text-center p-2">
                                            <span class="text-muted"> جدة </span>
                                        </td>
                                        <td class="text-center p-2">
                                            <span class="text-muted">255 </span>
                                        </td>
                                    </tr>
                                    <!-- End -->

                                    <!-- Start -->
                                    <tr>
                                        <td class="text-center p-2">
                                            <span class="text-muted"> السعودية </span>
                                        </td>
                                        <td class="text-center p-2">
                                            <span class="text-muted">255 </span>
                                        </td>
                                    </tr>
                                    <!-- End -->
                                </tbody>
                            </table>
                        </div>
                        <a href="javascript:void(0)"   class="btn btn-outline-dark mt-2"> عرض المزيد  </a>
                    </div>
                </div>
            </div>
        </div> <!--end bg-white-->

    </div>
</div><!--end container-->

@endsection
