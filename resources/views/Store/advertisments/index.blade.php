@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
<div class="container-fluid">
    <div class="layout-specing">
        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-3  bg-soft-dark   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4 ps-4"> @lang('adminPanel.ads-and-banners-settings') </h6>
                <div class="btns">
                @if(auth()->user()->can('store-advertisments-create'))
                    <a href="{{route('store.advertisments.create')}}" class="btn btn-dark">@lang('adminPanel.add-banner') </a>
                @endif
                </div>
            </div>

            <div class="p-4">
                <div class="row">
                    @foreach($advertisments as $ads)
                    <div class="col-md-4"> <div class="box-banners d-block mb-3" style="
border: 1px solid #EEE;
padding: 10px;
border-radius: 5px;
background: #fafafa;">
                            <img src="{{$ads->add_image}}" class='img-fluid w-100' alt="" style="height: 150px;
margin: auto;
display: block;
width: 150px !important;">
                            <div class="d-flex justify-content-between pt-3">
                                <div>
                                    <h5 class='h6'>@if($ads->ads_type == 'pop_up_window')@lang('adminPanel.pop-up-window') @elseif($ads->ads_type == 'side_window') @lang('adminPanel.side-window') @endif </h5>
                                <h5 class='h6'>{{$ads->getTitle()}}</h5>
                                </div>
                                <div>
                                    <div class="tools-options d-flex justify-content-center">
                                        <div class="form-check form-switch p-0 pt-1">
                                            <input class="form-check-input" type="checkbox"  onclick="window.location='{{ route("store.advertisments.changeStatus",["id"=>$ads->id]) }}'" id="flexSwitchCheckChecked" @if($ads->status == 'active') checked="" @endif>
                                        </div>
                                        @if(auth()->user()->can('store-advertisments-edit'))
                                        <a href="{{route('store.advertisments.edit',['id'=>$ads->id])}}"> <i class="uil uil-edit"></i> </a>
                                        @endif
                                        @if(auth()->user()->can('store-advertisments-delete'))
                                        <a href="{{route('store.advertisments.delete',['id'=>$ads->id])}}" onclick="return confirm('هل انت متأكد من حذف الاعلان?')"> <i class="uil uil-trash-alt"></i> </a>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--end bg-white-->
    </div>
</div>
<!--end container-->

@endsection
