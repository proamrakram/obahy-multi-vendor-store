@extends('Website.partials.layout')
@section('content')
    @livewireStyles

    <div class="heading-page mt-2">
        <div class="container">
            <h1 class="h2"> Your Own Designer </h1>
            <img src="img/icons/icon-brown-like.svg" class="icon-like" alt="">
            <img src="img/icons/icon-love-favorite.svg" class="icon-love-favorite" alt="">
        </div>
    </div>


    <nav aria-label="breadcrumb">
        <div class="container mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb  mb-0">
                    <li class="breadcrumb-item"><a href="#">Categories</a></li>
                    <li class="breadcrumb-item"><a href="#">your own designer</a></li>
                    <li class="breadcrumb-item active"><a href="#"> Design Request</a></li>
                </ol>
            </nav>

            <h2 class='h4 mb-5'> Your Designer </h2>
        </div>
    </nav>


    <a href="#" class='contact-now'>
        <img src="img/icons/icon-msg.svg" alt="">
    </a>

    <div class="singe-product mt-3 pb-5">
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <div class="product-details-images">
                        <div class="row row-sm">
                            <div class="col-md-2 sm-col">
                                <div class="small-img-product">
                                    <img class="img-fluid img-cover mb-2"
                                        src="{{ asset('assets/images/RD2430_AQUA_F1_W_360x.png') }}">
                                    <img class="img-fluid img-cover mb-2"
                                        src="{{ asset('assets/images/RD2403SVND_01_360x.png') }}">
                                    <img class="img-fluid img-cover mb-2"
                                        src="{{ asset('assets/images/RD2430_AQUA_F1_W_360x.png') }}">
                                    <img class="img-fluid img-cover mb-2"
                                        src="{{ asset('assets/images/RD2403SVND_01_360x.png') }}">
                                    <img class="img-fluid img-cover mb-2"
                                        src="{{ asset('assets/images/RD1738_AUBERGINE_F1_W_360x.png') }}">
                                </div>
                            </div>
                            <div class="col-md-10 sm-col">
                                <div class="big-img-product">
                                    <img class="img-fluid img-cover"
                                        src="{{ asset('assets/images/RD1738_AUBERGINE_F1_W_360x.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="description-product">
                        <h1 class="h3 mb-0 text-gray">Reina in Montella</h1>
                        <div class="d-flex justify-content-between w-75">
                            <h3 class="h5">Reina in Montella RD2403</h3>
                            <h3 class="h5">Reina in Montella</h3>
                        </div>
                        <div class="star mt-2 mr-2 d-inline-block">
                            <i class="fas fa-star gold"></i>
                            <i class="fas fa-star gold"></i>
                            <i class="fas fa-star gold"></i>
                            <i class="fas fa-star gray"></i>
                            <i class="fas fa-star gray"></i>
                        </div>
                        <div class="available-store mt-3 mb-1">
                            <h3>$199</h3>
                            <span class='text-green'>Available</span> <span> In Store</span>
                        </div>
                        <p class='text-muted'>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since.
                        </p>
                        <div class="color-available mt-4">
                            <h6>Colors Available</h6>
                            <ul class="list-unstyled">
                                <li class="d-inline-block mr-2"><a href="#" style="background: #E83758;"></a></li>
                                <li class="d-inline-block mr-2"><a href="#" style="background: #E143B3;"></a></li>
                                <li class="d-inline-block mr-2"><a href="#" style="background: #B643E1;"></a></li>
                                <li class="d-inline-block mr-2"><a href="#" style="background: #8243E1;"></a></li>
                                <li class="d-inline-block mr-2"><a href="#" style="background: #434EE1;"></a></li>
                            </ul>
                        </div>
                        <div class="data-btn  mt-3">
                            <a href="#" style="line-height: 2;" class='btn btn-primary btn-sm d-block mb-2'><i
                                    class="fas fa-shopping-cart pr-2"></i> Add To Cart </a>
                        </div>

                    </div>
                </div>


            </div>
        </div>

        <div class="design-options product-tabs pt-4  mt-0 mt-md-4">
            <div class="container">
                <ul class="nav nav-pills mb-3 tabs-ul" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                            aria-controls="pills-home" aria-selected="true">Design Options</a>
                    </li>
                </ul>
                <div class="row mt-5">
                    <div class="col-md-4 ">
                        <h4 class='h5'> Fabric options </h4>
                        <div class="one-slide">
                            <div class="owl-carousel">
                                <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ asset('assets/images/img-Fabricoptions.png') }}" class='img-fluid'
                                            alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ asset('assets/images/img-Fabricoptions.png') }}" class='img-fluid'
                                            alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ asset('assets/images/img-Fabricoptions.png') }}" class='img-fluid'
                                            alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ asset('assets/images/img-Fabricoptions.png') }}" class='img-fluid'
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <h4 class='h5'> Embroidery options </h4>
                        <div class="one-slide">
                            <div class="owl-carousel">
                                <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ asset('assets/images/Embroideryoptions.png') }}" class='img-fluid'
                                            alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ asset('assets/images/Embroideryoptions.png') }}" class='img-fluid'
                                            alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ asset('assets/images/Embroideryoptions.png') }}" class='img-fluid'
                                            alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ asset('assets/images/Embroideryoptions.png') }}" class='img-fluid'
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="navSlider"></div> -->
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <h4 class='h5'> Accessory Options </h4>
                        <div class="one-slide">
                            <div class="owl-carousel">
                                <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ asset('assets/images/AccessoryOptions.png') }}" class='img-fluid'
                                            alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ asset('assets/images/AccessoryOptions.png') }}" class='img-fluid'
                                            alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ asset('assets/images/AccessoryOptions.png') }}" class='img-fluid'
                                            alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="img my-3">
                                        <img src="{{ asset('assets/images/AccessoryOptions.png') }}" class='img-fluid'
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="navSlider"></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="model-options pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <h4 class='h5'> Model Options </h4>
                        <div class="one-slide">
                            <div class="owl-carousel">
                                <div class="item">
                                    <img src="{{ asset('assets/images/ModelOptions.png') }}" class='img-fluid'
                                        alt="">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('assets/images/ModelOptions.png') }}" class='img-fluid'
                                        alt="">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('assets/images/ModelOptions.png') }}" class='img-fluid'
                                        alt="">
                                </div>
                                <div class="item">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="content pl-md-5 pl-0 mt-md-2 mt-4">
                            <h4 class="h5">Design details</h4>
                            <p>Lorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consecteturLorem ipsum dolor
                                sit amet consectetur adipisicing elit. Eaque, maiores!</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, maiores! t amet
                                consecteturLorem ipsum dolor sit amet consect amet consecteturLorem ipsum dolor sit amet
                                consec</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, maiores! t amet
                                consecteturLorem ipsum dolor sit amet consec</p>
                            <h4 class="h5 mt-4">Special order policy</h4>
                            <p>Lorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consecteturLorem ipsum dolor
                                sit amet consectetur adipisicing elit. Eaque, maiores!</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, maiores! t amet
                                consecteturLorem ipsum dolor sit amet consect amet consecteturLorem ipsum dolor sit amet
                                consec</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, maiores! t amet
                                consecteturLorem ipsum dolor sit amet consec</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pt-5 product-tabs">
            <ul class="nav nav-pills mb-3 tabs-ul" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" aria-selected="true">Designer notes</a>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <p>Lorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet
                    consectetur adipisicing elit. Eaque, maiores!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, maiores! t amet consecteturLorem ipsum
                    dolor sit amet consect amet consecteturLorem ipsum dolor sit amet consec</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, maiores! t amet consecteturLorem ipsum
                    dolor sit amet consec</p>
            </div>
        </div>

        <!-- Modal Modal Add Comments -->
        <div class="modal fade" id="addComment" tabindex="-1" aria-labelledby="EditDataUser" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-clr-dark text-white">
                        <h5 class="modal-title" id="EditDataUserLabel"> Add Review </h5>
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
                                <textarea name="" id="" class="form-control" placeholder="Enter Your Comment" row="8"></textarea>
                            </div>

                            <div class="rating-5 d-flex align-items-center py-4">
                                <h4 class='h6 pr-4'> Rating from 1 to 5 </h4>
                                <div class="numbers">
                                    <a href="#" class='btn btn-outline-primary btn-sm-3 '> 1 </a>
                                    <a href="#" class='btn btn-outline-primary btn-sm-3 '> 2 </a>
                                    <a href="#" class='btn btn-outline-primary btn-sm-3 '> 3 </a>
                                    <a href="#" class='btn btn-outline-primary btn-sm-3 '> 4 </a>
                                    <a href="#" class='btn btn-outline-primary btn-sm-3 '> 5 </a>
                                </div>
                            </div>

                            <div class="btn-comlete-proccess d-flex justify-content-center  mt-3 mb-2">
                                <input type="submit" class='btn btn-primary btn-sm' value="Add Comment">
                                <button type="button" class="btn btn-outline-primary ml-3 btn-sm"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Add Comments -->

        <section class="mt-5 mb-4 social-links text-center">
            <div class="container">
                <h4 class='mb-3'>Share</h4>
                <ul class="list-unstyled">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-behance"></i></a>
                    <a href="#"><i class="far fa-futbol"></i></a>
                </ul>


                <a href="#" style="line-height: 2;" class='btn btn-outline-primary mt-4 '> Back to the fashion
                    designer's page </a>
            </div>
        </section>
    </div>
@endsection
