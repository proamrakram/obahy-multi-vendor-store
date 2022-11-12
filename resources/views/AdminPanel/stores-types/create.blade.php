@extends('partials.layout')
@section('title')
    Obaya - Dashboard
@endsection

@section('content')
    <div class="container-fluid">
        <div class="layout-specing">
            <div class="bg-white mt-3">
                <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                    <h6 class="fw-bold mb-0 h4"> @lang('adminPanel.add-store-type') </h6>
                </div>

                <div class="p-4">
                    <form action="{{ route('admin.stores-types.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="row mb-3">
                                    <label for="Name" class="col-2 col-form-label">
                                    @lang('adminPanel.name')    <span class="text-danger"> * </span>
                                    </label>
                                    <div class="col-md-10">
                                        <div class="row">

                                            <div class="col-6">
                                                <input type="text" value="{{ old('store_type_ar') }}"
                                                    name="store_type_ar"
                                                    class="form-control @error('store_type_ar') is-invalid @enderror"
                                                    id="NameAr" placeholder="@lang('adminPanel.name-ar')">

                                                @error('store_type_ar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-6">
                                                <input type="text" value="{{ old('store_type_en') }}"
                                                    name="store_type_en"
                                                    class="form-control col-6   @error('store_type_en') is-invalid @enderror"
                                                    id="NameEn" placeholder="@lang('adminPanel.name-en')">
                                                @error('store_type_en')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                            <div class="row align-items-center ">
                                                <div class="col-md-2"><label for="userImage" class='font-sm'> @lang('adminPanel.image') </label></div>
                                                <div class="col-md-10"><div class="avatar-upload">
    <div class="avatar-edit"> 
        <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" class="form-control   @error('image') is-invalid @enderror"/>
        <label for="imageUpload"> </label>
    </div>
    <div class="avatar-preview">
        <div id="imagePreview" @if(!is_null(old('image'))) style="background-image: url({{old('image')}});" @else style="background-image: url({{asset('assets/images/icon/icon-photo-camera.svg')}});" @endif>
        </div>
    </div>
</div>   
 @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                            </div>


                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="row align-items-center">
                                    <label for="Name" class="col-2 col-form-label">
                                    @lang('adminPanel.status')  <span class="text-danger"> * </span>
                                    </label>
                                    <div class="col-md-10">
                                        <div class="form-check form-switch p-0 pt-1">
                                            <input name="store_type_status"
                                                class="form-check-input   @error('store_type_status') is-invalid @enderror"
                                                type="checkbox" id="flexSwitchCheckChecked" checked="">
                                            @error('store_type_status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="row align-items-center">
                                    <label for="Name" class="col-2 col-form-label">
                                    @lang('adminPanel.banner-department') قسم البانر <span class="text-danger"> * </span>
                                    </label>
                                    <div class="col-md-10">
                                        <div class="form-check form-switch p-0 pt-1">
                                            <input name="banner_section"
                                                class="form-check-input   @error('banner_section') is-invalid @enderror"
                                                type="checkbox" id="flexSwitchCheckChecked">
                                            @error('banner_section')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row align-items-center">
                                    <label for="Name" class="col-2 col-form-label">
                                    @lang('adminPanel.services-department')<span class="text-danger"> * </span>
                                    </label>
                                    <div class="col-md-10">
                                        <div class="form-check form-switch p-0 pt-1">
                                            <input name="service_section"
                                                class="form-check-input   @error('service_section') is-invalid @enderror"
                                                type="checkbox" id="flexSwitchCheckChecked" >
                                            @error('service_section')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row align-items-center">
                                    <label for="Name" class="col-2 col-form-label">
                                    @lang('adminPanel.search-department') <span class="text-danger"> * </span>
                                    </label>
                                    <div class="col-md-10">
                                        <div class="form-check form-switch p-0 pt-1">
                                            <input name="filter_section"
                                                class="form-check-input   @error('filter_section') is-invalid @enderror"
                                                type="checkbox" id="flexSwitchCheckChecked">
                                            @error('filter_section')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr class="mt-5 mb-4">
                        <button class="btn btn-dark px-4 mx-4 py-2">@lang('adminPanel.save-data') </button>


                    </form>

                </div>




            </div>
            <!--end bg-white-->
        </div>
    </div>
    <!--end container-->
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#country-dropdown').on('change', function() {
                var country_id = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{ url('/admin/get-cities-by-country') }}",
                    type: "POST",
                    data: {
                        country_id: country_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dropdown').html('<option value="">اختر المدينة</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dropdown").append('<option value="' + value.id +
                                '">' + value.city_name_ar + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
