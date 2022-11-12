@extends('partials.layout')
@section('title') Obaya - Product @endsection

@section('content')
    <div class="container-fluid">
        <div class="layout-specing">

            <div class="filter-search">
                <div class="heading d-flex justify-content-between align-items-center pe-3">
                    <h4 class="h5"> تصفية </h4>
                    <i class="uil uil-filter"></i>
                </div>
                <div class="content p-4 border">
                    <div class="row">

                        <div class="col-md-4 col-6">
                            <div class="row align-items-center">
                                <div class="col-3"><label for="">اسم المنتج</label></div>
                                <div class="col-8">
                                    <input class="form-select form-control" aria-label="Default select example"
                                        id="name" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-6">
                            <div class="row align-items-center">
                                <div class="col-2"><label for="">التاريخ </label></div>
                                <div class="col-8">
                                    <input type="date" class='form-control'>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-6">
                            <div class="row align-items-center">
                                <div class="col-2"><label for="">التصنيف </label></div>
                                <div class="col-8">
                                    <select name="category" id="categories"class="form-select form-control"
                                        aria-label="Default select example">
                                        <option selected value=""> ابحث عن طريق التصنيف</option>
                                        @if (isset($category))
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->category_name_ar }} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- /. end Filter -->


            <div class="bg-white mt-3">
                <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                    <h6 class="fw-bold mb-0 h4"> المنتجات </h6>
                    <div class="btns">
                    @if(auth()->user()->can('admin-products-create'))
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addCategory"
                            class="btn btn-outline-dark"> إضافة تصنيف </a>
                        <a href="{{ route('admin.products.add.ready_made') }}" class="btn btn-dark"> إضافة منتج </a>
                    @endif
                    </div>
                </div>

                <!-- Modal Content Start -->
                @if(auth()->user()->can('admin-products-create'))
                <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="LoginForm-title"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content rounded shadow border-0">
                            <div class="modal-header border-bottom bg-soft-dark">
                                <h5 class="modal-title" id="LoginForm-title">إضافة تصنيف جديد</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="bg-white p-3 rounded box-shadow">
                                    <form method="POST" id="add_category">
                                        @csrf
                                        <input type="hidden" name="status" value="active" />
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="row align-items-center">
                                                    <div class="col-md-3">
                                                        <label for="catName" class='font-sm'> القسم الفرعي</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="row">
                                                            <div class="col-md-6"><input type="text" id="catName"
                                                                    name="category_name_en"
                                                                    placeholder='اسم التصنيف بالعربية' class='form-control'>
                                                            </div>
                                                            <div class="col-md-6"><input type="text" id="catName"
                                                                    name="category_name_ar"
                                                                    placeholder='اسم التصنيف بالانجليزية'
                                                                    class='form-control'>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row align-items-center">
                                                    <div class="col-md-3"><label for="subCatName" class='font-sm'>قسم الاب
                                                        </label></div>
                                                    <div class="col-md-9">
                                                        <select name="parent_id" id="categories_parent" class="form-select">
                                                            <option value="">اضف تصنيف الاب</option>
                                                            @if (isset($category))
                                                                @foreach ($category as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->category_name_ar }} </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="submit" onclick="addCategory()" class="btn btn-dark px-5">حفظ</button>
                            </div>
                        </div>
                    </div>
                </div>@endif
                <!-- Modal Content End -->


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
                                            <input id="select-all" class="form-check-input" type="checkbox"
                                                value="" id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th class="text-center"> م </th>
                                    <th class="text-center"> اسم المنتج </th>
                                    <th class="text-center"> تصنيف المنتج </th>
                                    <th class="text-center">السعر</th>
                                    <th class="text-center"> الضريبة </th>
                                    <th class="text-center">في المخزن </th>
                                    <th class="text-center"> صورة المنتج </th>
                                    <th class="text-center"> اعدادات </th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!--end bg-white-->

        </div>
    </div>
    <!--end container-->
    <!--end container-->

    <!--End page-content" -->

