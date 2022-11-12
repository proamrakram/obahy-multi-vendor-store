@extends('Website.partials.layout-2')

@section('content')
    <div class="page page-create-store mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/img_create_store.png') }}" class='img-fluid m-auto d-block'
                        alt="">
                </div>
                <div class="col-md-6">
                    <div class="text d-flex justify-content-center flex-column h-100">
                        <div class="box">
                            <h1> Create your store </h1>
                            <p> ✨Welcome to the world of e-commerce✨ </p>
                            <!-- <div class="start-now-form position-relative mt-5 w-75"></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-create-new-store mt-0 mt-md-5 pt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="form p-4 border rounded bg-gray">
                            <div class="heading text-center">
                                <h2 class='h3'>Create your store with Obaya platform</h2>
                                <p>Welcome to the world of e-commerce</p>
                            </div>
                            <form id="store_subscription" action="#" method="POST">
                                @csrf
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-none" id="basic_store_title">
                                            <img src="{{ asset('assets/images/icon/icon-store.svg') }}" width="24px"
                                                alt="">
                                        </span>
                                    </div>
                                    <input type="text" id="store_title" name="store_title" class="form-control"
                                        placeholder="Store Title">
                                </div>

                                <small id="message_store_title" class="invisible"></small>

                                <div class=" mt-2">
                                    <div class="input-group position-relative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-none" id="basic_store_url">
                                                <i class="fas fa-link"></i>
                                            </span>
                                        </div>

                                        <div class="text-explain position-absolute ">
                                            Obyah.com/
                                        </div>

                                        <input type="text" id="store_url" name="store_url" class="form-control"
                                            placeholder="Store URL">
                                    </div>
                                    {{-- <small class="form-text text-muted">It will be the store link that customers can enter
                                        to place an order. You must use English letters and numbers</small> --}}
                                    <small id="message_store_url" class="invisible"></small>

                                </div>


                                <div class="input-group mt-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-none" id="basic_entity_type">
                                            <i class="far fa-building"></i>
                                        </span>
                                    </div>

                                    <select class="form-control" name="entity_type" id="entity_type">
                                        @foreach ($stores_types as $store_type)
                                            <option value="{{ $store_type->id }}">{{ $store_type->store_type_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    {{-- <input type="text" id="entity_type" name="entity_type" class="form-control"
                                        placeholder="Entity Type"> --}}


                                </div>

                                <small id="message_entity_type" class="invisible"></small>

                                <div class="input-group mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-none" id="basic_commercial_registration_link">
                                            <i class="fas fa-link"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="commercial_registration_link"
                                        name="commercial_registration_link" class="form-control"
                                        placeholder="Commercial Registration Link">
                                </div>

                                <small id="message_commercial_registration_link" class="invisible"></small>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-none"
                                                    id="basic_registration_number_in_trusted">
                                                    <img src="{{ asset('assets/images/icon/icon-number.svg') }}"
                                                        width="24px" alt="">
                                                </span>
                                            </div>
                                            <input type="text" id="registration_number_in_trusted"
                                                name="registration_number_in_trusted" class="form-control"
                                                placeholder="The registration number in trusted">
                                        </div>

                                        <small id="message_registration_number_in_trusted" class="invisible"></small>

                                    </div>

                                    <div class="col-6">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-none" id="basic_id_number">
                                                    <img src="{{ asset('assets/images/icon/icon-number.svg') }}"
                                                        width="24px" alt="">
                                                </span>
                                            </div>
                                            <input type="text" id="id_number" name="id_number" class="form-control"
                                                placeholder="ID Number">
                                        </div>
                                        <small id="message_id_number" class="invisible"></small>

                                    </div>

                                    <div class="col-6">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-none" id="basic_store_manager">
                                                    <i class='far fa-user-circle'></i>
                                                </span>
                                            </div>
                                            <input type="text" id="store_manager" name="store_manager"
                                                class="form-control" placeholder="Store Manager">
                                        </div>
                                        <small id="message_store_manager" class="invisible"></small>

                                    </div>

                                    <div class="col-6">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-none" id="basic_phone_number">
                                                    <img src="{{ asset('assets/images/icon/icon-telephone.svg') }}"
                                                        width="18" alt="">
                                                </span>
                                            </div>
                                            <input type="text" id="phone_number" name="phone_number"
                                                class="form-control" placeholder="Phone Number">
                                        </div>
                                        <small id="message_phone_number" class="invisible"></small>

                                    </div>

                                    <div class="col-12">

                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-none" id="basic_email">
                                                    <i class='far fa-envelope-open'></i>
                                                </span>
                                            </div>
                                            <input type="email" id="email" name="email" class="form-control"
                                                value="{{ $email ?? '' }}" placeholder="Email">
                                        </div>
                                        <small id="message_email" class="invisible"></small>

                                    </div>

                                    <div class="col-6">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-none" id="basic_password">
                                                    <img src="{{ asset('assets/images/icon/icon-lock.svg') }}"
                                                        width="16" alt="">
                                                </span>
                                            </div>
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="Password">
                                        </div>
                                        <small id="message_password" class="invisible"></small>
                                    </div>

                                    <div class="col-6 mb-2">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-none" id="basic_confirm_password">
                                                    <img src="{{ asset('assets/images/icon/icon-lock.svg') }}"
                                                        width="16" alt="">
                                                </span>
                                            </div>
                                            <input type="password" id="confirm_password" name="confirm_password"
                                                class="form-control" placeholder="Confirm Password">
                                        </div>
                                        <small id="message_confirm_password" class="invisible"></small>

                                    </div>
                                </div>

                                <button id="submit" class='btn btn-primary btn-block'> Register Store </button>
                            </form>
                            <a href="#" class='d-block mt-4 font-weight-bold text-center text-dark'> Login Now </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            //Messages
            var message_store_title = $('#message_store_title');
            var message_store_url = $('#message_store_url');
            var message_entity_type = $('#message_entity_type');
            var message_commercial_registration_link = $('#message_commercial_registration_link');
            var message_registration_number_in_trusted = $('#message_registration_number_in_trusted');
            var message_id_number = $('#message_id_number');
            var message_store_manager = $('#message_store_manager');
            var message_phone_number = $('#message_phone_number');
            var message_email = $('#message_email');
            var message_password = $('#message_password');
            var message_confirm_password = $('#message_confirm_password');

            //Fields
            var store_title = $('#store_title');
            var store_url = $('#store_url');
            var entity_type = $('#entity_type');
            var commercial_registration_link = $('#commercial_registration_link');
            var registration_number_in_trusted = $('#registration_number_in_trusted');
            var id_number = $('#id_number');
            var store_manager = $('#store_manager');
            var phone_number = $('#phone_number');
            var email = $('#email');
            var password = $('#password');
            var confirm_password = $('#confirm_password');

            //Span Images
            var basic_store_title = $('#basic_store_title');
            var basic_store_url = $('#basic_store_url');
            var basic_entity_type = $('#basic_entity_type');
            var basic_commercial_registration_link = $('#basic_commercial_registration_link');
            var basic_registration_number_in_trusted = $('#basic_registration_number_in_trusted');
            var basic_id_number = $('#basic_id_number');
            var basic_store_manager = $('#basic_store_manager');
            var basic_phone_number = $('#basic_phone_number');
            var basic_email = $('#basic_email');
            var basic_password = $('#basic_password');
            var basic_confirm_password = $('#basic_confirm_password');







            store_url.change(function() {
                let text = store_url.val();

                let pattern = /^[A-Za-z0-9]+(?:-[A-Za-z0-9]+)+$/;
                let result = pattern.test(text);

                if (result) {
                    store_url.css('border-color', 'green');
                    basic_store_url.css('border-color', 'green');
                    message_store_url.css('color', 'green');
                    message_store_url.removeClass('invisible');
                    message_store_url.removeClass('visible');
                    message_store_url.text("Success");
                } else {
                    store_url.css('border-color', 'red');
                    basic_store_url.css('border-color', 'red');
                    message_store_url.css('color', 'red');
                    message_store_url.removeClass('invisible');
                    message_store_url.removeClass('visible');
                    message_store_url.text("The url must be like this pattren 'store-test' ");
                }
            });



            $("#store_subscription").submit(function(e) {

                e.preventDefault();

                $.ajax({
                    url: "{{ route('create-store') }}",
                    method: 'POST',
                    data: {
                        store_title: store_title.val(),
                        store_url: store_url.val(),
                        entity_type: entity_type.val(),
                        commercial_registration_link: commercial_registration_link.val(),
                        registration_number_in_trusted: registration_number_in_trusted.val(),
                        id_number: id_number.val(),
                        store_manager: store_manager.val(),
                        phone_number: phone_number.val(),
                        email: email.val(),
                        password: password.val(),
                        confirm_password: confirm_password.val(),
                        package_id: "{{ $package_id }}",
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        lang: "{{ app()->getLocale() }}"
                    },

                    success: function(data) {
                        window.location = "{{ url('store/home') }}";
                    },

                    error: function(reject) {

                        console.log(reject);

                        var response = $.parseJSON(reject.responseText).errors;

                        console.log(response);

                        if (response.store_title) {
                            store_title.css('border-color', 'red');
                            basic_store_title.css('border-color', 'red');
                            message_store_title.css('color', 'red');
                            message_store_title.removeClass('invisible');
                            message_store_title.removeClass('visible');
                            message_store_title.text(response.store_title[0]);
                        } else {
                            store_title.css('border-color', 'green');
                            basic_store_title.css('border-color', 'green');
                            message_store_title.css('color', 'green');
                            message_store_title.removeClass('invisible');
                            message_store_title.removeClass('visible');
                            message_store_title.text("success");
                        }

                        if (response.store_url) {
                            store_url.css('border-color', 'red');
                            basic_store_url.css('border-color', 'red');
                            message_store_url.css('color', 'red');
                            message_store_url.removeClass('invisible');
                            message_store_url.removeClass('visible');
                            message_store_url.text(response.store_url[0]);
                        } else {
                            store_url.css('border-color', 'green');
                            basic_store_url.css('border-color', 'green');
                            message_store_url.css('color', 'green');
                            message_store_url.removeClass('invisible');
                            message_store_url.removeClass('visible');
                            message_store_url.text("success");
                        }

                        if (response.commercial_registration_link) {
                            commercial_registration_link.css('border-color', 'red');
                            basic_commercial_registration_link.css('border-color', 'red');
                            message_commercial_registration_link.css('color', 'red');
                            message_commercial_registration_link.removeClass('invisible');
                            message_commercial_registration_link.removeClass('visible');
                            message_commercial_registration_link.text(response
                                .commercial_registration_link[0]);
                        } else {
                            commercial_registration_link.css('border-color', 'green');
                            basic_commercial_registration_link.css('border-color', 'green');
                            message_commercial_registration_link.css('color', 'green');
                            message_commercial_registration_link.removeClass('invisible');
                            message_commercial_registration_link.removeClass('visible');
                            message_commercial_registration_link.text("success");
                        }

                        if (response.registration_number_in_trusted) {
                            registration_number_in_trusted.css('border-color', 'red');
                            basic_registration_number_in_trusted.css('border-color', 'red');
                            message_registration_number_in_trusted.css('color', 'red');
                            message_registration_number_in_trusted.removeClass('invisible');
                            message_registration_number_in_trusted.removeClass('visible');
                            message_registration_number_in_trusted.text(response
                                .registration_number_in_trusted[0]);
                        } else {
                            registration_number_in_trusted.css('border-color', 'green');
                            basic_registration_number_in_trusted.css('border-color', 'green');
                            message_registration_number_in_trusted.css('color', 'green');
                            message_registration_number_in_trusted.removeClass('invisible');
                            message_registration_number_in_trusted.removeClass('visible');
                            message_registration_number_in_trusted.text("success");
                        }

                        if (response.id_number) {
                            id_number.css('border-color', 'red');
                            basic_id_number.css('border-color', 'red');
                            message_id_number.css('color', 'red');
                            message_id_number.removeClass('invisible');
                            message_id_number.removeClass('visible');
                            message_id_number.text(response.id_number[0]);
                        } else {
                            id_number.css('border-color', 'green');
                            basic_id_number.css('border-color', 'green');
                            message_id_number.css('color', 'green');
                            message_id_number.removeClass('invisible');
                            message_id_number.removeClass('visible');
                            message_id_number.text("success");
                        }

                        if (response.store_manager) {
                            store_manager.css('border-color', 'red');
                            basic_store_manager.css('border-color', 'red');
                            message_store_manager.css('color', 'red');
                            message_store_manager.removeClass('invisible');
                            message_store_manager.removeClass('visible');
                            message_store_manager.text(response.store_manager[0]);
                        } else {
                            store_manager.css('border-color', 'green');
                            basic_store_manager.css('border-color', 'green');
                            message_store_manager.css('color', 'green');
                            message_store_manager.removeClass('invisible');
                            message_store_manager.removeClass('visible');
                            message_store_manager.text("success");
                        }


                        if (response.email) {
                            email.css('border-color', 'red');
                            basic_email.css('border-color', 'red');
                            message_email.css('color', 'red');
                            message_email.removeClass('invisible');
                            message_email.removeClass('visible');
                            message_email.text(response.email[0]);
                        } else {
                            email.css('border-color', 'green');
                            basic_email.css('border-color', 'green');
                            message_email.css('color', 'green');
                            message_email.removeClass('invisible');
                            message_email.removeClass('visible');
                            message_email.text("success");
                        }

                        if (response.phone_number) {
                            phone_number.css('border-color', 'red');
                            basic_phone_number.css('border-color', 'red');
                            message_phone_number.css('color', 'red');
                            message_phone_number.removeClass('invisible');
                            message_phone_number.removeClass('visible');
                            message_phone_number.text(response.phone_number[0]);
                        } else {
                            phone_number.css('border-color', 'green');
                            basic_phone_number.css('border-color', 'green');
                            message_phone_number.css('color', 'green');
                            message_phone_number.removeClass('invisible');
                            message_phone_number.removeClass('visible');
                            message_phone_number.text("success");
                        }

                        if (response.password) {
                            password.css('border-color', 'red');
                            basic_password.css('border-color', 'red');
                            message_password.css('color', 'red');
                            message_password.removeClass('invisible');
                            message_password.removeClass('visible');
                            message_password.text(response.password[0]);
                        } else {
                            password.css('border-color', 'green');
                            basic_password.css('border-color', 'green');
                            message_password.css('color', 'green');
                            message_password.removeClass('invisible');
                            message_password.removeClass('visible');
                            message_password.text("success");
                        }

                        if (response.confirm_password) {
                            confirm_password.css('border-color', 'red');
                            basic_confirm_password.css('border-color', 'red');
                            message_confirm_password.css('color', 'red');
                            message_confirm_password.removeClass('invisible');
                            message_confirm_password.removeClass('visible');
                            message_confirm_password.text(response.confirm_password[0]);
                        } else {
                            confirm_password.css('border-color', 'green');
                            basic_confirm_password.css('border-color', 'green');
                            message_confirm_password.css('color', 'green');
                            message_confirm_password.removeClass('invisible');
                            message_confirm_password.removeClass('visible');
                            message_confirm_password.text("success");
                        }
                    }
                });
            });
        });
    </script>
@endsection
