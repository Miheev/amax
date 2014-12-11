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
item_hfix= function(obj, row, call) {
    obj_count= $(obj).length;

    setTimeout(function tmr_img(){
        if ($(obj).last().height() < 50)
            setTimeout(tmr_img, 100);
        else {
            max=0;
            for (i=0, cur=0; i<obj_count; i++, cur=(cur+1)%row) {
                hh= $(obj).eq(i).height();
                max= hh > max ? hh : max;

                if (cur == row-1) {
                    $(obj).eq(i-1).height(max);
                    $(obj).eq(i).height(max);
                    max= 0;
                }
            }
            if ((typeof call) == 'function')
                call();
        }
    }, 100);
};
stuff_item_hfix_line= function(obj, count, call) {
    if ($(obj).length) {
        setTimeout(function tmr_sh(){
            if ($(obj).find('.stuff-item .img').last().height() < 50)
                setTimeout(tmr_img, 100);
            else {
                obj_count= $(obj).find('.stuff-item .inner>a').length;
                max=0;
                for (i=0, cur=0; i<obj_count; i++, cur=(cur+1)%count) {
                    hh= $(obj).find('.stuff-item .inner>a').eq(i).height();
                    max= hh > max ? hh : max;

                    if (cur == count-1 || i == obj_count-1) {
                        for (j=cur; j>=0; j--) {
                            $(obj).find('.stuff-item .inner>a').eq(i-j).height(max);
                        }
                        max= 0;
                    }
                }
                if ((typeof call) == 'function')
                    call();
                //console.log(call);
            }
        }, 100);
    } else if ((typeof call) == 'function') {
        call();
    }
};
stuff_item_hfix= function(obj, call) {
    obj_count= $(obj).length;

    $(obj).each(function(rid, rel){
        max=0;

        setTimeout(function tmr_img(){
            if ($(rel).find('.stuff-item .img').last().height() < 50)
                setTimeout(tmr_img, 100);
            else {
                $(rel).find('.stuff-item .inner>a').each(function(){
                    hh= $(this).height();
                    max= hh > max ? hh : max;
                });
                $(rel).find('.stuff-item .inner>a').height(max);

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
        //coeff= 10;
        //$(this).parents('.select').find('.label').width($(this).width()+coeff);
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
                adaptiveHeight: false,
                responsive: true,
//                     touchEnabled: false,
                onSliderLoad: function (curIndex) {
                    setTimeout(function(){
                        stuff_item_hfix('.slider-viewport');
                    },300);

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

                    vh= $('.bx-viewport').height();
                    ch= $('.bxslider.content').height();
                    if (vh<ch)
                        $('.bx-viewport').height(ch);
                 }/*,
                 onSlideBefore: switchIndicator,
                 onSlideAfter: startTimeIndicator*/

            };

            media_bx();

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

    //if ($('body.index').length) {
    //   item_hfix('.product-list',3);
    //    $(window).resize(function () {
    //        item_hfix('.product-list',3);
    //    });
    //}
    if ($('.product-list').length && !$('body.search-php').length) {
        stuff_item_hfix('.product-list');
        $(window).resize(function () {
            stuff_item_hfix('.product-list');
        });
    }

    if($('body[class^="catalog-"]').length) {
        $('.filter .select .list a').click(function(){
            $(this).parents('.select').find('input[type="hidden"]').val($(this).data('id'));
        });

        $('.filter .select').each(function(){
            itobj= $(this);

            cmp= itobj.find('input[type="hidden"]').val();
            if (cmp.length) {
                eid=-1;
                itobj.find('.list a').each(function(id){
                    if ($(this).data('id') == cmp) {
                        eid= id;
                        return;
                    }
                });
                if (eid >= 0)
                    itobj.find('.list a').eq(eid).trigger('click');
            }
        });

        $('.filter input[type="reset"]').click(function(){
            $(this).parents('form').find('input').not('input[type="submit"], input[type="reset"]').val('');
            $(this).parents('form').eq(0).submit();
        });
    }

    if ($('.cat-menu').length && $('.cat-menu ul.uline').css('display') == 'none') {
        $('.cat-menu ul.uline>li').css('display', 'none');
        $('.cat-menu h2').css('cursor', 'pointer');
        $('head').append('<style class="cat-sjs" type="text/css"></style>');
        $('.cat-sjs').text('.hfind .cat-menu ul.uline:after {display: none;}');
        $('.cat-menu ul.uline').css('display', 'block');

        catblock= false;
        $('.cat-menu h2').click(function(e){
            e.preventDefault();

            if (!catblock) {
                catblock= true;
                dd= $('.cat-sjs').text().match(/block/);
                dd= dd ? 'none' : 'block';
                $('.cat-menu ul.uline>li').slideToggle('slow',function(){
                    catblock= false;
                });
                setTimeout(function(){
                    $('.cat-sjs').text('.hfind .cat-menu ul.uline:after {display: '+dd+';}');
                }, 300);
            }
        });
    }


}); /* end of as page load scripts */
//})(jQuery);