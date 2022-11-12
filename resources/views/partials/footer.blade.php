</div>
<!-- javascript -->

		

        <!-- for stars -->

<script src="{{ asset('assets/js/vendor.bundle.base.js')}}"></script>
    <script src="{{ asset('assets/js/vendor.bundle.addons.js')}}"></script>

<script src="{{ asset('assets/js/form-addons.js')}}"></script>

<!-- end -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<!-- simplebar -->
<script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
<!-- Icons -->
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<!-- Chart -->
<script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>


		
		
<!-- Main Js -->
<script src="{{ asset('assets/js/plugins.init.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		

        
		<script src="{{asset('assets/js/plugins.bundle.js')}}"></script>
		
		
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->


		<script src="{{asset('assets/js/datatables.bundle.js')}}"></script>
<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    @if (Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif

    @if (Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif
</script>
@yield('script')



</body>

</html>