@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

    <script>
        var table;
        $(document).ready(function() {
            get_products();
            // handleSearchDatatable();
            //handleSearchDatatable();



        });

        function func(id) {
            $.ajax({
                url: '/admin/admins/edit',
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
                url: '/admin/admins/change-status',
                dataType: 'html',
                method: 'GET',
                data: {
                    id: id
                },
                success: function(data) {

                }
            });
        }

        function addCategory() {
            var formData = new FormData($("#add_category")[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('admin/product/products/add_category') }}",
                dataType: 'json',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(resp) {
                    //alert(resp.status);
                    $('#addCategory').modal('hide');

                    if (resp.status === false) {
                        $.each(resp.message, function(i, error) {
                            display_error_messages("error", error[0]);

                        });

                    } else {
                        display_error_messages("success", resp.message);
                        //DisplayToastrMessage_General("success",resp.message, 3000);
                        // location.reload()
                        // table.ajax.reload();
                        $('#addCategory').modal('hide');
                        //  RefreshTable($("#posts") , "{{ url('cms/admin/get') }}");


                    }

                },
                'complete': function() {

                }
            });
        }

        function confirmDelete(id) {

            Swal.fire({
                text: "هل انت متأكد من انك تريد حذف هذا المنتج",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "نعم , احذفها!",
                cancelButtonText: "لا , تراجع",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            // 'X-CSRF-TOKEN': csrf_token()
                        },
                        url: "{{ url('admin/product/products/delete_product') }}",
                        type: "POST",
                        data: {
                            id: id
                        },
                        dataType: "html",
                        success: function() {
                            display_error_messages('success', resp.message)
                            table.row($(parent)).remove().draw();
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal("حصل خطأ", "حاول مره اخرى", "error");
                        }
                    });
                } else if (result.dismiss === "cancel") {
                    Swal.fire({
                        text: "لم يتم الحذف",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "حسنا ,فهمت ذلك",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });


        }

        function active_deactive_product(id) {
            // flexSwitchCheckChecked
            var sal = document.getElementById('flexSwitchCheckChecked' + id);
            console.log($('#flexSwitchCheckChecked' + id));
            Swal.fire({
                text: "Are you sure you want to change user status?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, change it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('admin/product/products/active_deactive_product') }}",
                        type: "POST",
                        data: {
                            id: id
                        },
                        dataType: "html",
                        success: function() {
                            display_error_messages('success', resp.message)
                            // display_error_messages("success", "Updated Successfully");
                            if ($('#flexSwitchCheckChecked' + id).is(':checked')) {
                                console.log("che");

                                $('#flexSwitchCheckChecked' + id).removeAttr('checked');
                            } else {
                                console.log("no");

                                $('#flexSwitchCheckChecked' + id).attr('checked', 'checked');

                            }
                            //swal("Success Updating!", "Updated Successfully", "success");
                            table.ajax.reload();
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal("Error Updating!", "Please try again", "error");
                        }
                    });
                } else if (result.dismiss === "cancel") {
                    Swal.fire({
                        text: "Event was not completed!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                    if ($('#flexSwitchCheckChecked' + id).is(':checked')) {
                        console.log("ch");
                        $('#flexSwitchCheckChecked' + id).removeAttr('checked');
                    } else {
                        console.log("no");

                        $('#flexSwitchCheckChecked' + id).prop('checked', true);
                    }

                }
            });



        }
        $("#kt_datatable_teachers").submit(function(e) {
            e.preventDefault();
            get_products();
        });


        function get_products() {
            table = $('#kt_datatable_teachers').DataTable({

                "processing": true,
                "serverSide": true,
                buttons: [

                ],
                searchDelay: 500,
                // "searching": false,
                dom: 'lrt',
                // bFilter: false,
                // bInfo: false,

                // dom: 'Bfrtip',


                "language": {
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                    "emptyTable": "لا يوجد منتجات   ",
                    "infoEmpty": "لا يوجد منتجات ",
                    "infoFiltered": "(filtered1 from MAX total records)",
                    "lengthMenu": " MENU",


                    "paginate": {
                        "previous": "previous",
                        "next": "next",
                        "last": "last",
                        "first": "first"
                    }
                },
                "ajax": {
                    "url": "{{ url('admin/product/products/get_product') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}"
                    }
                },
                columns: [{
                        'data': 'chekbox'

                    },
                    {
                        'data': 'colum'

                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'category'
                    },
                    {
                        data: 'price'
                    },
                    {
                        data: 'tax'
                    },
                    {
                        data: 'stock',
                    },
                    {
                        data: 'product_image',
                    },
                    {
                        data: 'options'
                    },
                ]
            });
            $('#categories').click(function() {
                table.search(this.value).draw();
            });
            $('#name').on('keyup', function() {
                table.search($(this).val()).draw();
            });
        }

        function display_error_messages(type, msg) {

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            if (type == 'error') {
                toastr.error(msg);
            } else {
                toastr.success(msg);
            }

        }
        // var handleSearchDatatable = function() {
        //     const filterSearch = document.querySelector('#name');
        //     filterSearch.addEventListener('keyup', function(e) {
        //         dt.search(e.target.value).draw();
        //     });
        // }
        // var handleSearchDatatable = function() {
        //     const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
        //     filterSearch.addEventListener('keyup', function(e) {
        //         dt.search(e.target.value).draw();
        //     });
        // }
    </script>


 </script>
