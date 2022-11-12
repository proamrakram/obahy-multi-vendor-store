@extends('Website.partials.layout')
@section('content')
    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('customer.home-page') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </div>
    </nav>

    <!-- Start step Tabs -->
    <div class="steps-btns mb-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex align-items-center step-btn active ">
                        <i class="far fa-check-circle pr-3"></i>
                        Shopping cart
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center step-btn  ">
                        <i class="far fa-check-circle pr-3"></i>
                        Checkout
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center step-btn  ">
                        <i class="far fa-check-circle pr-3"></i>
                        Order Complete
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End step Tabs -->

    <!-- Start Steps Content -->
    <div class="steps-content mb-4">
        <div class="container">
            <h2 class='step-content-title mb-4'>Shopping cart</h2>
            <div class="row">
                <div class="col-md-8">

                    <!-- Start Box Product -->
                    @foreach ($cart_items as $cart_item)
                        <div class="step-content-products p-2 rounded border mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="step-content-product-box d-flex align-items-center mb-3 mb-md-0">
                                        <img src="{{ App\Models\Product::where('id', $cart_item->id)->first()->product_main_image }}"
                                            class='rounded img-fluid' alt="">
                                        <div class="cotent pl-2">
                                            <h3 class='h5'> {{ $cart_item->name }}</h3>
                                            <p class='m-0'>
                                                You Get a Day :
                                                <span class='text-secondry'> thursday 28 February </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-2 col-4">
                                    <div class="price d-flex align-items-center flex-column justify-content-center h-100">
                                        <div class="regular-price ">
                                            <span> {{ $cart_item->price }} </span>
                                            <span class="currency font-weight-bold"> $ </span>
                                        </div>
                                        <div class="discount-price">
                                            <span> <del> {{ $cart_item->price }} </del> </span>
                                            <span class="currency"> <del> $ </del> </span>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-2 col-4">
                                    <div
                                        class="step-content-product-box h-100 d-flex align-items-center flex-column justify-content-center">
                                        <div class="numbers-row ">
                                            <input type="text" product="{{ $cart_item->id }}"
                                                row="{{ $cart_item->rowId }}" name="counter_number" id="counter_number"
                                                value="{{ $cart_item->qty }}">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-2 col-4">
                                    <div class="close-product h-100 d-flex align-items-center justify-content-end pr-2">
                                        <a href="{{ route('customer.cart.remove', $cart_item->rowId) }}"> <i
                                                class="fas fa-times-circle"></i> </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach

                    <!-- End Box Product -->

                </div>
                <div class="col-md-4">
                    <div class="cart-total border p-3 rounded">
                        <h3 class='h5 mb-3'> Cart Totals </h3>
                        <div class="form-coupon mb-3">
                            <form action="">
                                <input type="text" placeholder="Enter the discount code or coupon" class='form-control'>
                                <input type="submit" value="Enter">
                            </form>
                        </div>
                        <div class="cart-totals-inner mb-4">
                            <div class="text d-flex justify-content-between mb-2">
                                <span> Sub Total ({{ Cart::content()->count() }}) </span>
                                <span> <b id="subtotal"> {{ Cart::subtotal() }} $ </b> </span>
                            </div>
                            <div class="text d-flex justify-content-between">
                                <span> Additional cost </span>
                                <span> <b> 0 $ </b> </span>
                            </div>
                            <hr>
                            <div class="text d-flex justify-content-between text-dark">
                                <h4 class='h5'> Total </h4>
                                <h5 id="total"> {{ Cart::total() }} $ </h5>
                            </div>
                        </div>

                        <a href="#" class="btn btn-primary d-block"> Proceed To Checkout </a>
                    </div>
                </div>
            </div>
            <!--/End Row -->

            <div class="row">
                <div class="col-md-8">
                    <div class="btn-comlete-proccess d-flex justify-content-end mt-5 mb-3">
                        <a href="{{ route('customer.checkout.index') }}" class='btn btn-primary'> Proceed To Checkout </a>
                        <a href="{{ route('customer.category', '0') }}" class='btn btn-outline-primary ml-3 '> Continue
                            shopping </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Steps Content -->
@endsection


@section('script')
    <script>
        $('body').on('click', '.inc', function() {
            var button = $(this);
            var quantity = button.parent().find("input");
            var product_id = quantity.attr("product");
            var row = quantity.attr("row");

            if (quantity.val() === '0') {
                toastr.error("{{ __('Choose your quantity please, at leat 1 item !!') }}");
                quantity.val('1');
                return false;
            }

            updateCart(product_id, quantity.val(), row);

        });

        $('body').on('click', '.dec', function() {

            var button = $(this);
            var quantity = button.parent().find("input");
            var product_id = quantity.attr("product");
            var row = quantity.attr("row");

            if (quantity.val() === '0') {
                toastr.error("{{ __('Choose your quantity please, at leat 1 item !!') }}");
                quantity.val('1');
                return false;
            }

            updateCart(product_id, quantity.val(), row);

        });


        function updateCart(product_id, quantity, rowId) {
            $.ajax({
                url: "{{ route('customer.cart.update') }}",
                type: "POST",
                data: {
                    product_id: product_id,
                    rowId: rowId,
                    qty: quantity,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {

                    if (result.total) {
                        $("#total").text(result.total);
                    }

                    if (result.subTotal) {
                        $("#subtotal").text(result.subTotal);
                    }

                    $("#cart_count").text("{{ cart_count() }}");

                    if (result.success) {
                        toastr.success(result.success);
                        return true;
                    }

                    if (result.info) {
                        toastr.info(result.info);
                        return true;
                    }
                    toastr.error("{{ __('an error occurs.') }}");
                    return false;
                },

                error: function(result) {
                    return result.error;
                }
            });
        }
    </script>
@endsection
