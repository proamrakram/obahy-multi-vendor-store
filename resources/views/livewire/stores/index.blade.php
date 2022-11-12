<div>
    <div class="heading-page mt-2">
        <div class="container">
            <h1 class='h2'> {{ ucwords($store_type_title) }} </h1>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            <img src="{{ asset('assets/images/icon/icon-brown-like.svg') }}" class='icon-like' alt="">
            <img src="{{ asset('assets/images/icon/icon-love-favorite.svg') }}" class='icon-love-favorite' alt="">
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <div class="container mt-3">
            <ol class="breadcrumb pb-0 mb-1">
                <li class="breadcrumb-item"><a href="#">Categories</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $store_type_title }}</a></li>
            </ol>
        </div>
    </nav>

    <div class="filter-search">
        <div class="container">
            <div class="heading d-flex justify-content-between align-items-center pr-3">
                <h4 wire:click='test' class='h5'> Filtering </h4>
                <i class="fas fa-filter"></i>
            </div>
            <div class="content p-4 border">
                <div class="row">

                    <div class="col-md-3 col-6">
                        <label for="search">Name</label>
                        <input type="text" wire:model="search" placeholder="name...">
                    </div>


                    @if (!$products_check)


                        <div class="col-md-3 col-6">
                            {{-- <label for="store_type_id">Type</label> --}}
                            <select class="" wire:model='store_type_id'>
                                <option value="0">All Types</option>
                                @forelse ($stores_types as $store_type)
                                    <option value="{{ $store_type->id }}">{{ $store_type->store_type_name }}</option>
                                @empty
                                    <option value="0">لا يوجد انواع</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="col-md-3 col-6">
                            {{-- <label for="store_type_name">Country</label> --}}
                            <select class="" wire:model='country'>
                                <option value="0">All Countries</option>
                                @forelse ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                @empty
                                    <option value="0">لا يوجد دول</option>
                                @endforelse
                            </select>
                        </div>
                    @endif

                    <div class="col-md-3 col-6">
                        {{-- <label for="store_type_name">Time</label> --}}
                        <select class="" wire:model='time'>
                            <option value="desc">Sort by latest</option>
                            <option value="asc">Sort by oldest</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="result-search mt-5">
        <div class="container">
            <div class="row">
                @foreach ($stores as $store)
                    <div class="col-md-4 col-6">
                        <div class="product-style-1 text-center mb-3">
                            <div class="product-image">

                                @if (!$products_check)
                                    <a
                                        href="{{ route('customer.store-details', [$store->store_type_slug, $store->slug]) }}">
                                        <img class="img-fluid rounded border" src="{{ $store->store_logo }}">
                                    </a>
                                @else
                                    <a
                                        href="{{ route('customer.store-product-details', [$store_type_slug, $store_name_slug, $store->id]) }}">
                                        <img class="img-fluid rounded border" src="{{ $store->product_main_image }}">
                                    </a>
                                @endif
                            </div>

                            <div class="star mt-2 text-center">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="far fa-star">

                                </i>
                            </div>

                            @if (!$products_check)

                                <div class="product-content">
                                    <h3 class="mb-1 text-center h4">
                                        <a href="{{ route('customer.store-details', [$store->store_type_slug, $store->slug]) }}"
                                            class="text-dark text-decoration-none">{{ $store->store_name }}</a>
                                    </h3>
                                </div>
                            @else
                                <div class="product-content">
                                    <h3 class="mb-1 text-center h4">
                                        <a href="{{ route('customer.store-product-details', [$store_type_slug, $store_name_slug, $store->id]) }}"
                                            class="text-dark text-decoration-none">{{ $store->product_name }}</a>
                                    </h3>
                                </div>
                            @endif

                        </div>
                    </div>
                @endforeach

            </div>

            {{ $stores->links() }}

        </div>
    </div>






















</div>
