@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')

<div class="container-fluid">
        <div class="layout-specing">        
            <div class="row">
                <div class="col mt-4">
                    <a href="#!" class="statistic statistic-users features feature-primary d-flex justify-content-between align-items-center rounded shadow p-4">
                        <div class="flex-1 ms-3">
                            <p class="fs-5 text-dark fw-bold mb-0">
                                <span class="counter-value  text-white h1" data-target="10">10</span>
                            </p>
                            <h6 class="mb-0 text-white">إجمالي المستخدمين </h6>
                        </div>
                        <div class="icon text-center rounded-pill">
                            <img src="{{asset('assets/images/icon/icon-group.svg')}}" width="90" alt="">
                        </div>  
                    </a>
                </div><!--end col-->

                <div class="col mt-4">
                    <a href="#!" class="statistic statistic-products features feature-primary d-flex justify-content-between align-items-center rounded shadow p-4">
                        <div class="flex-1 ms-3">
                            <p class="fs-5 text-dark fw-bold mb-0">
                                <span class="counter-value  text-white h1" data-target="20">{{$products_count}}</span>
                            </p>
                            <h6 class="mb-0 text-white">اجمالي المنتجات </h6>
                        </div>
                        <div class="icon text-center rounded-pill">
                            <img src="{{asset('assets/images/icon/icon-cubes.svg')}}" width="90" alt="">
                        </div>  
                    </a>
                </div><!--end col-->
                <div class="col mt-4">
                    <a href="#!" class="statistic statistic-visits features feature-primary d-flex justify-content-between align-items-center rounded shadow p-4">
                        <div class="flex-1 ms-3">
                            <p class="fs-5 text-dark fw-bold mb-0">
                                <span class="counter-value  text-white h1" data-target="20">500</span>
                            </p>
                            <h6 class="mb-0 text-white">إجمالي الزيارات </h6>
                        </div>
                        <div class="icon text-center rounded-pill">
                            <img src="{{asset('assets/images/icon/icon-visits.svg')}}" width="90" alt="">
                        </div>  
                    </a>
                </div><!--end col-->         
            </div>


            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="card shadow border-0 p-4 pb-0 rounded">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-0 fw-bold h4">المبيعات الشهرية</h6>
                            <div class="mb-0 position-relative">
                                <select class="form-select form-control" id="yearchart">
                                    <option selected>2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                </select>
                            </div>
                        </div>
                        <div id="dashboard" class="apex-chart"></div>
                    </div>                    
                </div>
                <div class="col-md-6">
                    <div class="card shadow border-0 p-4 pb-0 rounded">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-0 fw-bold h4">الارباح الشهرية</h6>
                            <div class="mb-0 position-relative">
                                <select class="form-select form-control" id="yearchart">
                                    <option selected>2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                </select>
                            </div>
                        </div>
                        <div id="dashboard1" class="apex-chart"></div>
                    </div>                    
                </div>                
            </div>

            <div class="row mt-3">
                <div class="col-md-8 mt-4">
                    <div class="d-flex justify-content-between p-4  bg-white shadow rounded-top">
                        <h6 class="fw-bold mb-0 h4">أحدث الطلبات</h6>
                    </div>
                    <div class="table-responsive shadow rounded-bottom" data-simplebar style="height: 550px;">
                        <table class="table table-center bg-white mb-0">
                            <tbody>
                                <!-- Start -->
                                @foreach($orders as $order)
                                <tr>
                                    <td class="p-3">
                                        <a href="javascript:void(0)" class="img-border-right  features feature-primary key-feature d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="icon text-center rounded-circle me-4">
                                                    <img src="{{$order->user->image}}" class='sm-img rounded' alt="">
                                                </div>
                                                <div class="flex-1">
                                                    <h6 class="mb-0 text-dark">{{$order->user->name}}</h6>
                                                    <small class="text-dark">الايميل</small>
                                                    <span class="text-muted">{{$order->user->email}}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-center p-3">{{$order->total_price}} {{auth()->user()->store->currency->getName()}}</td>
                                    <td class="text-center p-3"> مستعرض كمبيوتر </td>
                                    <td class="text-end p-3">
                                       <div class="tools-options d-flex justify-content-end">
                                            <div class="form-check form-switch p-0 pt-1">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                            </div>
                                            <a href="#"> <i class="uil uil-edit"></i> </a>
                                            <a href="#"> <i class="uil uil-trash-alt"></i> </a>
                                       </div>
                                    </td>
                                </tr>
                                <!-- End -->                           
 
                                @endforeach
                            </tbody>
                        </table>
                    </div>                    
                </div>
                <div class="col-xl-4 col-lg-5 mt-4 rounded">
                    <div class="card shadow border-0 card-notification">
                        <div class="p-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-0 fw-bold h4">تنبيهات</h6>  
                                <!-- <a href="#!" class="text-primary">See More <i class="uil uil-arrow-right align-middle"></i></a> -->
                            </div>
                        </div>
                        <div class="p-4" data-simplebar style="height: 365px;">
                            <a href="javascript:void(0)" class="mb-4 features feature-primary key-feature d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="icon text-center rounded-circle me-4">
                                        <img src="{{asset('assets/images/img_noti.png')}}" class='sm-img rounded' alt="">
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 text-dark">اسم المتجر</h6>
                                        <small class="main-color">تم إضافة منتج جديد</small>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript:void(0)" class="mb-4 features feature-primary key-feature d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="icon text-center rounded-circle me-4">
                                        <img src="{{asset('assets/images/img_noti.png')}}" class='sm-img rounded' alt="">
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 text-dark">اسم المتجر</h6>
                                        <small class="main-color">تم إضافة منتج جديد</small>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript:void(0)" class="mb-4 features feature-primary key-feature d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="icon text-center rounded-circle me-4">
                                        <img src="{{asset('assets/images/img_noti.png')}}" class='sm-img rounded' alt="">
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 text-dark">اسم المتجر</h6>
                                        <small class="main-color">تم إضافة منتج جديد</small>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript:void(0)" class="mb-4 features feature-primary key-feature d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="icon text-center rounded-circle me-4">
                                        <img src="{{asset('assets/images/img_noti.png')}}" class='sm-img rounded' alt="">
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 text-dark">اسم المتجر</h6>
                                        <small class="main-color">تم إضافة منتج جديد</small>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript:void(0)" class="mb-4 features feature-primary key-feature d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="icon text-center rounded-circle me-4">
                                        <img src="{{asset('assets/images/img_noti.png')}}" class='sm-img rounded' alt="">
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 text-dark">اسم المتجر</h6>
                                        <small class="main-color">تم إضافة منتج جديد</small>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript:void(0)" class="mb-4 features feature-primary key-feature d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="icon text-center rounded-circle me-4">
                                        <img src="{{asset('assets/images/img_noti.png')}}" class='sm-img rounded' alt="">
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 text-dark">اسم المتجر</h6>
                                        <small class="main-color">تم إضافة منتج جديد</small>
                                    </div>
                                </div>
                            </a>


                        </div>
                    </div>
                </div><!--end col-->
            </div>
            
        </div>
    </div><!--end container-->
    @endsection