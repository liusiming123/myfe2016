/**
 * Created by º«Ð¡Ã« on 2016/12/1.
 */
$(function(){
    var typeEvent = isMobile()?'tap':'click';
    var dot = $('#barista-dot .dot');
    var bigImg = $('#barista-Smallimg .barista-Bigimg');
    dot.on(typeEvent,function(){
        var index = $(this).index();
        var imgSize = $('a',bigImg).size();
        var dotSize = $('#barista-dot .dot:visible').size();
        var num = Math.floor(imgSize/dotSize);
        var iLeft = num*(-300)*index;
        console.log(dotSize);
        bigImg.animate({
            left:iLeft
        });
    });
    var mask = $('#mask');
    var $subMenu = $('#sub-menu');
    $('#menu').on(typeEvent,function(){
        mask.css('display','block');
        $subMenu.animate({
            width:270
        },'500',function(){$('.sub-menu2 span',$subMenu).css('display','block')});

    });
    mask.on(typeEvent,function(){
        $('.sub-menu2 span',$subMenu).css('display','none');
        $(this).css('display','none');
        $subMenu.animate({
            width:0
        },'500');
    });
    $('.haschild',$subMenu).on(typeEvent,function(){
            $(this).children('.three-menu').stop().toggle('500');
        return false;
    });
    $(window).on('scroll',function(){
            console.log(123)
    });










});