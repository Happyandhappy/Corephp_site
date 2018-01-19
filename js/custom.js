$(document).ready(function() {

    "use strict";



    //LEFT MOBILE MENU OPEN

    $(".ts-menu-5").on('click', function() {

        $(".mob-right-nav").css('right', '0px');

    });



    //LEFT MOBILE MENU OPEN

    $(".mob-right-nav-close").on('click', function() {

        $(".mob-right-nav").css('right', '-270px');

    });



    //LEFT MOBILE MENU CLOSE

    $(".mob-close").on('click', function() {

        $(".mob-close").hide("fast");

        $(".menu").css('left', '-92px');

        $(".mob-menu").show("slow");

    });



    //mega menu

    $(".t-bb").hover(function() {

        $(".cat-menu").fadeIn(50);

    });

    $(".ts-menu").mouseleave(function() {

        $(".cat-menu").fadeOut(50);

    });



    //mega menu

    $(".sea-drop").on('click', function() {

        $(".sea-drop-1").fadeIn(100);

    });

    $(".sea-drop-1").mouseleave(function() {

        $(".sea-drop-1").fadeOut(50);

    });

    $(".dir-ho-t-sp").mouseleave(function() {

        $(".sea-drop-1").fadeOut(50);

    });



    //mega menu top menu

    $(".sea-drop-top").on('click', function() {

        $(".sea-drop-2").fadeIn(100);

    });

    $(".sea-drop-1").mouseleave(function() {

        $(".sea-drop-2").fadeOut(50);

    });

    $(".top-search").mouseleave(function() {

        $(".sea-drop-2").fadeOut(50);

    });



    //ADMIN LEFT MOBILE MENU OPEN

    $(".atab-menu").on('click', function() {

        $(".sb2-1").css("left", "0");

        $(".btn-close-menu").css("display", "inline-block");

    });



    //ADMIN LEFT MOBILE MENU CLOSE

    $(".btn-close-menu").on('click', function() {

        $(".sb2-1").css("left", "-350px");

        $(".btn-close-menu").css("display", "none");

    });



    //mega menu

    $(".t-bb").hover(function() {

        $(".cat-menu").fadeIn(50);

    });

    $(".ts-menu").mouseleave(function() {

        $(".cat-menu").fadeOut(50);

    });

    //review replay

    $(".edit-replay").on('click', function() {

        $(".hide-box").show();

    });



    //PRE LOADING

    $('#status').fadeOut();

    $('#preloader').delay(350).fadeOut('slow');

    $('body').delay(350).css({

        'overflow': 'visible'

    });



    //Collapsible

 



    //material select

  



    //HOME PAGE FIXED MENU

    $(window).scroll(function() {



        if ($(this).scrollTop() > 450) {

            $('.hom-top-menu').fadeIn();

            $('.cat-menu').hide();

        } else {

            $('.hom-top-menu').fadeOut();

        }

    });

});