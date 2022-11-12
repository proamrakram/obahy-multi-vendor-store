@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')


<div class="container-fluid">
    <div class="layout-specing">


        <div class="d-flex justify-content-between p-3 mb-3  bg-white   rounded-top border-bottom heading-with-shape">
            <h6 class="fw-bold mb-0 h4"> @lang('adminPanel.create-order')</h6>
        </div>
        <div class="alert alert-warning d-flex align-items-center bg-orange-light p-3" role="alert">
            <img src="assets/images/icon/icon-warning.svg" width="24" alt="">
            <div class="text-dark ps-3">
                @lang('adminPanel.this-feature-is-only-available-in-obeya-plus-pro')
            </div>
        </div>

        <form method="post" action="{{ route('store.orders.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="bg-white mt-3">
                <div class="p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <span class="d-block fs-13px text-gray"># @lang('adminPanel.order-number')</span>
                            <span>{{order_number()}}</span>
                        </div>
                        <div class="col-md-4">
                            <span class="d-block fs-13px text-gray">
                                <i class="uil uil-calendar-alt"></i>
                                @lang('adminPanel.order-date')
                            </span>
                            <div class="row">
                                <div class="col-6"><input type="date" name="order_date" class="date form-control @error('order_date') is-invalid @enderror">

                                    @error('order_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-6"><input type="time" name="order_time" class="date form-control @error('order_time') is-invalid @enderror">

                                    @error('order_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <span class="d-block fs-13px text-gray">
                                <i class="uil uil-apps"></i>
                                @lang('adminPanel.order-status')
                            </span>
                            <select name="status_id" id="" class="form-control  @error('status_id') is-invalid @enderror">
                                <option value="awaiting_payment"> @lang('adminPanel.awaiting-payment')</option>
                                <option value="underway"> @lang('adminPanel.underway')</option>
                                <option value="done"> @lang('adminPanel.done')</option>
                                <option value="delivery_in_progress"> @lang('adminPanel.delivery-in-progress')</option>
                                <option value="delivered"> @lang('adminPanel.delivered')</option>
                                <option value="reference"> @lang('adminPanel.reference')</option>
                                <option value="canceled"> @lang('adminPanel.canceled')</option>
                            </select>
                            @error('status_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                    </div>
                </div>
            </div>
            <!--end bg-white-->


            <div class="row mt-3">



                <div class="col-md-4 ">
                    <div class="bg-white mb-3">
                        <div class="d-flex bg-gray2 border-bottom justify-content-between p-3">
                            <h4 class='h6 mb-0'>@lang('adminPanel.customer') </h4>
                        </div>
                        <div class="content p-3">
                            <label for="" class='mb-1 fs-12px'>@lang('adminPanel.choose-customer') </label>
                            <select name="customer_id" id="" class="form-control  @error('customer_id') is-invalid @enderror">
                                @foreach($customers as $customer)
                                <option value="{{$customer->id}}"> {{$customer->name}}</option>
                                @endforeach
                            </select>
                            @error('customer_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="bg-white mb-3">
                        <div class="d-flex bg-gray2 border-bottom justify-content-between p-3">
                            <h4 class='h6 mb-0'> @lang('adminPanel.shipping') </h4>
                        </div>
                        <div class="content p-3">
                            <div class="row">
                                <div class="col">
                                    <label for="" class='mb-1 fs-12px'>@lang('adminPanel.choose-shipping-method')</label>
                                    <select name="shipping_id" id="" class="form-control  @error('shipping_id') is-invalid @enderror">
                                        <option value=""> الشحن </option>
                                    </select>
                                    @error('shipping_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="" class='mb-1 fs-12px'> @lang('adminPanel.amount2') </label>
                                    <input name="shipping_amount" type="text" class="form-control  @error('shipping_amount') is-invalid @enderror">
                                    @error('shipping_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="bg-white mb-3">
                        <div class="d-flex bg-gray2 border-bottom justify-content-between p-3">
                            <h4 class='h6 mb-0'>@lang('adminPanel.payment') </h4>
                        </div>
                        <div class="content p-3">
                            <div class="row">
                                <div class="col">
                                    <label for="" class='mb-1 fs-12px'>@lang('adminPanel.choose-payment-method')</label>
                                    <select name="payment_method_id" id="" class="form-control  @error('payment_method_id') is-invalid @enderror">
                                        <option value=""> الدفع </option>
                                    </select>
                                    @error('payment_method_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 ">
                    <div class="bg-white mb-3">
                        <div class="d-flex bg-gray2 border-bottom justify-content-between p-3">
                            <h4 class='h6 mb-0'>@lang('adminPanel.products') </h4>
                        </div>
                        <div class="content p-3">
                            <div class="repeater">
                                <div data-repeater-list="product">
                                    <div class="row mb-2 g-2 align-items-center" data-repeater-item>
                                        <div class="col-md-5">
                                            <select name="id" id="" class="form-control form-select select2 @error('product.id') is-invalid @enderror">
                                                <option value="" selected> @lang('adminPanel.choose-product')</option>
                                                @foreach($products as $product)
                                                <option value="{{$product->id}}"> {{$product->getName()}} </option>
                                                @endforeach
                                            </select>
                                            @error('product.id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <input name="amount" type="text" placeholder="@lang('adminPanel.amount')" class="form-control @error('product.amount') is-invalid @enderror">
                                            @error('product.amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
</div>
                                            <div class="col-md-3">
                                                <select name="copon_id" id="" class="form-control select2  @error('copon_id') is-invalid @enderror">
                                                    <option value="" selected> @lang('adminPanel.choose-copon')</option>
                                                    @foreach($copons as $copon)
                                                    <option value="{{$copon->id}}"> {{$copon->name}} </option>
                                                    @endforeach
                                                </select>
                                                @error('product.copon')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-1">
                                                <button class='delete border-0 bg-white' data-repeater-delete type="button">
                                                    <i class="uil uil-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                    <span data-repeater-create class='fs-13px'> + @lang('adminPanel.add-new-product')</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <div class="bg-white mb-3">
                            <div class="d-flex bg-gray2 border-bottom justify-content-between p-3">
                                <h4 class='h6 mb-0'>@lang('adminPanel.add-copons')</h4>
                            </div>
                            <div class="content p-3">
                                <select name="copon_id" id="" class="form-control select2  @error('copon_id') is-invalid @enderror">
                                    <option value="" selected> @lang('adminPanel.choose-copon')</option>
                                    @foreach($copons as $copon)
                                    <option value="{{$copon->id}}"> {{$copon->name}} </option>
                                    @endforeach
                                </select>
                                @error('copon_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

                <div class="bg-white p-3 text-center">
                    <button type="submit" class="btn btn-dark px-5">@lang('adminPanel.save') </button>
                </div>
        </form>

    </div>
</div>
<!--end container-->
@endsection

@section('script')

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ asset('assets/js/reapter.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection