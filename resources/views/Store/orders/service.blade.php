@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
    <div class="container-fluid">
        <div class="layout-specing">


        <div class="d-flex justify-content-between p-3 mb-3  bg-white   rounded-top border-bottom heading-with-shape">
            <h6 class="fw-bold mb-0 h4">@lang('adminPanel.orders') </h6>
            <div class="btns">

                @if(auth()->user()->can('orders-create'))
                <a href="javascript:void(0)" class="btn btn-dark">@lang('adminPanel.add-order')</a>
                @endif
            </div>
        </div>

        <div class="statistic">
            <div class="row">

                <div class="col-md-2 col-4">
                    <div class="box-statistic bg-white p-3 border">
                        <div class="icon mb-3">
                            <img src="{{asset('assets/images/icon/icon-watch.svg')}}" alt="">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="circle bg-red me-1"></span>
                                <span class="txt text-muted">@lang('adminPanel.awaiting-payment')</span>
                            </div>
                            <h4 class='mb-0 text-muted'>{{$orders_count_awaiting_payment}}</h4>
                        </div>
                    </div>
                </div> <!-- End Col -->

                <div class="col-md-2 col-4">
                    <div class="box-statistic bg-white p-3 border">
                        <div class="icon mb-3">
                            <img src="{{asset('assets/images/icon/icon-gift.svg')}}" alt="">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="circle bg-blue me-1"></span>
                                <span class="txt text-muted">@lang('adminPanel.underway') </span>
                            </div>
                            <h4 class='mb-0 text-muted'> {{$orders_count_underway}} </h4>
                        </div>
                    </div>
                </div> <!-- End Col -->

                <div class="col-md-2 col-4">
                    <div class="box-statistic bg-white p-3 border">
                        <div class="icon mb-3">
                            <img src="{{asset('assets/images/icon/icon-check.svg')}}" alt="">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="circle bg-green me-1"></span>
                                <span class="txt text-muted">@lang('adminPanel.done')</span>
                            </div>
                            <h4 class='mb-0 text-muted'> {{$orders_count_done}} </h4>
                        </div>
                    </div>
                </div> <!-- End Col -->

                <div class="col-md-2 col-4">
                    <div class="box-statistic bg-white p-3 border">
                        <div class="icon mb-3">
                            <img src="{{asset('assets/images/icon/icon-truck.svg')}}" alt="">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="circle bg-green me-1"></span>
                                <span class="txt text-muted"> @lang('adminPanel.delivery-in-progress') </span>
                            </div>
                            <h4 class='mb-0 text-muted'> {{$orders_count_delivery_in_progress}} </h4>
                        </div>
                    </div>
                </div> <!-- End Col -->

                <div class="col-md-2 col-4">
                    <div class="box-statistic bg-white p-3 border">
                        <div class="icon mb-3">
                            <img src="{{asset('assets/images/icon/icon-clock-regular.svg')}}" alt="">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="circle bg-green me-1"></span>
                                <span class="txt text-muted"> @lang('adminPanel.delivered') </span>
                            </div>
                            <h4 class='mb-0 text-muted'> {{$orders_count_delivered}} </h4>
                        </div>
                    </div>
                </div> <!-- End Col -->

                <div class="col-md-2 col-4">
                    <div class="box-statistic bg-white p-3 border">
                        <div class="icon mb-3">
                            <img src="{{asset('assets/images/icon/icon-trash.svg')}}" alt="">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="circle bg-dark me-1"></span>
                                <span class="txt text-muted">@lang('adminPanel.total-services') </span>
                            </div>
                            <h4 class='mb-0 text-muted'> {{$services_count}} </h4>
                        </div>
                    </div>
                </div> <!-- End Col -->


            </div>
        </div>

    
            <div class="bg-white mt-3">
                
            <div class="heading-links">
                <a href="{{route('store.orders.index')}}"> <span class=""> @lang('adminPanel.orders') </span> <span class="text-muted"> ( 9 @lang('adminPanel.order') ) </span> </a>
                <a href="{{route('store.orders.services')}}" class='active'> <span class="">@lang('adminPanel.services') </span> <span class="text-muted"> ( 9 @lang('adminPanel.order') ) </span> </a>
            </div>
                <div class="p-4">
                    <div class="table-responsive   rounded-bottom mb-3">
                        <table class="table border-top table-center table-hover bg-white mb-0">
                            <tbody>
                                @foreach($data as $order)
                                <!-- Start -->
                                <tr>
                                    <td class="  p-2" >
                                        <div class="order-box">
                                            <div class="d-flex align-items-center">
                                                <div class="img-order-user me-3">
                                                    <img src="assets/images/img-service.png" alt="">
                                                </div>
                                                <div class="order-box-content">
                                                    <p class='m-0'> <a href="" class='text-dark'> ملابس قصيرة </a> </p>
                                                    <div class="d">
                                                        <span class="text-muted font-sm "> تفاصيل عن الخدمة </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                    </td>
                                    <td class="p-2" >
                                        <span class="text-dark d-block"> خبير المظهر </span>
                                        <span class='font-sm text-muted'> اسم خبير المظهر  </span>
                                    </td> 

                                    <td class="p-2" >
                                        <span class="text-dark d-block"> الحالة </span>
                                        <span class='font-sm text-blue'> قيد التنفيذ  </span>
                                    </td>                                     

                                    <td class="p-2" >
                                        <span class="text-dark d-block">العنوان</span>
                                        <span class='font-sm text-muted'>  بلس/ لوحة مفاتيح باللغة الإنجليزية 2020  </span>
                                    </td> 

                                    <td class="p-2"  >
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
            </div> <!--end bg-white-->

        </div>         
    </div><!--end container-->
    
    @endsection
