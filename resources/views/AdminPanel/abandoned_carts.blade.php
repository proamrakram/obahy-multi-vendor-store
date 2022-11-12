@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')

<div class="container-fluid">
        <div class="layout-specing">
 

            <div class="bg-white mt-3">
                <div class="d-flex justify-content-between p-4  bg-white   rounded-top border-bottom heading-with-shape">
                    <h6 class="fw-bold mb-0 h4"> السلات المتروكة  </h6>
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
                                            <input id="select-all" class="form-check-input" type="checkbox" value="" id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>                                        
                                    </th>
                                    <th class="text-center"> م </th>
                                    <th class="text-center"> اسم المنتج </th>
                                    <th class="text-center"> اسم العميل </th>
                                    <th class="text-center">التاريخ</th>
                                    <th class="text-center">الاجمالي</th>
                                    <th class="text-center"> اعدادات </th>  
                                </tr>
                            </thead>
                            <tbody>

                                <!-- Start -->
                                <tr>
                                    <td class="text-center p-2" width='50'>
                                        <div class="form-check">
                                            <input class="form-check-input" data-check-all="yes" type="checkbox" value="" id="checkbox1">
                                            <label class="form-check-label" for="checkbox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center p-2" width='50'>
                                        1
                                    </td>
                                    <td class="text-center p-2">
                                        اسم المنتج
                                    </td>
                                    <td class="text-center p-2">
                                    اسم العميل هنا
                                    </td>
                                    <td class="text-center p-2">
                                        <span class="text-muted">12/2/2020</span>
                                    </td>
                                    <td class="text-center p-2">
                                        <span class="text-muted">423895694</span>
                                    </td>    
                                                                     
                                    <td class="text-center p-3">
                                        <select name="" id="">
                                            <option value=""> بريد تذكير </option>
                                            <option value=""> بريد تلقائي </option>
                                        </select>
                                         <button href="" class='btn btn-outline-dark'>
                                            ارسال البريد      
                                         </button>
                                    </td>
                                </tr>
                                <!-- End -->
 
                                                                
                            </tbody>
                        </table>
                    </div>  
                    
                    <ul class="pagination mb-0">
                        <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Previous"><i class="uil uil-angle-right-b"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><i class="uil uil-angle-left-b"></i></a></li>
                    </ul>
                </div>
            </div> <!--end bg-white-->

        </div>         
    </div><!--end container-->

@endsection

@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#country-dropdown').on('change', function() {
            var country_id = this.value;
            $("#state-dropdown").html('');
            $.ajax({
                url: "{{url('/admin/get-cities-by-country')}}",
                type: "POST",
                data: {
                    country_id: country_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#state-dropdown').html('<option value="">@lang("adminPanel.choose-city")</option>');
                    $.each(result.states, function(key, value) {
                        $("#state-dropdown").append('<option value="' + value.id + '"> @if (\App::getLocale()=="ar")' + value.city_name_ar + '@endif @if (\App::getLocale()=="en")' + value.city_name_en + '@endif</option>');
                    });
                }
            });
        });
    });
</script>
@endsection