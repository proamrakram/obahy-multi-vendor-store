<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8" />
    <title>OBAYH - تسجيل الدخول</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <!-- Bootstrap -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- simplebar -->
    <link href="{{asset('assets/css/simplebar.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="{{asset('assets/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/tabler-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" rel="stylesheet">
    <!-- Css -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <style>
        body {
            direction: rtl;
        }

        label,
        button,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6 {
            font-family: "Cairo", sans-serif;
        }

        .form-floating>label {
            right: 0;
            left: auto;
        }

        .form-check .form-check-input {
            float: right;
            margin-left: 10px;
            margin-right: 0;
        }
    </style>

</head>

<body>
    <!-- Loader -->
    <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
    <!-- Loader -->

    <!-- Hero Start -->
    <section class="bg-home bg-circle-gradiant d-flex align-items-center">
        <div class="bg-overlay "></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-signin p-4 bg-white rounded shadow">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <a href="/"><img src="{{asset('assets/images/logo_dark.svg')}}" class="avatar avatar-small mb-4 d-block mx-auto" alt=""></a>
                            <h5 class="mb-3 text-center"> الرجاء تسجيل الدخول </h5>

                            <div class="form-floating mb-2">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label for="floatingInput">البريد الإلكتروني</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label for="floatingPassword">كلمة المرور</label>
                            </div>

                            <div class="d-flex justify-content-start">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <label class="form-check-label" for="flexCheckDefault">تذكرني</label>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-dark w-100" type="submit"> تسجيل الدخول </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Hero End -->

    <!-- javascript -->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <!-- simplebar -->
    <script src="{{asset('assets/js/simplebar.min.js')}}"></script>
    <!-- Icons -->
    <script src="{{asset('assets/js/feather.min.js')}}"></script>
    <!-- Main Js -->
    <script src="{{asset('assets/js/plugins.init.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>

</body>

</html>