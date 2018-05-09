$(function () {
    $('.header').height($(window).height());
    $(window).resize(function () {
        $('.header').height($(window).height());

    });


    //if user scroll change background//
    var navbar=$('.navbar');
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        console.log(scroll);
        if(scroll>=50) {
            navbar.addClass('scrollspy');
            navbar.addClass('fadeInDown');
        } else {
            $('.navbar-default').removeClass('scrollspy');
        }
    });
    // plugin form open

    $('#fruits').selectize({
        create:function (input){
            return { id:123, text:input};
        }
    });

    $('#input-draggable').selectize({
        plugins: ['drag_drop'],
        delimiter: ',',
        persist: false,
        create: function(input) {
            return {
                value: input,
                text: input
            }
        }
    });

    //tab form users//
    $('#myTabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    });






})