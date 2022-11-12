@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
<div class="container-fluid">

    <div class="layout-specing">

        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4"> @lang('adminPanel.add-comment') </h6>
            </div>

            <div class="p-4">
                <form method="post" action="{{ route('admin.products-comments.store') }}" enctype="multipart/form-data">
                    @csrf


                    <div class="row">
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label"> @lang('adminPanel.user')</label>
                                <div class="col-9">
                                <select name="user_id" id="" class="form-control form-select @error('user_id') is-invalid @enderror">
                                <option value=""> @lang('adminPanel.choose-user')</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}} </option>
                                        @endforeach
                                    </select>
                                     @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label"> @lang('adminPanel.product')</label>
                                <div class="col-9">
                                <select name="product_id" id="" class="form-control form-select @error('product_id') is-invalid @enderror">
                                        @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->getName()}} </option>
                                        @endforeach
                                    </select>
                                     @error('product_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label"> @lang('adminPanel.stars')</label>
                                <div class="col-9">
                                    <select class="example-fontawesome"  name="stars" id="" class="form-control form-select @error('stars') is-invalid @enderror">
                                            @for($rate=1 ;$rate<6; $rate++)
                                        <option  value="{{$rate}}">{{$rate}}</option>
                                        @endfor
                                        </select>
                                        @error('stars')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div> <!-- / End  Roles Name -->
                        </div>

                        
                        <div class="col-md-8">
                            <div class="row mb-3 mt-4 mb-4">
                                <label for="rolesName" class="col-3 col-form-label"> @lang('adminPanel.comment')</label>
                                <div class="col-9">
                                    <textarea name="comment" class="form-control  @error('comment') is-invalid @enderror" id="rolesName" placeholder=" @lang('adminPanel.comment') "></textarea>
                                    @error('comment')
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