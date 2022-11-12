@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
<div class="container-fluid">

    <div class="layout-specing">

        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4">@lang('adminPanel.edit-country')</h6>
            </div>

            <div class="p-4">
                <form method="post" action="{{ route('admin.countries.update',['id'=>$country->id]) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label">@lang('adminPanel.country-name-en') </label>
                                <div class="col-9">
                                    <input type="text" name="country_name_en" value="{{$country->country_name_en}}"  class="form-control  @error('country_name_en') is-invalid @enderror" id="rolesName" placeholder="@lang('adminPanel.country-name-en') ">
                                    @error('country_name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label">@lang('adminPanel.country-name-ar') </label>
                                <div class="col-9">
                                    <input type="text" name="country_name_ar"  value="{{$country->country_name_ar}}" class="form-control  @error('country_name_ar') is-invalid @enderror" id="rolesName" placeholder="@lang('adminPanel.country-name-ar')">
                                    @error('country_name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label">@lang('adminPanel.country-flag')  </label>
                                <div class="col-9">
                                <div class="avatar-upload">
    <div class="avatar-edit"> 
        <input type='file' id="imageUpload" name="country_flag" accept=".png, .jpg, .jpeg" class="form-control   @error('country_flag') is-invalid @enderror"/>
        <label for="imageUpload"></label>
    </div>
    <div class="avatar-preview">
        <div id="imagePreview" @if(!is_null($country->country_flag)) style="background-image: url({{$country->country_flag}});" @else style="background-image: url({{asset('assets/images/icon/icon-photo-camera.svg')}});" @endif>
        </div>
    </div>
</div>           
                                   @error('country_flag')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label"> @lang('adminPanel.country-code')  </label>
                                <div class="col-9">
                                    <input type="text" name="country_code" value="{{$country->country_code}}" class="form-control  @error('country_code') is-invalid @enderror" id="rolesName" placeholder="اختصار الدولة ">
                                    @error('country_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark px-4 mx-4 py-2">@lang('adminPanel.edit-data')</button>
                </form>
            </div>
        </div>
        <!--end bg-white-->

    </div>
</div>
<!--end container-->



@endsection