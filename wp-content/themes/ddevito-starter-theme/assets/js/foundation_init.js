jQuery(function ($) {
    'use strict';

    $(document).foundation();

    $(document).ready(function () {
        placeGreySkew();
    });

    $(window).resize(function(){
       placeGreySkew();
        console.log("fired");
    });
    function placeGreySkew(){
        $("#greySkew").css("right", $(window).width());
    }
});