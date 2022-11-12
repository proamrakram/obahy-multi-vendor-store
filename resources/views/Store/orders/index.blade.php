@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
<div class="container-fluid">
    <div class="layout-specing">


        <div class="d-flex justify-content-between p-3 mb-3  bg-white   rounded-top border-bottom heading-with-shape">
            <h6 class="fw-bold mb-0 h4">@lang('adminPanel.orders') </h6>
            <div class="btns">

                @if(auth()->user()->can('store-orders-create'))
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
                <a href="{{route('store.orders.index')}}" class='active'> <span class=""> @lang('adminPanel.orders') </span> <span class="text-muted"> ( 9 @lang('adminPanel.order') ) </span> </a>
                <a href="{{route('store.orders.services')}}"> <span class="">@lang('adminPanel.services') </span> <span class="text-muted"> ( 9 @lang('adminPanel.order') ) </span> </a>
            </div>
            <div class="p-4">
                <div class="table-responsive   rounded-bottom mb-3">
                    <table class="table border-top table-center table-hover bg-white mb-0">
                        <tbody>
                            <!-- Start -->
                            @foreach($data as $order)
                            <tr>
                                <td class="  p-2">
                                    <div class="order-box">
                                        <div class="d-flex align-items-center">
                                            <div class="img-order-user me-3">
                                                <img src="{{$order->user->image}}" alt="">
                                            </div>
                                            <div class="order-box-content">
                                                <p class='m-0'> <a href="{{route('store.orders.details',['id'=>$order->id])}}" class='text-dark'> {{$order->user->name}} </a> </p>
                                                <div class="d">
                                                    <span class="text-muted font-sm "> <a href="{{route('store.orders.details',['id'=>$order->id])}}"> {{$order->order_number}}# </a> </span>
                                                    <span class="text-muted font-sm "> <i class="uil uil-map-marker mx-1"></i> {{$order->user->country->country_name_ar}} </span>
                                                    <span class="text-muted font-sm "> <i class="uil uil-desktop-alt mx-1"></i> مستعرض كمبيوتر </span>
                                                    <span class="text-muted font-sm "> <i class="circle bg-green mx-1"></i>{{$order->getStatus($order->status)}} </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-2" width='120px'>
                                    <span class="text-dark"> {{$order->products()->where('is_delete',0)->where('store_id',auth()->user()->store_id)->whereNotIn('status',['canceled','reference'])->sum(\DB::raw('price*amount'))}}
                                         {{auth()->user()->store->currency->getName()}} </span>
                                </td>
                                <td class="p-2" width='120px'>
                                    <span class="text-muted"> {{$order->created_at}}</span>
                                </td>
                                
                                <td class="p-2" width='120px'>
                                <div class="tools-options d-flex justify-content-center">
                                        @if(auth()->user()->can('store-orders-edit'))
                                        <a href="{{route('store.orders.edit',['id'=>$order->id])}}"> <i class="uil uil-edit"></i> </a>
                                       @endif
                                       @if(auth()->user()->can('store-orders-delete'))
                                        <a href="{{route('store.orders.delete',['id'=>$order->id])}}"  onclick="return confirm('هل انت متأكد من حذف ({{$order->order_number}})?')" > <i class="uil uil-trash-alt"></i> </a>
                                    @endif
                                    </div>
                                </td>
                                

                            </tr>
                            <!-- End -->
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--end bg-white-->

    </div>
</div>
<!--end container-->

@endsection