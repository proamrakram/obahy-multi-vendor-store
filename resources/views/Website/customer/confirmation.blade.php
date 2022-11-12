@extends('Website.partials.layout')
@section('content')
    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                <li class="breadcrumb-item active" aria-current="page"> Checkout </li>
            </ol>
        </div>
    </nav>

    <!-- Start step Tabs -->
    <div class="steps-btns mb-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex align-items-center step-btn active ">
                        <i class="far fa-check-circle pr-3"></i>
                        Shopping cart
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center step-btn  active">
                        <i class="far fa-check-circle pr-3"></i>
                        Checkout
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center step-btn  active">
                        <i class="far fa-check-circle pr-3"></i>
                        Order Complete
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End step Tabs -->

    <!-- Start Steps Content -->
    <div class="steps-content mb-4">
        <div class="container">
            <h2 class='step-content-title mb-4'>Order Complete</h2>
            <div class="row no-gap no-gutters">
                <div class="col-md-8">
                    <h3 class="h5 p-3 bg-gray mb-4"> Shipping information </h3>
                    <div class="form-checkout pr-0 pr-md-5 mr-0 mr-md-5 border-right">
                        <div class="edit-data-shipping text-right mb-1">
                            <a href="#" data-target="#EditDataUser" data-toggle="modal"> Edit </a>
                        </div>
                        <div class="data-user-checkout p-3 rounded bg-gray-1 mb-4">
                            <div class="info d-flex justify-content-between border-bottom pb-2">
                                <span class="text-gray"> Email </span>
                                <b>youremail@gmail.com</b>
                            </div>
                            <div class="info d-flex justify-content-between border-bottom pb-2 pt-2">
                                <span class="text-gray"> Reach To: </span>
                                <b>Address - City, Country</b>
                            </div>
                            <div class="info d-flex justify-content-between pt-2">
                                <span class="text-gray"> Phone Number </span>
                                <b>+9632548712</b>
                            </div>
                        </div>
                        <form action="" method="" class=''>
                            <h4 class="h6"> Your card details </h4>
                            <div class="row row-sm ">
                                <div class="col-12 sm-col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Card Number">
                                    </div>
                                </div>
                                <div class="col-12 sm-col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Card Name">
                                    </div>
                                </div>
                                <div class="col-6 sm-col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="CVV">
                                    </div>
                                </div>
                                <div class="col-6 sm-col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Expiry Date">
                                    </div>
                                </div>
                                <div class="col-12 sm-col">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input"
                                                id="customControlAutosizing">
                                            <label class="custom-control-label" for="customControlAutosizing">Remember this
                                                data</label>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="h5 p-3 bg-gray mb-4"> Your Order </h3>
                    <div class="box-your-order d-flex flex-column  justify-content-between h-75">
                        <div class="products-your-order mb-3">
                            <div class="your-order d-flex align-items-center mb-3">
                                <a href="#"> <img src="img/img_you_order.png" class='img-fluid rounded'
                                        alt=""></a>
                                <div class="info-your-order pl-3">
                                    <h4 class='h6 mb-0'> <a href="#" class="text-dark"> Name Product</a> </h4>
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <b class="d-block"> $20.00 </b>
                                </div>
                            </div>
                            <div class="your-order d-flex align-items-center mb-3">
                                <a href="#"> <img src="img/img_you_order.png" class='img-fluid rounded'
                                        alt=""></a>
                                <div class="info-your-order pl-3">
                                    <h4 class='h6 mb-0'> <a href="#" class="text-dark"> Name Product</a> </h4>
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <b class="d-block"> $20.00 </b>
                                </div>
                            </div>
                            <div class="your-order d-flex align-items-center mb-3">
                                <a href="#"> <img src="img/img_you_order.png" class='img-fluid rounded'
                                        alt=""></a>
                                <div class="info-your-order pl-3">
                                    <h4 class='h6 mb-0'> <a href="#" class="text-dark"> Name Product</a> </h4>
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <b class="d-block"> $20.00 </b>
                                </div>
                            </div>
                        </div>
                        <div class="cart-totals-inner mb-4">
                            <div class="text d-flex justify-content-between mb-2">
                                <span> Sub Total (2) </span>
                                <span> <b> 6,799 $ </b> </span>
                            </div>
                            <div class="text d-flex justify-content-between">
                                <span> Additional cost </span>
                                <span> <b> 6,799 $ </b> </span>
                            </div>
                            <hr>
                            <div class="text d-flex justify-content-between text-dark">
                                <h4 class='h5'> Total </h4>
                                <h5> 6,899 $ </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Steps Content -->

    <!-- Modal Edit User -->
    <div class="modal fade" id="EditDataUser" tabindex="-1" aria-labelledby="EditDataUser" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-clr-dark text-white">
                    <h5 class="modal-title" id="EditDataUserLabel">Edit Basic Data</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <form action="" method="">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Phone Number">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" placeholder="Add Other Address">
                        </div>

                        <div class="btn-comlete-proccess d-flex justify-content-center  mt-3 mb-2">
                            <input type="submit" class='btn btn-primary btn-sm'>
                            <button type="button" class="btn btn-outline-primary ml-3 btn-sm"
                                data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Edit User -->
@endsection
