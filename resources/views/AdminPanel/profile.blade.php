@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
<div class="container-fluid">
        <div class="layout-specing">
        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4">@lang('adminPanel.profile')  </h6>
            </div>

            <div class="p-4">
            <form action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" method="POST">
                                @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <label for="Name" class="col-2 col-form-label"> 
                                @lang('adminPanel.name')<span class="text-danger"> * </span> 
                                </label>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-12">
                                             <input type="text" value="{{ auth()->user()->name }}" name="name" required  class="form-control col-6   @error('name') is-invalid @enderror" id="NameEn" placeholder="@lang('adminPanel.name')">
                                             @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <label for="Phone" class="col-2 col-form-label"> 
                                @lang('adminPanel.email')<span class="text-danger"> * </span> 
                                </label>
                                <div class="col-10">
                                    <input type="text"  value="{{ auth()->user()->email}}" name="email" required class="form-control   @error('email') is-invalid @enderror " id="Phone" placeholder="@lang('adminPanel.email')">
                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <label for="Phone" class="col-2 col-form-label"> 
                                @lang('adminPanel.password')
                                </label>
                                <div class="col-10">
                                    <input type="password"  name="password" class="form-control   @error('password') is-invalid @enderror " id="Phone" placeholder=" @lang('adminPanel.password')">
                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <label for="Phone" class="col-2 col-form-label"> 
                                @lang('adminPanel.password-confirmation')  
                                </label>
                                <div class="col-10">
                                    <input type="password"  name="password_confirmation" class="form-control   @error('password_confirmation') is-invalid @enderror " id="Phone" placeholder="@lang('adminPanel.password-confirmation')">
                                    @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                            </div>
                        </div>
                    </div>


                    <hr class="mt-5 mb-4">
                    <button class="btn btn-dark px-4 mx-4 py-2">@lang('adminPanel.save-data') </button>  

                </form>                
            </div>


 
            
            </div> <!--end bg-white-->
        </div>   
    </div><!--end container-->



@endsection