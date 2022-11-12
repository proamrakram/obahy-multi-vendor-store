
<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
        
        <!-- for stars -->
        
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css')}}">
<script src="https://kit.fontawesome.com/8dea92e7be.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.bundle.addons.css')}}">
    
<!-- end -->


		<script src="{{asset('assets/js/plugins.bundle.js')}}"></script>
        
          <link href="{{asset('assets/css/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!-- <link href="assets/plugins/custom/datatables/datatables.bundle.rtl.css" rel="stylesheet" type="text/css" /> -->
	
  <link href="{{asset('assets/css/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('assets/css/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
	

        <link href="https://unicons.iconscout.com/release/v3.0.6/css/line.css"  rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- simplebar -->
        <link href="{{asset('assets/css/simplebar.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/tabler-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Css -->
        @if (App::getLocale()=='ar')
        <link href="{{asset('assets/css/style-rtl.css')}}" rel="stylesheet" type="text/css" id="theme-opt" />
        
        @endif
        @if (App::getLocale()=='en')
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="{{asset('assets/css/dashboard-ltr.css')}}" rel="stylesheet" />
       
        @endif
        <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" />
        
    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}"/>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" />

<style>
    
.avatar-upload {
  position: relative;
  max-width: 205px;
}
.avatar-upload .avatar-edit {
  position: absolute;
  z-index: 1;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: 'FontAwesome';
  color: #757575;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 90px;
  height: 90px;
  position: relative;
  border-radius: 10px; 
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 10px;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

    </style>

        @yield('style')
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

        <div class="page-wrapper landrick-theme toggled">
