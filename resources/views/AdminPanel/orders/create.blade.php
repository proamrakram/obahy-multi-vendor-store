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

        <form method="post" action="{{ route('admin.orders.store') }}" enctype="multipart/form-data">
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
                                <div class="col-6"><input type="date"  value="{{old('order_date')}}"  name="order_date" class="date form-control @error('order_date') is-invalid @enderror">

                                    @error('order_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-6"><input type="time"  value="{{old('order_time')}}"  name="order_time" class="date form-control @error('order_time') is-invalid @enderror">

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
                            <select name="status" id="" class="form-control  @error('status') is-invalid @enderror">
                                <option value="awaiting_payment" @if(old('status') == 'awaiting_payment') selected @endif> @lang('adminPanel.awaiting-payment')</option>
                                <option value="underway"  @if(old('status') == 'underway') selected @endif> @lang('adminPanel.underway')</option>
                                <option value="done"  @if(old('status') == 'done') selected @endif> @lang('adminPanel.done')</option>
                                <option value="delivery_in_progress"  @if(old('status') == 'delivery_in_progress') selected @endif> @lang('adminPanel.delivery-in-progress')</option>
                                <option value="delivered"  @if(old('status') == 'delivered') selected @endif> @lang('adminPanel.delivered')</option>
                                <option value="reference"  @if(old('status') == 'reference') selected @endif> @lang('adminPanel.reference')</option>
                                <option value="canceled" @if(old('status') == 'canceled') selected @endif > @lang('adminPanel.canceled')</option>
                            </select>
                            @error('status')
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
                                <option value="{{$customer->id}}"  @if(old('customer_id') == $customer->id) selected @endif> {{$customer->name}}</option>
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
                                    <input name="shipping_price" value="{{old('shipping_price')}}" type="text" class="form-control  @error('shipping_price') is-invalid @enderror">
                                    @error('shipping_price')
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
                                        
                                        @foreach($payment_methods as $p)
                                                <option value="{{$p->id}}"  @if(old('payment_method_id') == $p->id) selected @endif> {{$p->getName()}} </option>
                                                @endforeach
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

                <div class="col-md-12 ">
                    <div class="bg-white mb-3">
                        <div class="d-flex bg-gray2 border-bottom justify-content-between p-3">
                            <h4 class='h6 mb-0'>@lang('adminPanel.products') </h4>
                        </div>
                        <div class="content p-3">
                            <div class="repeater">
                                <div data-repeater-list="product">@if(is_null(old('product')))
                                <div class="row mb-2 g-2 align-items-center" data-repeater-item>
                                        <div class="col-md-6">
                                            <select name="id" id="" class="form-control form-select select2 @error('product.id') is-invalid @enderror">
                                                <option value="" selected> @lang('adminPanel.choose-product')</option>
                                                @foreach($products as $product)
                                                <option value="{{$product->id}}" > {{$product->getName()}} </option>
                                                @endforeach
                                            </select>
                                            @error('product.id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <input name="amount" type="text" placeholder="@lang('adminPanel.amount')" class="form-control @error('product.amount') is-invalid @enderror">
                                            @error('product.amount')
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
                                @else
                                <?php $i=0;?>
                                    @foreach(old('product') as $old_product)
                                    <div class="row mb-2 g-2 align-items-center" data-repeater-item>
                                        <div class="col-md-6">
                                            <select name="id" id="" class="form-control form-select select2 @error('product.'.$i.'.id') is-invalid @enderror">
                                                <option value="" selected> @lang('adminPanel.choose-product')</option>
                                                @foreach($products as $product)
                                                <option value="{{$product->id}}" @if(array_key_exists('id', $old_product) && $old_product['id'] == $product->id)) selected @endif> {{$product->getName()}} </option>
                                                @endforeach
                                            </select>
                                            @error('product.'.$i.'.id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <input name="amount" type="text" value="{{$old_product['amount']}}" placeholder="@lang('adminPanel.amount')" class="form-control @error('product.'.$i.'.amount') is-invalid @enderror">
                                            @error('product.'.$i.'.amount')
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
                                    <?php $i++;?>
                                    @endforeach
                                    
@endif
                                </div>
                                <span data-repeater-create class='fs-13px'> + @lang('adminPanel.add-new-product')</span>
                            </div>
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