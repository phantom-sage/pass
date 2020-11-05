require('./bootstrap');

/* slider plugin code */
var cont=0;
function loopSlider(){
    var xx = setInterval(function(){
        switch(cont)
        {
            case 0: {
                $("#slider-1").fadeOut(1000);
                $("#slider-3").fadeOut(1000);
                $("#slider-2").delay(1000).fadeIn(1000);
                $("#slider-4").delay(1000).fadeIn(1000);
                //$("#sButton1").removeClass("bg-purple-800");
                //$("#sButton2").addClass("bg-purple-800");
                cont=1;

                break;
            }
            case 1: {

                $("#slider-2").fadeOut(1000);
                $("#slider-4").fadeOut(1000);
                $("#slider-1").delay(1000).fadeIn(1000);
                $("#slider-3").delay(1000).fadeIn(1000);
                //$("#sButton2").removeClass("bg-purple-800");
                //$("#sButton1").addClass("bg-purple-800");

                cont=0;

                break;
            }

        }},5000);

}

$(window).ready(function(){
    $("#slider-2").hide();
    $("#slider-4").hide();
    //$("#sButton1").addClass("bg-purple-800");
    loopSlider();

    const bePartnerBtn = $("#bePartnerBtn");

    bePartnerBtn.click(() => $("#bePartnerModal").removeClass('hidden'));
    $("#bePartnerModalCancelBtn").click(() => $("#bePartnerModal").addClass("hidden"));

    $("body").bind('cut copy paste', function(e) {
        e.preventDefault();
    });
    $("body").on('contextmenu', function(e) {
        return false;
    });
});
