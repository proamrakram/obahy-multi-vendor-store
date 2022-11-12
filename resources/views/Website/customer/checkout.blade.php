@extends('Website.partials.layout')
@section('content')
    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('customer.home-page') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                <li class="breadcrumb-item active" aria-current="page"> Checkout </li>
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
                    <div class="d-flex align-items-center step-btn  active">
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
            <h2 class='step-content-title mb-4'>Checkout</h2>
            <div class="row no-gap no-gutters">
                <div class="col-md-8">
                    <h3 class="h5 p-3 bg-gray mb-4"> Billing Details </h3>
                    <div class="form-checkout pr-0 pr-md-5 mr-0 mr-md-5 border-right">
                        <form action="" method="" class=''>
                            <div class="row row-sm ">
                                <div class="col-6 sm-col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-6 sm-col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-12 sm-col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Address">
                                    </div>
                                </div>
                                <div class="col-6 sm-col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-6 sm-col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Country">
                                    </div>
                                </div>
                                <div class="col-12 sm-col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Zip Code">
                                    </div>
                                </div>
                                <div class="col-12 sm-col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-12 sm-col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12 sm-col">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input"
                                                id="customControlAutosizing">
                                            <label class="custom-control-label" for="customControlAutosizing">Remember this
                                                data</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="btn-comlete-proccess d-flex  mt-5 mb-3">
                                <a href="#" class='btn btn-primary'> Proceed To Checkout </a>
                                <a href="{{ route('customer.category', '0') }}" class='btn btn-outline-primary ml-3 '>
                                    Continue shopping </a>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="h5 p-3 bg-gray mb-4"> Your Order </h3>
                    <div class="box-your-order d-flex flex-column  justify-content-between h-75">
                        <div class="products-your-order mb-3">


                            @foreach ($cartitems as $cartitem)
                                <div class="your-order d-flex align-items-center mb-3">

                                    <a href="{{ route('customer.single-product', $cartitem->id) }}">
                                        <img src="{{ asset('assets/images/img_you_order.png') }}" class='img-fluid rounded'
                                            alt="">
                                    </a>

                                    <div class="info-your-order pl-3">

                                        <h4 class='h6 mb-0'>
                                            <a href="{{ route('customer.single-product', $cartitem->id) }}"
                                                class="text-dark"> {{ $cartitem->name }}</a>
                                        </h4>

                                        <div class="stars">
                                            @foreach (range(1, 5) as $rate)
                                                @if ($products->where('id', $cartitem->id)->first()->rates->pluck('rate_value')->avg() >= $rate)
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endforeach
                                        </div>

                                        <b class="d-block"> {{ $cartitem->price }} $</b>

                                    </div>

                                </div>
                            @endforeach


                        </div>
                        <div class="cart-totals-inner mb-4">
                            <div class="text d-flex justify-content-between mb-2">
                                <span> Sub Total ({{ $cartitems->count() }}) </span>
                                <span> <b> {{ Cart::subtotal() }} $ </b> </span>
                            </div>
                            <div class="text d-flex justify-content-between">
                                <span> Additional cost </span>
                                <span> <b> 0 $ </b> </span>
                            </div>
                            <hr>
                            <div class="text d-flex justify-content-between text-dark">
                                <h4 class='h5'> Total </h4>
                                <h5> {{ Cart::total() }} $ </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Steps Content -->
@endsection
