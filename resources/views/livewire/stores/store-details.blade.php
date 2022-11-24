<div>
    <div>

        {{-- Store Experince && Normal Headers --}}
        @if ($store_type->slug == 'appearance-expert')
            <div class="heading-page pt-4 pb-4 mt-2 " style="background-image: url('img/bg-store-hero-section.svg')"
                wire:ignore.self>
                <div class="container" wire:ignore.self>
                    <div class="row align-items-center" wire:ignore.self>
                        <div class="col-md-6 position-static" wire:ignore.self>
                            <h1 class='h2'> {{ ucwords($store_type->store_type_name) }}: {{ $store_admin->name }}
                            </h1>
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                            <img src="{{ asset('assets/images/icon/icon-brown-like.svg') }}" class='icon-like'
                                alt="" wire:ignore.self>
                            <img src="{{ asset('assets/images/icon/icon-love-favorite.svg') }}"
                                class='icon-love-favorite' alt="" wire:ignore.self>
                        </div>
                        <div class="col-md-6 text-right" wire:ignore.self>
                            <img src="{{ asset('assets/images/laptop.png') }}" class='img-fluid w-50' alt="">
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="heading-page mt-2" wire:ignore.self>
                <div class="container" wire:ignore.self>
                    <h1 class='h2'> {{ ucwords($store_name) }}</h1>
                    <p> All costumes available to view </p>
                    <img src="{{ asset('assets/images/icon/icon-brown-like.svg') }}" class='icon-like' alt="">
                    <img src="{{ asset('assets/images/icon/icon-love-favorite.svg') }}" class='icon-love-favorite'
                        alt="">
                </div>
            </div>
        @endif

        {{-- Store Experince Header Nav  --}}
        <div class="breadcrumb-filter mt-md-5 mt-3" wire:ignore.self>
            <div class="container" wire:ignore.self>
                <div class="row align-items-center" wire:ignore.self>

                    <div class="col-md-6" wire:ignore.self>
                        <nav aria-label="breadcrumb" wire:ignore.self>
                            <ol class="breadcrumb mb-0" wire:ignore.self>

                                <li class="breadcrumb-item" wire:ignore.self><a
                                        href="{{ route('customer.store-type-category', $store_type_slug) }}">{{ $store_category }}</a>
                                </li>

                                <li class="breadcrumb-item" wire:ignore.self><a
                                        href="{{ route('customer.store-details', [$store_type_slug, $store_name_slug]) }}">{{ $store_name }}</a>
                                </li>

                                <li class="breadcrumb-item"><a href="#">{{ $store_admin->name }}</a>
                                </li>
                            </ol>
                        </nav>
                        <div class="heading mb-md-5 mb-2" wire:ignore.self>
                            <h3> Model: {{ $store_admin->name }} </h3>
                        </div>
                    </div>

                    <div class="col-md-6" wire:ignore.self>
                        <div class="dropdown-filter d-flex justify-content-md-end justify-content-center"
                            wire:ignore.self>
                            <div class="dropdown mb-md-0 mb-3" wire:ignore.self>
                                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false">Sort Items
                                    <ul class="dropdown-menu" style="">
                                        <!-- <input class="form-control" id="myInput" type="text" placeholder="Search.."> -->
                                        <li wire:click="time('desc')"><a href="#">Sort by latest</a></li>
                                        <li wire:click="time('asc')"><a href="#">Sort by oldest</a></li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Service Section --}}
        @if ($service_section == 'active')
            @if ($products_services->count() > 0)
                <section class="shoping-cats pt-4 pb-3 slider-style-1" wire:ignore>
                    <div class="container">

                        <div class="heading-section mb-4 pb-2">
                            <h3> <span> Services </span> </h3>
                        </div>

                        <div class="owl-carousel">

                            @foreach ($products_services as $product_service)
                                <div class="item">
                                    <div class="product-style-1 text-center">
                                        <div class="product-image border rounded">
                                            <a href="#"> <img class="img-fluid"
                                                    src="{{ 'http://localhost:8000/storage/images/categories/c10.png' }}">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="text-center mb-1 h4 font-weight-normal mt-3">
                                                {{ $product_service->product_name }}
                                            </h3>
                                            <a href="#" class="btn btn-primary btn-sm-3 mt-1">Service
                                                Request</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="navSlider" wire:ignore></div>

                    </div>
                </section>
            @endif

        @endif

        {{-- Banner Section --}}
        @if ($banner_section == 'active')
            <div class="intro-img">
                <div class="container">
                    <div class="img mb-4">
                        <img src="{{ asset('assets/images/bg-leftheader2.jpg') }}" class='img-fluid ' alt="">
                    </div>
                </div>
            </div>
        @endif

        {{-- Filter Section --}}
        @if ($filter_section == 'active')
            <div class="filter-search mb-5" wire:ignore.self>
                <div class="container" wire:ignore.self>
                    <div class="heading d-flex justify-content-between align-items-center pr-3" wire:ignore.self>
                        <h4 class='h5' wire:ignore.self> Filtering </h4>
                        <i class="fas fa-filter" wire:ignore.self></i>
                    </div>
                    <div class="content p-4 border" wire:ignore.self>
                        <div class="row" wire:ignore.self>

                            <div class="col-md-3 col-6" wire:ignore.self>
                                <label for="search">Name</label>
                                <input type="text" wire:model="search" placeholder="name...">
                            </div>

                            <div class="col-md-3 col-6" wire:ignore.self>
                                <select class="" wire:model='product_type'>
                                    <option value="service">Service Product</option>
                                    <option value="custom_made">Custom Product</option>
                                    <option value="ready_made">Ready Made Product</option>
                                    <option value="template">Template Product</option>
                                    <option value="model">Model Product</option>
                                </select>
                            </div>

                            <div class="col-md-3 col-6" wire:ignore.self>
                                <select class="" wire:model='time'>
                                    <option value="desc">Sort by latest</option>
                                    <option value="asc">Sort by oldest</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Products Section --}}
        <div class="container" wire:ignore.self>
            <div class="row" wire:ignore.self>

                @forelse ($products as $product)
                    <div class="col-md-4 col-6" wire:ignore.self>
                        <div class="product-style-1 text-center mb-4" wire:ignore.self>
                            <div class="product-image" wire:ignore.self>

                                <a href="{{ route('customer.store-product-details', [$store_type_slug, $store_name_slug, $product->id]) }}"
                                    wire:ignore.self>
                                    <img class="img-fluid" src="{{ $product->product_main_image }}">
                                </a>


                                <div class="product-option" wire:ignore.self>
                                    <span class="discount" wire:ignore.self>-30%</span>
                                    <span class="add-to-wishlist" wire:ignore.self>
                                        <a href="#">
                                            <i class="far fa-heart fa-lg"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>

                            <div class="product-content" wire:ignore.self>
                                <h3 class="mb-1 text-center h4 mt-2" wire:ignore.self>
                                    <a href="{{ route('customer.store-product-details', [$store_type_slug, $store_name_slug, $product->id]) }}"
                                        class="text-dark text-decoration-none">
                                        {{ $store->store_name }}
                                    </a>
                                </h3>

                                <h4 class=" h6  text-center text-gray font-weight-bold"> {{ $product->product_name }}
                                </h4>

                                <h4 class=" h6  text-center text-gray font-weight-bold">${{ $product->product_price }}
                                </h4>
                            </div>
                        </div>
                    </div>

                @empty
                    <div id="row" wire:ignore.self>
                        <h3>Nothing</h3>
                    </div>
                @endforelse

            </div>
            {{ $products->links() }}

        </div>
    </div>
</div>
