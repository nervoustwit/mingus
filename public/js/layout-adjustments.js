$(document).ready(function(){
    $('.nav-tabs a span').each(function () {
        var h = $(this).height();
        if(h < 46) {
            $(this).css('line-height','50px');
        }
    });
});

