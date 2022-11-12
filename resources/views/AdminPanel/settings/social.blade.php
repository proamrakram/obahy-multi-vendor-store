@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')



<div class="container-fluid">
    <div class="layout-specing">


        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4">@lang('adminPanel.social-media-links')  </h6>
            </div>


            <div class="p-4">
                <form method="post" action="{{ route('admin.settings.social') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <label for="twitter_socail_platform" class="col-3 col-form-label"> @lang('adminPanel.twitter-link') </label>
                                <div class="col-9">
                                    <input type="text" class="form-control  @error('platform_twitter') is-invalid @enderror" name="platform_twitter" value="{{$setting['platform_twitter'] ?? ''}}"  id="twitter_socail_platform" placeholder=" " required>
                                    @error('platform_twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <label for="facebook_socail_platform" class="col-3 col-form-label">@lang('adminPanel.facebook-link')  </label>
                                <div class="col-9">
                                    <input type="text" class="form-control  @error('platform_facebook') is-invalid @enderror" name="platform_facebook" value="{{$setting['platform_facebook'] ?? ''}}"  id="facebook_socail_platform" placeholder=" " required>
                                    @error('platform_facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row mb-3">
                                <label for="linkedin_socail_platform" class="col-3 col-form-label">@lang('adminPanel.linkedin-link')  </label>
                                <div class="col-9">
                                    <input type="text" class="form-control   @error('platform_linkedin') is-invalid @enderror" name="platform_linkedin" value="{{$setting['platform_linkedin'] ?? ''}}"  id="linkedin_socail_platform" placeholder=" " required>
                                    @error('platform_linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row mb-3">
                                <label for="instagram_socail_platform" class="col-3 col-form-label">@lang('adminPanel.instagram-link')  </label>
                                <div class="col-9">
                                    <input type="text" class="form-control   @error('platform_instagram') is-invalid @enderror" name="platform_instagram" value="{{$setting['platform_instagram'] ?? ''}}"  id="instagram_socail_platform" placeholder=" " required>
                                    @error('platform_instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-dark px-4  py-2">@lang('adminPanel.save') </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end bg-white-->

    </div>
</div>
<!--end container-->
</main>
<!--End page-content" -->

@endsection