$(function () {


    $('.overlay').on('click', function(){
        $(this).fadeOut(300);
        $('.menu-categories').removeClass('is-active');
        $('.btn-menu').removeClass('is-clicked');
    });


      //If the overlay is clicked, then we close the menu bars.
    $('.btn-menu').on('click', function(){

        if($(this).hasClass('is-clicked')){
            //Since we created the code for overlay already.
            $('.overlay').click();
          }
          else{
            $('.overlay').fadeIn(300);
            $(this).addClass('is-clicked');
            $('.menu-categories').addClass('is-active');
          }

    });




	//Add Active Class In Navbar
	$('li.nav-item').click(function () {
		$(this).addClass('active').siblings().removeClass('active');
	});

	//Smooth Scroll To Sections
	$('.navbar-nav li a').click(function () {
		$('html, body').animate({
			scrollTop: $('#' + $(this).data('value')).offset().top
		}, 1000);
	});

    $('.small-img-product').niceScroll({
        cursorcolor: "#000",
        cursorwidth: "5px",
        cursorborder: "1px solid #BFAE7A",
        cursorborderradius: "0",
        autohidemode: false
    });

    $('.small-img-product img').click(function () {

        let imgSrc = $(this).attr('src');

        $('.big-img-product img').attr('src', imgSrc)

    });


    $('.slider-style-1 .owl-carousel').owlCarousel({
        loop:true,
        margin:15,
        nav: true,
        responsiveClass:true,
        navContainer: '.navSlider',
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    $('.product-rate .owl-carousel').owlCarousel({
        loop:true,
        margin:15,
        nav: true,
        dots: true,
        responsiveClass:true,
        navContainer: '.navSlider',
        responsive:{
            0:{
                items:2
            },
            600:{
                items:2
            },
            1000:{
                items:2
            }
        }
    });

    $('.one-slide .owl-carousel').owlCarousel({
        loop:true,
        margin:0,
        nav: true,
        dots: true,
        responsiveClass:true,
        // navContainer: '.navSlider',
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    $('.open-sidebar').click(function() {
        $('.open-sidebar-box').slideToggle();
    });


    $('.select2').select2({
        width: '100%'
    });

    $('.range-slider').ionRangeSlider();

    $(".numbers-row").prepend('<div class="inc button">+</div>');
    $(".numbers-row").append('<div class="dec button">-</div>');

    $(".button").on("click", function() {

        var $button = $(this),
            oldValue = $button.parent().find("input").val();

            console.log(parseFloat(oldValue) + 1)

        if ($button.text() == "+") {

        var newVal = parseFloat(oldValue) + 1;

        // $button.parent().find("input").val(newVal)

        } else {
        // Don't allow decrementing below zero
        if (oldValue > 0) {
            var newVal = parseFloat(oldValue) - 1;
            } else {
            newVal = 0;
        }
        }

        $button.parent().find("input").val(newVal);

    });


    // Accordion
    $('.mobile-accordion .nav').click(function () {

        $('.mobile-accordion .btns').slideToggle();
        $('.mobile-accordion-content').slideToggle();

    });

    $('.desc-tab p:first-child').click(function () {

        $('.desc-tab p:not(:first-child)').slideToggle();

    });







    let imgShapeUrl    = $('.desc-manikin').data('shape-img');


    $('.sized-focued > div:first-child').fadeIn();

    // sizeing

    $('body').on('blur','.form-sizeing input:not(.input-size)', function() {
        $(this).removeClass('active-input')
    });

    $('body').on('focus','.form-sizeing input:not(.input-size)', function() {

        let thisInput    = $(this),
            dataName     = thisInput.data('size-name'),
            sizeUrlImg   = thisInput.data('img-url'),
            width        = $(window).width(),
            styleInput   = thisInput.data('style'),
            titleManikin = thisInput.closest('.d-flex').find('.tab-text').text();

        thisInput.addClass('active-input')

        $('.img-first-size').hide();

        let ContentManikin   = `
        <div class='image-content'>
            <img src='${sizeUrlImg}' class="img-fluid desc-manikin-img" loading="lazy" />
            <div class='sized-focued '>
                <div class='${dataName} ' style='${styleInput}'>
                    <img src='${imgShapeUrl}' class="img-fluid desc-manikin-shape-img "  />
                    <span class="desc-manikin-txt"> ${titleManikin} </span>
                </div>
                <div class='loading-mobile-input'>  <i class="fas fa-circle-notch fa-spin"></i> </div>
            </div>
        </div>`;

        $('.' + dataName).hide();


        $('.desc-manikin').delay(900).fadeIn().html(ContentManikin);


        $('.desc-manikin-img').on("load", function () {
            $('.loading-mobile-input').fadeOut();
            $('.' + dataName).fadeIn();
        }).attr("src", sizeUrlImg)


        if (width < 992 ){

            thisInput.closest('.form-sizeing').next('.size-top-part').html(ContentManikin);
            $('.product-style-1').closest('.row').addClass('row-mobile');
            $('html, body').animate({  scrollTop: thisInput.offset().top - 10  }, 'slow')

        }

        $(window).resize(function() {

            if (width < 992  ){

                // thisInput.closest('.form-sizeing').next('.size-top-part').html(ContentManikin);

                $('.product-style-1').closest('.row').addClass('row-mobile')
            }
        });


    });

    $('.form-sizeing .box-table .d-flex:first-child').find('input').focus();


    $('body').on('keyup','.form-sizeing input', function() {
        let thisInput  = $(this),
            dataName   = $(this).data('size-name');

            if(thisInput.val() != '' && thisInput.val().length >= 1) {
                thisInput.closest('.d-flex').addClass('done-complete-input');
                $('.' + dataName).addClass('done-complete-label');
                thisInput.closest('.d-flex').find('.check-done').html("<i class='fa fa-check'></i>")
            } else {
                thisInput.closest('.d-flex').removeClass('done-complete-input');
                $('.' + dataName).removeClass('done-complete-label');
                thisInput.closest('.d-flex').find('.check-done').html(" ")
            }

    });

    $('body').on('click','.check-done i', function() {

        let $this  = $(this);


        $this.closest('.d-flex').next().find('input').focus();

        $this.closest('.d-flex').each(function () {

            if( $(this).is(':last-child') ) {
                console.log("sdfsdf")

                $this.closest('.card').next('.card').find('.collapse').collapse();

                $this.closest('.card').next('.card').find('.box-table').find('.d-flex:first-child').find('input').focus();

                // $(".collapse:not(#collapse2)").collapse("hide");

            }
        });




    });



    if ($(window).width() < 776 ){
      $('.product-style-1').closest('.row').addClass('row-mobile')
    }

    $(window).resize(function() {

        if ($(window).width() < 776 ){
            $('.product-style-1').closest('.row').addClass('row-mobile')
        }
    });


    // Accordion
    $('.card-header h5').click(function () {
        // alert("O")


        $(this).closest('.card').find('.box-table').find('.d-flex:first-child').find('input').focus();
        // $(this).closest('.card-header')
        //        .next()
        //        .find('.box-table')
        //        .find('.d-flex:first-child')
        //        .find('input').focus();
    });



    $('#accordion').on('hidden.bs.collapse', function () {
        $(this).find('.box-table').find('.d-flex:first-child').find('input').focus();
    })

});
