jQuery(function ($) {
    'use strict';

    $(document).foundation();

    $(document).ready(function () {
        placeGreySkew();
    });

    $(window).resize(function(){
       placeGreySkew();
    });
    function placeGreySkew(){
        $("#greySkew").css("right", $(window).width());
    }
});