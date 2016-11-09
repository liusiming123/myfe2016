/**
 * Created by 韩小毛 on 2016/11/7.
 */
$(function(){
    var $drag= $('#drag');
    var $imgColor=$('#img-color');
    var $thisImg;
    var $smallImg = $('#small-img');
    var $bigImg = $('#big-img');
    var $img = $('#img');
    var $comList = $('#com-list');
    var $changeImgcolor=$(' .color_change li',$comList);
   //放大镜
   $smallImg.on('mousemove',function(event){
       $drag.show();
       $bigImg.show();
       var $pageX = event.pageX;
       var $pageY = event.pageY;
       var dragLift = $pageX-($drag.width())/2;
       var dragTop = $pageY-($drag.height())/2;
       var $smallLeft =  $smallImg.offset().left;
       var $smallTop = $smallImg.offset().top;
       if(dragLift<$smallLeft){
           dragLift = $smallLeft;
       }
       if(dragTop<$smallTop){
           dragTop = $smallTop;
       }
       var imgDragleft=$smallImg.width()-$drag.width();
       var imgDragTop = $smallImg.height()-$drag.height();
       var Maxleft = $smallLeft+imgDragleft;
       var Maxtop = $smallTop+imgDragTop;
       //console.log();
       if(dragLift>Maxleft){
           dragLift = Maxleft;
       }
       if(dragTop>Maxtop){
           dragTop = Maxtop;
       }
       $drag.css('left',dragLift+'px');
       $drag.css('top',dragTop+'px');
       var iScaleLeft = (dragLift-$smallLeft)/imgDragleft;
       var iScaleTop = (dragTop-$smallTop)/imgDragTop;
       $img.css('left',-(($img.width()-$bigImg.width())*iScaleLeft)+'px');
       $img.css('top',-(($img.height()-$bigImg.height())*iScaleTop)+'px');
    }).on('mouseout',function(){
        $drag.hide();
       $bigImg.hide();
    });
    //换图片
    $('li',$imgColor).on('mouseover',function(){
        $thisImg=$(this).children('img');
        $thisImg.addClass('borSel');
    }).on('mouseout',function(){
        $thisImg.removeClass('borSel');
    }).on('click',function(){
        var $imgSrc=$thisImg.prop("src");
        var i=$imgSrc.lastIndexOf('.');
        var $last =$imgSrc.substring(i);
        var $befor = $imgSrc.substring(0,i);
        var $smallImg_small=$befor+"_small"+$last;
        var $smallImg_big=$befor+"_big"+$last;
        $('img',$smallImg).prop('src',$smallImg_small);
        $('img',$bigImg).prop('src',$smallImg_big);
    });
    //选项卡
    $('#com-nav li').hover(function(){
        if(this.className==''){
            $(this).addClass('backgrou');
        }
    },function(){$(this).removeClass('backgrou');
    }).on('click',function(){
        var $index = $(this).index();
        $(this).removeClass('backgrou').addClass('navSel').siblings().removeClass('navSel');
        $('#tab-box div.hide').eq($index).css('display','block').siblings().css('display','none');
    });
    //换颜色
    $changeImgcolor.hover(function(){
        $(this).children('img').css('border','1px solid red');
    },function(){
        $(this).children('img').css('border','1px solid #bbb');
    })
        .on('click',function(){
            var $index=$(this).index();
            var $ulImgColor = $('#img-color ul');
            $ulImgColor.eq($index).addClass('selectImg').siblings().removeClass('selectImg');
            var $liSrc = $ulImgColor.eq($index).children().eq(0);
            var $liImgSrc = $('img',$liSrc).prop('src');
            var i=$liImgSrc.lastIndexOf('.');
            var $last =$liImgSrc.substring(i);
            var $befor = $liImgSrc.substring(0,i);
            var $smallImg_small=$befor+"_small"+$last;
            var $smallImg_big=$befor+"_big"+$last;
            $('img',$smallImg).prop('src',$smallImg_small);
            $('img',$bigImg).prop('src',$smallImg_big);
            var $alt = $(this).children().prop('alt');
            //alert($alt);
            $('.color_change strong',$comList).text($alt);
    });
    //尺寸
    $('.pro_size ul>li',$comList).on('click',function(){
        $(this).css('background','#f60').siblings().css('background','#fff')
        var $text = $(this).text();
        $('.pro_size strong').html($text);
    });
    //数量
    var $num = $('.pro_price strong',$comList).text();
    $('.pro_num select',$comList).on('change',function(){
        var $value = this.value;
        var amount = $num * $value;
        $('.pro_price strong',$comList).text(amount);
    });
    //给商品评分

    //$('.rating a',$comList).on('mouseover',function() {
        //var $this = $(this).index();
        //var $rating = ('.rating', $comList);
        //if ($this == 0) {
        //    $rating.addClass('one');
        //} else if ($this == 1) {
        //    $rating.addClass('two');
        //} else if ($this == 2) {
        //    $rating.addClass('three');
        //} else if ($this == 3) {
        //    $rating.addClass('four');
        //} else if ($this == 4) {
        //    $rating.addClass('five');
        //} else {
        //    $rating.addClass('zero');
        //}
    //});
    //    on('mouseover',function(){
    //    var $index = $(this).parent().index()+1;
    //    var $posit = -$index*16-(5*16);
    //    $('.rating',$comList).css('background-position','0 '+$posit+'px');
    //
    //});
    //    .on('mouseout',function(){
    //    $('.rating',$comList).css('background-position','0 0');
    //});
    $('.rating a',$comList).on('click',function(){
        var $title = $(this).attr("title");
        var $index = $(this).parent().index()+1;
        var $posit = -$index*16;
        $('.rating',$comList).css('background-position','0 '+$posit+'px');
        alert('您对此商品的评分是：'+$title);
    })
    //购物车
    $('#confirm-shopping img').on('click',function(){
    });
//弹出框
    var $eject = $('#eject');
    var $ejectContent = $('#eject-content');
    $('#magnifier').on('click',function(){
        $eject.show();
        $ejectContent.show();
        var $migSrc=$('img',$bigImg).prop('src');
        $('img',$ejectContent).prop('src',$migSrc);
    });
    $eject.on('click',function(){
        $eject.hide();
        $ejectContent.hide();
    });
    $('#close div a',$ejectContent).on('click',function(){
        $eject.hide();
        $ejectContent.hide();
    });
});