@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')

<div class="container-fluid">
        <div class="layout-specing">


            <div class="d-flex justify-content-between p-3 mb-3  bg-white   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4"> التقارير  </h6>           
            </div>  
            
            <div class="d-flex justify-content-between mb-3 p-2 align-items-center    ">
                <div class='bg-white px-3 py-2 border d-flex align-items-center font-sm'>
                    <div style='min-width: 70px' class='border-start '>  تاريخ التقرير </div>
                    <select name="" id="" class='form-control form-select form-control-sm'>
                        <option value=""> oct 30,2021 -November 28,2021 </option>
                        <option value=""> oct 30,2021 -November 28,2021 </option>
                        <option value=""> oct 30,2021 -November 28,2021 </option>
                    </select>
                </div>
                <div class="btns">
                    <button class="btn btn-dark"> <i class="uil uil-print"></i> طباعه </button>
                </div>            
            </div>
            
            <div class="bg-white p-3 border">
                <h3 class="h6 mb-4 p-2"> نوع التقرير </h3>
                <div class="row mb-3">
                    <div class="col">
                        <a href="#" class='d-flex align-items-center justify-content-center text-muted p-3  border text-black text-center rounded'>
                            <i class="uil uil-wallet me-2 fs-2"></i>
                            <span>المبيعات</span>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class='d-flex align-items-center justify-content-center text-muted p-3  border text-black text-center rounded'>
                            <i class="uil uil-box me-2 fs-2"></i>
                            <span>المنتجات</span>
                        </a>                        
                    </div>
                    <div class="col">
                        <a href="#" class='d-flex align-items-center justify-content-center text-muted p-3  border text-black text-center rounded'>
                            <i class="uil uil-users-alt me-2 fs-2"></i>
                            <span>العملاء</span>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class='d-flex align-items-center justify-content-center text-muted p-3  border text-black text-center rounded'>
                            <i class="uil uil-megaphone me-2 fs-2"></i>
                            <span>الاكثر طلبا</span>
                        </a>                        
                    </div>

                    <div class="col">
                        <a href="#" class='d-flex align-items-center justify-content-center text-muted p-3  border text-black text-center rounded'>
                            <i class="uil uil-eye me-2 fs-2"></i>
                            <span> الزيارات </span>
                        </a>                        
                    </div>                    
                </div>
                <hr class='border-top'>

                <h3 class="h6 p-2"> اختر التقرير الفرعي </h3>
                <div class="row">
                    <div class="col-10">
                        <div class="form-group">
                            <select name="" id="" class='form-control form-select'>
                                <option value=""> ملخص </option>
                                <option value=""> ملخص </option>
                                <option value=""> ملخص </option>
                                <option value=""> ملخص </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <button class='btn btn-dark btn-block px-5 py-2'> عرض </button>
                    </div>
                </div>
            </div>
            
   
    
            <div class="bg-white mt-3 border">
                <h3 class="h6 border-bottom p-2"> المبيعات </h3>
                <div class="p-3">
                    <div class="body-sales font-sm">

                        <div class="d-flex justify-content-between mb-3">
                            <div> اجمالي المبيعات </div>
                            <div class='font-sm'>
                                <span class='px-4'>  123,45 ر.س </span>
                                <span> 100% </span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <div> المبيعات </div>
                            <div class='font-sm'>
                                <span class='px-4 text-red'>  25,45 ر.س </span>
                                <span> 100% </span>
                            </div>
                        </div> 
                        
                        <div class="d-flex justify-content-between mb-3">
                            <div> رسوم الدفع الإلكتروني </div>
                            <div class='font-sm'>
                                <span class='px-4  '> - </span>
                                <span> - </span>
                            </div>
                        </div> 
                        
                        <div class="d-flex justify-content-between mb-3">
                            <div> تكاليف المنتجات </div>
                            <div class='font-sm '>
                                <span class='px-4  '> - </span>
                                <span> - </span>
                            </div>
                        </div> 
                        
                        <div class="d-flex justify-content-between mb-3">
                            <div> الشحن </div>
                            <div class='font-sm '>
                                <span class='px-4  '> - </span>
                                <span> - </span>
                            </div>
                        </div>   
                        
                        <div class="d-flex justify-content-between mb-3">
                            <div> كوبونات التخفيض </div>
                            <div class='font-sm '>
                                <span class='px-4  '> - </span>
                                <span> - </span>
                            </div>
                        </div>  
                        
                        <div class="d-flex justify-content-between mb-3">
                            <div> الضرائب </div>
                            <div class='font-sm '>
                                <span class='px-4  '> - </span>
                                <span> - </span>
                            </div>
                        </div>     
                    </div>                     
                </div>

                <div class="d-flex justify-content-between border-top align-items-center">
                    <div> <h3 class="h6  p-2"> صافي البيعات </h3> </div>
                    <div class='font-sm p-2'>
                        <span class='px-4  '> 123,45 ر.س </span>
                        <span> 100% </span>
                    </div>
                </div>                
            </div> <!--end bg-white-->

        </div>         
    </div><!--end container-->
    @endsection

