@extends('Website.partials.layout')
@section('content')
    <!-- Start Hero Section -->

    <section class="hero-section pt-5">
        <div class="container">
            <div class="row row-sm">

                <div class="col-md-8 col-sm">
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('assets/images/bg-leftheader2.jpg') }}" />
                    </a>
                </div>

                <div class="col-md-4 col-sm">
                    <div class="hero-section-right d-flex d-md-block mt-2 mt-md-0">
                        <div class="intro-sm-img  col-md-12 col-6   position-relative">
                            <div
                                class="p-3 p-md-4 text h-100 d-flex align-items-end justify-content-between position-relative">
                                <h5 class="h6-hero"><a href="#" class='text-white text-decoration-none'>
                                        Designer Stars </a></h5>
                                <a href="#" class="icon-hero">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                            <a href="#" class='link-img'>
                                <img src="{{ asset('assets/images/bg_img_intor1.png') }}" class='img-fluid' alt="">
                            </a>
                        </div>
                        <div class="intro-sm-img col-md-12  col-6  position-relative">
                            <div
                                class="p-3 p-md-4  text h-100 d-flex align-items-end justify-content-between position-relative">
                                <h5 class="h6-hero"> <a href="#" class='text-white text-decoration-none'> Trade
                                        Mark </a> </h6>
                                    <a href="#" class="icon-hero">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                            </div>
                            <a href="#" class='link-img'>
                                <img src="{{ asset('assets/images/img_bg_into2.png') }}" class='img-fluid' alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End Hero Section -->

    <!-- Start Special Section -->
    <section class="container mt-md-5">
        <div class="special-section pt-md-0 pt-4">
            <div class="row">
                <div class="col-md-8 col-sm">
                    <div class="special-left h-100 d-md-flex d-block justify-content-center flex-column pl-md-5 pl-0">
                        <h2>Special Sections</h2>
                        <a href="#" class="btn btn-outline-primary mt-2  align-self-baseline btn-sm">Start
                            Now</a>
                    </div>
                </div>
                <div class="col-md-4 col-sm">
                    <div class="">
                        <img class="mx-auto w-75 d-block pt-3 pr-5" src="{{ asset('assets/images/img-specialleft.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End Special Section -->
    <!-- Start Experts -->

    <section class="experts pt-5 mb-4">
        <div class="container">
            <div class="row">

                @forelse ($stores_types as $store_type)
                    <div class="col-md-4">
                        <div class="product-cat text-center mb-3">
                            <a href="{{ route('customer.store-type-category', $store_type->slug) }}">
                                <img class="img-fluid mb-3" src="{{ $store_type->image }}">
                            </a>
                            <a href="{{ route('customer.store-type-category', $store_type->slug) }}"
                                class="btn btn-outline-primary">{{ $store_type->store_type_name }}</a>
                        </div>
                    </div>
                @empty
                    <div class="col-md-4">
                        <div class="product-cat text-center mb-3">
                            <a href="#">
                                <img class="img-fluid mb-3" src="{{ $store_type->image }}">
                            </a>
                            <a href="{{ route('appearance_expert.store-appearance-expert') }}"
                                class="btn btn-outline-primary">Appearance Experts</a>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
    <!-- End Experts -->

    <!-- Start Wedding Guest -->
    <section class="wedding-guest pt-0 pt-md-5 pb-md-5 pb-3">
        <div class="container">
            <a href="#">
                <img class="img-fluid" src="{{ asset('assets/images/wedding-guest.png') }}">
            </a>
        </div>
    </section>
    <!-- End Wedding Guest -->

    <!-- Start New Design -->
    <section class="new-design mt-4 pb-3">
        <div class="container">
            <div class="heading-section mb-4 pb-2">
                <h3> <span>New Design </span> </h3>
            </div>
            <div class="row">

                @foreach ($custom_made_products->random($custom_made_products->count() > 3 ? 3 : $custom_made_products->count()) as $custom_made_product)
                    <div class="col-md-4 col-6">
                        <div class="product-style-1 text-center">
                            <div class="product-image">
                                <a href="{{ route('customer.single-product', $custom_made_product->id) }}"> <img
                                        class="img-fluid" src="{{ $custom_made_product->product_main_image }}">
                                </a>
                                <div class="product-option">
                                    <span class="discount">-30%</span>
                                </div>
                            </div>
                            <div class="star mt-2 text-center">
                                @foreach (range(1, 5) as $rate)
                                    @if ($custom_made_product->rates->pluck('rate_value')->avg() >= $rate)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star gray"></i>
                                    @endif
                                @endforeach
                                {{-- <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i> --}}
                            </div>
                            <div class="product-content">
                                <h3 class="mb-1 text-center h4"> <a
                                        href="{{ route('customer.single-product', $custom_made_product->id) }}"
                                        class='text-dark text-decoration-none'>
                                        {{ $custom_made_product->product_name }}
                                    </a> </h3>
                                <h4 class=" h6  text-center text-gray font-weight-bold">
                                    ${{ $custom_made_product->product_price }}
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End New Design -->

    <!-- Start Shoping -->

    <section class="shoping-cats mt-5 pb-3 slider-style-1">
        <div class="container">

            <div class="heading-section mb-4 pb-2">
                <h3> <span>Shopping Categories </span> </h3>
            </div>
            <div class="owl-carousel">

                @foreach ($categorise as $category)
                    <div class="item">
                        <div class="product-style-1 text-center">
                            <div class="product-image border rounded">
                                <a href="{{ route('customer.category', $category->id) }}">
                                    <img class="img-fluid" src="{{ $category->category_image }}">
                                </a>
                            </div>
                            <div class="product-content">
                                <h3 class="text-center mb-1 h4 font-weight-normal mt-3">{{ $category->category_name_en }}
                                </h3>
                                <a href="{{ route('customer.category', $category->id) }}"
                                    class="btn btn-outline-primary btn-sm mt-1">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="navSlider"></div>
        </div>
    </section>
    <!-- End Shoping -->

    <!-- Start Newly Arrived -->
    <section class="newly-arrived mt-4 pb-3">
        <div class="container">
            <div class="heading-section mb-4 pb-2">
                <h3> <span>New Design </span> </h3>
            </div>
            <div class="row">
                @foreach ($new_products as $new_product)
                    <div class="col-md-4 col-6">
                        <div class="product-style-1 text-center mb-4">
                            <div class="product-image">
                                <a href="{{ route('customer.single-product', $new_product->id) }}"> <img
                                        class="img-fluid" src="{{ $new_product->product_main_image }}"> </a>
                                <div class="product-option">
                                    <span class="discount">-30%</span>
                                </div>
                            </div>
                            <div class="star mt-2 text-center">
                                @foreach (range(1, 5) as $rate)
                                    @if ($new_product->rates->pluck('rate_value')->avg() >= $rate)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star gray"></i>
                                    @endif
                                @endforeach

                            </div>
                            <div class="product-content">
                                <h3 class="mb-1 text-center h4"> <a
                                        href="{{ route('customer.single-product', $new_product->id) }}"
                                        class='text-dark text-decoration-none'>
                                        {{ $new_product->product_name }} </a> </h3>
                                <h4 class=" h6  text-center text-gray font-weight-bold">
                                    ${{ $new_product->product_price }}
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Newly Arrived -->

    <!-- Start Latest Fabrics -->
    <section class="latest-fabrics mt-4 pb-4">
        <div class="container">
            <div class="heading-section mb-4 pb-2">
                <h3> <span>Latest Fabrics </span> </h3>
            </div>
            <div class="row">
                @foreach ($latest_fabrics_products as $product)
                    <div class="col-md-4 col-6">
                        <div class="product-style-1 text-center mb-3">
                            <div class="product-image">
                                <a href="{{ route('customer.single-product', $product->id) }}"> <img class="img-fluid"
                                        src="{{ $product->product_main_image }}"> </a>
                            </div>
                            <div class="star mt-2 text-center">
                                @foreach (range(1, 5) as $rate)
                                    @if ($product->rates->pluck('rate_value')->avg() >= $rate)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star gray"></i>
                                    @endif
                                @endforeach
                            </div>
                            <div class="product-content">
                                <h3 class="mb-1 text-center h4"> <a
                                        href="{{ route('customer.single-product', $product->id) }}"
                                        class='text-dark text-decoration-none'>
                                        {{ $product->product_name }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End New Design -->

    <!-- Start Your Design -->

    <section class="your-design mt-md-5 mt-0 pt-0 pt-md-3 pb-2 pb-md-5 mb-3">
        <div class="container">
            <div class="heading-section mb-md-4 mb-1 pb-2 ">
                <h3> <span>Start your design </span> </h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="pr-md-5 pr-0">
                        <form>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                                <label class="form-check-label" for="autoSizingCheck">Email</label>
                            </div>
                            <input type="email" value="{{ old('form') }}"
                                class="form-control btn-block rounded-0 mt-1 mb-2 " id="inputEmail3">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                                <label class="form-check-label" for="autoSizingCheck">Short SMS</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Subscription Now</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="yourdesign-section2 mb-md-4 mb-0 mt-md-0 mt-3">
                        <h2 class='h6 text-gray'>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                                    <label class="form-check-label" for="autoSizingCheck">Royal Design</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                                    <label class="form-check-label" for="autoSizingCheck">Modern Design</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                                    <label class="form-check-label" for="autoSizingCheck">Heritage Design</label>
                                </div>
                            </div>
                        </div>
                        <p class='mt-4'>
                            Lorem ipsum dolor sit amet <span class="font-weight-bold">consectetur adipisicing
                                elit.</span> Maxime mollitia,
                            molestiae quas vel sint commodi repudiandae.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
