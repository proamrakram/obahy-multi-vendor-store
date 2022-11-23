@extends('Website.partials.layout')
@section('content')
    @livewireStyles

    <div class="heading-page mt-2">
        <div class="container">
            <h1 class="h2"> {{ $store_type->store_type_name }}: {{ $store_admin->name }} </h1>
            <img src="{{ asset('img/icons/icon-brown-like.svg') }}" class="icon-like" alt="">
            <img src="{{ asset('img/icons/icon-love-favorite.svg') }}" class="icon-love-favorite" alt="">
        </div>
    </div>


    <nav aria-label="breadcrumb">
        <div class="container mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb  mb-0">
                    <li class="breadcrumb-item"><a
                            href="{{ route('customer.store-type-category', $store_type->slug) }}">{{ $store_type->store_type_name }}</a>
                    </li>
                    <li class="breadcrumb-item"><a
                            href="{{ route('customer.store-details', [$store_type_slug, $store_name_slug]) }}">{{ $store->store_name }}</a>
                    </li>
                    <li class="breadcrumb-item active"><a
                            href="{{ route('customer.store-product-details', [$store_type_slug, $store_name_slug, $product->id]) }}">{{ $product->product_name }}</a>
                    </li>
                </ol>
            </nav>

            <h2 class='h4 mb-5'> {{ $store_type->store_type_name }}: {{ $store_admin->name }} </h2>
        </div>
    </nav>


    <a href="#" class='contact-now'>
        <img src="{{ asset('img/icons/icon-msg.svg') }}" alt="">
    </a>

    <div class="singe-product mt-3 pb-5">
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <div class="product-details-images">
                        <div class="row row-sm">
                            <div class="col-md-2 sm-col">
                                <div class="small-img-product">

                                    <img class="img-fluid img-cover mb-2" src="{{ $product->product_main_image }}">

                                    @foreach ($product->images as $image)
                                        <img class="img-fluid img-cover mb-2" src="{{ $image->image }}">
                                    @endforeach

                                </div>
                            </div>
                            <div class="col-md-10 sm-col">
                                <div class="big-img-product">
                                    <img class="img-fluid img-cover" src="{{ $product->product_main_image }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="description-product">
                        <h1 class="h3 mb-0 text-gray">{{ $store->store_name }}</h1>
                        <div class="d-flex justify-content-between w-75">
                            <h3 class="h5">{{ $store->store_name }} {{ $store->id }}</h3>
                            <h3 class="h5">{{ $product->product_name }}</h3>
                        </div>
                        <div class="star mt-2 mr-2 d-inline-block">
                            @foreach (range(1, 5) as $rate)
                                @if ($product->rates->pluck('rate_value')->avg() >= $rate)
                                    <i class="fas fa-star gold"></i>
                                @else
                                    <i class="fas fa-star gray"></i>
                                @endif
                            @endforeach
                        </div>
                        <div class="available-store mt-3 mb-1">
                            <h3>${{ $product->product_price }}</h3>
                            @if ($product->in_stock)
                                <span class='text-green'>Available</span> <span> In Store</span>
                            @else
                                <span class='text-danger'>Unavailable</span> <span> In Store</span>
                            @endif
                        </div>
                        <p class='text-muted'>
                            {{ $product->product_description }}
                        </p>
                        <div class="color-available mt-4">
                            <h6>Colors Available</h6>
                            <ul class="list-unstyled">
                                @foreach ($product->colors as $color)
                                    <li class="d-inline-block mr-2">
                                        <a class="color" color="{{ $color->color_code }}"
                                            style="background: {{ $color->color_code }}; cursor: pointer; "></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="data-btn  mt-3">
                            <a href="#" style="line-height: 2;" class='btn btn-primary btn-sm d-block mb-2'><i
                                    class="fas fa-shopping-cart pr-2"></i> Add To Cart </a>
                        </div>

                    </div>
                </div>


            </div>
        </div>

        <div class="design-options product-tabs pt-4  mt-0 mt-md-4">
            <div class="container">
                <ul class="nav nav-pills mb-3 tabs-ul" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                            aria-controls="pills-home" aria-selected="true">Design Options</a>
                    </li>
                </ul>
                <div class="row mt-5">
                    <div class="col-md-4 ">
                        <h4 class='h5'> Fabric options </h4>
                        <div class="one-slide">
                            <div class="owl-carousel">

                                <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ $custom->fabric_image }}" class='img-fluid' alt="">
                                    </div>
                                </div>

                                {{-- <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ asset('assets/images/img-Fabricoptions.png') }}" class='img-fluid'
                                            alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ asset('assets/images/img-Fabricoptions.png') }}" class='img-fluid'
                                            alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ asset('assets/images/img-Fabricoptions.png') }}" class='img-fluid'
                                            alt="">
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <h4 class='h5'> Embroidery options </h4>
                        <div class="one-slide">
                            <div class="owl-carousel">
                                <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ $custom->embroidery_image }}" class='img-fluid' alt="">
                                    </div>
                                </div>

                            </div>
                            <!-- <div class="navSlider"></div> -->
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <h4 class='h5'> Accessory Options </h4>
                        <div class="one-slide">
                            <div class="owl-carousel">

                                <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ $custom->accessories_image }}" class='img-fluid' alt="">
                                    </div>
                                </div>

                            </div>
                            <!-- <div class="navSlider"></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="model-options pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <h4 class='h5'> Model Options </h4>
                        <div class="one-slide">
                            <div class="owl-carousel">
                                <div class="item">
                                    <img src="{{ asset('assets/images/ModelOptions.png') }}" class='img-fluid'
                                        alt="">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('assets/images/ModelOptions.png') }}" class='img-fluid'
                                        alt="">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('assets/images/ModelOptions.png') }}" class='img-fluid'
                                        alt="">
                                </div>
                                <div class="item">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="content pl-md-5 pl-0 mt-md-2 mt-4">
                            <h4 class="h5">Design details</h4>
                            <p>Lorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consecteturLorem ipsum dolor
                                sit amet consectetur adipisicing elit. Eaque, maiores!</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, maiores! t amet
                                consecteturLorem ipsum dolor sit amet consect amet consecteturLorem ipsum dolor sit amet
                                consec</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, maiores! t amet
                                consecteturLorem ipsum dolor sit amet consec</p>
                            <h4 class="h5 mt-4">Special order policy</h4>
                            <p>Lorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consecteturLorem ipsum dolor
                                sit amet consectetur adipisicing elit. Eaque, maiores!</p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, maiores! t amet
                                consecteturLorem ipsum dolor sit amet consect amet consecteturLorem ipsum dolor sit amet
                                consec
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, maiores! t amet
                                consecteturLorem ipsum dolor sit amet consec
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pt-5 product-tabs">
            <ul class="nav nav-pills mb-3 tabs-ul" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" aria-selected="true">Designer notes</a>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <p>{{ $custom->other_size_notes }}</p>
            </div>
        </div>

        <!-- Modal Modal Add Comments -->
        <div class="modal fade" id="addComment" tabindex="-1" aria-labelledby="EditDataUser" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-clr-dark text-white">
                        <h5 class="modal-title" id="EditDataUserLabel"> Add Review </h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
                        <form action="" method="">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group mb-2">
                                <textarea name="" id="" class="form-control" placeholder="Enter Your Comment" row="8"></textarea>
                            </div>

                            <div class="rating-5 d-flex align-items-center py-4">
                                <h4 class='h6 pr-4'> Rating from 1 to 5 </h4>
                                <div class="numbers">
                                    <a href="#" class='btn btn-outline-primary btn-sm-3 '> 1 </a>
                                    <a href="#" class='btn btn-outline-primary btn-sm-3 '> 2 </a>
                                    <a href="#" class='btn btn-outline-primary btn-sm-3 '> 3 </a>
                                    <a href="#" class='btn btn-outline-primary btn-sm-3 '> 4 </a>
                                    <a href="#" class='btn btn-outline-primary btn-sm-3 '> 5 </a>
                                </div>
                            </div>

                            <div class="btn-comlete-proccess d-flex justify-content-center  mt-3 mb-2">
                                <input type="submit" class='btn btn-primary btn-sm' value="Add Comment">
                                <button type="button" class="btn btn-outline-primary ml-3 btn-sm"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Add Comments -->

        <section class="mt-5 mb-4 social-links text-center">
            <div class="container">
                <h4 class='mb-3'>Share</h4>
                <ul class="list-unstyled">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-behance"></i></a>
                    <a href="#"><i class="far fa-futbol"></i></a>
                </ul>


                <a href="#" style="line-height: 2;" class='btn btn-outline-primary mt-4 '> Back to the fashion
                    designer's page </a>
            </div>
        </section>

    </div>
@endsection
