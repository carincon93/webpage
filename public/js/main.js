$(document).ready(function(){
    $("#slider").owlCarousel({
        autoplay:true,
        loop:true,
        items:1,
        responsiveClass:true,
        navs:true
    });
    $("#logos-carousel").owlCarousel({
        autoplay:true,
        loop:true,
        items:4
    });
});