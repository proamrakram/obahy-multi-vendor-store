@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('style')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
@endsection
@section('content')
<div class="container-fluid">
    <div class="layout-specing">

        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4">@lang('adminPanel.customers-settings') </h6>
                <div class="btns">
                @if(auth()->user()->can('customers-create'))
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addUser" class="btn btn-dark"> @lang('adminPanel.add-user')</a>
                @endif
                </div>
            </div>


            <!-- Modal Content Start -->
            @if(auth()->user()->can('customers-create'))
            <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="LoginForm-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content rounded shadow border-0">
                        <div class="modal-header border-bottom bg-soft-dark">
                            <h5 class="modal-title" id="LoginForm-title">@lang('adminPanel.add-user') </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.customers.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="bg-white p-3 rounded box-shadow">

                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-3"><label for="name" class='font-sm'> @lang('adminPanel.name') </label></div>
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
                                                <div class="col-md-3"><label for="City" class='font-sm'> @lang('adminPanel.country') </label></div>
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
                                                <div class="col-md-3"><label for="postCode" class='font-sm'> @lang('adminPanel.post-code')</label></div>
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
                                                <div class="col-md-3"><label for="email" class='font-sm'>@lang('adminPanel.email') </label></div>
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
                                                <div class="col-md-2"><label for="date" class='font-sm'> @lang('adminPanel.birthdate')</label></div>
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
                                                <div class="col-md-2"><label for="type" class='font-sm'>@lang('adminPanel.gender') </label></div>
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
                                                <div class="col-md-2"><label for="userImage" class='font-sm'>@lang('adminPanel.add-user-image') </label></div>
                                                <div class="col-md-10">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" class="form-control   @error('image') is-invalid @enderror" />
                                                            <label for="imageUpload"></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <div id="imagePreview" style="background-image: url({{asset('assets/images/icon/icon-photo-camera.svg')}});">
                                                            </div>
                                                        </div>
                                                    </div>
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
                                <div class="modal-footer justify-content-center">
                                    <button type="submit" class="btn btn-dark px-5">@lang('adminPanel.save') </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- Modal Content End -->

            <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="LoginForm-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content rounded shadow border-0">
                        <div class="modal-header border-bottom bg-soft-dark">
                            <h5 class="modal-title" id="LoginForm-title">@lang('adminPanel.edit-user') </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="modal-body">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4">
                <div id="kt_datatable_example_buttons" class="d-none"></div>                        
                
                  <div class="btns-optons-table mb-3 btns-datatables-export"  id="kt_datatable_example_export_menu">
                    <button class="btn btn-dark"  data-kt-export="print">Print</button>
                    <button class="btn btn-dark"  data-kt-export="pdf">pdf</button>
                    <button class="btn btn-dark"  data-kt-export="excel">Excel</button>
                    <button class="btn btn-dark"  data-kt-export="csv">csv</button>
                    <button class="btn btn-dark"   data-kt-export="copy">copy</button>
                </div>
                <div class="table-responsive   rounded-bottom mb-3">
                    <table class="table table-bordered table-center table-hover bg-white mb-0" id="kt_datatable_teachers">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <div class="form-check">
                                        <input id="select-all" class="form-check-input" type="checkbox" value="" id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th class="text-center"> م </th>
                                <th class="text-center">@lang('adminPanel.name') </th>
                                <th class="text-center"> @lang('adminPanel.status') </th>
                                <th class="text-center">@lang('adminPanel.registered-date')</th>
                                <th class="text-center">@lang('adminPanel.actions') </th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Start -->
                            @foreach($customers as $customer)
                            <tr>
                                <td class="text-center p-2" width='50'>
                                    <div class="form-check">
                                        <input class="form-check-input" data-check-all="yes" type="checkbox" value="" id="checkbox1">
                                        <label class="form-check-label" for="checkbox1"></label>
                                    </div>
                                </td>
                                <td class="text-center p-2" width='50'>
                                    {{$customer->id}}
                                </td>
                                <td class="text-center p-2">
                                    {{$customer->name}}
                                </td>
                                <td class="text-center p-2">
                                    @if($customer->user_status =='active') <span class="text-success"> @lang('adminPanel.active') @else <span class="text-danger"> @lang('adminPanel.not-active') @endif</span>
                                </td>
                                <td class="text-center p-2">
                                    <span class="text-muted">{{date('d/m/Y',strtotime($customer->created_at))}}</span>
                                </td>

                                <td class="text-end p-3">
                                    <div class="tools-options d-flex justify-content-center">
                                        <div class="form-check form-switch p-0 pt-1">

                                            <input class="form-check-input" type="checkbox" onclick="window.location='{{ route("admin.customers.changeStatus",["id"=>$customer->id]) }}'" id="flexSwitchCheckChecked" @if($customer->user_status == 'active') checked="" @endif>

                                        </div>
                                        @if(auth()->user()->can('customers-edit'))
                                        <a href="#" onclick="return func({{$customer->id}})"> <i class="uil uil-edit"></i> </a>
                                        @endif
                                        @if(auth()->user()->can('customers-delete'))
                                        <a href="{{route('admin.customers.delete',['id'=>$customer->id])}}" onclick="return confirm('هل انت متأكد من حذف ({{$customer->name}})?')"> <i class="uil uil-trash-alt"></i> </a>
                                    @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <!-- End -->



                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--end bg-white-->

    </div>
