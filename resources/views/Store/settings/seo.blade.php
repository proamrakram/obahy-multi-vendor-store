@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')

<div class="container-fluid">
        <div class="layout-specing">
            <div class="bg-white mt-3">
                <div class="d-flex justify-content-between p-3  bg-soft-dark   rounded-top border-bottom heading-with-shape">
                    <h6 class="fw-bold mb-0 h4 ps-4">@lang('adminPanel.seo')</h6>
                </div>
             
                <div class="p-4">

                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <ul class=" nav nav-pills nav-justified flex-column flex-sm-row rounded" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link rounded active" id="lang-ar-tab" data-bs-toggle="pill" href="#lang-ar" role="tab" aria-controls="lang-ar" aria-selected="false">
                                        <div class="text-center py-2">
                                            <h6 class="mb-0">@lang('adminPanel.arabic')</h6>
                                        </div>
                                    </a><!--end nav link-->
                                </li><!--end nav item-->
                                
                                <li class="nav-item">
                                    <a class="nav-link rounded" id="lang-en-tab" data-bs-toggle="pill" href="#lang-en" role="tab" aria-controls="lang-en" aria-selected="false">
                                        <div class="text-center py-2">
                                            <h6 class="mb-0">@lang('adminPanel.english')</h6>
                                        </div>
                                    </a><!--end nav link-->
                                </li><!--end nav item-->
                                
                          
                            </ul><!--end nav pills-->                                                
                        </div>
                    </div>

                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="lang-ar" role="tabpanel" aria-labelledby="lang-ar">
                        <form method="post" action="{{ route('store.settings.seo-ar') }}" enctype="multipart/form-data">
                    @csrf
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="seoKeywords" class="col-3 col-form-label"> @lang('adminPanel.keywords')  </label>
                                            <div class="col-9">
                                                <input type="text" id="seoKeywords" name="seo_keywords_ar" value="{{$seo_keywords_ar}}" class="form-control  @error('seo_keywords_ar') is-invalid @enderror" placeholder="@lang('adminPanel.it-is-simply') ">
                                                @error('seo_keywords_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror</div>
                                        </div> <!-- / End seoKeywords -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="seoTitle" class="col-3 col-form-label">@lang('adminPanel.store-page-address') </label>
                                            <div class="col-9">
                                                <input type="text" id="seoTitle"  name="seo_store_title_ar"  value="{{$seo_store_title_ar}}" class="form-control  @error('seo_store_title_ar') is-invalid @enderror" placeholder="@lang('adminPanel.here-is-the-address')  ">
                                                @error('seo_store_title_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror</div>
                                        </div> <!-- / End seoKeywords -->
                                    </div>
                                    
                                    <div class="col-md-9">
                                        <div class="row mb-3">
                                            <label for="seoDesc" class="col-2 col-form-label"> @lang('adminPanel.store-description')  </label>
                                            <div class="col-10">
                                                <textarea id="seoDesc" name="seo_store_description_ar"  class="form-control  @error('seo_store_description_ar') is-invalid @enderror" placeholder="@lang('adminPanel.write-your-store-description-here')"> {{$seo_store_description_ar}}</textarea>
                                                @error('seo_store_description_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror</div>
                                        </div> <!-- / End seoKeywords -->
                                    </div> 
                                    
                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="seoURL" class="col-3 col-form-label"> @lang('adminPanel.store-link')   </label>
                                            <div class="col-9">
                                                <input type="text" id="seoURL"  name="seo_store_url_ar"  value="{{$seo_store_url_ar}}" class="form-control  @error('seo_store_url_ar') is-invalid @enderror"  >
                                                @error('seo_store_url_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror</div>
                                        </div> <!-- / End seoKeywords -->
                                    </div>                                    
                                
                                    <div class="col-md-12 mt-4 text-center">
                                        <button  type="submit" class="btn btn-dark px-4 mx-4 py-2"> @lang('adminPanel.save-data')  </button>   
                                    </div>
                                </div>
                            </form>
                        </div><!--end teb pane-->

                        <div class="tab-pane fade  " id="lang-en" role="tabpanel" aria-labelledby="lang-en">
                        <form method="post" action="{{ route('store.settings.seo-en') }}" enctype="multipart/form-data">
                    @csrf
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="seoKeywordsEn" class="col-3 col-form-label"> @lang('adminPanel.keywords')</label>
                                            <div class="col-9">
                                                <input type="text"  name="seo_keywords_en"  id="seoKeywordsEn" value="{{$seo_keywords_en}}" class="form-control   @error('seo_keywords_en') is-invalid @enderror" placeholder="@lang('adminPanel.it-is-simply') ">
                                                @error('seo_keywords_en')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror</div>
                                        </div> <!-- / End seoKeywords -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="seoTitleEn" class="col-3 col-form-label">@lang('adminPanel.store-page-address') </label>
                                            <div class="col-9">
                                                <input type="text"  name="seo_store_title_en" id="seoTitleEn" value="{{$seo_store_title_en}}" class="form-control   @error('seo_store_title_en') is-invalid @enderror" placeholder="@lang('adminPanel.here-is-the-address')">
                                                @error('seo_store_title_en')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror</div>
                                        </div> <!-- / End seoKeywords -->
                                    </div>
                                    
                                    <div class="col-md-9">
                                        <div class="row mb-3">
                                            <label for="seoDescEn" class="col-2 col-form-label"> @lang('adminPanel.store-description')</label>
                                            <div class="col-10">
                                                <textarea  name="seo_store_description_en"   id="seoDescEn" class="form-control  @error('seo_store_description_en') is-invalid @enderror" placeholder="@lang('adminPanel.write-your-store-description-here')">{{$seo_store_description_en}}</textarea>
                                                @error('seo_store_description_en')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror</div>
                                        </div> <!-- / End seoKeywords -->
                                    </div> 
                                    
                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <label for="seoURLEn" class="col-3 col-form-label"> @lang('adminPanel.store-link') </label>
                                            <div class="col-9">
                                                <input type="text" name="seo_store_url_en"   id="seoURLEn" value="{{$seo_store_url_en}}" class="form-control   @error('seo_store_url_en') is-invalid @enderror"  >
                                                @error('seo_store_url_en')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror</div>
                                        </div> <!-- / End seoKeywords -->
                                    </div>                                    
                                
                                    <div class="col-md-12 mt-4 text-center">
                                        <button type="submit" class="btn btn-dark px-4 mx-4 py-2">@lang('adminPanel.save')  </button>   
                                    </div>
                                </div>
                            </form>                         
                        </div><!--end teb pane-->
                        
                    </div><!--end tab content-->
                                        
                </div>

            </div> <!--end bg-white-->

        </div>         
    </div><!--end container-->
<!--end container-->
</main>
<!--End page-content" -->


@endsection