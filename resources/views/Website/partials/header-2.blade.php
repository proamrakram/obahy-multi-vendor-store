<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Obayh!</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body>


    <section class="nav-section mb-5">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="logo">
                    <a class="navbar-brand" href=""><img class="img-fluid"
                            src="{{ asset('assets/images/icon/gold-logo-navbar.svg') }}" width="100px"></a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li id="home" class="nav-item active">
                            <a class="nav-link" href="#home" data-value="home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about" data-value="about">About Obayh</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#services" data-value="service">Our Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#price" data-value="price">Our Price</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#faq" data-value="faq">FAQs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact_us" data-value="contact">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link try-link" href="#" data-value="try">Try Free</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
