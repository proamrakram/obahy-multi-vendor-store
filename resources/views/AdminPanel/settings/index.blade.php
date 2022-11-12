@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')

    <div class="container-fluid">
        <div class="layout-specing">

            <div class="bg-white mt-3">
                <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                    <h6 class="fw-bold mb-0 h4">@lang('adminPanel.platform-settings')</h6>
                </div>
 
                
                <div class="p-4">
                    <h5 class='h6 mb-3'>@lang('adminPanel.platform-settings')</h5>
                    <div class="row">
                    @if(auth()->user()->can('basic-settings-edit'))

                        <div class="col-md-3">
                            <a href="{{route('admin.settings.global')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <i class="uil uil-setting fs-1"></i>  
                                <p class='mb-0'>@lang('adminPanel.basic-settings') </p>
                            </a>
                        </div>
@endif
                        @if(auth()->user()->can('social-media-settings-edit'))
                        <div class="col-md-3">
                            <a href="{{route('admin.settings.social')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <i class="uil uil-setting fs-1"></i>  
                                <p class='mb-0'>@lang('adminPanel.social-media-links')</p>
                            </a>
                        </div>
                        
@endif
                        @if(auth()->user()->can('faq-edit'))
                        <div class="col-md-3">
                            <a href="{{route('admin.settings.faq')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <i class="uil uil-setting fs-1"></i>  
                                <p class='mb-0'>@lang('adminPanel.faqs')</p>
                            </a>
                        </div>
@endif
                        @if(auth()->user()->can('about-us-edit'))
                        <div class="col-md-3">
                            <a href="{{route('admin.settings.about')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <i class="uil uil-setting fs-1"></i>  
                                <p class='mb-0'>@lang('adminPanel.about-us')</p>
                            </a>
                        </div>
@endif
                        @if(auth()->user()->can('privacy-edit'))
                        <div class="col-md-3">
                            <a href="{{route('admin.settings.privacy')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <i class="uil uil-setting fs-1"></i>  
                                <p class='mb-0'>@lang('adminPanel.privacy-policy')</p>
                            </a>
                        </div>
@endif
                        @if(auth()->user()->can('currencies-show')||
auth()->user()->can('currencies-create')|| auth()->user()->can('currencies-edit')|| auth()->user()->can('currencies-delete') )
                        <div class="col-md-3">
                            <a href="{{route('admin.currencies.index')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <i class="uil uil-usd-circle fs-1"></i>
                                <p class='mb-0'>@lang('adminPanel.currencies')</p>
                            </a>
                        </div>
@endif
                        @if(auth()->user()->can('default-package-edit'))
                         <div class="col-md-3">
                            <a href="{{route('admin.settings.package')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <i class="uil uil-setting fs-1"></i>
                                <p class='mb-0'>@lang('adminPanel.platform-package')</p>
                            </a>
                        </div>
@endif
                        @if(auth()->user()->can('package-settings-edit'))
                        <div class="col-md-3">
                            <a href="{{route('admin.settings.package-settings')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <i class="uil uil-setting fs-1"></i>
                                <p class='mb-0'>@lang('adminPanel.packages-settings')</p>
                            </a>
                        </div>
@endif
                    
                        @if(
auth()->user()->can('countries-show')||auth()->user()->can('countries-create')|| auth()->user()->can('countries-edit')|| 
auth()->user()->can('countries-delete') )
                        <div class="col-md-3">
                            <a href="{{route('admin.countries.index')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                
                                <img src="{{asset('assets/images/countries.svg')}}" width="35" class="mb-2 mt-3">
                                <p class='mb-0'>@lang('adminPanel.countries')</p>
                            </a>
                        </div>
@endif
                        @if( auth()->user()->can('cities-show')|| auth()->user()->can('cities-create')|| 
auth()->user()->can('cities-edit')|| auth()->user()->can('cities-delete') )
                        <div class="col-md-3">
                            <a href="{{route('admin.cities.index')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                
                                <img src="{{asset('assets/images/buildings.svg')}}" width="35" class="mb-2 mt-3">
                                <p class='mb-0'>@lang('adminPanel.cities')</p>
                            </a>
                        </div>
@endif
                        @if(auth()->user()->can('admins-show')||
auth()->user()->can('admins-create')|| auth()->user()->can('admins-edit')|| auth()->user()->can('admins-delete') )
                        <div class="col-md-3">
                            <a href="{{route('admin.admins.index')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <img src="{{asset('assets/images/icon/icon-user-black.svg')}}" width="35" class='mb-2 mt-3'> 
                                <p class='mb-0'>@lang('adminPanel.platform-employees')</p>
                            </a>
                        </div>
                       
@endif
                        @if(auth()->user()->can('advertisments-show')||auth()->user()->can('advertisments-create')|| auth()->user()->can('advertisments-edit')|| 
auth()->user()->can('advertisments-delete'))
                        <div class="col-md-3">
                            <a href="{{route('admin.advertisments.index')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                                <img src="{{asset('assets/images/icon/icon-flag.svg')}}" width="30" class='mb-1 mt-3'> 
                                <p class='mb-0'>@lang('adminPanel.banners-settings')  </p>
                            </a>
                        </div> 
@endif                       
                        @if(auth()->user()->can('payments-type-show') )
                        <div class="col-md-3">
                            <a href="{{route('admin.payment-types.index')}}" class="text-dark d-block box-setting bg-white shadow border rounded p-4 text-center">
                            <i class="uil uil-usd-circle fs-1"></i>
                            <p class='mb-0'>@lang('adminPanel.payment-methods')  </p>
                            </a>
                        </div>  
                        
@endif
                    </div>

                </div>
            </div> <!--end bg-white-->

        </div>         
    </div><!--end container-->
</main>
<!--End page-content" -->


@endsection
