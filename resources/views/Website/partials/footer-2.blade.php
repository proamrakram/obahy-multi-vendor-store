<footer class='py-3'>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="mb-0 d-inline-block pr-2">
                    All Copyright 2022&copy</p>
                <img src="{{ asset('assets/images/icon/logo.svg') }}" width='50'>
            </div>
            <div class="col-md-6">
                <p class="mb-0 development-content">
                    <a class="akwade-link" href="https://akwade.com/" target="_blank">
                        <span>
                            <span class="development-by">Development</span>
                            <img class="img-fluid img-cover" src="{{ asset('assets/images/logoAkwade.png') }}"
                                alt="Akwade" width="90px">
                        </span>
                    </a>
                </p>
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
<script src="{{ asset('assets/js/en_app.js') }}"></script>


<script>
    $(document).ready(function() {

        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    });
</script>

@yield('script')

</body>

</html>
