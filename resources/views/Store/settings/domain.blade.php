@extends('partials.layout')
@section('title') Obaya - Dashboard @endsection

@section('content')


<div class="container-fluid">
    <div class="layout-specing">
        <div class="bg-white mt-3">
            <div class="d-flex justify-content-between p-3  bg-soft-dark   rounded-top border-bottom heading-with-shape">
                <h6 class="fw-bold mb-0 h4 ps-4"> اعدادات الدومين  </h6>
            </div>

            <div class="p-4">
                <h5> اعدادات الدومين </h5>

                <div class="border mt-3">
                    <div class="row no-gutter algin-items-center justify-content-center">
                        <div class="col-md-6 border-start py-5  px-5 align-self-center ">
                            <form action="#" method="POST">
                                @csrf
                            <div class="row mb-3">
                                <label for="storeDomain" class="col-3 col-form-label"> دومين عبية </label>
                                <div class="col-9">
                                    <div class="form-text">
                                        <input type="text" class="form-control" id="storeDomain" placeholder="" value="Obyah.Com/Fashion.House">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class='btn btn-dark px-5 mx-4 py-2'> تعديل </button>
                            </div>
                        {{-- </form> --}}
                        </div>
                        <div class="col-md-6  py-5  px-5 ">
                            {{-- <form action="#" method="POST">
                                @csrf --}}
                            <p class="text-muted text-center">دومين المتجر الخاص بك</p>
                            <div class="row mb-3">
                                <label for="enterDomain" class="col-3 col-form-label"> أدخل الدومين </label>
                                <div class="col-9">
                                    <div class="form-text">
                                        <input type="text" class="form-control" id="enterDomain" placeholder="أدخل الدومين">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class='btn btn-dark px-5 mx-4 py-2' data-bs-toggle="modal" data-bs-target="#confirmDomain"> تأكيد الدومين </button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Content Start -->
                <div class="modal fade" id="confirmDomain" tabindex="-1" aria-labelledby="LoginForm-title" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content rounded shadow border-0">
                            <div class="modal-header border-bottom bg-soft-dark">
                                <h5 class="modal-title" id="LoginForm-title">تعديل الدومين</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="bg-white p-3 rounded box-shadow">
                                    <div class="row align-items-center">
                                        <div class="col-md-4"><label for="confirmDomainInput" class='font-sm'>تحقق من توفر الرابط</label></div>
                                        <div class="col-md-8">
                                            <div class="form-text">
                                                <input type="text" class="form-control" id="confirmDomainInput" placeholder="">
                                                <span class="text" dir='ltr' style='color: #BFAE7A'> Obyah.Com/ </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-dark px-5">حفظ</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Content End -->

            </div>

        </div> <!--end bg-white-->

    </div>
</div><!--end container-->
</main>
<!--End page-content" -->


@endsection
