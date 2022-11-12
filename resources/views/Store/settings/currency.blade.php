@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')

<div class="container-fluid">
        <div class="layout-specing">
            <div class="bg-white mt-3">
                <div class="d-flex justify-content-between p-3  bg-soft-dark   rounded-top border-bottom heading-with-shape">
                    <h6 class="fw-bold mb-0 h4 ps-4">@lang('adminPanel.basic-settings')</h6>
                </div>
             
                <div class="p-4">
                    <h5> @lang('adminPanel.store-data')</h5>

                    <!-- Start Form -->
                    <form method="post" action="{{ route('store.settings.currency') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="row mt-3 mt-md-5">
                            <div class="col-md-10">

                                <div class="row">
                                    <div class="col-md-8">

                                        <div class="row mb-3">
                                            <label for="currenciesStore" class="col-3 col-form-label">@lang('adminPanel.current-store-currency')    </label>
                                            <div class="col-9">
                                                <select id="currenciesStore" name="currency" class='form-select form-control @error('currency') is-invalid @enderror'>
                                                    @foreach($currencies as $currency)
                                                    <option value="{{$currency->id}}" @if($currency->id == $store->store_currency) selected @endif> {{$currency->getName()}} ( {{$currency->currency_code}} ) </option>
                                                    @endforeach
                                                </select>
                                                @error('currency')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                        </div> <!-- / End currenciesStore -->

                               

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