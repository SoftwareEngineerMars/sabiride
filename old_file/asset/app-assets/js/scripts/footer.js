

//Check to see if the window is top if not then display button
$(document).ready(function(){
    "use strict";
    $(window).scroll(function(){
        if ($(this).scrollTop() > 400) {
            $('.scroll-top').fadeIn();
        } else {
            $('.scroll-top').fadeOut();
        }
    });

    //Click event to scroll to top
    $('.scroll-top').on('click',function(){
        $('html, body').animate({scrollTop : 0},1000);
    });

});
