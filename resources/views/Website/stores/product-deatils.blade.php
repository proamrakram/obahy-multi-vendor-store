@extends('Website.partials.layout')
@section('content')
    {{-- @livewireStyles

    @livewire('store.stores.store-product-details', [
        'store_type_slug' => $store_type_slug,
        'store_name_slug' => $store_name_slug,
        'product_id' => $product_id,
    ])
    @livewireScripts --}}


    {{-- <div class="heading-page mt-2" style="background-image: url('{{ asset('assets/images/women-topsection-en.png') }}')">
        <div class="container">
            <h1 class='h2'> {{ $store_type->store_type_name }}: {{ $store_admin->name }} </h1>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <img src="{{ asset('assets/images/icon/icon-brown-like.svg') }}" class='icon-like' alt="">
            <img src="{{ asset('assets/images/icon/icon-love-favorite.svg') }}" class='icon-love-favorite' alt="">
        </div>
    </div> --}}

    <div class="heading-page mt-2">
        <div class="container">
            <h1 class='h2'> {{ $store_type->store_type_name }}: {{ $store_admin->name }} </h1>
            <p> All costumes available to view </p>
            <img src="{{ asset('assets/images/icon/icon-brown-like.svg') }}" class='icon-like' alt="">
            <img src="{{ asset('assets/images/icon/icon-love-favorite.svg') }}" class='icon-love-favorite' alt="">

        </div>
    </div>

    {{--
    <nav aria-label="breadcrumb">
        <div class="container mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('customer.category', '0') }}">Categories</a></li>
                @foreach ($path_categorise as $category)
                    <li class="breadcrumb-item">
                        <a href="{{ route('customer.category', $category->id) }}">{{ $category->category_name }}
                        </a>
                    </li>
                @endforeach

                <li class="breadcrumb-item " aria-current="page">{{ $product->product_name }}</li>
            </ol>
        </div>
    </nav> --}}


    <nav aria-label="breadcrumb">
        <div class="container mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a
                        href="{{ route('customer.store-type-category', $store_type->slug) }}">{{ $store_type->store_type_name }}</a>
                </li>
                <li class="breadcrumb-item"><a
                        href="{{ route('customer.store-details', [$store_type_slug, $store_name_slug]) }}">{{ $store->store_name }}</a>
                </li>

                <li class="breadcrumb-item"><a
                        href="{{ route('customer.store-product-details', [$store_type_slug, $store_name_slug, $product->id]) }}">{{ $product->product_name }}</a>
                </li>
            </ol>
        </div>
    </nav>




    {{-- <a href="#" class='contact-now'>
        <img src="{{ asset('assets/images/icon/icon-msg.svg') }}" alt="">
    </a> --}}

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
                {{--
                <div class="col-md-6">
                    <div class="description-product">
                        <h1 class="h3 mb-0">{{ $product->product_name }}</h1>
                        <div class="star mt-2 mr-2 d-inline-block">

                            @foreach (range(1, 5) as $rate)
                                @if ($product->rates->pluck('rate_value')->avg() >= $rate)
                                    <i class="fas fa-star gold"></i>
                                @else
                                    <i class="fas fa-star gray"></i>
                                @endif
                            @endforeach

                        </div>
                        <span>({{ $product->comments->count() }})</span> <span>Comments</span>
                        <div class="available-store mt-3 mb-1">
                            <h3>${{ $product->product_price }}</h3>
                            <div class='d-flex align-items-center product-price'>
                                <p class='text-muted pr-2 mb-0'> Product Price </p>
                                <h3 class='text-gray font-weight-bold d-flex align-items-center position-relative'>
                                    ${{ $product->product_price }}
                                </h3>
                            </div>
                            <div class='d-flex align-items-center'>
                                <p class='text-muted pr-2 mb-0'> Wholesale Price </p>
                                <h3 class='text-dark font-weight-bold'> {{ $product->wholesale_price }}$ </h3>
                            </div>
                            @if ($product->in_stock)
                                <span class='text-green'>Available</span> <span> In Store</span>
                            @else
                                <span class='text-danger'>Unavailable</span> <span> In Store</span>
                            @endif
                        </div>
                        <p class='text-muted'>
                            {{ $product->product_description }}
                        </p>

                        <div class="size-available">
                            <h6>Sizes Available</h6>
                            <ul class="list-unstyled">
                                @foreach ($product->product_size as $size)
                                    <li class="d-inline-block mr-2">
                                        <a class="size" style="cursor: pointer;" id="#size">{{ $size }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

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

                        <div class="data-btn d-flex mt-3">

                            <div class="numbers-row mr-3">
                                <input type="text" name="qty" id="counter_number" value="1">
                            </div>

                            <a id="addToCart" style="line-height: 2; cursor: pointer; "
                                class='btn btn-primary btn-sm mr-3'><i class="fas fa-shopping-cart pr-2"></i> Add To Cart
                            </a>

                            @if (auth()->user())
                                @if (auth()->user()->user_type == 'customer')
                                    <a style="line-height: 2; cursor: pointer;"
                                        class="btn btn-outline-primary btn-sm qty favorite" product={{ $product->id }}>

                                        @if (favorite($product->id))
                                            <i class="fas fa-heart" style="color:red;" id="like"></i>
                                        @else
                                            <i class="far fa-heart" style="color:black;" id="like"></i>
                                        @endif
                                    </a>
                                @endif
                            @endif

                        </div>
                    </div>
                </div> --}}

                <div class="col-md-6">
                    <div class="description-product">
                        <h4 class='text-gray h6'> {{ $product->category->category_name }} </h4>
                        <h1 class="h3 mb-0">{{ $product->product_name }}</h1>
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

                        <div class="size-available">
                            <h6>Sizes Available</h6>
                            <ul class="list-unstyled">
                                @foreach ($product->product_size as $size)
                                    <li class="d-inline-block mr-2">
                                        <a class="size" style="cursor: pointer;" id="#size">{{ $size }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

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

                        <div class="data-btn d-flex mt-3">

                            <div class="numbers-row mr-3">
                                <input type="text" name="qty" id="counter_number" value="1">
                            </div>

                            <a id="addToCart" style="line-height: 2; cursor: pointer; "
                                class='btn btn-primary btn-sm mr-3'><i class="fas fa-shopping-cart pr-2"></i> Add To Cart
                            </a>

                            @if (auth()->user())
                                @if (auth()->user()->user_type == 'customer')
                                    <a style="line-height: 2; cursor: pointer;"
                                        class="btn btn-outline-primary btn-sm qty favorite" product={{ $product->id }}>

                                        @if (favorite($product->id))
                                            <i class="fas fa-heart" style="color:red;" id="like"></i>
                                        @else
                                            <i class="far fa-heart" style="color:black;" id="like"></i>
                                        @endif
                                    </a>
                                @endif
                            @endif


                        </div>

                    </div>
                </div>

            </div>
        </div>

        <section class="mt-5 mb-4 social-links">
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
            </div>
        </section>

        <section class="related-products pt-4">
            <div class="container">
                <h2 class='mb-4'> Related Products </h2>
                <div class="row">


                    @if ($product->product_type == 'ready_made')
                        @foreach ($related_products as $related_product)
                            <div class="col-md-3 col-6">
                                <div class="product-style-1 text-center mb-3">
                                    <div class="product-image">
                                        <a
                                            href="{{ route('customer.store-product-details', [$store_type_slug, $store_name_slug, $related_product->id]) }}">
                                            <img class="img-fluid" src="{{ $related_product->product_main_image }}"> </a>


                                        <div class="product-option">
                                            <span class="discount">-30%</span>
                                            <span class="add-to-wishlist">
                                                <a style="cursor: pointer;">
                                                    @if (auth()->user())
                                                        @if (auth()->user()->user_type == 'customer')
                                                            @if (favorite($related_product['id']))
                                                                <i class="fas fa-heart fa-lg rfavorite" id="rlike"
                                                                    style="color: red;"
                                                                    product={{ $related_product['id'] }}></i>
                                                            @else
                                                                <i class="far fa-heart fa-lg rfavorite" id="rlike"
                                                                    style="color: black;"
                                                                    product={{ $related_product['id'] }}></i>
                                                            @endif
                                                        @endif
                                                    @endif
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-content border pb-2">
                                        <h3 class="mb-1 mt-3 text-center h4"> <a
                                                href="{{ route('customer.store-product-details', [$store_type_slug, $store_name_slug, $related_product->id]) }}"
                                                class="text-dark text-decoration-none">{{ $related_product->product_name }}</a>
                                        </h3>
                                        <h4 class=" h6  text-center text-gray font-weight-bold">
                                            ${{ $related_product->product_price }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif


                    @if ($product->product_type == 'service')
                        @foreach ($related_products as $related_product)
                            <div class="col-md-3 col-6">
                                <div class="product-style-1 text-center">

                                    <div class="product-image border rounded">
                                        <a
                                            href="{{ route('customer.store-product-details', [$store_type_slug, $store_name_slug, $related_product->id]) }}">
                                            <img class="img-fluid" src="{{ $related_product->product_main_image }}">
                                        </a>
                                    </div>


                                    <div class="product-content">
                                        <h3 class="text-center mb-1 h4 font-weight-normal mt-3">
                                            <a href="{{ route('customer.store-product-details', [$store_type_slug, $store_name_slug, $related_product->id]) }}"
                                                class="text-dark text-decoration-none">
                                                {{ $related_product->product_name }}
                                            </a>
                                        </h3>
                                        <a href="#" class="btn btn-primary btn-sm-3 mt-1">Service Request</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif


                </div>
            </div>
        </section>

    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            let sizes = [];
            let colors = [];
            window.sessionStorage.setItem("sizes", JSON.stringify(sizes));
            window.sessionStorage.setItem("colors", JSON.stringify(colors));

            $('body').on('click', '.size', function() {

                var size = $(this);

                var sizes = JSON.parse(sessionStorage.getItem("sizes"));

                if (sizes.includes(size.text())) {
                    size.css('background-color', 'white');
                    size.css('color', 'black');

                    for (var i = 0; i < sizes.length; i++) {
                        if (sizes[i] === size.text()) {
                            sizes.splice(i, 1);
                            i--;
                        }
                        window.sessionStorage.setItem("sizes", JSON.stringify(sizes));
                    }
                } else {
                    sizes.push(size.text());
                    size.css('background-color', 'black');
                    size.css('color', 'white');
                    window.sessionStorage.setItem("sizes", JSON.stringify(sizes));
                }
                console.log(sizes);
            });


            $('body').on('click', '.color', function() {

                var color = $(this);

                var colors = JSON.parse(sessionStorage.getItem("colors"));

                if (colors.includes(color.attr('color'))) {
                    $(this).css({
                        "border-color": "",
                        "border-width": "",
                        "border-style": ""
                    });


                    for (var i = 0; i < colors.length; i++) {
                        if (colors[i] === color.attr("color")) {
                            colors.splice(i, 1);
                            i--;
                        }
                        window.sessionStorage.setItem("colors", JSON.stringify(colors));
                    }
                } else {
                    colors.push(color.attr("color"));
                    $(this).css({
                        "border-color": "red",
                        "border-width": "3px",
                        "border-style": "solid"
                    });
                    window.sessionStorage.setItem("colors", JSON.stringify(colors));
                }
                console.log(colors);
            });


            $('#addToCart').on('click', function() {

                var sizes = JSON.parse(sessionStorage.getItem("sizes"));
                var colors = JSON.parse(sessionStorage.getItem("colors"));
                var quantity = $("#counter_number");

                if (quantity.val() === '0') {
                    toastr.error("{{ __('Choose your quantity please, at leat 1 item !!') }}");
                    return false;
                }

                if (sizes.length === 0 && colors.length === 0) {
                    toastr.error("{{ __('Choose your size and color please !!') }}");
                    return false;
                }

                if (sizes.length === 0) {
                    toastr.error("{{ __('Choose your size please !!') }}");
                    return false;
                }

                if (colors.length === 0) {
                    toastr.error("{{ __('Choose your color please !!') }}");
                    return false;
                }

                $.ajax({
                    url: "{{ route('customer.cart.store', $product->id) }}",
                    type: "POST",
                    data: {
                        product_id: "{{ $product->id }}",
                        sizes: JSON.parse(sessionStorage.getItem("sizes")),
                        colors: JSON.parse(sessionStorage.getItem("colors")),
                        qty: quantity.val(),
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',

                    success: function(result) {
                        if (result.success) {
                            toastr.success(result.success);
                            $("#cart_count").text(result.count);
                        } else {
                            toastr.error("{{ __('an error occurs.') }}");
                        }
                    },
                    error: function(result) {
                        console.log(result.error);

                    }
                });
            });


            $('body').on('click', '.favorite', function() {

                var link = $(this);
                var product_id = link.attr("product");
                var like = $("#like");

                console.log(like);
                console.log(link);
                console.log(product_id);


                $.ajax({
                    url: "{{ route('customer.add.favorite') }}",
                    type: "POST",
                    data: {
                        product_id: product_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',

                    success: function(result) {

                        if (result.success) {
                            toastr.success(result.success);
                            console.log(result.success);
                            like.css('color', 'red');
                            like.removeClass("far");
                            like.addClass("fas");
                            like = null;
                            return true;
                        }

                        if (result.info) {
                            toastr.info(result.info);
                            like.css('color', 'black');
                            like.removeClass("fas");
                            like.addClass("far");
                            like = null;
                            return true;
                        }

                    },
                    error: function(result) {
                        console.log(result.error);
                    }
                });

            });



            $('body').on('click', '.rfavorite', function() {

                var link = $(this);

                var product_id = link.attr("product");

                $.ajax({
                    url: "{{ route('customer.add.favorite') }}",
                    type: "POST",
                    data: {
                        product_id: product_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',

                    success: function(result) {

                        if (result.success) {
                            toastr.success(result.success);
                            console.log(result.success);
                            link.css('color', 'red');
                            link.removeClass("far");
                            link.addClass("fas");
                            link = null;
                            return true;
                        }

                        if (result.info) {
                            toastr.info(result.info);
                            link.css('color', 'black');
                            link.removeClass("fas");
                            link.addClass("far");
                            link = null;
                            return true;
                        }

                    },
                    error: function(result) {
                        console.log(result.error);
                    }
                });
            });
        });
    </script>
@endsection
