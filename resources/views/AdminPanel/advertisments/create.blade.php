@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
<div class="container-fluid">
    <div class="layout-specing">
        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-3  bg-soft-dark   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4 ps-4">@lang('adminPanel.ads-and-banners-settings') </h6>
               
            </div>
            <form method="post" action="{{ route('admin.advertisments.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="p-4">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="banner-pupup" role="tabpanel" aria-labelledby="banner-pupup">
                            <form action="" method="">
                                <div class="row mt-3 mt-md-5">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                <input type='text' name="title_ar" class="form-control   @error('title_ar') is-invalid @enderror"placeholder="  @lang('adminPanel.title-ar')">
                                                   
                                                    @error('title_ar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                <input type='text' name="title_en" class="form-control   @error('title_en') is-invalid @enderror" dir='ltr'  placeholder="  @lang('adminPanel.title-en')">
                                                   
                                                    @error('title_en')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                <textarea name="description_ar" class="form-control   @error('description_ar') is-invalid @enderror" placeholder="  @lang('adminPanel.description-ar')"></textarea>
                                                   
                                                    @error('description_ar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="mb-3">
                                                <textarea name="description_en" class="form-control   @error('description_en') is-invalid @enderror"dir='ltr'  placeholder="  @lang('adminPanel.description-en')"></textarea>
                                                   
                                                    @error('description_en')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <select name="ads_type" id="ads_type" class='form-control form-select   @error(' ads_type') is-invalid @enderror'>
                                                        <option value="pop_up_window"> @lang('adminPanel.pop-up-window')  </option>
                                                        <option value="side_window"> @lang('adminPanel.side-window') </option>
                                                    </select>
                                                    @error('ads_type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div> <!-- / End Choose Location Banners -->

                                                <div class="row mb-3">
                                                    <div class="file-uploade">
                                                        <label for="formFile" class="form-label">  @lang('adminPanel.choose-the-image-for-marketing-content')</label>
                                                        <input uploade='file' name="add_image" class="form-control   @error('add_image') is-invalid @enderror" type="file" id="formFile" dir='ltr'>
                                                    </div>
                                                    @error('add_image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div> <!-- / End storeName -->
                                                <div class="mb-3">
                                                    <select name="ads_place"  class='form-control form-select   @error(' ads_place') is-invalid @enderror'>
                                                    <option selected>@lang('adminPanel.choose-ads-place') </option>
                                                         <option class="pop_up_window" value="all-pages">@lang('adminPanel.all-pages') </option>
                                                        <option class="pop_up_window" value="home-page">@lang('adminPanel.home-page')  </option>
                                                        <option class="pop_up_window" value="inner-pages">@lang('adminPanel.inner-pages')  </option>


                                                        <option class="side_window" style="display:none" value="home-primary-main-banner">@lang('adminPanel.home-primary-main-banner')  </option>
                                                        <option class="side_window" style="display:none" value="home-top-primary-side-banner">@lang('adminPanel.home-top-primary-side-banner')  </option>
                                                        <option class="side_window" style="display:none" value="home-bottom-primary-side-banner">@lang('adminPanel.home-bottom-primary-side-banner')  </option>
                                                        <option class="side_window" style="display:none" value="home-first-secondary-banner">@lang('adminPanel.home-first-secondary-banner')  </option>
                                                        <option class="side_window" style="display:none" value="home-second-secondary-banner">@lang('adminPanel.home-second-secondary-banner')  </option>
                                                        <option class="side_window" style="display:none" value="inner-banner-start-categories-page">@lang('adminPanel.inner-banner-start-categories-page')  </option>
                                                        <option class="side_window" style="display:none" value="inner-banner-end-categories-page">@lang('adminPanel.inner-banner-end-categories-page')  </option>
                                                        <option class="side_window" style="display:none" value="inner-banner-start-product-details-page">@lang('adminPanel.inner-banner-start-product-details-page')  </option>
                                                        <option class="side_window" style="display:none" value="inner-banner-end-product-details-page">@lang('adminPanel.inner-banner-end-product-details-page')  </option>
                                                        <option class="side_window" style="display:none" value="inner-banner-start-stores-types-page">@lang('adminPanel.inner-banner-start-stores-types-page')  </option>
                                                        <option class="side_window" style="display:none" value="inner-banner-end-stores-types-page">@lang('adminPanel.inner-banner-end-stores-types-page')  </option>
                                                        <option class="side_window" style="display:none" value="inner-banner-start-cart-page">@lang('adminPanel.inner-banner-start-cart-page')  </option>
                                                        <option class="side_window" style="display:none" value="inner-banner-end-cart-page">@lang('adminPanel.inner-banner-end-cart-page')  </option>
                                                        <option class="side_window" style="display:none" value="inner-banner-start-payment-page">@lang('adminPanel.inner-banner-start-payment-page')  </option>
                                                        <option class="side_window" style="display:none" value="inner-banner-end-payment-page">@lang('adminPanel.inner-banner-end-payment-page')  </option>
                                                        <option class="side_window" style="display:none" value="inner-banner-start-continue-payment-page">@lang('adminPanel.inner-banner-start-continue-payment-page')  </option>
                                                        <option class="side_window" style="display:none" value="inner-banner-end-continue-payment-page">@lang('adminPanel.inner-banner-end-continue-payment-page')  </option>
                                                        <option class="side_window" style="display:none" value="inner-banner-start-profile-page">@lang('adminPanel.inner-banner-start-profile-page')  </option>
                                                        <option class="side_window" style="display:none" value="inner-banner-end-profile-page">@lang('adminPanel.inner-banner-end-profile-page')  </option>
                                                    </select>
                                                    @error('ads_place')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div> <!-- / End Choose Location Banners -->


                                                <div class="mb-3">
                                                    <input type="text" name="link" class="form-control   @error('link') is-invalid @enderror" id="storeAddress" placeholder="  @lang('adminPanel.image-link')">
                                                    @error('link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div> <!-- / End Image URL -->


                                            </div>
                                            <div class="col-md-4">
                                                <div class="uploade-img">
                                                    <img id="uplodeImage" src="{{asset('assets/images/icon/icon-photo-camera.svg')}}">
                                                </div>
                                            </div>


                                            <div class="col-md-12 my-3">
                                                <hr>
                                            </div>
                                            <div class="col-md-4 mt-4">

                                                <button type="submit" class="btn btn-dark px-4 mx-4 py-2"> @lang('adminPanel.save-data')  </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end teb pane-->


                    </div>
                    <!--end tab content-->

                </div>
            </form>
        </div>
        <!--end bg-white-->
    </div>
</div>
<!--end container-->
@endsection

@section('script')

<script type="text/javascript">
$('#ads_type').on('change',function(){
    if($(this).val() == 'pop_up_window'){
        $(".side_window").hide();
        $(".pop_up_window").show();
    }else{
        $(".pop_up_window").hide();
        $(".side_window").show();
    }}); </script>
@endsection
