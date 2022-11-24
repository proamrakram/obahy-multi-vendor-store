<!-- End New Design -->
<!-- Start Footer -->
<footer class="footer text-center text-md-left">
    <div class="upper-footer bg-clr-dark py-3 py-md-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo-footer mb-md-0 mb-3">
                        <img src="{{ asset('assets/images/icon/logo-footer-white.svg') }}" alt="logo footer"
                            width='150'>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="widget mb-md-0 mb-3">
                        <h3 class='widget-title txt-clr-gray h4 mb-2 mb-md-3'> Quick Links </h3>
                        <ul class='list-unstyled '>
                            <li class='d-inline-block pr-3'><a href="#" class='text-white'> About Obayh
                                </a></li>
                            <li class='d-inline-block pr-3'><a href="#" class='text-white'> Privacy </a>
                            </li>
                            <li class='d-inline-block pr-3'><a href="#" class='text-white'> FAQ </a></li>
                            <li class='d-inline-block pr-3'><a href="#" class='text-white'> Contact Us </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget widget-social">
                        <h3 class='widget-title txt-clr-gray h4 mb-2 mb-md-3'> follow Us </h3>
                        <ul class='list-unstyled '>
                            <li class='d-inline-block pr-1'><a href="#" class='text-white'> <i
                                        class="fab fa-twitter"></i> </a></li>
                            <li class='d-inline-block pr-1'><a href="#" class='text-white'> <i
                                        class="fab fa-linkedin-in"></i> </a></li>
                            <li class='d-inline-block pr-1'><a href="#" class='text-white'> <i
                                        class="fab fa-instagram"></i> </a></li>
                            <li class='d-inline-block pr-1'><a href="#" class='text-white'> <i
                                        class="fab fa-facebook-f"></i> </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="down-footer text-center bg-clr-dark text-white py-2 py-md-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="m-0 text-left">Copyright © 2021, OBAYA</p>
                </div>
                <div class="col-md-6">
                    <p class="mb-0 development-content">
                        <a class="akwade-link" href="https://akwade.com/" target="_blank">
                            <span>
                                <span class="development-by text-white">Development</span>
                                <img class="img-fluid img-cover" src="{{ asset('assets/images/logoAkwade.png') }}"
                                    alt="Akwade" width="90px">
                            </span>
                        </a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
<script src="{{ asset('assets/js/en_app.js') }}"></script>

<script>
    $(document).ready(function() {

        // Toaster Response
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

        if ("{{ Session::get('showModal') }}") {
            $('#loginRegisterUser').modal('show')
            "{{ Session::put('showModal', false) }}"
        }

        //Login Form Fields
        $("#email_error_login_message").hide();
        $("#password_error_login_message").hide();

        //Register Form Fields
        $("#email_error_register_message").hide();
        $("#password_error_register_message").hide();
        $("#name_error_register_message").hide();
        $("#country_id_error_register_message").hide();
        $("#city_id_error_register_message").hide();
        $("#gender_error_register_message").hide();
        $("#phone_error_register_message").hide();




        $("#login_form").submit(function(e) {

            e.preventDefault();

            $.ajax({
                url: "{{ route('login') }}",
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    email: $('#email_login').val(),
                    password: $('#password_login').val(),
                    lang: "{{ app()->getLocale() }}"
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(data) {
                    location.reload(true);
                },

                error: function(reject) {

                    var response = $.parseJSON(reject.responseText);

                    $.each(response.errors, function(key, val) {

                        if (key == "email") {
                            $("#email_error_login_message").show();
                            $('#email_error_login_message').text(val[0]);
                        }
                        console.log(key == "email", key);

                        if (key == "password") {
                            $("#password_error_login_message").show();
                            $('#password_error_login_message').text(val[0]);
                        }
                    });
                }

            });
        });


        $("#register_form").submit(function(e) {

            e.preventDefault();

            $.ajax({
                url: "{{ route('register') }}",
                method: 'POST',
                data: {
                    name: $('#name_register').val(),
                    email: $('#email_register').val(),
                    country_id: $('#country_id_register').val(),
                    city_id: $('#city_id_register').val(),
                    gender: $('#gender_register').val(),
                    phone: $('#phone_register').val(),
                    password: $('#password_register').val(),
                    "password_confirmation": $('#password_confirmation_register').val(),
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    lang: "{{ app()->getLocale() }}"
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(data) {
                    location.reload(true);
                },

                error: function(reject) {

                    var response = $.parseJSON(reject.responseText);

                    $.each(response.errors, function(key, val) {

                        if (key == "name") {
                            $("#name_error_register_message").show();
                            $('#name_error_register_message').text(val[0]);
                        }

                        if (key == "email") {
                            $("#email_error_register_message").show();
                            $('#email_error_register_message').text(val[0]);
                        }

                        if (key == "password") {
                            $("#password_error_register_message").show();
                            $('#password_error_register_message').text(val[0]);
                        }

                        if (key == "phone") {
                            $("#phone_error_register_message").show();
                            $('#phone_error_register_message').text(val[0]);
                        }

                        if (key == "country_id") {
                            $("#country_id_error_register_message").show();
                            $('#country_id_error_register_message').text(val[0]);
                        }


                        if (key == "city_id") {
                            $("#city_id_error_register_message").show();
                            $('#city_id_error_register_message').text(val[0]);
                        }

                        if (key == "gender") {
                            $("#gender_error_register_message").show();
                            $('#gender_error_register_message').text(val[0]);
                        }

                    });
                }
            });
        });
    });
</script>

@yield('script')

</body>

</html>
