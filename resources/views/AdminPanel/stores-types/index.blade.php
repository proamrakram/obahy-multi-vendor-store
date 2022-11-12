@extends('partials.layout')
@section('title')
    Obaya - Dashboard
@endsection

@section('content')
    <div class="container-fluid">
        <div class="layout-specing">

            <div class="bg-white mt-3">
                <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                    <h6 class="fw-bold mb-0 h4">@lang('adminPanel.stores-types')</h6>
                    <div class="btns">
                        <a href="{{ route('admin.stores-types.create') }}" class="btn btn-dark">@lang('adminPanel.add-store-type')</a>
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
                        <table class="table table-bordered table-center table-hover bg-white mb-0"  id="kt_datatable_teachers">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <input id="select-all" class="form-check-input" type="checkbox" value=""
                                            id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </th>
                                    <th class="text-center">م</th>
                                    <th class="text-center">@lang('adminPanel.store-type') </th>
                                    <th class="text-center">@lang('adminPanel.image')</th>
                                    <th class="text-center">@lang('adminPanel.actions')  </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stores_types as $store_type)
                                    <!-- Start -->
                                    <tr>
                                        <td class="text-center p-2" width='50'>
                                            <input class="form-check-input" data-check-all="yes" type="checkbox"
                                                value="" id="checkbox1">
                                            <label class="form-check-label" for="checkbox1"></label>
                                        </td>

                                        <td class="text-center p-2" width='50'>
                                            {{ $store_type->id }}
                                        </td>

                                        <td class="text-center p-2" width='300'>
                                            {{ $store_type->store_type_name }}
                                        </td>

                                        <td class="text-center p-2" width='300'>
                                            <img src="{{ $store_type->image }}" class='img-small' alt="">
                                        </td>

                                        <td class="text-end p-3">
                                            <div class="tools-options d-flex justify-content-center">
                                                <div class="form-check form-switch p-0 pt-1">

                                                    <input class="form-check-input" type="checkbox"
                                                        onclick="window.location='{{ route('admin.stores-types.changeStatus', ['id' => $store_type->id]) }}'"
                                                        id="flexSwitchCheckChecked"
                                                        @if ($store_type->store_type_status == 'active') checked="" @endif>

                                                </div>
                                                <a href="{{ route('admin.stores-types.edit', ['id' => $store_type->id]) }}">
                                                    <i class="uil uil-edit"></i> </a>
                                                <a href="{{ route('admin.stores-types.delete', ['id' => $store_type->id]) }}"
                                                    onclick="return confirm('هل انت متأكد من حذف ({{ $store_type->store_type_ar }})?')">
                                                    <i class="uil uil-trash-alt"></i> </a>
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
        const documentTitle = 'انواع المتاجر';
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
