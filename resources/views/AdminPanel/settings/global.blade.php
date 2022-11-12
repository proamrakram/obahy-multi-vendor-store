@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')


<div class="container-fluid">
    <div class="layout-specing">


        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4"> @lang('adminPanel.general-platform-settings') </h6>
            </div>


            <div class="p-4">
                <form method="post" action="{{ route('admin.settings.global') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-12">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label">@lang('adminPanel.header-logo') </label>
                                <div class="col-9">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" name="header_logo" accept=".png, .jpg, .jpeg .svg" class="form-control   @error('header_logo') is-invalid @enderror" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" @if(!is_null($setting['header_logo'])) style="background-image: url({{asset('storage/images/setting') . '/' .$setting['header_logo']}});" @else style="background-image: url({{asset('assets/images/icon/icon-photo-camera.svg')}});" @endif>
                                            </div>
                                        </div>
                                    </div>
                                    @error('header_logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>

                        <div class="col-md-12">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label">@lang('adminPanel.footer-logo') </label>
                                <div class="col-9">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload2" name="footer_logo" accept=".png, .jpg, .jpeg  .svg" class="form-control   @error('footer_logo') is-invalid @enderror" />
                                            <label for="imageUpload2"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview2" @if(!is_null($setting['footer_logo'])) style="background-image: url({{asset('storage/images/setting') . '/' .$setting['footer_logo']}});" @else style="background-image: url({{asset('assets/images/icon/icon-photo-camera.svg')}});" @endif>
                                            </div>
                                        </div>
                                    </div>
                                    @error('footer_logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <label for="nameAR_platform" class="col-3 col-form-label"> @lang('adminPanel.platform-name-ar') </label>
                                <div class="col-9">
                                    <input type="text" class="form-control   @error('platform_name_ar') is-invalid @enderror" name="platform_name_ar" value="{{$setting['platform_name_ar'] ?? ''}}" id="nameAR_platform" placeholder=" " required>
                                    @error('platform_name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <label for="nameEn_platform" class="col-3 col-form-label"> @lang('adminPanel.platform-name-en') </label>
                                <div class="col-9">
                                    <input type="text" class="form-control   @error('platform_name_en') is-invalid @enderror" name="platform_name_en" value="{{$setting['platform_name_en'] ?? ''}}" id="nameEn_platform" placeholder=" " required>
                                    @error('platform_name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row mb-3 align-items-center">
                                <label for="" class="col-3 col-form-label">@lang('adminPanel.platform-description') </label>
                                <div class="col-9">
                                    <textarea class="form-control mb-2   @error('platform_details_ar') is-invalid @enderror" name="platform_details_ar" id="" placeholder="وصف المنصة بالعربية " required>{{$setting['platform_details_ar'] ?? ''}}</textarea>
                                    @error('platform_details_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <textarea class="form-control mb-2   @error('platform_details_en') is-invalid @enderror" name="platform_details_en" id="" placeholder="وصف المنصة بالانجليزية " required>{{$setting['platform_details_en'] ?? ''}}</textarea>
                                    @error('platform_details_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row mb-3">
                                <label for="email_platform" class="col-3 col-form-label">@lang('adminPanel.email')</label>
                                <div class="col-9">
                                    <input type="text" class="form-control   @error('platform_email') is-invalid @enderror" name="platform_email" value="{{$setting['platform_email'] ?? ''}}" id="email_platform" placeholder=" " required>
                                    @error('platform_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row mb-3">
                                <label for="contact_number_platform" class="col-3 col-form-label">@lang('adminPanel.mobile-no')</label>
                                <div class="col-9">
                                    <input type="text" class="form-control   @error('platform_phone_number') is-invalid @enderror" name="platform_phone_number" value="{{$setting['platform_phone_number'] ?? ''}}" id="contact_number_platform" placeholder=" " required>
                                    @error('platform_phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-dark px-4  py-2">@lang('adminPanel.save') </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <!--end bg-white-->

    </div>
</div>
<!--end container-->
</main>
<!--End page-content" -->

@endsection
