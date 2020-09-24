$( document ).ready(function() {

    $(".burgerLabel").on('click', function () {
        if ($(".content-menu").hasClass('close')) {
            $(".content-menu").addClass('open');
            $(".content-menu").removeClass('close');
            $(".content-menu").animate({
                opacity: 1,
            }, 300, function () {
                // Animation complete.
            });
            $(".zones").css("display", "none");
            $("footer").css("display", "none");
        } else {
            $(".content-menu").removeClass('open');
            $(".content-menu").addClass('close');
            $(".content-menu").animate({
                opacity: 0,
            }, 300, function () {
                // Animation complete.
            });
            $(".zones").css("display", "block");
            $("footer").css("display", "block");
        }
    });
});


