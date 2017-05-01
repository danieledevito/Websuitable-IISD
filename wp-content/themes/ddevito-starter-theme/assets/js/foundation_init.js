jQuery(function ($) {
    'use strict';

    $(document).foundation();

    $(document).ready(function () {
        placeGreySkew();

        $(".featuredItemGeneric a img").attr("width", 640);
        $(".featuredItemGeneric a img").attr("height", 400);
    });

    $(window).resize(function(){
       placeGreySkew();
    });
    function placeGreySkew(){
        $("#greySkew").css("right", $(window).width());
    }
});