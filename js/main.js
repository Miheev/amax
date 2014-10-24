var media_phone_min= 320;
var media_phone= 480;
var media_phone_medium= 560;
var media_phone_big= 768;
var media_table_landscape= 1000;

//(function ($) {
$(document).ready(function() {
    $('ul.sf-menu').superfish();

    $('.select .abbr').click(function(e){
        e.preventDefault();
        e.stopPropagation();

        if ($(this).next().css('display') == 'none') {
            $(this).next().css('display', 'block');
            //$(this).find('.pointer').css('background-position', ' -16px 2px');
        } else {
            $(this).next().css('display', 'none');
            //$(this).find('.pointer').css('background-position', ' 0 2px');
        }
    });
    $('.select .list a').click(function(e){
        e.preventDefault();
        $(this).parents('.select').find('.label').text($(this).text().trim());
    });
    $('body').click(function(){
        $('.select .list').css('display', 'none');
        //$('.select .pointer').css('background-position', ' 0 2px');
    });

}); /* end of as page load scripts */
//})(jQuery);