</div>
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


<script src="{{asset('assets/js/pdfmake.js')}}"></script>
<script src="{{asset('assets/js/vfs_fonts.js')}}"></script>
<script>
   
    "use strict";

// Class definition
var KTDatatablesExample = function () {
    // Shared variables
    var table;
    var datatable;

    // Private functions
    var initDatatable = function () {
        // Set date data order
        const tableRows = table.querySelectorAll('tbody tr');

        tableRows.forEach(row => {
            const dateRow = row.querySelectorAll('td');
            const realDate = moment(dateRow[3].innerHTML, "DD MMM YYYY, LT").format(); // select date from 4th column in table
            dateRow[3].setAttribute('data-order', realDate);
        });

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            "info": false,
            'order': [],
            'pageLength': 10,
        });
    }

    // Hook export buttons
    var exportButtons = () => {
        const documentTitle = 'الزبائن';
        var buttons = new $.fn.dataTable.Buttons(table, {
            buttons: [
                {
                    extend: 'print',
                    title: documentTitle
                },
                {
                    extend: 'copyHtml5',
                    title: documentTitle
                },
                {
                    extend: 'excelHtml5',
                    title: documentTitle
                },
                {
                    extend: 'csvHtml5',
                    title: documentTitle
                },
                {
                    extend: 'pdfHtml5',
                    title: documentTitle,
                    
                }
            ]
        }).container().appendTo($('#kt_datatable_example_buttons'));

        // Hook dropdown menu click event to datatable export buttons
        const exportButtons = document.querySelectorAll('#kt_datatable_example_export_menu [data-kt-export]');
        exportButtons.forEach(exportButton => {
            exportButton.addEventListener('click', e => {
                e.preventDefault();

                // Get clicked export value
                const exportValue = e.target.getAttribute('data-kt-export');
                const target = document.querySelector('.dt-buttons .buttons-' + exportValue);

                // Trigger click event on hidden datatable export buttons
                target.click();
            });
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Public methods
    return {
        init: function () {
            table = document.querySelector('#kt_datatable_teachers');

            if ( !table ) {
                return;
            }

            initDatatable();
            exportButtons();
            handleSearchDatatable();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesExample.init();
});    

 </script>

<script type="text/javascript">
     $( document ).ready(function() {
         @if (count($errors) > 0 )
    $('#addUser').modal('show');
@endif
     });

</script>


@endsection