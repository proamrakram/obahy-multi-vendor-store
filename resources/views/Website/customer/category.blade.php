@extends('Website.partials.layout')
@section('content')
    {{-- @livewireStyles

    @livewire('products', ['category_id' => $category_id])

    @livewireScripts --}}

    <div class="heading-page mt-2" style="background-image: url('{{ asset('assets/images/women-topsection-en.png') }}')">
        <div class="container">
            @if ($category)
                <h1 class='h2'> {{ $category->category_name }} </h1>
            @else
                <h1 class='h2'> Categorise </h1>
            @endif
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <img src="{{ asset('assets/images/icon/icon-brown-like.svg') }}" class='icon-like' alt="">
            <img src="{{ asset('assets/images/icon/icon-love-favorite.svg') }}" class='icon-love-favorite' alt="">
        </div>
    </div>

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

            </ol>
        </div>
    </nav>



    <!-- Start Page Category -->
    <section class="main-category">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar sidebar-cats pb-3 border mb-3">
                        <div class="open-sidebar text-center pt-3"> Open Sidebar </div>
                        <div class="open-sidebar-box pt-3">


                            <div class="widget-sidebar">
                                <h3 class="h5 px-3 colos">Department Shopping</h3>
                                <ul class="p-3 list-unstyled ">
                                    @foreach ($categorise as $category)
                                        <x-category-item :category="$category"></x-category-item>
                                    @endforeach
                                </ul>
                            </div>

                            <hr class="">
                            <!-- Start Slider Range -->

                            <div class="widget-sidebar widget-range px-3 pb-4" id="slidertest">
                                <div class="price-range-block">
                                    <h3 class="h5 pt-2 pb-4">Price</h3>

                                    <div class="slidecontainer">
                                        <input type="range" min="0" class='range-slider' max="100"
                                            value="50" id="myTextBox" step="20" list="volsettings" data-grid="true"
                                            data-type="double" data-min="0" data-max="1000" data-from="0" data-to="500">
                                    </div>

                                </div>
                            </div>

                            <!-- End Slider Range -->
                            <hr class=" ">

                            <div class="widget-sidebar px-3 pb-3 ">
                                <h3 class="h5 pt-2 pb-3">Tags </h3>
                                <div class="tags">
                                    <a class=" w-auto mt-2" href="#">Dresses 1</a>
                                    <a class=" w-auto mt-2" href="#">Dresses 2</a>
                                    <a class=" w-auto mt-2" href="#">Dresses 3</a>
                                    <a class=" w-auto mt-2" href="#">Dresses 4</a>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

                <div class="col-md-9">
                    @if ($products->count() > 0)

                        <div class="row search-product"></div>

                        <div class="row default-products">
                            @foreach ($products as $product)
                                <div class="col-md-4 col-6">
                                    <div class="product-style-1 text-center mb-3">
                                        <div class="product-image">
                                            <a href="{{ route('customer.single-product', $product['id']) }}"> <img
                                                    class="img-fluid" src="{{ asset('assets/images/women-dress.png') }}">
                                            </a>
                                            <div class="product-option">
                                                <span class="discount">-30% </span>

                                                <span class="add-to-wishlist">
                                                    <a style="cursor: pointer;">

                                                        @if (auth()->user())
                                                            @if (auth()->user()->user_type == 'customer')
                                                                @if (favorite($product['id']))
                                                                    <i class="fas fa-heart fa-lg favorite" id="like"
                                                                        style="color: red;"
                                                                        product={{ $product['id'] }}></i>
                                                                @else
                                                                    <i class="far fa-heart fa-lg favorite" id="like"
                                                                        style="color: black;"
                                                                        product={{ $product['id'] }}></i>
                                                                @endif
                                                            @endif
                                                        @endif

                                                    </a>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="product-content border pb-2">
                                            <h3 class="mb-1 mt-3 text-center h4">
                                                <a href="{{ route('customer.single-product', $product['id']) }}"
                                                    class='text-dark text-decoration-none'>
                                                    {{ $product['product_name_ar'] ?? $product['product_name_en'] }}
                                                </a>
                                            </h3>
                                            <h4 class=" h6  text-center text-gray font-weight-bold">
                                                ${{ $product['product_price'] }}</h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    @else
                        <h3>There is no Products</h3>
                    @endif
                </div>

            </div>
        </div>
    </section>


    <!-- End Page Category -->

    <nav   aria-label="Page navigation example">

        <ul  class="pagination justify-content-center mt-5 mb-4 pagination-search">
            {{ $products->links() }}
        </ul>
    </nav>


@endsection



@section('script')
    <script type="text/javascript">
        window.onload = function() {
            let button = document.getElementById('slidertest');

            button.addEventListener('mouseup', function() {

                $irsfrom = $(".irs-from").text();
                $irsto = $(".irs-to").text();

                console.log($irsto);
                console.log($irsfrom);
                $category_id = "{{ $category_id ?? '0' }}";




                $.ajax({
                    url: `/customer/category-slider-price/${$irsfrom}/${$irsto}/${$category_id}`,
                    type: "get",
                    dataType: "json",
                    success: function(response) {

                        $('.default-products').empty();
                        $('.search-product').empty();
                        $('.pagination-search').empty();

                        console.log(response.links);


                        $.each(response.links, function(key,value){
                            console.log(value);

                            if(value.active){
                                $('.pagination-search').append(`
                                    <li class="page-item active" aria-current="page"><span class="page-link">${value.label}</span></li>
                                `);
                            }else{
                                $('.pagination-search').append(`
                                    <li class="page-item"><a class="page-link" href="${value.url}">${value.label}</a></li>
                                `);
                            }
                        });

                        $.each(response.data, function(key, value) {

                            let url = "{{ route('customer.single-product', ':id') }}";
                            url = url.replace(':id', value.id);
                            console.log(value);


                            $('.search-product').append(`
                                <div class="col-md-4 col-6">
                                    <div class="product-style-1 text-center mb-3">
                                        <div class="product-image">
                                            <a href="${url}">
                                                <img class="img-fluid" src="{{ asset('assets/images/women-dress.png') }}">
                                            </a>
                                            <div class="product-option">
                                                <span class="discount">-30% </span>

                                                <span class="add-to-wishlist">
                                                    <a style="cursor: pointer;">

                                                        @if (auth()->user())
                                                            @if (auth()->user()->user_type == 'customer')
                                                                @if (favorite($product['id']))
                                                                    <i class="fas fa-heart fa-lg favorite" id="like"
                                                                        style="color: red;"
                                                                        product={{$product['id']}}></i>
                                                                @else
                                                                    <i class="far fa-heart fa-lg favorite" id="like"
                                                                        style="color: black;"
                                                                        product={{$product['id']}}></i>
                                                                @endif
                                                            @endif
                                                        @endif

                                                    </a>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="product-content border pb-2">
                                            <h3 class="mb-1 mt-3 text-center h4">
                                                <a href="${url}"
                                                    class='text-dark text-decoration-none'>
                                                    ${value.product_name_en}
                                                </a>
                                            </h3>
                                            <h4 class=" h6  text-center text-gray font-weight-bold">
                                               $ ${value.product_price}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            `);

                        });
                    }
                });
            });
        }
    </script>
    {{-- "{{ request()->route()->parameters['category_id'] }}" --}}


    <script>
        $(document).ready(function() {

            $('body').on('click', '.favorite', function() {

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
