@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')

<div class="container-fluid">
    <div class="layout-specing">
        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-3  bg-soft-dark   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4 ps-4">@lang('adminPanel.basic-settings') </h6>
            </div>

            <div class="p-4">
                <h5>@lang('adminPanel.store-data')  </h5>

                <!-- Start Form -->
                <form method="post" action="{{ route('store.settings.general') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-3 mt-md-5">
                        <div class="col-md-10">

                            <div class="row">
                                <div class="col-md-8">

                                    <div class="row mb-3 align-items-center">
                                        <label for="storeName" class="col-3 col-form-label">@lang('adminPanel.store-name')</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control mb-2  @error('store_name_ar') is-invalid @enderror" name="store_name_ar" value="{{$store->store_name_ar}}" id="storeName" placeholder="@lang('adminPanel.name-ar')">
                                            @error('store_name_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <input type="text" class="form-control  @error('store_name_en') is-invalid @enderror" name="store_name_en" value="{{$store->store_name_en}}" id="storeName" placeholder="@lang('adminPanel.name-en')">
                                            @error('store_name_en')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> <!-- / End storeName -->

                                    <div class="row mb-3 align-items-center">
                                        <label for="storeDetails" class="col-3 col-form-label">@lang('adminPanel.store-description')</label>
                                        <div class="col-9">
                                            <textarea class="form-control mb-2  @error('store_details_ar') is-invalid @enderror" name="store_details_ar" id="storeDetails" placeholder="@lang('adminPanel.details-ar')">{{$store->store_details_ar}}</textarea>
                                            @error('store_details_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <textarea class="form-control  @error('store_details_en') is-invalid @enderror" name="store_details_en" id="storeDetails" placeholder="@lang('adminPanel.details-en')"> {{$store->store_details_en}}</textarea>
                                            @error('store_details_en')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div> <!-- / End storeDetails -->
                                    </div>

                                    <div class="row mb-3 align-items-center">
                                        <label for="storeAddress" class="col-3 col-form-label">@lang('adminPanel.address')  </label>
                                        <div class="col-9">
                                            <input type="text" class="form-control mb-2  @error('store_address_ar') is-invalid @enderror" value="{{$store->store_address_ar}}" name="store_address_ar" id="storeAddress" placeholder="@lang('adminPanel.address-ar') ">
                                            @error('store_address_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <input type="text" class="form-control mb-2  @error('store_address_en') is-invalid @enderror" value="{{$store->store_address_en}}" name="store_address_en" id="storeAddress" placeholder="@lang('adminPanel.address-en') ">
                                            @error('store_address_en')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> <!-- / End storeAddress -->



                                </div>
                                <div class="col-md-4">
                                    <div class="uploade-img">
                                        <input type='file' class=" @error('logo') is-invalid @enderror" name="logo" uploade='file' />
                                        <img id="uplodeImage" @if(is_null($store->store_logo)) src="{{asset('assets/images/icon/icon-photo-camera.svg')}}" @else src="{{asset($store->store_logo)}}" @endif>
                                    </div>
                                    @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <br>
                                    <h5 class='h6 mt-0'>@lang('adminPanel.store-logo')  </h5>
                                </div>


                                <div class="col-md-4 mt-4">
                                    <button type="submit" class='btn btn-dark px-4 mx-4 py-2'>@lang('adminPanel.save-data')</button>
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
</main>
<!--End page-content" -->


@endsection