@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')

    <div class="container-fluid">
        <div class="layout-specing">

            <div class="filter-search">
                <div class="heading d-flex justify-content-between align-items-center pe-3">
                    <h4 class="h5"> @lang('adminPanel.filter') </h4>
                    <i class="uil uil-filter"></i>
                </div>
                <div class="content p-4 border">
                    <div class="row">

                        <div class="col-md-6 col-12">
                            <div class="row align-items-center">
                                <div class="col-2"><label for="">@lang('adminPanel.product-name-or-number')</label></div>
                                <div class="col-8">
                                    <input type="text" name="search_input" class='form-control' placeholder="@lang('adminPanel.product-name-or-number')">                                    
                                </div>                              
                            </div>
                        </div>

                         <div class="col-md-6 col-12">
                            <div class="row align-items-center">
                                <div class="col-2"><label for="">@lang('adminPanel.date') </label></div>
                                <div class="col-8">
                                   <input type="date" value="" name="date" class='form-control'>                                      
                                </div>                              
                            </div>
                         </div>
                         
                                 
 
                    </div>
                </div>
            </div>  <!-- /. end Filter -->
        

            <div class="bg-white mt-3">
                <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                    <h6 class="fw-bold mb-0 h4">@lang('adminPanel.returns')  </h6>
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
                                    <th class="text-center">@lang('adminPanel.product-name') </th>
                                    <th class="text-center">@lang('adminPanel.customer-name')</th>
                                    <th class="text-center">@lang('adminPanel.date')</th>
                                    <th class="text-center">@lang('adminPanel.total')</th>
                                </tr>
                            </thead>
                            <tbody>

                               
                            @include('Store.returns.search')
                                                                
                            </tbody>
                        </table>
                    </div>  
                    
                </div>
            </div> <!--end bg-white-->

        </div>         
    </div><!--end container-->

    @endsection

    @section('script')

<script>

    $(document).ready(function() {
function filter($date,$search_input)
 {
     
$.ajax({
    url: "/store/return/search?date="+$date+"&search_input="+$search_input,
    success: function(data) {
        $('tbody').html('');
         $('tbody').html(data);
    }

})
 }
 
$("[name=search_input]").keyup(function() {

var date = $("[name=date]").val();
var search_input = $("[name=search_input]").val();

filter(date,search_input);
});

$("[name=date]").change(function() {

var date = $("[name=date]").val();
var search_input = $("[name=search_input]").val();

filter(date,search_input);
});
    });
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
        const documentTitle = 'المرتجعات';
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
