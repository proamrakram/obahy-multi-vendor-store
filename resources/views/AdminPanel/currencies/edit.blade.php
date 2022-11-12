@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
<div class="container-fluid">

    <div class="layout-specing">

        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4">@lang('adminPanel.edit-currency')</h6>
            </div>

            <div class="p-4">
                <form method="post" action="{{ route('admin.currencies.update',['id'=>$currency->id]) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label">@lang('adminPanel.currency-name-en') </label>
                                <div class="col-9">
                                    <input type="text" name="currency_name_en" value="{{$currency->currency_name_en}}"  class="form-control  @error('currency_name_en') is-invalid @enderror" id="rolesName" placeholder="@lang('adminPanel.currency-name-en')">
                                    @error('currency_name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label">@lang('adminPanel.currency-name-ar')</label>
                                <div class="col-9">
                                    <input type="text" name="currency_name_ar"  value="{{$currency->currency_name_ar}}" class="form-control  @error('currency_name_ar') is-invalid @enderror" id="rolesName" placeholder="@lang('adminPanel.currency-name-ar')">
                                    @error('currency_name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label"> @lang('adminPanel.currency-symbol')  </label>
                                <div class="col-9">
                                    <input type="text" name="currency_symbol"  value="{{$currency->currency_symbol}}" class="form-control  @error('currency_symbol') is-invalid @enderror" id="rolesName" placeholder="@lang('adminPanel.currency-symbol')">
                                    @error('currency_symbol')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label">@lang('adminPanel.currency-code')</label>
                                <div class="col-9">
                                    <input type="text" name="currency_code" value="{{$currency->currency_code}}" class="form-control  @error('currency_code') is-invalid @enderror" id="rolesName" placeholder="@lang('adminPanel.currency-code')">
                                    @error('currency_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                         <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label">@lang('adminPanel.exchange-currency') ({{$setting->currency->getName()}}) </label>
                                <div class="col-9">
                                    <input type="number" step="0.0001" value="{{$currency->exchange}}" name="exchange" class="form-control  @error('exchange') is-invalid @enderror" id="rolesName" placeholder="@lang('adminPanel.exchange-currency')  ({{$setting->currency->getName()}})">
                                    @error('exchange')
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