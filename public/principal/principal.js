//AJAX LOADING
var ajaxCounter = 0;
$(document).ajaxSend(function(event, jqxhr, settings) {
    if (typeof settings.load == 'undefined' || settings.load == true ) {
        ajaxCounter += 1;
        $('#modal-loader').animate({
            bottom: "0"
        }, 100);

        $('.ui segment').css('height', $('#nav-col').height());
        $('.ui segment').css('display', 'initial');
    }
});
$(document).ajaxComplete(function(event, jqxhr, settings) {
    if ((typeof settings.load == 'undefined') || settings.load == true ) {
        ajaxCounter = ajaxCounter > 0 ? ajaxCounter - 1 : 0;
        if (ajaxCounter == 0) {
            $('#modal-loader').animate({
                bottom: '-58px'
            }, 300, function(){
                $('.ui segment').css('display', 'none');
            });
        }
    }
});