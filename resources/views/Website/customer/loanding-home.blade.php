@extends('Website.partials.layout-2')
@section('content')
    <!-- Start Obayh Home Hero Section -->
    <section class="hero-obahy-home-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 order-md-1 order-2">
                    <div class="left-obahy-home-section">
                        <h1 class='mb-3'>Creat Your Store</h1>
                        <p class='mb-4'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's.</p>
                        <form action="{{ route('create-store-page') }}" method="GET">
                            @csrf
                            <div class="form-data position-relative">
                                <input type="email" name="email" placeholder="Your Email" required>
                                <button type="submit" class="btn btn-primary btn-sm"> Start Now </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-7 order-md-2 border-1">
                    <div class="right-obahy-home-section">
                        <!-- <div class="bg-round-shap"></div> -->
                        <div class="img-laptop">
                            <img class="img-fluid img-cover" src="{{ asset('assets/images/laptop-store.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Obayh Home Hero Section -->

    <!-- Start We Offer Real Value -->
    <section class="real-value" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="online-shope">
                        <img class="img-fluid img-cover" src="{{ asset('assets/images/img-online-shop.png') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content-real-value">
                        <h2 class="h6">About Obayh</h2>
                        <h3 class="mt-2 mb-2 h2">Lorem Ipsum is simply dummy text of the printing.</h3>
                        <p class="mb-3 mt-4">It is a long established fact that a reader will be distracted by the readable
                            content of a page when looking at its layout.</p>
                        <p class="mb-2"><i class="far fa-arrow-alt-circle-right"></i><span
                                class="d-inline-block ml-2">Where does it come from</span></p>
                        <p class="mb-2"><i class="far fa-arrow-alt-circle-right"></i><span
                                class="d-inline-block ml-2">Where does it come from</span></p>
                        <p class="mb-4"><i class="far fa-arrow-alt-circle-right"></i><span
                                class="d-inline-block ml-2">Where does it come from</span></p>
                        <a href="#" class="btn btn-primary btn-sm mt-2"> Read More </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End We Offer Real Value -->

    <!-- Start Your Profit With Obayh -->
    <section class="your-profit real-value mt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="content-real-value">
                        <h3 class="h2 mt-5 mb-4">Your Profit With Obayh.</h3>
                        <p class="mb-4">It is a long established fact that a reader will be distracted by the readable
                            content of a page when looking at its layout.</p>
                        <p class="mb-2">Where does it come from</p>
                        <p class="mb-2">Where does it come from</p>
                        <p class="mb-2">Where does it come from</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="online-shope">
                        <img class="img-fluid img-cover" src="{{ asset('assets/images/img-your-profit.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Your Profit With Obayh -->

    <!-- Start Our Service To Your Creativity -->
    <div id="service" class="service-to-your-creativity text-center">
        <div class="container">
            <div class="creativity-title">
                <h2 class="h6">Our Service To Your Creativity</h2>
                <h3>Create Your Store In An Easier Way</h3>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="creativity-content">
                        <img class="img-fluid img-cover w-25" src="{{ asset('assets/images/icon-cooperation.png') }}">
                        <h4 class="h5 my-3">cooperation</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="creativity-content">
                        <img class="img-fluid img-cover w-25" src="{{ asset('assets/images/icon-task.png') }}">
                        <h4 class="h5 my-3">Task Management</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="creativity-content">
                        <img class="img-fluid img-cover w-25" src="{{ asset('assets/images/icon-time.png') }}">
                        <h4 class="h5 my-3">Protect Your Time</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="creativity-content">
                        <img class="img-fluid img-cover w-25" src="{{ asset('assets/images/icon-report.png') }}">
                        <h4 class="h5 my-3">Full Reports</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Our Service To Your Creativity -->

    <!-- Start Creativity Stores -->
    <section class="creativity-stores real-value mt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="content-real-value">
                        <h2 class="mt-5 mb-4">Creativity Stores</h2>
                        <p class="mb-4">It is a long established fact that a reader will be distracted by the readable
                            content of a page when looking at its layout.</p>
                        <p class="mb-2">Where does it come from</p>
                        <p class="mb-2">Where does it come from</p>
                        <p class="mb-2">Where does it come from</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="online-shope">
                        <img class="img-fluid img-cover" src="{{ asset('assets/images/img-dashboard-final.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Your Profit With Obayh -->

    <!-- Start Free Try -->
    <div id="try" class="free-try text-center">
        <div class="container">
            <div class="free-try-content">
                <h2 class="h1">Try Free</h2>
                <p class="my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                    molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                    numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                    optio, eaque rerum! Provident.</p>
                <a href="#" class="btn btn-light px-5 d-inline-block mt-2">Try Free</a>
            </div>
        </div>
    </div>
    <!-- End Free Try -->

    <!-- Start Price Plans -->

    <section id="price" class="price-plans text-center">
        <div class="container">
            <div class="price-title">
                <h2 class="h6 mb-0">Subscription Now</h2>
                <h3 class="h1 mb-5">Our Price Plans</h3>
            </div>
            <div class="row">


                @if ($free_store_package)
                    <div class="col-md-4">
                        <div class="card mb-5">
                            <div class="card-body plan-1 py-5">
                                <h5 class="card-title h1">${{ $free_store_package->package_price }}</h5>
                                <p class="card-text font-weight-bold">
                                    {{ $free_store_package->package_description_en ?? $free_store_package->package_description_en }}
                                </p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item mt-4">Extra Features</li>

                                @foreach ($free_store_package->items->take(5) as $item)
                                    <li class="list-group-item">
                                        {{ $item->package_item->package_item_en ?? $item->package_item->package_item_ar }}
                                    </li>
                                @endforeach
                            </ul>

                            <div class="card-body">

                                <a href="{{ route('create-store-page', $free_store_package->id) }}"
                                    class="card-link a-card-body-white">Choose
                                    Plan</a>
                                <p class="my-3 p-card-body font-weight-bold">No Hidden Charges</p>

                            </div>

                        </div>
                    </div>
                @endif



                @if ($silver_store_package)
                    <div class="col-md-4">
                        <div class="card mb-5">
                            <div class="card-body plan-2 py-5">
                                <h5 class="card-title h1">${{ $silver_store_package->package_price }}</h5>
                                <p class="card-text font-weight-bold">
                                    {{ $silver_store_package->package_description_en ?? $silver_store_package->package_description_en }}
                                </p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item mt-4">Extra Features</li>

                                @foreach ($silver_store_package->items->take(5) as $item)
                                    <li class="list-group-item">
                                        {{ $item->package_item->package_item_en ?? $item->package_item->package_item_ar }}
                                    </li>
                                @endforeach

                            </ul>
                            <div class="card-body">
                                <a href="{{ route('create-store-page', $silver_store_package->id) }}"
                                    class="card-link a-card-body-gold">Choose Plan</a>
                                <p class="my-3 p-card-body font-weight-bold">No Hidden Charges</p>
                            </div>
                        </div>
                    </div>
                @endif


                @if ($gold_store_package)
                    <div class="col-md-4">
                        <div class="card">

                            <div class="card-body plan-3 py-5">
                                <h5 class="card-title h1">${{ $gold_store_package->package_price }}</h5>
                                <p class="card-text font-weight-bold">
                                    {{ $gold_store_package->package_description_en ?? $gold_store_package->package_description_en }}

                                </p>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item mt-4">Extra Features</li>
                                @foreach ($gold_store_package->items->take(5) as $item)
                                    <li class="list-group-item">
                                        {{ $item->package_item->package_item_en ?? $item->package_item->package_item_ar }}
                                    </li>
                                @endforeach
                            </ul>

                            <div class="card-body">
                                <a href="{{ route('create-store-page', $gold_store_package->id) }}"
                                    class="card-link a-card-body-white">Choose Plan</a>
                                <p class="my-3 p-card-body font-weight-bold">No Hidden Charges</p>
                            </div>

                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
    <!-- End Price Plans -->

    <!-- Start FAQs -->
    <section id="faq" class="faq">
        <div class="container">
            <h2 class="h1 text-center mb-5">FAQs</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="faq-content mb-3 mb-md-5">
                        <h3 class="h5 mb-3">What is Lorem Ipsum?</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="faq-content mb-3 mb-md-5">
                        <h3 class="h5 mb-3">What is Lorem Ipsum?</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="faq-content mb-3 mb-md-5">
                        <h3 class="h5 mb-3">What is Lorem Ipsum?</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End FAQs -->

    <!-- Start Contact US -->
    <section id="contact" class="contact-us">
        <div class="container">
            <div class="row ">
                <div class="col-md-7 order-md-1 order-2">
                    <div class="contact-form">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-1 mb-md-3">
                                    <input class="form-control" type="text" placeholder="Name">
                                </div>
                                <div class="col-md-6 mb-1 mb-md-3">
                                    <input class="form-control" type="email" placeholder="Email">
                                </div>
                            </div>
                            <textarea class="form-control" placeholder="Details"></textarea>
                            <button type="submit" class="btn btn-primary btn-sm mt-3">Send Now</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-5 order-md-2 order-1">
                    <div class="contact-text mb-5 mb-md-0">
                        <h2 class="h1 mb-3">Contact Us</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact US -->

    <!-- Start Email Menu -->
    <section class="email-menu text-center">
        <div class="container">
            <h2 class="h3">Subscribe To Mailing List</h2>
            <h3 class="h4">You getting all New</h3>
            <div class="mail-form mt-5">
                <form class="d-flex justify-content-center" action="{{ route('create-store') }}" method="GET">
                    @csrf
                    <div class="form-content">
                        <input class="w-100" type="email" name="email" placeholder="Your Email" required>
                        <a href="#" type="submit" class="form-start-btn">Start Now</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- End Email Menu -->
@endsection
