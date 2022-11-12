@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')
<div class="container-fluid">
    <div class="layout-specing">


        <div class="d-flex justify-content-between p-3  bg-white   rounded-top border-bottom heading-with-shape">
            <h6 class="fw-bold mb-0 h4">@lang('adminPanel.order-details') </h6>
            <div class="btns">

                <div id="kt_datatable_example_buttons" class="d-none"></div>

                <div class="btns-optons-table mb-3 btns-datatables-export" id="kt_datatable_example_export_menu">
                    <button class="btn btn-dark" data-kt-export="print">Print</button>
                    <button class="btn btn-dark" data-kt-export="pdf">pdf</button>
                    <button class="btn btn-dark" data-kt-export="excel">Excel</button>
                    <button class="btn btn-dark" data-kt-export="csv">csv</button>
                    <button class="btn btn-dark" data-kt-export="copy">copy</button>
                </div>
            </div>
        </div>
        <!-- table-borderless -->
        <div class="bg-white" id="kt_datatable_teachers">
            <div class="p-4">
                <div class="table-responsive  mb-3 font-sm">
                    <table class="table table-borderless bg-white mb-0">
                        <tr>
                            <td width='150'>@lang('adminPanel.order-number') </td>
                            <td width='200'> #{{$order->id}} </td>
                            <td width='150'>@lang('adminPanel.shipping')</td>
                            <td>شركة ارامكس</td>
                            <td rowspan="4" class='text-end'>
                                <div class='p-3' style='background: url("{{asset('assets/images/bg_img_table.png')}}") no-repeat;  '>
                                    <img src="{{asset('assets/images/logo_white.svg')}}" alt="">
                                    <div dir='ltr' class='mt-3'>
                                        <p class='mb-0'> Email: {{auth()->user()->store->email}}</p>
                                        <p class='mb-0'> Phone: {{auth()->user()->store->phone_number}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width='150'>@lang('adminPanel.order-date')</td>
                            <td width='200'> {{$order->created_at}}</td>
                            <td width='150'>@lang('adminPanel.payment-type')</td>
                            <td> كاش </td>
                        </tr>

                        <tr>
                            <td width='150'>@lang('adminPanel.order-status')</td>
                            <td width='200'> {{$order->getStatus($order->status)}} </td>
                            <td width='150'>@lang('adminPanel.reservation-method')</td>
                            <td>@lang('adminPanel.for-mobile') </td>
                        </tr>

                        <tr>
                            <td width='150'>@lang('adminPanel.last-update-date')</td>
                            <td width='200'> {{$order->updated_at}} </td>
                        </tr>

                    </table>
                </div>

                <div class="table-responsive border-top  mb-3 font-sm pt-3">
                    <table class="table table-borderless bg-white mb-0">
                        <tr>
                            <td>
                                <div class="fw-bold">@lang('adminPanel.customer-data')</div>
                            </td>
                        </tr>
                        <tr>
                            <td> <span class="fw-bold text-muted">@lang('adminPanel.name'): </span> {{$order->user->name}} </td>
                        </tr>
                        <tr>
                            <td> <span class="fw-bold text-muted">@lang('adminPanel.mobile-no'): </span> {{$order->user->phone_number}} </td>
                        </tr>

                        <tr>
                            <td> <span class="fw-bold text-muted">@lang('adminPanel.country') </span> {{$order->user->country->country_name_ar}} </td>
                            <td> <span class="fw-bold text-muted">@lang('adminPanel.state') </span> هنا المحافظة </td>
                            <td> <span class="fw-bold text-muted">@lang('adminPanel.city') </span> هنا المدينة </td>
                        </tr>
                    </table>
                </div>

                <div class="table-responsive border-top mt-4 pt-4  rounded-bottom mb-3">
                    <table class="table  table-center table-hover bg-white mb-0">
                        <thead class="bg-light">
                            <tr>
                                <td class="p-3"> @lang('adminPanel.product-name')</td>
                                <td class="p-3">@lang('adminPanel.amount') </td>
                                <td class="p-3">@lang('adminPanel.price') </td>
                                <td class="p-3">@lang('adminPanel.total') </td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($order->products()->where('is_delete',0)->where('status','!=','reference')->get() as $product)
                            <tr>
                                <td class="p-3"> {{$product->product->getName()}} </td>
                                <td class="p-3"> {{$product->amount}} </td>
                                <td class="p-3"> {{$product->price/$product->amount}} {{auth()->user()->store->currency->getName()}}</td>
                                <td class="p-3"> {{$product->price}} </td>
                            </tr>
                            @endforeach
                            <!--  -->
                            <tr>
                                <td class="p-3"> </td>
                                <td class="p-3"> </td>
                                <td class="p-3">إجمالي المبلغ </td>
                                <td class="p-3"> {{$order->total_price}} </td>
                            </tr>
                            <tr>
                                <td class="p-3"> </td>
                                <td class="p-3"> </td>
                                <td class="p-3">إجمالي الخصم </td>
                                <td class="p-3"> 0.00 </td>
                            </tr>
                            <tr>
                                <td class="p-3"> </td>
                                <td class="p-3"> </td>
                                <td class="p-3">إجمالي الضريبة </td>
                                <td class="p-3"> 0.00 </td>
                            </tr>
                            <tr>
                                <td class="p-3"> </td>
                                <td class="p-3"> </td>
                                <td class="p-3"> @lang('adminPanel.total-shipping')</td>
                                <td class="p-3">50.00 </td>
                            </tr>
                            <tr>
                                <td class="p-3"> </td>
                                <td class="p-3"> </td>
                                <td class="p-3"> @lang('adminPanel.total-receivable') </td>
                                <td class="p-3"> 800.00 <span class='font-sm'> {{auth()->user()->store->currency->getName()}} </span> </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="pt-4 pb-3 mt-4">
                    <p class='fw-bold'>@lang('adminPanel.comment')</p>
                    <div class="desc font-sm">
                        لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى)
                        <br>
                        لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي
                        <br>
                        لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى)
                    </div>
                </div>



            </div>
        </div>
        <!--end bg-white-->

    </div>
</div>
<!--end container-->
@endsection

@section('script')
<script src="{{asset('assets/js/pdfmake.js')}}"></script>
<script src="{{asset('assets/js/vfs_fonts.js')}}"></script>
<script>
    "use strict";

    // Class definition
    var KTDatatablesExample = function() {
        // Shared variables
        var table;
        var datatable;

        // Private functions
        var initDatatable = function() {
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
                buttons: [{
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
            filterSearch.addEventListener('keyup', function(e) {
                datatable.search(e.target.value).draw();
            });
        }

        // Public methods
        return {
            init: function() {
                table = document.querySelector('#kt_datatable_teachers');

                if (!table) {
                    return;
                }

                initDatatable();
                exportButtons();
                handleSearchDatatable();
            }
        };
    }();

    // On document ready
    KTUtil.onDOMContentLoaded(function() {
        KTDatatablesExample.init();
    });
</script>
@endsection