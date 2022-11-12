@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
<div class="container-fluid">

    <div class="layout-specing">

        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4"> @lang('adminPanel.edity-city')</h6>
            </div>

            <div class="p-4">
                <form method="post" action="{{ route('admin.cities.update',['id'=>$city->id]) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label">@lang('adminPanel.city-name-en')</label>
                                <div class="col-9">
                                    <input type="text" name="city_name_en" value="{{$city->city_name_en}}"  class="form-control  @error('city_name_en') is-invalid @enderror" id="rolesName" placeholder="@lang('adminPanel.city-name-en')">
                                    @error('city_name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label">@lang('adminPanel.city-name-ar')</label>
                                <div class="col-9">
                                    <input type="text" name="city_name_ar"  value="{{$city->city_name_ar}}" class="form-control  @error('city_name_ar') is-invalid @enderror" id="rolesName" placeholder="@lang('adminPanel.city-name-ar')">
                                    @error('city_name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label"> @lang('adminPanel.country')</label>
                                <div class="col-9">
                                    <select name="country_id" id="" class="form-control form-select @error('country_id') is-invalid @enderror">
                                        @foreach($countries as $country)
                                        <option value="{{$country->id}}" @if($country->id == $city->country_id) selected @endif>{{$country->getName()}} </option>
                                        @endforeach
                                    </select> @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark px-4 mx-4 py-2">@lang('adminPanel.save-data')</button>
                </form>
            </div>
        </div>
        <!--end bg-white-->

    </div>
</div>
<!--end container-->



@endsection