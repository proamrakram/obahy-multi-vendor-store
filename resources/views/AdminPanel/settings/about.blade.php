@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')


    <div class="container-fluid">
        <div class="layout-specing">
 

            <div class="bg-white mt-3">
                <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                    <h6 class="fw-bold mb-0 h4">@lang('adminPanel.settings-of-aboutus-page')   </h6>
                </div>
 
                
                <div class="p-4">
                <form method="post" action="{{ route('admin.settings.about') }}" enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                         
                  
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <label for="nameEn_platform" class="col-3 col-form-label"> @lang('adminPanel.page-name-ar') </label>
                                <div class="col-9">
                                    <input type="text" class="form-control   @error('about_page_name_ar') is-invalid @enderror" name="about_page_name_ar" value="{{$setting['about_page_name_ar'] ?? ''}}"  id="nameEn_platform" placeholder=" " required>
                                    @error('about_page_name_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                </div>
                            </div>                                
                        </div> 
                            
                            
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <label for="nameEn_platform" class="col-3 col-form-label"> @lang('adminPanel.page-name-en') </label>
                                <div class="col-9">
                                    <input type="text" class="form-control   @error('about_page_name_en') is-invalid @enderror" name="about_page_name_en" value="{{$setting['about_page_name_en'] ?? ''}}" id="nameEn_platform" placeholder=" " required>
                                    @error('about_page_name_en')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                </div>
                            </div>                                
                        </div> 

                        <div class="col-12 mt-4" id="nav-tabs">
                            <div class="row">
                                <div class="col-md-5">
                                    <ul class="nav nav-pills nav-justified flex-column flex-sm-row rounded" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link rounded active" id="about_us_content-tab" data-bs-toggle="pill" href="#about_us_content" role="tab" aria-controls="about_us_content" aria-selected="true">
                                                <div class="text-center py-2">
                                                    <h6 class="mb-0"> @lang('adminPanel.page-content-ar') </h6>
                                                </div>
                                            </a><!--end nav link-->
                                        </li><!--end nav item-->
                                        
                                        <li class="nav-item">
                                            <a class="nav-link rounded" id="about_us_content_en-tab" data-bs-toggle="pill" href="#about_us_content_en" role="tab" aria-controls="about_us_content_en" aria-selected="false">
                                                <div class="text-center py-2">
                                                    <h6 class="mb-0"> @lang('adminPanel.page-content-en') </h6>
                                                </div>
                                            </a><!--end nav link-->
                                        </li><!--end nav item-->
                                       
                                    </ul><!--end nav pills-->                                                
                                </div>
                            </div>

                            
                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade active show" id="about_us_content" role="tabpanel" aria-labelledby="about_us_content">
                                    <textarea class="form-control mb-2   @error('about_page_details_ar') is-invalid @enderror" name="about_page_details_ar" id="" placeholder=" @lang('adminPanel.details-ar') " required>{{$setting['about_page_details_ar'] ?? ''}}</textarea>
                                    @error('about_page_details_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                </div><!--end teb pane-->

                                <div class="tab-pane fade" id="about_us_content_en" role="tabpanel" aria-labelledby="about_us_content_en">
                                    <textarea class="form-control mb-2   @error('about_page_details_en') is-invalid @enderror" name="about_page_details_en"  id="" placeholder=" @lang('adminPanel.details-en')" required>{{$setting['about_page_details_en'] ?? ''}}</textarea>  
                                    @error('about_page_details_en')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror      
                                </div><!--end teb pane-->
                                
         
                            </div><!--end tab content-->
                            
                        </div>

                         
                        <div class="col-md-12">
                            <button class="btn btn-dark px-4  py-2"> @lang('adminPanel.save')   </button>
                        </div>

                  </div>
</form>
                </div>
            </div> <!--end bg-white-->

        </div>         
    </div><!--end container-->
</main>
<!--End page-content" -->
@endsection