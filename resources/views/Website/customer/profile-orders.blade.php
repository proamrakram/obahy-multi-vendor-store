@extends('Website.partials.layout')

@section('content')
    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Profile</li>
            </ol>
        </div>
    </nav>

    <div class="heading-page-profile">
        <div class="container">
            <h2 class="mb-4"> Profile </h2>
            <h3 class="h5 p-3 bg-gray mb-4"> Basic Information </h3>
        </div>
    </div>

    <div class="basic-information">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="basic-information-fields pr-0 pr-md-5 mr-0 mr-md-5 border-right">
                        <div class="edit-data-shipping text-right mb-1">
                            <a href="#" data-toggle="modal" data-target="#EditDataUser"> Edit </a>
                        </div>
                        <div class="data-user-checkout p-3 rounded bg-gray-1 mb-4">
                            <div class="info d-flex justify-content-between border-bottom pb-2">
                                <span class="text-gray"> Name </span>
                                <b> Mohammed Ahmed </b>
                            </div>
                            <div class="info d-flex justify-content-between border-bottom pb-2 pt-2">
                                <span class="text-gray"> Email </span>
                                <b>youremail@gmail.com</b>
                            </div>
                            <div class="info d-flex justify-content-between border-bottom pb-2 pt-2">
                                <span class="text-gray"> Address: </span>
                                <b>Address - City, Country</b>
                            </div>
                            <div class="info d-flex justify-content-between pt-2">
                                <span class="text-gray"> Phone Number </span>
                                <b>+9632548712</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="h5">Terms and Conditions of Sale</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima vel, rem molestiae at expedita
                        facere iure corrupti illum, corporis labore aperiam alias pariatur odio mollitia?
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque corporis aspernatur laboriosam
                        minus, quae, earum enim doloremque commodi voluptates necessitatibus non. Quam optio expedita
                        voluptate perspiciatis laudantium recusandae facilis voluptatum.
                    </p>
                    <a href="#" class='text-dark'> Read More </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Basic Information -->

    <!-- Tabs Link -->
    <div class="tabs-link mb-4">
        <div class="container">
            <div class="tabs-link-btn bg-gray d-flex">
                <a href="{{route('customer.profile-orders')}}" class='btn btn-primary rounded-0'> Orders (Products) </a>
                <a href="{{route('customer.profile-required-services')}}" class='btn btn-outline-primary rounded-0'> Required Services </a>
            </div>
        </div>
    </div>
    <!-- End Tabs Link -->

    <div class="products-ordering">
        <div class="container">

            <!-- Start Item -->
            <div class="step-content-products p-2 rounded border mb-3">
                <div class="d-md-flex d-block justify-content-between align-items-center">
                    <div class="step-content-product-box d-flex align-items-center mb-2 mb-md-0">
                        <img src="{{ asset('assets/images/img_step_product.png') }}" class="rounded img-fluid"
                            alt="">
                        <div class="cotent pl-2">
                            <h3 class="h5"> <a href="#" class='text-dark'> Name Product </a> </h3>
                            <p class="m-0">
                                You Get a Day :
                                <span class="text-secondry"> thursday 28 February </span>
                            </p>
                        </div>
                    </div>
                    <div class="status">
                        <span class='d-block'> Status </span>
                        <span class='text-green font-sm'>Delivered</span>
                    </div>
                    <div class="cost">
                        <span class='d-block'> The Cost </span>
                        <span class='text-gray font-sm'>3,699</span>
                        <span class='currency'> $ </span>
                    </div>
                    <div class="address">
                        <span class="d-block"> Address </span>
                        <span class='text-gray font-sm'> Here Address </span>
                    </div>
                    <div class="quantity">
                        <span class="d-block"> Quantity </span>
                        <span class='text-gray font-sm'> 2 </span>
                    </div>
                    <div class="refund">
                        <a href="#" class=" btn btn-primary btn-sm "> Refund </a>
                    </div>
                </div>
            </div>
            <!-- End Item -->

            <!-- Start Item -->
            <div class="step-content-products p-2 rounded border mb-3">
                <div class="d-md-flex d-block justify-content-between align-items-center">
                    <div class="step-content-product-box d-flex align-items-center mb-2 mb-md-0">
                        <img src="{{ asset('assets/images/img_step_product.png') }}" class="rounded img-fluid"
                            alt="">
                        <div class="cotent pl-2">
                            <h3 class="h5"> <a href="#" class='text-dark'> Name Product </a> </h3>
                            <p class="m-0">
                                You Get a Day :
                                <span class="text-secondry font-sm"> thursday 28 February </span>
                            </p>
                        </div>
                    </div>
                    <div class="status">
                        <span class='d-block'> Status </span>
                        <span class='text-red font-sm'> Refund </span>
                    </div>
                    <div class="cost">
                        <span class='d-block'> The Cost </span>
                        <span class='text-gray font-sm'>3,699</span>
                        <span class='currency'> $ </span>
                    </div>
                    <div class="address">
                        <span class="d-block"> Address </span>
                        <span class='text-gray font-sm'> Here Address </span>
                    </div>
                    <div class="quantity">
                        <span class="d-block"> Quantity </span>
                        <span class='text-gray font-sm'> 2 </span>
                    </div>
                    <div class="refund">
                        <a href="#" class=" btn btn-primary btn-sm disabled"> Refund </a>
                    </div>
                </div>
            </div>
            <!-- End Item -->

            <!-- Start Item -->
            <div class="step-content-products p-2 rounded border mb-3">
                <div class="d-md-flex d-block justify-content-between align-items-center">
                    <div class="step-content-product-box d-flex align-items-center mb-2 mb-md-0">
                        <img src="{{ asset('assets/images/img_step_product.png') }}" class="rounded img-fluid"
                            alt="">
                        <div class="cotent pl-2">
                            <h3 class="h5"> <a href="#" class='text-dark'> Name Product </a> </h3>
                            <p class="m-0">
                                You Get a Day :
                                <span class="text-secondry"> thursday 28 February </span>
                            </p>
                        </div>
                    </div>
                    <div class="status">
                        <span class='d-block'> Status </span>
                        <span class='text-green font-sm'>Delivered</span>
                    </div>
                    <div class="cost">
                        <span class='d-block'> The Cost </span>
                        <span class='text-gray font-sm'>3,699</span>
                        <span class='currency'> $ </span>
                    </div>
                    <div class="address">
                        <span class="d-block"> Address </span>
                        <span class='text-gray font-sm'> Here Address </span>
                    </div>
                    <div class="quantity">
                        <span class="d-block"> Quantity </span>
                        <span class='text-gray font-sm'> 2 </span>
                    </div>
                    <div class="refund">
                        <a href="#" class=" btn btn-primary btn-sm "> Refund </a>
                    </div>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="step-content-products p-2 rounded border mb-3">
                <div class="d-md-flex d-block justify-content-between align-items-center">
                    <div class="step-content-product-box d-flex align-items-center mb-2 mb-md-0">
                        <img src="{{ asset('assets/images/img_step_product.png') }}" class="rounded img-fluid"
                            alt="">
                        <div class="cotent pl-2">
                            <h3 class="h5"> <a href="#" class='text-dark'> Name Product </a> </h3>
                            <p class="m-0">
                                You Get a Day :
                                <span class="text-secondry"> thursday 28 February </span>
                            </p>
                        </div>
                    </div>
                    <div class="status">
                        <span class='d-block'> Status </span>
                        <span class='text-green font-sm'>Delivered</span>
                    </div>
                    <div class="cost">
                        <span class='d-block'> The Cost </span>
                        <span class='text-gray font-sm'>3,699</span>
                        <span class='currency'> $ </span>
                    </div>
                    <div class="address">
                        <span class="d-block"> Address </span>
                        <span class='text-gray font-sm'> Here Address </span>
                    </div>
                    <div class="quantity">
                        <span class="d-block"> Quantity </span>
                        <span class='text-gray font-sm'> 2 </span>
                    </div>
                    <div class="refund">
                        <a href="#" class=" btn btn-primary btn-sm "> Refund </a>
                    </div>
                </div>
            </div>
            <!-- End Item -->

            <!-- Start Item -->
            <div class="step-content-products p-2 rounded border mb-3">
                <div class="d-md-flex d-block justify-content-between align-items-center">
                    <div class="step-content-product-box d-flex align-items-center mb-2 mb-md-0">
                        <img src="{{ asset('assets/images/img_step_product.png') }}" class="rounded img-fluid"
                            alt="">
                        <div class="cotent pl-2">
                            <h3 class="h5"> <a href="#" class='text-dark'> Name Product </a> </h3>
                            <p class="m-0">
                                You Get a Day :
                                <span class="text-secondry font-sm"> thursday 28 February </span>
                            </p>
                        </div>
                    </div>
                    <div class="status">
                        <span class='d-block'> Status </span>
                        <span class='text-red font-sm'> Refund </span>
                    </div>
                    <div class="cost">
                        <span class='d-block'> The Cost </span>
                        <span class='text-gray font-sm'>3,699</span>
                        <span class='currency'> $ </span>
                    </div>
                    <div class="address">
                        <span class="d-block"> Address </span>
                        <span class='text-gray font-sm'> Here Address </span>
                    </div>
                    <div class="quantity">
                        <span class="d-block"> Quantity </span>
                        <span class='text-gray font-sm'> 2 </span>
                    </div>
                    <div class="refund">
                        <a href="#" class=" btn btn-primary btn-sm disabled"> Refund </a>
                    </div>
                </div>
            </div>
            <!-- End Item -->


        </div>
    </div>

    <div class="favorite mt-5 pb-5">
        <div class="container">
            <h3 class="h5 p-3 bg-gray mb-3"> Favorite </h3>
            <!-- Start Item -->
            <div class="step-content-products p-2 rounded border mb-3">
                <div class="d-md-flex d-block justify-content-between align-items-center">
                    <div class="step-content-product-box d-flex align-items-center mb-2 mb-md-0">
                        <img src="{{ asset('assets/images/img_step_product.png') }}" class="rounded img-fluid"
                            alt="">
                        <div class="cotent pl-2">
                            <h3 class="h5"> <a href="#" class='text-dark'> Name Product </a> </h3>
                            <p class="m-0">
                                You Get a Day :
                                <span class="text-secondry"> thursday 28 February </span>
                            </p>
                        </div>
                    </div>
                    <div class="cost">
                        <span class='d-block'> The Cost </span>
                        <span class='text-gray font-sm'>3,699</span>
                        <span class='currency'> $ </span>
                    </div>
                    <div class="category">
                        <span class='d-block'> Category </span>
                        <span class=' font-sm'><a class='text-gray' href="#"> Dresses </a></span>
                    </div>

                    <div class="add-cart">
                        <a href="#" class=" btn btn-primary btn-sm-2 font-sm "> <i
                                class="fas fa-shopping-cart pr-2"></i> Add To Cart </a>
                    </div>
                </div>
            </div>
            <!-- End Item -->

            <!-- Start Item -->
            <div class="step-content-products p-2 rounded border mb-3">
                <div class="d-md-flex d-block justify-content-between align-items-center">
                    <div class="step-content-product-box d-flex align-items-center mb-2 mb-md-0">
                        <img src="{{ asset('assets/images/img_step_product.png') }}" class="rounded img-fluid"
                            alt="">
                        <div class="cotent pl-2">
                            <h3 class="h5"> <a href="#" class='text-dark'> Name Product </a> </h3>
                            <p class="m-0">
                                You Get a Day :
                                <span class="text-secondry"> thursday 28 February </span>
                            </p>
                        </div>
                    </div>
                    <div class="cost">
                        <span class='d-block'> The Cost </span>
                        <span class='text-gray font-sm'>3,699</span>
                        <span class='currency'> $ </span>
                    </div>
                    <div class="category">
                        <span class='d-block'> Category </span>
                        <span class=' font-sm'><a class='text-gray' href="#"> Dresses </a></span>
                    </div>

                    <div class="add-cart">
                        <a href="#" class=" btn btn-primary btn-sm-2 font-sm "> <i
                                class="fas fa-shopping-cart pr-2"></i> Add To Cart </a>
                    </div>
                </div>
            </div>
            <!-- End Item -->

            <!-- Start Item -->
            <div class="step-content-products p-2 rounded border mb-3">
                <div class="d-md-flex d-block justify-content-between align-items-center">
                    <div class="step-content-product-box d-flex align-items-center mb-2 mb-md-0">
                        <img src="{{ asset('assets/images/img_step_product.png') }}" class="rounded img-fluid"
                            alt="">
                        <div class="cotent pl-2">
                            <h3 class="h5"> <a href="#" class='text-dark'> Name Product </a> </h3>
                            <p class="m-0">
                                You Get a Day :
                                <span class="text-secondry"> thursday 28 February </span>
                            </p>
                        </div>
                    </div>
                    <div class="cost">
                        <span class='d-block'> The Cost </span>
                        <span class='text-gray font-sm'>3,699</span>
                        <span class='currency'> $ </span>
                    </div>
                    <div class="category">
                        <span class='d-block'> Category </span>
                        <span class=' font-sm'><a class='text-gray' href="#"> Dresses </a></span>
                    </div>

                    <div class="add-cart">
                        <a href="#" class=" btn btn-primary btn-sm-2 font-sm "> <i
                                class="fas fa-shopping-cart pr-2"></i> Add To Cart </a>
                    </div>
                </div>
            </div>
            <!-- End Item -->

            <!-- Start Item -->
            <div class="step-content-products p-2 rounded border mb-3">
                <div class="d-md-flex d-block justify-content-between align-items-center">
                    <div class="step-content-product-box d-flex align-items-center mb-2 mb-md-0">
                        <img src="{{ asset('assets/images/img_step_product.png') }}" class="rounded img-fluid"
                            alt="">
                        <div class="cotent pl-2">
                            <h3 class="h5"> <a href="#" class='text-dark'> Name Product </a> </h3>
                            <p class="m-0">
                                You Get a Day :
                                <span class="text-secondry"> thursday 28 February </span>
                            </p>
                        </div>
                    </div>
                    <div class="cost">
                        <span class='d-block'> The Cost </span>
                        <span class='text-gray font-sm'>3,699</span>
                        <span class='currency'> $ </span>
                    </div>
                    <div class="category">
                        <span class='d-block'> Category </span>
                        <span class=' font-sm'><a class='text-gray' href="#"> Dresses </a></span>
                    </div>

                    <div class="add-cart">
                        <a href="#" class=" btn btn-primary btn-sm-2 font-sm "> <i
                                class="fas fa-shopping-cart pr-2"></i> Add To Cart </a>
                    </div>
                </div>
            </div>
            <!-- End Item -->
        </div>
    </div>


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
