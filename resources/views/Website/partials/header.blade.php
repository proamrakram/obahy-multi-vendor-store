<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Obayh!</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    {{-- Toaster --}}
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}" />

    {{-- LiveWire Alpine --}}
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

</head>

<body>
    <!-- Start Header -->
    <header class="header py-2">
        <div class="container">
            <div class="header-info d-flex justify-content-between align-items-center">
                <div class="header-menu">
                    <div class="btn-menu p-2 rounded bg-dark d-flex  flex-column  justify-content-between">
                        <span class='bg-white rounded w-100'></span>
                        <span class='bg-white rounded w-100'></span>
                        <span class='w-75 bg-white'></span>
                    </div>
                </div>
                <div class="header-logo">
                    <a href="{{ route('home') }}"> <img src="{{ asset('assets/images/logo.svg') }}" alt=""
                            class='img-fluid m-auto d-block'> </a>
                </div>
                <div class="header-tools">
                    <div class="btn-search d-inline-block">
                        <button><i class="fas fa-search"></i></button>
                    </div>

                    @if (!auth()->user())
                        <div class="btn-user d-inline-block">
                            <button data-toggle="modal" data-target="#loginRegisterUser"><i
                                    class="far fa-user"></i></button>
                        </div>
                    @else
                        <form action="{{ route('logout') }}" method="POST" class="btn-cart d-inline-block">
                            @csrf
                            <button type="submit" style="border: 0px !important; border: none; background: none;">
                                {{-- <span class="number">4</span> --}}
                                <img src="{{ asset('assets/images/icon/icon-lock.svg') }}" alt=""> </button>
                        </form>
                    @endif

                    <div class="btn-cart d-inline-block">
                        <a href="{{ route('customer.cart') }}"> <span class="number"
                                id="cart_count">{{ cart_count() }}</span>
                            <img src="{{ asset('assets/images/icon/icon-cart.svg') }}" alt=""> </a>
                    </div>

                    <div class="btn-lang d-inline-block">
                        <button><img src="{{ asset('assets/images/icon/icon-lang.svg') }}" alt=""></button>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->
    <div class="overlay"></div>
    <div class="menu-categories ">

        <ul class="p-3 list-unstyled ">
            @foreach (categorise() as $category)
                <x-sidebar-category :category="$category"></x-sidebar-category>
            @endforeach
        </ul>

        {{-- <ul>
            <li><a href="#"> Cat 1 </a></li>
            <li><a href="#"> Cat 2 </a></li>
            <li><a href="#"> Cat 3 </a></li>
            <li>
                <a href="#"> Cat 4 </a>
                <ul>
                    <li><a href="#"> Cat 4- 1 </a></li>
                    <li><a href="#"> Cat 4- 2 </a></li>
                    <li><a href="#"> Cat 4- 3 </a></li>
                </ul>
            </li>
            <li><a href="#"> Cat 5 </a></li>
        </ul> --}}
    </div>

    <!-- Modal Login & Register -->
    <div class="modal fade" id="loginRegisterUser" tabindex="-1" role="dialog" aria-labelledby="loginRegisterUser"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body border-0 px-3 px-md-5">
                    <ul class="nav nav-tabs tab-style-1 justify-content-center border-0 mb-2 mb-md-4" id=""
                        role="tablist">
                        <li class="nav-item w-50">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#registerUser"
                                role="tab" aria-controls="registerUser" aria-selected="true">
                                Register Now
                            </a>
                        </li>
                        <li class="nav-item w-50">
                            <a class="nav-link" id="loginUser-tab" data-toggle="tab" href="#loginUser" role="tab"
                                aria-controls="loginUser" aria-selected="false">
                                Login
                            </a>
                        </li>
                    </ul>


                    <div class="tab-content" id="">

                        <div class="tab-pane fade show active" id="registerUser" role="tabpanel"
                            aria-labelledby="registerUser-tab">


                            <form id="register_form" action="{{ route('register') }}" method="POST">

                                @csrf
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="far fa-user-circle"></i></span>
                                    </div>
                                    <input type="text" id="name_register" value="{{ old('name') }}"
                                        name="name" class="form-control" placeholder="Name">
                                </div>

                                {{-- @error('name') --}}
                                <small id="name_error_register_message" class="text-danger"></small>
                                {{-- @enderror --}}

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="far fa-envelope-open"></i></span>
                                    </div>
                                    <input type="text" value="{{ old('email') }}" name="email"
                                        id="email_register" class="form-control" placeholder="Email">
                                </div>

                                {{-- @error('email') --}}
                                <small id="email_error_register_message" class="text-danger"></small>
                                {{-- @enderror --}}

                                <div class="row row-sm">

                                    <div class="col col-sm">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="far fa-flag"></i>
                                                </span>
                                            </div>

                                            <select name="country_id" class="form-control form-select"
                                                id="country_id_register">
                                                <option value="null">اختر الدولة</option>
                                                @foreach (App\Models\Country::active()->get() as $country)
                                                    <option value="{{ $country->id }}">{{ $country->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- @error('country_id') --}}
                                        <small id="country_id_error_register_message" class="text-danger"></small>
                                        {{-- @enderror --}}

                                    </div>

                                    <div class="col col-sm">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="fas fa-map-marker-alt"></i></span>
                                            </div>
                                            <select name="city_id" class="form-control form-select"
                                                id="city_id_register">
                                                <option value="null" selected>City</option>
                                                @foreach (App\Models\City::active()->get() as $city)
                                                    <option value="{{ $city->id }}">{{ $city->city_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <small id="city_id_error_register_message" class="text-danger"></small>

                                        {{-- @error('city')
                                        @enderror --}}
                                    </div>
                                </div>


                                <div class="row row-sm">
                                    <div class="col col-sm">

                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <img src="{{ asset('assets/images/icon/icon-sex.svg') }}"
                                                        width='21'>
                                                </span>
                                            </div>

                                            <select name="gender" class="form-control form-select"
                                                id="gender_register">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>

                                        {{-- @error('gender') --}}
                                        <small id="gender_error_register_message" class="text-danger"></small>
                                        {{-- @enderror --}}

                                    </div>

                                    <div class="col col-sm">

                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <img src="{{ asset('assets/images/icon/icon-telephone.svg') }}"
                                                        width='18'>
                                                </span>
                                            </div>
                                            <input type="text" value="{{ old('phone') }}" name="phone"
                                                class="form-control" placeholder="Phone" id="phone_register">
                                        </div>
                                        {{-- @error('phone') --}}
                                        <small id="phone_error_register_message" class="text-danger"></small>
                                        {{-- @enderror --}}

                                    </div>
                                </div>

                                <div class="input-group mb-2">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <img src="{{ asset('assets/images/icon/icon-lock.svg') }}" width="16"
                                                alt="">
                                        </span>
                                    </div>
                                    <input type="password" id="password_register" value="{{ old('password') }}"
                                        name="password" class="form-control" placeholder="Password">
                                </div>

                                {{-- @error('password') --}}
                                <small id="password_error_register_message" class="text-danger"></small>
                                {{-- @enderror --}}



                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <img src="{{ asset('assets/images/icon/icon-lock.svg') }}" width="16"
                                                alt="">
                                        </span>
                                    </div>
                                    <input type="password" id="password_confirmation_register"
                                        value="{{ old('password_confirmation') }}" name="password_confirmation"
                                        class="form-control" placeholder="Password Confirmation">
                                </div>

                                <small id="password_error_register_message" class="text-danger"></small>

                                <div class="input-group mb-2 d-flex justify-content-between">
                                    <div>
                                        You Have an account?
                                        <a href="#" class='text-dark text-decoration-none'> Login Now </a>
                                    </div>
                                </div>

                                <button type="submit" class='btn btn-block btn-dark my-4'>Register Now</button>
                            </form>

                            <div class="login-with-social pb-3">
                                <h3> Social Media Sign up </h3>
                                <div class="btns d-flex justify-content-between">
                                    <a href="{{ route('auth.socialite.redirect', 'facebook') }}"
                                        class='login-with-fb rounded'> <i class='fab fa-facebook-f'></i> Facebook</a>
                                    <a href="{{ route('auth.socialite.redirect', 'google') }}"
                                        class='login-with-google rounded'> <i class='fab fa-google'></i> Google</a>
                                    <a href="{{ route('auth.socialite.redirect', 'apple') }}"
                                        class='login-with-apple rounded'> <i class='fab fa-apple'></i>
                                        Apple</a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="loginUser" role="tabpanel" aria-labelledby="loginUser-tab">
                            <form id="login_form" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="far fa-envelope-open"></i></span>
                                    </div>
                                    <input type="email" id="email_login" name="email"
                                        value="{{ old('email') }}" class="form-control" placeholder="Email">
                                </div>

                                {{-- @error('email') --}}
                                <small id="email_error_login_message" class="text-danger"></small>
                                {{-- @enderror --}}

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" id="password_login" name="password"
                                        value="{{ old('password') }}" class="form-control" placeholder="Password">
                                </div>

                                {{-- @error('password') --}}
                                <small id="password_error_login_message" class="text-danger"></small>
                                {{-- @enderror --}}

                                <div class="input-group mb-2 d-flex justify-content-between">
                                    <div>
                                        <label>
                                            <input type="checkbox" name="remember_me"
                                                value="{{ old('remember_me') }}">
                                            Remember Me
                                        </label>
                                    </div>
                                    <div>
                                        <a href="#" class='text-dark text-decoration-none'> Forget Password ?
                                        </a>
                                    </div>
                                </div>
                                <button class='btn btn-block btn-dark my-4'>Login</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Login & Register -->



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#country_id_register').on('change', function() {

                var country_id = this.value;
                console.log(country_id);

                $("#city_id_register").html('');

                $.ajax({
                    url: "{{ url('/admin/get-cities-by-country') }}",
                    type: "POST",
                    data: {
                        country_id: country_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#city_id_register').html('<option value="">اختر المدينة</option>');
                        $.each(result.states, function(key, value) {
                            $("#city_id_register").append('<option value="' + value.id +
                                '">' + value.city_name_ar + '</option>');
                        });
                    }
                });

            });
        });
    </script>
