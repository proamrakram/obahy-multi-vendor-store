@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')

<div class="container-fluid">
    <div class="layout-specing">
        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-3  bg-soft-dark   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4 ps-4">@lang('adminPanel.packages-settings')</h6>
            </div>

            <div class="p-4">
                <h5>@lang('adminPanel.packages-settings')</h5>

                <!-- Start Form -->
                <form method="post" action="{{ route('admin.settings.update-package-settings') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-3 mt-md-5">
                        <div class="col-md-10">

                            <div class="row">
                                <div class="col-md-8">

                                    <div class="row mb-3">
                                        <label for="currenciesStore" class="col-6 col-form-label">@lang('adminPanel.products-number') </label>
                                        <div class="col-6">
                                            <input type="number" name="default_products_num" value="{{$setting->default_products_num}}" class="form-control   @error('default_products_num') is-invalid @enderror" id="" placeholder="@lang('adminPanel.products-number') ">

                                            @error('default_products_num')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-8">

<div class="row mb-3">
    <label for="currenciesStore" class="col-6 col-form-label">@lang('adminPanel.services-number') </label>
    <div class="col-6">
        <input type="number" name="default_services_num" value="{{$setting->default_services_num}}" class="form-control   @error('default_services_num') is-invalid @enderror" id="" placeholder="@lang('adminPanel.services-number') ">

        @error('default_services_num')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

</div> <div class="col-md-8">

<div class="row mb-3">
    <label for="currenciesStore" class="col-6 col-form-label">@lang('adminPanel.orders-number') </label>
    <div class="col-6">
        <input type="number" name="default_orders_num" value="{{$setting->default_orders_num}}" class="form-control   @error('default_orders_num') is-invalid @enderror" id="" placeholder="@lang('adminPanel.orders-number') ">

        @error('default_orders_num')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

</div>
<div class="col-md-8">

<div class="row mb-3">
    <label for="currenciesStore" class="col-6 col-form-label">@lang('adminPanel.customers-number') </label>
    <div class="col-6">
        <input type="number" name="default_customers_num" value="{{$setting->default_customers_num}}" class="form-control   @error('default_customers_num') is-invalid @enderror" id="" placeholder="@lang('adminPanel.customers-number') ">

        @error('default_customers_num')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

</div>
<div class="col-md-8">

<div class="row mb-3">
    <label for="currenciesStore" class="col-6 col-form-label">@lang('adminPanel.copons-number') </label>
    <div class="col-6">
        <input type="number" name="default_copons_num" value="{{$setting->default_copons_num}}" class="form-control   @error('default_copons_num') is-invalid @enderror" id="" placeholder="@lang('adminPanel.copons-number') ">

        @error('default_copons_num')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

</div>



                                <div class="col-md-12 mt-4">
                                    <button type="submit" class='btn btn-dark px-4 mx-4 py-2'>@lang('adminPanel.save-data') </button>
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