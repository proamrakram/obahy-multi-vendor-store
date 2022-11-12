@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')

    <div class="container-fluid">
        <div class="layout-specing">

            <div class="bg-white mt-3">
                <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                    <h6 class="fw-bold mb-0 h4"> @lang('adminPanel.store-settings')</h6>
                </div>
                <div class="p-4">
                    <h5 class='h6 mb-3'>@lang('adminPanel.store-settings')</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{route('store.settings.general')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <i class="uil uil-setting fs-1"></i>
                                <p class='mb-0'>@lang('adminPanel.basic-settings')</p>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('store.settings.currency')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <i class="uil uil-usd-circle fs-1"></i>
                                <p class='mb-0'>@lang('adminPanel.currencies')</p>
                            </a>
                        </div>

                        <div class="col-md-3">
                            <a href="{{route('store.settings.domain')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <img src="{{asset('assets/images/icon/icon-globe.svg')}}" width="35" class='mb-2 mt-3'>
                                <p class='mb-0'>@lang('adminPanel.domain-settings')</p>
                            </a>
                        </div>

                        <div class="col-md-3">
                            <a href="#" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <img src="{{asset('assets/images/icon/icon-shipping.svg')}}" width="35" class='mb-2 mt-3'>
                                <p class='mb-0'>@lang('adminPanel.shipping-and-delivery-options')</p>
                            </a>
                        </div>

                        <div class="col-md-3">
                            <a href="{{route('store.settings.notification')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <i class="uil uil-bell fs-1"></i>
                                <p class='mb-0'>@lang('adminPanel.notifications') </p>
                            </a>
                        </div>

                        <div class="col-md-3">
                            <a href="settings-wallet-bills.php" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <i class="uil uil-wallet fs-1"></i>
                                <p class='mb-0'>@lang('adminPanel.wallet-and-bills')</p>
                            </a>
                        </div>

                        <div class="col-md-3">
                            <a href="#" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <img src="{{asset('assets/images/icon/icon-lang.svg')}}" width="35" class='mb-2 mt-3'>
                                <p class='mb-0'>@lang('adminPanel.languages') </p>
                            </a>
                        </div>

                        <div class="col-md-3">
                            <a href="#" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <img src="{{asset('assets/images/icon/icon-toggle.svg')}}" width="35" class='mb-2 mt-3'>
                                <p class='mb-0'>@lang('adminPanel.store-options') </p>
                            </a>
                        </div>

                    </div>
                    <h5 class='h6 mb-3 mt-5'>@lang('adminPanel.advanced-settings')</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{route('store.admins.index')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <img src="{{asset('assets/images/icon/icon-user-black.svg')}}" width="35" class='mb-2 mt-3'>
                                <p class='mb-0'>@lang('adminPanel.store-employees')</p>
                            </a>
                        </div>

                        <div class="col-md-3">
                            <a href="{{route('store.settings.seo')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <img src="{{asset('assets/images/icon/icon-search.svg')}}" width="35" class='mb-2 mt-3'>
                                <p class='mb-0'>@lang('adminPanel.seo') </p>
                            </a>
                        </div>

                        <div class="col-md-3">
                            <a href="#" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <i class='uil uil-usd-circle fs-1'></i>
                                <p class='mb-0'> @lang('adminPanel.payment-settings') </p>
                            </a>
                        </div>

                        <div class="col-md-3">
                            <a href="{{route('store.advertisments.index')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <img src="{{asset('assets/images/icon/icon-flag.svg')}}" width="30" class='mb-1 mt-3'>
                                <p class='mb-0'> @lang('adminPanel.banners-settings') </p>
                            </a>
                        </div>


                    </div>

                </div>
            </div> <!--end bg-white-->

        </div>
    </div><!--end container-->
</main>
<!--End page-content" -->


@endsection
