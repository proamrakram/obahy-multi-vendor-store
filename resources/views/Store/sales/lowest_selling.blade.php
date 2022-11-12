@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')

<div class="container-fluid">
        <div class="layout-specing">

            <div class="row">
                <div class="col-md-4">
                    <div class="box-sales text-dark d-block box-setting bg-white shadow border rounded p-4 ">
                        <h3 class="h1">$5000</h3>
                        <h4>@lang('adminPanel.total-sales') </h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-sales text-dark d-block box-setting bg-white shadow border rounded p-4 ">
                        <h3 class="h1"> 20 </h3>
                        <h4>@lang('adminPanel.total-vistis')</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-sales text-dark d-block box-setting bg-white shadow border rounded p-4 ">
                        <h3 class="h1"> 50 </h3>
                        <h4>@lang('adminPanel.total-shapping')</h4>
                    </div>
                </div>                                                
            </div>
            <div class="filter-search">
                <div class="heading d-flex justify-content-between align-items-center pe-3">
                    <h4 class="h5"> تصفية </h4>
                    <i class="uil uil-filter"></i>
                </div>
            <div class="content p-4 border">
                <div class="row">


                    <div class="col-md-4 col-6">
                        <div class="row align-items-center mb-3">
                            <div class="col-3"><label for="">@lang('adminPanel.date') </label></div>
                            <div class="col-8">
                                <input name="date" type="date" class='form-control'>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="row align-items-center mb-3">
                            <div class="col-3"><label for="">@lang('adminPanel.sales-channels')</label></div>
                            <div class="col-8">
                                <select class="form-select form-control" aria-label="Default select example">
                                    <option selected="">@lang('adminPanel.sales-channels')</option>
                                    <option value="1">قنوات البيع</option>
                                    <option value="2">قنوات البيع</option>
                                    <option value="3">قنوات البيع</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="row align-items-center mb-3">
                            <div class="col-3"><label for="">@lang('adminPanel.customers')</label></div>
                            <div class="col-8">
                                <select name="customer_id" class="form-select form-control" aria-label="Default select example">
                                    <option value="" selected="">@lang('adminPanel.customers')</option>
                                    @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="row align-items-center mb-3">
                            <div class="col-3"><label for="">@lang('adminPanel.branches')</label></div>
                            <div class="col-8">
                                <select class="form-select form-control" aria-label="Default select example">
                                    <option selected="">@lang('adminPanel.branches')</option>
                                    <option value="1">الفروع</option>
                                    <option value="2">الفروع</option>
                                    <option value="3">الفروع</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="row align-items-center mb-3">
                            <div class="col-3"><label for="">@lang('adminPanel.country') </label></div>
                            <div class="col-8">
                                <select name="country_id" id="country-dropdown" class="form-select form-control" aria-label="Default select example">
                                    <option value="" selected="">@lang('adminPanel.country') </option>

                                    @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->getName()}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 col-6">
                        <div class="row align-items-center mb-3">
                            <div class="col-3"><label for="">@lang('adminPanel.sales-type') </label></div>
                            <div class="col-8">
                                <select class="form-select form-control" aria-label="Default select example">
                                    <option value="" selected="">@lang('adminPanel.sales-type')</option>
                                    <option value="1">نوع المبيعات </option>
                                    <option value="2">نوع المبيعات </option>
                                    <option value="3">نوع المبيعات </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="row align-items-center mb-3">
                            <div class="col-3"><label for="">@lang('adminPanel.payment-types') </label></div>
                            <div class="col-8">
                                <select class="form-select form-control" aria-label="Default select example">
                                    <option selected="">@lang('adminPanel.payment-types') </option>
                                    <option value="1">طرق الدفع </option>
                                    <option value="2">طرق الدفع </option>
                                    <option value="3">طرق الدفع </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="row align-items-center mb-3">
                            <div class="col-3"><label for="">@lang('adminPanel.products')</label></div>
                            <div class="col-8">
                                <select name="product_id" class="form-select form-control" aria-label="Default select example">
                                    <option value="" selected="">@lang('adminPanel.products') </option>
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->getName()}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            </div>  <!-- /. end Filter -->
        

            <div class="bg-white mt-3">
                <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                    <h6 class="fw-bold mb-0 h4"> @lang('adminPanel.total-sales')</h6>
                    <div class="btns">
                    <a href="{{route('store.sales.index')}}"  class="btn btn-outline-dark"> @lang('adminPanel.total-sales') </a>
                        <a href="{{route('store.sales.best-sales')}}" class="btn btn-outline-dark ">@lang('adminPanel.best-sales')</a>
                        <a href="{{route('store.sales.lowest-selling')}}" class="btn btn-dark"> @lang('adminPanel.lowest-sales')</a>
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
                                <th class="text-center"> م </th>
                                <th class="text-center"> @lang('adminPanel.order-number') </th>
                                <th class="text-center">@lang('adminPanel.number-of-products-sales') </th>
                                <th class="text-center">@lang('adminPanel.total-sales-value')</th>
                                <th class="text-center"> @lang('adminPanel.total-profit')</th>
                                </tr>
                            </thead>
                            <tbody>

                            @include('Store.sales.search2')
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
function filter($date,$product_id,$customer_id,$country_id)
 {
     
$.ajax({
    url: "/store/lowest-selling/search?date="+$date+"&product_id="+$product_id+"&customer_id="+$customer_id+
    "&country_id="+$country_id,
    success: function(data) {
        $('tbody').html('');
         $('tbody').html(data);
    }

})
 }
 
$("[name=country_id],[name=product_id],[name=customer_id],[name=date]").change(function() {

var date = $("[name=date]").val();
var customer_id = $("[name=customer_id]").val();
var product_id = $("[name=product_id]").val();
var country_id = $("[name=country_id]").val();

filter(date,product_id,customer_id,country_id);
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
        const documentTitle = 'المبيعات';
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