@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
<div class="container-fluid">
    <div class="layout-specing">

        <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
            <h6 class="fw-bold mb-0 h4">@lang('adminPanel.add-package')   </h6>
        </div>


        <div class="bg-white p-4 rounded-3 mt-3">
            <form method="post" action="{{ route('admin.packages.store') }}" enctype="multipart/form-data">
                @csrf


                <div class="row mb-3">
                    <div class="col-6">
                        <input type="text" name="package_name_ar" value="{{ old('package_name_ar') }}"  class="form-control   @error('package_name_ar') is-invalid @enderror" id="" placeholder="@lang('adminPanel.package-name-ar') ">
                        @error('package_name_ar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <input type="text" name="package_name_en" value="{{ old('package_name_en') }}"  class="form-control   @error('package_name_en') is-invalid @enderror" id="" placeholder="@lang('adminPanel.package-name-en')">
                        @error('package_name_en')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>



                <div class="row mb-3">
                    <div class="col-6">
                        <textarea type="text" name="package_description_ar" class="form-control   @error('package_description_ar') is-invalid @enderror" id="" placeholder="@lang('adminPanel.package-description-ar')">{{ old('package_description_ar') }}</textarea>
                        @error('package_description_ar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <textarea type="text" name="package_description_en" class="form-control   @error('package_description_en') is-invalid @enderror" id="" placeholder="@lang('adminPanel.package-description-en')">{{ old('package_description_en') }}</textarea>
                        @error('package_description_en')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6">
                        <input type="number" value="{{ old('package_price') }}"  step="0.001" name="package_price" class="form-control   @error('package_price') is-invalid @enderror" id="" placeholder="@lang('adminPanel.package-price') ">
                        @error('package_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <select name="package_currency" class="form-control   @error('package_currency') is-invalid @enderror" id="" placeholder="@lang('adminPanel.package-currency') ">
                            @foreach($currencies as $currency)
                            <option value="{{$currency->id}}" @if(old('package_currency') == $currency->id)selected @endif> {{$currency->getName()}}</option>
                            @endforeach
                        </select>
                        @error('package_currency')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <h5 class='mb-3 mt-4'>@lang('adminPanel.package-features') </h5>

                <div class="row box-feataure-package">
                    
                <?php $xx=0; ?>
                    @foreach($items_main as $item)
                    @if($item->count == 0)
                    <div class="col-md-3">
                        <div class="mb-2 form-check-fill form-check-inline">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$item->id}}" name="packages[]" id="feat{{$item->id}}"  @if(is_array(old('packages')) && in_array($item->id, old('packages'))) checked @endif>
                                <label class="form-check-label" for="feat{{$item->id}}"> {{$item->getName()}} </label>
                            </div>
                        </div>
                    </div>
                    @else
                    @if($xx ==0) <?php $xx=1; ?> <div class="col-md-9"> </div> @endif
                    <div class="col-md-4">
                        <div class="mb-2  d-flex align-items-center">
                            <div class="form-check pe-2">
                                <input class="form-check-input" type="checkbox" value="{{$item->id}}" name="packages[]" id="feat{{$item->id}}" @if(is_array(old('packages')) && in_array($item->id, old('packages'))) checked @endif>
                                <label class="form-check-label" for="feat{{$item->id}}"> {{$item->getName()}} </label>
                            </div>
                            <div class="d-inline-block"><input name="count{{$item->id}}" style='width:85px;font-size:11px;height: 28px;' class='form-control' type="text" placeholder='أكتب العدد'></div>
                        </div>
                    </div>
                    @endif
                    @endforeach

                </div>
                <h5 class='mb-3 mt-4'>@lang('adminPanel.marketing-tools') </h5>
                <div class="row">
                    @foreach($items_marketing as $item)
                    @if($item->count == 0)

                    <div class="col-md-3">
                        <div class="mb-2 form-check-fill form-check-inline">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$item->id}}" name="packages[]" id="feat{{$item->id}}" @if(is_array(old('packages')) && in_array($item->id, old('packages'))) checked @endif>
                                <label class="form-check-label" for="feat{{$item->id}}"> {{$item->getName()}} </label>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-md-">
                        <div class="mb-2  d-flex align-items-center">
                            <div class="form-check pe-2">
                                <input class="form-check-input" type="checkbox" value="{{$item->id}}" name="packages[]" id="feat{{$item->id}}" @if(is_array(old('packages')) && in_array($item->id, old('packages'))) checked @endif>
                                <label class="form-check-label" for="feat{{$item->id}}"> {{$item->getName()}} </label>
                            </div>
                            <div class="d-inline-block"><input name="count{{$item->id}}" style='width:85px;font-size:11px;height: 28px;' class='form-control' type="text" placeholder='أكتب العدد'></div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>



                <hr>
                <button type="submit" class="btn btn-dark px-4 mx-4 py-2">@lang('adminPanel.add-package')  </button>








        </div>
    </div>
</div>


@endsection
