$(function () {
    'use strict';
    $(window).scroll(function () {
        var navbar = $('.navbar');

        if($(window).scrollTop()>= navbar.height()){
            if(!navbar.hasClass('navbar-inverse')){
                navbar.addClass('navbar-inverse');
            }
        }else {
            navbar.removeClass('navbar-inverse');
        }

    })
})