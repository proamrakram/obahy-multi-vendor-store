@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
<div class="container-fluid">
    <div class="layout-specing">

        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4">@lang('adminPanel.currencies') </h6>
                <div class="btns">
                @if(auth()->user()->can('currencies-create'))
                    <a href="{{route('admin.currencies.create')}}"  class="btn btn-dark">@lang('adminPanel.add-currency')</a>
               @endif
                </div>
            </div>

            <div class="p-4">
                    <form method="post" action="{{ route('admin.settings.update-currency') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-10">

                                <div class="row">
                                    <div class="col-md-8">

                                        <div class="row mb-3">
                                            <label for="currenciesStore" class="col-3 col-form-label">@lang('adminPanel.current-panel-currency')    </label>
                                            <div class="col-9">
                                                <select id="currenciesStore" name="currency" class='form-select form-control @error('currency') is-invalid @enderror'>
                                                    @foreach($currencies as $currency)
                                                    <option value="{{$currency->id}}" @if($currency->id == $setting->default_currency) selected @endif> {{$currency->getName()}} ( {{$currency->currency_code}} ) </option>
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
                                  

                                 
                                   <div class="col-md-4">
                                        <button type="submit" class='btn btn-dark px-4 mx-4 py-2'>@lang('adminPanel.save-data') </button>   
                                   </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- End  Form -->

 
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
                                <th class="text-center">@lang('adminPanel.currency-name')</th>
                                <th class="text-center">@lang('adminPanel.exchange-currency') ({{$setting->currency->getName()}})</th>
                                <th class="text-center">@lang('adminPanel.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
@foreach($currencies as $currency)
                            <!-- Start -->
                            <tr>
                                <td class="text-center p-2" width='50'>
                                    <div class="form-check">
                                        <input class="form-check-input" data-check-all="yes" type="checkbox" value="" id="checkbox1">
                                        <label class="form-check-label" for="checkbox1"></label>
                                    </div>
                                </td>
                                <td class="text-center p-2" width='50'>
{{$currency->id}}
                                </td>
                                <td class="text-center p-2">
                                   {{$currency->getName()}}
                                </td>

                                <td class="text-center p-2">
                                   {{$currency->exchange}}
                                </td>

                                <td class="text-end p-3">
                                    <div class="tools-options d-flex justify-content-center">
                                    @if(auth()->user()->can('currencies-edit'))
                                        <a href="{{route('admin.currencies.edit',['id'=>$currency->id])}}"> <i class="uil uil-edit"></i> </a>
                                        @endif
                                        @if(auth()->user()->can('currencies-delete'))
                                        <a href="{{route('admin.currencies.delete',['id'=>$currency->id])}}"  onclick="return confirm('هل انت متأكد من حذف ({{$currency->currency_name_ar}})?')" > <i class="uil uil-trash-alt"></i> </a>
                                    @endif
                                    </div>
                                </td>
                            </tr>
                            <!-- End -->
                            @endforeach
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
        const documentTitle = 'العملات';
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

@endsection