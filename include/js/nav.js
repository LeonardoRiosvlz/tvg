$(function() {
    var header = $(".navbar");
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll > 25) {
            header.removeClass('bg-transparent').addClass("bg-blue shadow");
        } else {
            header.removeClass("bg-blue shadow").addClass('bg-transparent');
        }
    });
});