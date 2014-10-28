var slider= undefined;
var sets= undefined;
var media_phone_min= 320;
var media_phone= 480;
var media_phone_medium= 560;
var media_phone_big= 768;
var media_table_landscape= 1000;

var col_num_base= 3;
var bslock= false;

//(function ($) {
media_bx= function() {
    console.log(slmargin);
    console.log(slwidth);
    wcoeff= 10;

    if ($(window).width() <= media_phone) {
        mw = $('.slider-viewport').width();
        sets.slideMargin = 0;
        sets.slideWidth = mw - wcoeff/2;
        sets.minSlides = 1;
        sets.maxSlides = 1;
        sets.moveSlides = 1;
    }
    else if ($(window).width() <= media_phone_big) {
        mw = $('.slider-viewport').width();
        sets.slideMargin = slmargin*mw;
        sets.slideWidth = (mw / 2 - (slmargin*mw)/2) - wcoeff/1.5;
        sets.minSlides = 2;
        sets.maxSlides = 2;
        sets.moveSlides = 2;
    }
    else if ($(window).width() <= media_table_landscape) {
        mw = $('.slider-viewport').width();
        sets.slideMargin = slmargin*mw;
        sets.slideWidth = (mw / 3 - 2*(slmargin*mw)/3) - wcoeff;
        sets.minSlides = 3;
        sets.maxSlides = 3;
        sets.moveSlides = 3;
    }
    else if ($(window).width() > media_table_landscape) {
        mw = $('.slider-viewport').width();
        sets.slideMargin = slmargin*mw;
        sets.slideWidth = (mw / 5 - 4*(slmargin*mw)/5) - wcoeff;
        sets.minSlides = 5;
        sets.maxSlides = 5;
        sets.moveSlides = 3;
    }
};
stuff_item_hfix= function(obj, call) {
    obj_count= $(obj).length;

    $(obj).each(function(rid, rel){
        max=0;
        $(rel).find('.stuff-item .name').each(function(){
            hh= $(this).height();
            max= hh > max ? hh : max;
        });
        $(rel).find('.stuff-item .name').height(max);

        setTimeout(function tmr_img(){
            if ($(rel).find('.stuff-item .img').last().height() < 50)
                setTimeout(tmr_img, 100);
            else {
                $(rel).find('.stuff-item .img').each(function(){
                    hh= $(this).height();
                    max= hh > max ? hh : max;
                });
                $(rel).find('.stuff-item .img').height(max);

                if (rid == obj_count-1 && (typeof call) == 'function')
                    call();
            }
        }, 100);
    });
};
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

    pcclock= false;
    $('.popup-cat-label a').click(function(){
        if (!pcclock) {
            pcclock= true;

            it= $('.popup-cat-out');

            if (!it.find('ul.sf-menu').length) {
                it.append($('.cat-menu'));
                //it.find('ul.sf-menu').superfish();
            }
            $('.cat-menu h2').toggleClass('popup');
            it.slideDown('slow', function(){
                pcclock= false;
            });
        }
    });
    $('body').click(function(e){
        if (!pcclock) {
            pcclock= true;


            if ($('.popup-cat-out').css('display') != 'none' && !$(e.target).hasClass('.sf-menu') && !$(e.target).parents('.sf-menu').length)
                $('.popup-cat-out').fadeOut('slow', function(){
                    $('.cat-menu h2').toggleClass('popup');
                    pcclock= false;
                });
            else
                pcclock= false;
        }
    });


    slmargin = 0.01;
    slwidth = 1-slmargin;
    bxlock= false;
    setTimeout(function(){
        if ($('.bxslider').length)  {


            sets = {
                pager: false,
                auto: true,
                pause: 10000,
                autoHover: true,
                adaptiveHeight: true,
                responsive: true,
//                     touchEnabled: false,
                onSliderLoad: function (curIndex) {
                 if (!$('.bx-controls-direction').hasClass('invisible'))
                 $('.bx-controls-direction').toggleClass('invisible');
                 $('.slider-viewport')
                 .mouseenter(function (e) {
                 e.preventDefault();
                 if ($('.bx-controls-direction').hasClass('invisible'))
                 $('.bx-controls-direction').toggleClass('invisible');
                 })
                 .mouseleave(function (e) {
                 e.preventDefault();
                 if (!$('.bx-controls-direction').hasClass('invisible'))
                 $('.bx-controls-direction').toggleClass('invisible');
                 });
                 }/*,
                 onSlideBefore: switchIndicator,
                 onSlideAfter: startTimeIndicator*/

            };

            media_bx();
            stuff_item_hfix('.slider-viewport');

            if ($('.bxslider>*').length < sets.maxSlides)
                sets.controls= false;
            slider = $('.bxslider').bxSlider(sets);

            //startTimeIndicator(); // start the time line for the first slide

            $(window).resize(function () {
//                     mw = $('.slider-viewport').width();
//                     sets.slideMargin = slmargin * mw;
//                     sets.slideWidth = slwidth*mw;
                media_bx();
                stuff_item_hfix('.slider-viewport');

                if (slider.getSlideCount() < sets.maxSlides)
                    sets.controls= false;
                else
                    sets.controls= true;

                slider.reloadSlider(sets);
            });
        }
    }, 100);

}); /* end of as page load scripts */
//})(jQuery);