@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
    <div class="container-fluid">
        <div class="layout-specing">

        <div class="row mb-3">
            <div class="col-md-4">
                <div class="bg-white p-3 border rounded-3">
                    <h2 class="h1">{{$new_orders}}</h2>
                    <h5>@lang('adminPanel.new-orders') </h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-3 border rounded-3">
                    <h2 class="h1">{{$executed_orders}}</h2>
                    <h5>@lang('adminPanel.executed-orders') </h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-3 border rounded-3">
                    <h2 class="h1">{{$pending_orders}}</h2>
                    <h5>@lang('adminPanel.pending-orders') </h5>
                </div>
            </div>                        
        </div>

        <div class="bg-white">
            <div class="filter-search">
                <div class="heading d-flex justify-content-between align-items-center pe-3">
                    <h4 class="h5">@lang('adminPanel.filter')  </h4>
                    <i class="uil uil-filter"></i>
                </div>
                <div class="content p-4 border">
                <div class="row">
                      
                      <div class="col-md-4 col-6">
                          <input type="date"  value="" name="date"  class='form-control mb-3' placeholder="@lang('adminPanel.date') "> 
                      </div>
                       
                      <div class="col-md-4 col-6">
                          <input type="text" name="store_name" class='form-control mb-3' placeholder=" @lang('adminPanel.store')"> 
                      </div>

                      <div class="col-md-4 col-6">
                      <select class="form-select form-control" name="package_id" aria-label="Default select example">
                              <option value="">@lang('adminPanel.package')</option>
                              @foreach($packages as $package)
                              <option value="{{$package->id}}">{{$package->getName()}}</option>
                              @endforeach
                          </select>     
                      </div>                        
                       
                      <div class="col-md-4 col-6">
                          <select class="form-select form-control"   id="country-dropdown"  name="country_id" aria-label="Default select example">
                              <option value="">@lang('adminPanel.country') </option>
                              @foreach($countries as $country)
                              <option value="{{$country->id}}">{{$country->getName()}}</option>
                              @endforeach
                          </select>                                      

                      </div> 
                      
                      <div class="col-md-4 col-6">
                          <select class="form-select form-control"    id="state-dropdown"  name="city_id" aria-label="Default select example">
                              <option value="">@lang('adminPanel.city')</option>
                          </select>                                      
                      </div>   
                  </div>
                </div>
            </div>  <!-- /. end Filter -->            
        </div>



        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4"> @lang('adminPanel.orders')   </h6>
                <div class="btns">

@if(auth()->user()->can('orders-create'))
<a href="{{route('admin.orders.create')}}" class="btn btn-dark">@lang('adminPanel.add-order')</a>
@endif
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
                                <th class="text-center">@lang('adminPanel.customer')   </th>
                                <th class="text-center"> @lang('adminPanel.customer-address')  </th>
                                <th class="text-center"> @lang('adminPanel.date-and-time') </th>
                                <th class="text-center">@lang('adminPanel.shipping-company')</th>
                                <th class="text-center">@lang('adminPanel.total') </th>
                                <th class="text-center">@lang('adminPanel.order-status')</th>
                                <th class="text-center"> @lang('adminPanel.actions') </th>  
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Start -->
                           
							    @include('AdminPanel.orders.search')
                            <!-- End -->                            
 
                              
                                                            
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
$('#country-dropdown').on('change', function() {
var country_id = this.value;
$("#state-dropdown").html('');
$.ajax({
url:"{{url('/admin/get-cities-by-country')}}",
type: "POST",
data: {
country_id: country_id,
_token: '{{csrf_token()}}' 
},
dataType : 'json',
success: function(result){
$('#state-dropdown').html('<option value="">@lang("adminPanel.city")</option>'); 
$.each(result.states,function(key,value){
    $("#state-dropdown").append('<option value="'+value.id+'"> @if (\App::getLocale()=="ar")'+value.city_name_ar+'@endif @if (\App::getLocale()=="en")'+value.city_name_en+'@endif</option>');
}); 
}
});
});   
});
</script>

<script>

    $(document).ready(function() {
function filter($date,$store_name,$package_id,$country_id,$city_id)
 {
     
$.ajax({
    url: "/admin/orders/search?date="+$date+"&store_name="+$store_name+"&package_id="+$package_id+
    "&country_id="+$country_id+"&city_id="+$city_id,
    success: function(data) {
        $('tbody').html('');
         $('tbody').html(data);
    }

})
 }
 
$("[name=country_id],[name=package_id],[name=city_id],[name=date]").change(function() {

var date = $("[name=date]").val();
var store_name = $("[name=store_name]").val();
var package_id = $("[name=package_id]").val();
var country_id = $("[name=country_id]").val();
var city_id = $("[name=city_id]").val();

filter(date,store_name,package_id,country_id,city_id);
});


$("[name=store_name]").keyup(function() {

var date = $("[name=date]").val();
var store_name = $("[name=store_name]").val();
var package_id = $("[name=package_id]").val();
var country_id = $("[name=country_id]").val();
var city_id = $("[name=city_id]").val();

filter(date,store_name,package_id,country_id,city_id);
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
        const documentTitle = 'الطلبات';
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