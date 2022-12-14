@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
<div class="container-fluid">
    <div class="layout-specing">

        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4">@lang('adminPanel.employees-settings')</h6>
                <div class="btns">
                @if(auth()->user()->can('store-store-employees-create'))
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addUser" class="btn btn-dark">@lang('adminPanel.add-user') </a>
                @endif
                </div>
            </div>


            <!-- Modal Content Start -->
            @if(auth()->user()->can('store-store-employees-create'))
            <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="LoginForm-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content rounded shadow border-0">
                        <div class="modal-header border-bottom bg-soft-dark">
                            <h5 class="modal-title" id="LoginForm-title">@lang('adminPanel.add-user') </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('store.admins.store') }}" method="POST">
                                @csrf
                                <div class="bg-white p-3 rounded box-shadow">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-md-4"><label for="userName" class='font-sm'>@lang('adminPanel.name') <span class="text-danger">*</span> </label></div>
                                                <div class="col-md-8">
                                                    <input type="text" name="name" id="userName" value="{{ old('name') }}" class="form-control mb-2 @error('name') is-invalid @enderror" placeholder="@lang('adminPanel.name-ar')">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-md-4"><label for="userphone_number" class='font-sm'>@lang('adminPanel.mobile-no')<span class="text-danger">*</span></label></div>
                                                <div class="col-md-8"> <input name="phone_number" value="{{ old('phone_number') }}" type="text" id="userphone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="@lang('adminPanel.please-enter-11-numbers')">

                                                    @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-md-4"><label for="userName" class='font-sm'>@lang('adminPanel.email')<span class="text-danger">*</span> </label></div>
                                                <div class="col-md-8">
                                                    <input type="email" name="email" value="{{ old('email') }}" id="userName" class="form-control mb-2 @error('email') is-invalid @enderror" placeholder="@lang('adminPanel.email')">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-md-4"><label for="userphone_number" class='font-sm'> @lang('adminPanel.gender') </label></div>
                                                <div class="col-md-8">
                                                    <select name="gender" id="" class="form-control form-select @error('gender') is-invalid @enderror">
                                                        <option value="male" @if(old('gender')=='male' )selected @endif>@lang('adminPanel.male') </option>
                                                        <option value="female" @if(old('gender')=='female' )selected @endif>@lang('adminPanel.female') </option>
                                                    </select>
                                                    @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-md-4"><label for="userphone_number" class='font-sm'> @lang('adminPanel.address') <span class="text-muted" style='font-size: 10px'> @lang('adminPanel.optional') </span></label></div>
                                                <div class="col-md-8"> <input name="address" value="{{ old('address') }}" type="text" id="userphone_number" class="form-control @error('address') is-invalid @enderror" placeholder="@lang('adminPanel.address')">
                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-md-4"><label for="userphone_number" class='font-sm'> @lang('adminPanel.role') </label></div>
                                                <div class="col-md-8">
                                                    <select name="role" id="" class="form-control form-select @error('role') is-invalid @enderror">
                                                        @foreach($roles as $role)
                                                        <option value="{{$role->name}}"> {{$role->name}} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('role')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-md-4"><label for="userPassowrd" class='font-sm'>@lang('adminPanel.password')<span class="text-danger">*</span></label></div>
                                                <div class="col-md-8"> <input name="password" type="password" id="userPassowrd" class="form-control @error('password') is-invalid @enderror">
                                                    @error('password')
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
                            <button type="submit" class="btn btn-dark px-5">@lang('adminPanel.save')</button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
            @endif
            <!-- Modal Content End -->

            <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="LoginForm-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content rounded shadow border-0">
                        <div class="modal-header border-bottom bg-soft-dark">
                            <h5 class="modal-title" id="LoginForm-title">@lang('adminPanel.edit-user')</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <div id="modal-body">
</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4">  <div id="kt_datatable_example_buttons" class="d-none"></div>                        
                
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
                                <th class="text-center"> ?? </th>
                                <th class="text-center">@lang('adminPanel.name') </th>
                                <th class="text-center"> @lang('adminPanel.status') </th>
                                <th class="text-center">@lang('adminPanel.role')</th>
                                <th class="text-center">@lang('adminPanel.registered-date')</th>
                                <th class="text-center"> @lang('adminPanel.actions') </th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Start -->
                            @foreach($admins as $admin)
                            <tr>
                                <td class="text-center p-2" width='50'>
                                    <div class="form-check">
                                        <input class="form-check-input" data-check-all="yes" type="checkbox" value="" id="checkbox1">
                                        <label class="form-check-label" for="checkbox1"></label>
                                    </div>
                                </td>
                                <td class="text-center p-2" width='50'>
                                    {{$admin->id}}
                                </td>
                                <td class="text-center p-2">
                                    {{$admin->name}}
                                </td>
                                <td class="text-center p-2">
                                    <span class="text-success">@if($admin->user_status =='active') @lang('adminPanel.active') @else @lang('adminPanel.not-active')@endif</span>
                                </td>
                                <td class="text-center p-2">
                                    <span class="text-muted">{{$admin->roles->pluck('name')[0]}}</span>
                                </td>
                                <td class="text-center p-2">
                                    <span class="text-muted">{{date('d/m/Y',strtotime($admin->created_at))}}</span>
                                </td>

                                <td class="text-end p-3">
                                    <div class="tools-options d-flex justify-content-center">
                                        <div class="form-check form-switch p-0 pt-1">
                                            
                                            <input class="form-check-input" type="checkbox" onclick="window.location='{{ route("store.admins.changeStatus",["id"=>$admin->id]) }}'" id="flexSwitchCheckChecked" @if($admin->user_status == 'active') checked="" @endif>
                                            
                                        </div>
                                        @if(auth()->user()->can('store-store-employees-delete'))
                                        <a href="#" onclick="return func({{$admin->id}})"> <i class="uil uil-edit"></i> </a>
                                        @endif
                                        @if(auth()->user()->can('store-store-employees-delete'))
                                        <a href="{{route('store.admins.delete',['id'=>$admin->id])}}" onclick="return confirm('???? ?????? ?????????? ???? ?????? ({{$admin->name}})?')"> <i class="uil uil-trash-alt"></i> </a>
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
            url: '/store/admins/edit',
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
            url: '/store/admins/change-status',
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
        const documentTitle = '?????????? ????????????';
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