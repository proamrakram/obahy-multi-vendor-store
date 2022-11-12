@extends('partials.layout')
@section('title') Affiliate Marketing @endsection

@section('content')

    <!-- Start Page Content -->


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
                                <div class="col-4"><label for="">تاريخ تفعيل الرابط </label></div>
                                <div class="col-8">
                                    <input type="date" class='form-control'>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-6">
                            <div class="row align-items-center">
                                <div class="col-3"><label for="">دولة المسوق</label></div>
                                <div class="col-8">
                                    <select class="form-select form-control" aria-label="Default select example">
                                        <option selected="">اسم دولة</option>
                                        <option value="1">اسم دولة</option>
                                        <option value="2">اسم دولة</option>
                                        <option value="3">اسم دولة</option>
                                    </select>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-4 col-6">
                            <div class="row align-items-center">
                                <div class="col-4"><label for="">مدينة المسوق </label></div>
                                <div class="col-8">
                                    <select class="form-select form-control" aria-label="Default select example">
                                        <option selected="">مدينة </option>
                                        <option value="1">مدينة </option>
                                        <option value="2">مدينة </option>
                                        <option value="3">مدينة </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- /. end Filter -->


            <div class="bg-white mt-3">
                <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                    <h6 class="fw-bold mb-0 h4"> مسوقي العمولة </h6>
                    <div class="btns">
                        
            @if(auth()->user()->can('admin-affiliates-create'))
                        <a href="{{ route('admin.affiliate.add_affiliate') }}" class="btn btn-dark"> إضافة مسوق </a>
                   @endif
                    </div>
                </div>


                <div class="p-4">
                    <div class="btns-optons-table mb-3">
                        <button class="btn btn-dark">Print</button>
                        <button class="btn btn-dark">pdf</button>
                        <button class="btn btn-dark">Excel</button>
                        <button class="btn btn-dark">csv</button>
                        <button class="btn btn-dark">copy</button>
                    </div>
                    <div class="table-responsive   rounded-bottom mb-3">
                        <table class="table table-bordered table-center table-hover bg-white mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <div class="form-check">
                                            <input id="select-all" class="form-check-input" type="checkbox" value=""
                                                id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th class="text-center"> م </th>
                                    <th class="text-center"> اسم المسوق </th>
                                    <th class="text-center"> الحالة </th>
                                    <th class="text-center">دولة المسوق</th>
                                    <th class="text-center"> تاريخ التفعيل </th>
                                    <th class="text-center">نوع العمولة </th>
                                    <th class="text-center"> طريقة تطبيق العمولة </th>
                                    <th class="text-center"> اعدادات </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($affiliate))

                                @foreach ($affiliate as $item)
                                    @if (isset($item->user))
                                        <tr>
                                            <td class="text-center p-2" width='50'>
                                                <div class="form-check">
                                                    <input class="form-check-input" data-check-all="yes" type="checkbox"
                                                        value="" id="checkbox1">
                                                    <label class="form-check-label" for="checkbox1"></label>
                                                </div>
                                            </td>
                                            <td class="text-center p-2" width='50'>
                                                {{ $item->id }}
                                            </td>
                                            <td class="text-center p-2">
                                                {{ $item->user ? $item->user->name : '' }}
                                            </td>
                                            @if ($item->user->user_status == 'active')
                                                <td class="text-center p-2">
                                                    <span class="text-success"> نشيط </span>
                                                </td>
                                            @else
                                                <td class="text-center p-2">
                                                    <span class="text-danger"> غير نشيط </span>
                                                </td>
                                            @endif

                                            <td class="text-center p-2">
                                                <span class="text-muted">{{ $item->user->country->country_name_ar }}</span>
                                            </td>
                                            <td class="text-center p-2">
                                                <span class="text-muted">{{ $item->issue_date->format('d/m/Y') }}</span>
                                            </td>
                                            <td class="text-center p-2">
                                                {{ $item->currency->currency_name_ar }}
                                            </td>
                                            @if ($item->apply_affiliate == 1)
                                                <td class="text-center p-2">
                                                    علي اول منتج يباع
                                                </td>
                                            @else
                                                <td class="text-center p-2">
                                                    علي اول منتج يباع
                                                </td>
                                            @endif

                                            <td class="text-end p-3">
                                                <div class="tools-options d-flex justify-content-center">
                                                    <div class="form-check form-switch p-0 pt-1">
                                                        <input class="form-check-input" type="checkbox"
                                                            onClick='active_deactive_product( {{ $item->id }})'
                                                            id="flexSwitchCheckChecked{{ $item->id }}"
                                                            @if ($item->user->user_status == 'active') checked @endif>
                                                    </div>
                                                    
            @if(auth()->user()->can('admin-affiliates-edit'))
                                                    <a href="{{ route('admin.affiliate.edit', $item->id) }}"> <i
                                                            class="uil uil-edit"></i> </a>

                                                            @endif
                                                            
            @if(auth()->user()->can('admin-affiliates-delete'))
                                                    <a href="#"> <i class="uil uil-trash-alt"
                                                            onClick='confirmDelete({{ $item->id }})'></i> </a>
                                               @endif
                                                        </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                @endif



                            </tbody>
                        </table>
                    </div>
                    {{-- <ul class="pagination mb-0">
                            <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Previous"><i class="uil uil-angle-right-b"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><i class="uil uil-angle-left-b"></i></a></li>
                        </ul> --}}
                </div>
                {{ $affiliate->links() }}

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
                        url: "{{ url('admin/affiliates/delete_affiliate') }}",
                        type: "POST",
                        data: {
                            id: id
                        },
                        dataType: "html",
                        success: function() {
                            // table.row($(parent)).remove().draw();
                            location.reload()

                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal("Error deleting!", "Please try again", "error");
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
                        url: "{{ url('admin/affiliates/active_deactive_affiliate') }}",
                        type: "POST",
                        data: {
                            id: id
                        },
                        dataType: "html",
                        success: function() {

                            location.reload()
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            if ($('#flexSwitchCheckChecked' + id).is(':checked')) {
                                console.log("ch");
                                $('#flexSwitchCheckChecked' + id).removeAttr('checked');
                            } else {
                                console.log("no");

                                $('#flexSwitchCheckChecked' + id).prop('checked', true);
                            }
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
    </script>
