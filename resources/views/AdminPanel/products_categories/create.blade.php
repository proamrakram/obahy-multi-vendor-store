@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
<div class="container-fluid">

    <div class="layout-specing">

        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4"> @lang('adminPanel.add-category') </h6>
            </div>

            <div class="p-4">
                <form method="post" action="{{ route('admin.products-categories.store') }}" enctype="multipart/form-data">
                    @csrf


                    <div class="row">
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label"> @lang('adminPanel.category-name-en')</label>
                                <div class="col-9">
                                    <input type="text" name="category_name_en" class="form-control  @error('category_name_en') is-invalid @enderror" id="rolesName" placeholder=" @lang('adminPanel.category-name-en') ">
                                    @error('category_name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label"> @lang('adminPanel.category-name-ar')</label>
                                <div class="col-9">
                                    <input type="text" name="category_name_ar" class="form-control  @error('category_name_ar') is-invalid @enderror" id="rolesName" placeholder=" @lang('adminPanel.category-name-ar') ">
                                    @error('category_name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label"> @lang('adminPanel.category-type')  </label>
                                <div class="col-9">
                                    <select name="type" id="" class="form-control form-select @error('type') is-invalid @enderror main_category">
                                        <option value="category"> @lang('adminPanel.main-category')  </option>
                                        <option value="subcategory"> @lang('adminPanel.sub-category')  </option>
                                    </select>@error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                        <div class="col-md-8  main_category_select"  style="display:none">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label">@lang('adminPanel.main-category')  </label>
                                <div class="col-9">
                                    <select name="parent_id" id="" class="form-control form-select @error('parent_id') is-invalid @enderror">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->getName()}} </option>
                                        @endforeach
                                    </select> @error('parent_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                        
                        
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label">@lang('adminPanel.category-image')</label>
                                <div class="col-9">
                                   <div class="avatar-upload @error('category_image') is-invalid @enderror">
    <div class="avatar-edit"> 
        <input type='file' id="imageUpload" name="category_image" accept=".png, .jpg, .jpeg" class="form-control   "/>
        <label for="imageUpload"></label>
    </div>
    <div class="avatar-preview">
        <div id="imagePreview" style="background-image: url({{asset('assets/images/icon/icon-photo-camera.svg')}});">
        </div>
    </div>
</div>              
                                    @error('category_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                        
                        
                        
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4 ">
                                <label for="rolesName" class="col-3 col-form-label">@lang('adminPanel.category-icon')</label>
                                <div class="col-9">
                                   <div class="avatar-upload @error('category_icon') is-invalid @enderror">
    <div class="avatar-edit"> 
        <input type='file' id="imageUpload2" name="category_icon" accept=".png, .jpg, .jpeg" class="form-control  "/>
        <label for="imageUpload2"></label>
    </div>
    <div class="avatar-preview">
        <div id="imagePreview2"  style="background-image: url({{asset('assets/images/icon/icon-photo-camera.svg')}});">
        </div>
    </div>
</div>              
                                    @error('category_icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark px-4 mx-4 py-2"> @lang('adminPanel.save-data') </button>
                </form>
            </div>
        </div>
        <!--end bg-white-->

    </div>
</div>
<!--end container-->



@endsection
@section('script')
<script>
    $('body').on('change', '.main_category', function () {

        var valSelect = $(this).val();  
        if(valSelect == 'category'){


          $('.main_category_select').hide();
        }else{
          $('.main_category_select').show();
        }


      });
</script>

@endsection