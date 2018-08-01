/**
 * Escritor v1.0.0 - Blogging and Magazine Responsive HTML5 Template
 * @copyright 2018 PuffinThemes
 * @license ISC
 */
(function () {
    'use strict';


    //recent Event Carousel
    $('.js-hot-posts').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        touchDrag : false,
        rtl: false,
        mouseDrag: false,
        autoplay: true,
        items:1,
        animateOut: 'slideOutUp',
        animateIn: 'slideInUp',
        navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
    })


    //recent Event Carousel
    $('.js-load-more').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        touchDrag : false,
        rtl: false,
        mouseDrag: false,
        autoplay: true,
        items:1,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
    })


    //flex menu
    $('ul.menu.flex').flexMenu();



    //mobile side manu
    $('#JS-openButton').on('click',function(){
        $('body').addClass('JS-show-menu');
    })
    $('#JS-closeButton').on('click',function(){
        $('body').removeClass('JS-show-menu');
    })


     //Header search
     $('.JS-search-trigger').on('click',function(){
         $('body').addClass('JS-search-active').css({"height":"100%","overflow":"hidden"});
     })
     $('.JS-form-close').on('click',function(){
         $('body').removeClass('JS-search-active').css({"height":"100%","overflow":"visible"});
     })



     // StickyKit activation
    $(document).ready(function(){
        function activeStickyKit() {
            $('[data-sticky_column]').stick_in_parent({
                parent: '[data-sticky_parent]',
                offset_top:40
            });

            $('[data-sticky_column]')
            .on('sticky_kit:bottom', function(e) {
                $(this).parent().css('position', 'static');
            })
            .on('sticky_kit:unbottom', function(e) {
                $(this).parent().css('position', 'relative');
            });
        };
        activeStickyKit();

        function detachStickyKit() {
            $('[data-sticky_column]').trigger("sticky_kit:detach");
        };

           var screen = 991;

           var windowHeight, windowWidth;
           windowWidth = $(window).width();
           if ((windowWidth < screen)) {
               detachStickyKit();
           } else {
               activeStickyKit();
           }

           function windowSize() {
               windowHeight = window.innerHeight ? window.innerHeight : $(window).height();
               windowWidth = window.innerWidth ? window.innerWidth : $(window).width();

           }
           windowSize();

           $(window).on('resize',function() {
               windowSize();
               if (windowWidth < screen) {
                   detachStickyKit();
               } else {
                   activeStickyKit();
               }
           });
        });



    // video player nicescroll
    $(".play-lists").niceScroll({
        styler:"fb",
        cursorcolor:"#ea5050",
        cursorwidth:"5px",
        zindex: "9",
        mousescrollstep: 20,
        background:"#f1f1f9",
    });



    //gallery Popup activation
    $('.zoom-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true
        },
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: true,
            duration: 300,
            opener: function(element) {
                return element.find('img');
            }
        }

    });



})(jQuery);