@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
<div class="container-fluid">
    <div class="layout-specing">



        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4">@lang('adminPanel.customers')</h6>
                <div class="btns">
                @if(auth()->user()->can('customers-create'))
                    <a href="javascript:void(0)" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addCliten">@lang('adminPanel.add-customer')</a>
                @endif
                </div>
            </div>
            @if(auth()->user()->can('customers-create'))
            <!-- Modal Content Start -->
            <div class="modal fade" id="addCliten" tabindex="-1" aria-labelledby="LoginForm-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content rounded shadow border-0">
                        <div class="modal-header border-bottom bg-soft-dark">
                            <h5 class="modal-title" id="LoginForm-title">@lang('adminPanel.add-new-customer')</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('store.customers.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="bg-white p-3 rounded box-shadow">
                                    <div class="alert alert-warning d-flex align-items-center bg-orange-light p-3 mb-4" role="alert">
                                        <img src="{{asset('assets/images/icon/icon-warning.svg')}}" width="24" alt="">
                                        <div class="text-dark ps-3">
                                        @lang('adminPanel.this-feature-is-only-available-in-obeya-plus-pro')  
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-3"><label for="name" class='font-sm'>@lang('adminPanel.name') </label></div>
                                                <div class="col-md-9"> <input type="text" value="{{ old('name') }}" name="name" id="name" value="" class="form-control @error('name') is-invalid @enderror">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-3"><label for="phone_number" class='font-sm'>@lang('adminPanel.mobile-no')</label></div>
                                                <div class="col-md-9"> <input type="text" value="{{ old('phone_number') }}" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror">
                                                    @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-3"><label for="City" class='font-sm'>@lang('adminPanel.country')</label></div>
                                                <div class="col-md-9"> <select name="country_id" id="" class="form-control form-select @error('country_id') is-invalid @enderror">
                                                        @foreach($countries as $country)
                                                        <option value="{{$country->id}}" @if(old('country_id')==$country->id )selected @endif>{{$country->getName()}} </option>
                                                        @endforeach
                                                    </select> @error('country_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-3"><label for="postCode" class='font-sm'>@lang('adminPanel.post-code')</label></div>
                                                <div class="col-md-9"> <input name="postCode" value="{{ old('postCode') }}" type="text" id="postCode" class="form-control @error('postCode') is-invalid @enderror">
                                                    @error('postCode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-3"><label for="email" class='font-sm'>@lang('adminPanel.email')</label></div>
                                                <div class="col-md-9"> <input type="text" value="{{ old('email') }}" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-3"><label for="userPassowrd" class='font-sm'>@lang('adminPanel.password')</label></div>
                                                <div class="col-md-9"> <input name="password" type="password" id="userPassowrd" class="form-control @error('password') is-invalid @enderror">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-2"><label for="date" class='font-sm'>@lang('adminPanel.birthdate')</label></div>
                                                <div class="col-md-10"> <input type="date" name="birthdate" value="{{ old('birthdate') }}" id="date" class="form-control @error('role') is-invalid @enderror">
                                                    @error('birthdate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-2"><label for="type" class='font-sm'>@lang('adminPanel.gender')</label></div>
                                                <div class="col-md-10"> <select name="gender" id="" class="form-control form-select @error('gender') is-invalid @enderror">
                                                        <option value="male" @if(old('gender')=='male' )selected @endif> @lang('adminPanel.male') </option>
                                                        <option value="female" @if(old('gender')=='female' )selected @endif> @lang('adminPanel.female') </option>
                                                    </select>
                                                    @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="row align-items-center ">
                                                <div class="col-md-2"><label for="userImage" class='font-sm'> @lang('adminPanel.add-user-image')</label></div>
                                                <div class="col-md-10"> <input name="image" type="file" id="userImage" class="form-control @error('image') is-invalid @enderror">
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
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="submit" class="btn btn-dark px-5"> @lang('adminPanel.add-customer') </button>
                            </div>
                            <form>
                    </div>
                </div>
            </div>
            <!-- Modal Content End -->
            @endif

            <div class="p-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="rounded border bg-light  text-center p-4">
                            <div class="icon mb-2">
                                <img src="{{asset('assets/images/icon/icon-clients-group.svg')}}" alt="">
                            </div>
                            <h5 class='mb-0'>@lang('adminPanel.all-customers')  </h5>
                            <p class='main-color'> {{$customer_count}} @lang('adminPanel.customer') </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="rounded border bg-light text-center p-4">
                            <div class="icon mb-2">
                                <img src="{{asset('assets/images/icon/icon-clients-group.svg')}}" alt="">
                            </div>
                            <h5 class='mb-0'>@lang('adminPanel.most-purchased-customers')</h5>
                            <p class='main-color'> 7014 @lang('adminPanel.customer') </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="rounded border bg-light text-center p-4 ">
                            <div class="icon mb-2">
                                <img src="{{asset('assets/images/icon/icon-clients-group.svg')}}" alt="">
                            </div>
                            <h5 class='mb-0'>@lang('adminPanel.lowest-buying-customers')  </h5>
                            <p class='main-color'> 7014 @lang('adminPanel.customer') </p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="p-4 ">
                <div class="body-clients mt-5">

                    <div class="mb-3 border-bottom pb-3">
                        <div class="form-check d-inline-block p-0">
                            <input id="select-all" class="form-check-input" type="checkbox" value="">
                            <label class="form-check-label" for="checkAll"></label>
                        </div>
                        <span class='d-inline-block'>@lang('adminPanel.customers') </span>
                    </div>

                    @foreach($customers as $customer)
                    <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                        <div>
                            <div class="form-check d-inline-block p-0">
                                <input class="form-check-input" data-check-all="yes" type="checkbox" value="" id="checkbox1">
                                <label class="form-check-label" for="checkbox1"></label>
                            </div>
                            <div class="d-inline-block">
                                <div class="img-user">
                                    <img src="{{$customer->image}}" alt="">
                                </div>
                            </div>
                            <div class="d-inline-block ps-2">
                                {{$customer->name}}
                            </div>
                        </div>
                        <div>
                            <div class="form-check form-switch p-0 pt-1">
                                {{$customer->country->getName()}}
                            </div>
                        </div>
                    </div>
                    <!-- End User -->
                    @endforeach

                </div>

            </div>
        </div>
        <!--end bg-white-->

    </div>
</div>
<!--end container-->
<!--end container-->

<!--End page-content" -->

@endsection
@section('script')
<script>
    function func(id) {
        $.ajax({
            url: '/admin/customers/edit',
            dataType: 'html',
            method: 'GET',
            data: {
                id: id
            },
            success: function(data) {
                $('#editUser').modal('show');
                $('#modal-body').html(data);

            }
        });
    }

    function func_change_status(id) {
        $.ajax({
            url: '/admin/customers/change-status',
            dataType: 'html',
            method: 'GET',
            data: {
                id: id
            },
            success: function(data) {

            }
        });
    }
</script>


<script type="text/javascript">
     $( document ).ready(function() {
        @if (count($errors) > 0 )
         $('#addCliten').modal('show');
        @endif
     });

</script>
@endsection