$(document).ready(function(){
    $('.nav-tabs a').each(function () {
        var linklabel = $(this).text();
        if(linklabel.length < 8) {
            $(this).css('line-height','50px' )
        }
    });
});

