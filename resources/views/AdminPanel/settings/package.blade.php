@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')

<div class="container-fluid">
        <div class="layout-specing">
            <div class="bg-white mt-3">
                <div class="d-flex justify-content-between p-3  bg-soft-dark   rounded-top border-bottom heading-with-shape">
                    <h6 class="fw-bold mb-0 h4 ps-4">@lang('adminPanel.platform-package')</h6>
                </div>
             
                <div class="p-4">
                    <h5>@lang('adminPanel.platform-package')</h5>

                    <!-- Start Form -->
                    <form method="post" action="{{ route('admin.settings.update-package') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="row mt-3 mt-md-5">
                            <div class="col-md-10">

                                <div class="row">
                                    <div class="col-md-8">

                                        <div class="row mb-3">
                                            <label for="currenciesStore" class="col-6 col-form-label">@lang('adminPanel.current-panel-package')    </label>
                                            <div class="col-6">
                                                <select id="currenciesStore" name="package" class='form-select form-control @error('package') is-invalid @enderror'>
                                                    @foreach($packages as $package)
                                                    <option value="{{$package->id}}" @if($package->id == $setting->default_package) selected @endif> {{$package->getName()}}</option>
                                                    @endforeach
                                                </select>
                                                @error('package')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                        </div> <!-- / End currenciesStore -->
 </div> 
                                <div class="col-md-8">

                                        <div class="row mb-3">
                                            <label for="currenciesStore" class="col-6 col-form-label">@lang('adminPanel.package-period')    </label>
                                            <div class="col-6">
 <input type="number" name="period" value="{{$setting->package_period}}"  class="form-control   @error('period') is-invalid @enderror" id="" placeholder="@lang('adminPanel.package-period') ">
                       
                                                @error('period')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                        </div> 

                                    </div>
                                  

                                 
                                   <div class="col-md-12 mt-4">
                                        <button type="submit" class='btn btn-dark px-4 mx-4 py-2'>@lang('adminPanel.save-data') </button>   
                                   </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- End  Form -->

 
                </div>

            </div> <!--end bg-white-->

        </div>         
    </div><!--end container-->
</main>
<!--End page-content" -->


@endsection