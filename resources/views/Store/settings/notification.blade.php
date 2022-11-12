@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')


<div class="container-fluid">
    <div class="layout-specing">

        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4"> الاشعارات  </h6>
            </div>

            <div class="p-4">

            <div class="alert alert-warning d-flex align-items-center bg-orange-light p-3" role="alert">
                <img src="assets/images/icon/icon-warning.svg" width="24" alt="">
                <div class='text-dark ps-3'>
                     هذه الميزة متوفرة فقط في عبية بلس برو
                </div>
            </div>

                <div class="table-responsive   rounded-bottom mb-3">
                    <table class="table table-bordered table-center table-hover bg-white mb-0">
                        <thead class='bg-light'>
                            <tr>
                                <td class='p-3'> نوع الإشعار </td>
                                <td class='p-3'> إشعارات التطبيق </td>
                                <td class='p-3'> البريد الإلكتروني </td>
                                <td class='p-3'> إشعارات منبثقة </td>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('store.settings.update-notification') }}" id="form" method="POST">
                                @csrf

                                <input type="hidden" name="off[notification_new_order_app]" value="off">
                                <input type="hidden" name="off[notification_new_order_email]" value="off">
                                <input type="hidden" name="off[notification_add_order_to_cart_app]" value="off">
                                <input type="hidden" name="off[notification_rating_app]" value="off">
                                <input type="hidden" name="off[notification_rating_email]" value="off">
                                <input type="hidden" name="off[notification_rating_notify]" value="off">
                                <input type="hidden" name="off[notification_product_rating_app]" value="off">
                                <input type="hidden" name="off[notification_product_rating_email]" value="off">
                                <input type="hidden" name="off[notification_product_rating_notify]" value="off">
                                <input type="hidden" name="off[notification_shiping_rate_app]" value="off">
                                <input type="hidden" name="off[notification_shiping_rate_email]" value="off">
                                <input type="hidden" name="off[notification_shiping_rate_notify]" value="off">
                                <input type="hidden" name="off[notification_customer_ask_app]" value="off">
                                <input type="hidden" name="off[notification_customer_ask_email]" value="off">
                                <input type="hidden" name="off[notification_customer_ask_notify]" value="off">
                                <input type="hidden" name="off[notification_activation_acc_app]" value="off">
                                <input type="hidden" name="off[notification_activation_acc_email]" value="off">
                                <input type="hidden" name="off[notification_activation_acc_notify]" value="off">
                                <input type="hidden" name="off[notification_order_app]" value="off">
                                <input type="hidden" name="off[notification_order_email]" value="off">
                                <input type="hidden" name="off[notification_order_notify]" value="off">
                            <tr>
                                <td class='p-3'> طلبات جديدة </td>
                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" onclick="formUpdate()" name="key[notification_new_order_app]" type="checkbox" id="flexSwitchCheckChecked" @if (in_array('notification_new_order_app',$store))
                                        checked

                                        @endif >
                                    </div>
                                </td>

                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" onclick="formUpdate()"   name="key[notification_new_order_email]" type="checkbox" id="flexSwitchCheckChecked" @if (in_array('notification_new_order_email',$store))
                                        checked

                                        @endif  >
                                    </div>
                                </td>
                                <td class='p-3'>

                                </td>
                            </tr>

                            <tr>
                                <td class='p-3'> إضافة منتج للسلة </td>
                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" onclick="formUpdate()" name="key[notification_add_order_to_cart_app]" type="checkbox" id="flexSwitchCheckChecked" @if (in_array('notification_add_order_to_cart_app',$store))
                                        checked

                                        @endif >
                                    </div>
                                </td>

                                <td class='p-3'>  </td>
                                <td class='p-3'>  </td>
                            </tr>

                            <tr>
                                <td class='p-3'> تقييم المتجر </td>
                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" type="checkbox"onclick="formUpdate()" name="key[notification_rating_app]" id="flexSwitchCheckChecked" @if (in_array('notification_rating_app',$store))
                                        checked

                                        @endif  >
                                    </div>
                                </td>

                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" type="checkbox" onclick="formUpdate()" name="key[notification_rating_email]" id="flexSwitchCheckChecked" @if (in_array('notification_rating_email',$store))
                                        checked

                                        @endif >
                                    </div>
                                </td>
                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" onclick="formUpdate()" name="key[notification_rating_notify]" type="checkbox" id="flexSwitchCheckChecked" @if (in_array('notification_rating_notify',$store))
                                        checked

                                        @endif  >
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class='p-3'> تقييم المنتجات </td>
                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" type="checkbox" onclick="formUpdate()" name="key[notification_product_rating_app]" id="flexSwitchCheckChecked" @if (in_array('notification_product_rating_app',$store))
                                        checked

                                        @endif >
                                    </div>
                                </td>

                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" type="checkbox" onclick="formUpdate()" name="key[notification_product_rating_email]" id="flexSwitchCheckChecked" @if (in_array('notification_product_rating_email',$store))
                                        checked

                                        @endif  >
                                    </div>
                                </td>
                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" onclick="formUpdate()" name="key[notification_product_rating_notify]" type="checkbox" id="flexSwitchCheckChecked" @if (in_array('notification_product_rating_notify',$store))
                                        checked

                                        @endif  >
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class='p-3'> تقييم شركة الشحن </td>
                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" onclick="formUpdate()" type="checkbox" name="key[notification_shiping_rate_app]" id="flexSwitchCheckChecked" @if (in_array('notification_shiping_rate_app',$store))
                                        checked

                                        @endif >
                                    </div>
                                </td>

                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" onclick="formUpdate()" type="checkbox" name="key[notification_shiping_rate_email]" id="flexSwitchCheckChecked" @if (in_array('notification_shiping_rate_email',$store))
                                        checked

                                        @endif  >
                                    </div>
                                </td>
                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" onclick="formUpdate()" name="key[notification_shiping_rate_notify]" type="checkbox" id="flexSwitchCheckChecked"@if (in_array('notification_shiping_rate_notify',$store))
                                        checked

                                        @endif   >
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class='p-3'> إرسال سؤال من عميل </td>
                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" onclick="formUpdate()" name="key[notification_customer_ask_app]" type="checkbox" id="flexSwitchCheckChecked"@if (in_array('notification_customer_ask_app',$store))
                                        checked

                                        @endif  >
                                    </div>
                                </td>

                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" onclick="formUpdate()" name="key[notification_customer_ask_email]" type="checkbox" id="flexSwitchCheckChecked" @if (in_array('notification_customer_ask_email',$store))
                                        checked

                                        @endif  >
                                    </div>
                                </td>
                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input"  onclick="formUpdate()" name="key[notification_customer_ask_notify]" type="checkbox" id="flexSwitchCheckChecked"@if (in_array('notification_customer_ask_notify',$store))
                                        checked

                                        @endif   >
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class='p-3'> تفعيل حسابات موظفوا المتجر  </td>
                                <td>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" onclick="formUpdate()" name="key[notification_activation_acc_app]" type="checkbox" id="flexSwitchCheckChecked" @if (in_array('notification_activation_acc_app',$store))
                                        checked

                                        @endif >
                                    </div>
                                </td>

                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" onclick="formUpdate()" type="checkbox" name="key[notification_activation_acc_email]" id="flexSwitchCheckChecked"@if (in_array('notification_activation_acc_email',$store))
                                        checked

                                        @endif   >
                                    </div>
                                </td>
                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" onclick="formUpdate()" name="key[notification_activation_acc_notify]" type="checkbox" id="flexSwitchCheckChecked" @if (in_array('notification_activation_acc_notify',$store))
                                        checked

                                        @endif  >
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class='p-3'> المدفوعات الإلكترونية  </td>
                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" onclick="formUpdate()" name="key[notification_order_app]" type="checkbox" id="flexSwitchCheckChecked"@if (in_array('notification_order_app',$store))
                                        checked

                                        @endif  >
                                    </div>
                                </td>

                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" onclick="formUpdate()" name="key[notification_order_email]" type="checkbox" id="flexSwitchCheckChecked" @if (in_array('notification_order_email',$store))
                                        checked

                                        @endif  >
                                    </div>
                                </td>
                                <td class='p-3'>
                                    <div class="form-check form-switch p-0 pt-1">
                                        <input class="form-check-input" onclick="formUpdate()" name="key[notification_order_notify]" type="checkbox" id="flexSwitchCheckChecked" @if (in_array('notification_order_notify',$store))
                                        checked

                                        @endif  >
                                    </div>
                                </td>
                            </tr>
                        </form>

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!--end bg-white-->

    </div>
</div><!--end container-->
<!--end container-->
</main>
<!--End page-content" -->


@endsection
@section('script')
<script>
    function formUpdate()
    {
        var formData = new FormData($("#form")[0]);
        edit_notification(formData);

    }

    function edit_notification(formData) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $("#form").attr('action'),
                dataType: 'json',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(resp) {
                    if (resp.status == false) {
                        $.each(resp.message, function(i, error) {
                            // DisplayToastrMessage_General("error", error[0] , 3000);

                        });

                    } else {

                        // DisplayToastrMessage_General("success",resp.message, 3000);
                        // $('#addNewColor').modal('hide');
                        // get_colors();

                        display_error_messages("SuCCESS",'SUCCESS');

                    }

                },
                error: function(resp) {
                    display_error_messages("error", error[0]);

                    $.each(resp.errors, function(i, error) {
                        display_error_messages("error", "FAILD");

                    });


                },
                'complete': function() {}
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

</script>


@endsection
