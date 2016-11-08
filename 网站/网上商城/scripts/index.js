/**
 * Created by º«Ð¡Ã« on 2016/11/4.
 */
$(function(){
    var $search=$('#search');
    var $nav=$('#nav');
    var $commodity=$('#commodity p');
    var $imagesNav=$('#images-nav');
    var $img=$('#images img') ;
    var num=0;
    play();
    //ËÑË÷¿ò
    $search.on('focus',function(){
        if(this.value==this.defaultValue){
            this.value=''
        }else{
            this.value=this.value;
        }
        $search.select();
    }).on('blur',function(){
        if(this.value==''){
            this.value=this.defaultValue;
        }
    }).on('keydown', function (event) {
        if(event.which==13){
            $search.trigger('blur');
        }
    });
    //»»·ô
    $('#skin .in').on('click',function(){
        var $index=$(this).index();
        $(this).addClass('selected').siblings().removeClass('selected');
        switch ($index){
            case 0:{
                $nav.css('background','#4565a9');
                $commodity.css('background','#4069c0');
                break;
            }
            case 1:{
                $nav.css('background','#b0d400');
                $commodity.css('background','#CDE074');
                break;
            }
            case 2:{
                $nav.css('background','orange');
                $commodity.css('background','#FFCF78');
                break;
            }
            case 3:{
                $nav.css('background','#17bfcf');
                $commodity.css('background','#98E0E6');
                break;
            }
            case 4:{
                $nav.css('background','#e11355');
                $commodity.css('background','#F296B2');
                break;
            }
            case 5:{
                $nav.css('background','#be46d8');
                $commodity.css('background','#D49AE1');
                break;
            }
        }

    });
    //µ¼º½À¸
    $('li',$nav).hover(function(){
        $(this).children('.sub-nav').show();
    },function(){
        $(this).children('.sub-nav').hide();
    });
    //ÂÖ²¥Í¼
    $('div',$imagesNav).on('mouseover',function(){
        var index=$(this).index();
        $(this).addClass('img-selected').siblings().removeClass('img-selected');
       $img.eq(index).show().siblings().hide();
        num=index;
    });
    $('#advertisement').hover(function(){clearInterval(timer);},function(){play();});
    // $('div',$imagesNav).on('mouseout',function(){
    //    play();
    //});
    //$img.on('mouseover',function(){
    //    clearInterval(timer);
    //}).on('mouseout',function(){
    //    play();
    //});
     function play(){
         timer=setInterval(function(){
            num++;
            if(num==$img.size()){
                num=0;
            }
            $img.eq(num).show().siblings().hide();
            $('div',$imagesNav).eq(num).addClass('img-selected').siblings().removeClass('img-selected');
        },2000);
    }
    //ÂÖ²¥Í¼2
   var $lis=$('#lis');
    $lis.width($('#lis .list').width()*4);
    $('#tab>div a').on('click',function(){
        var $this=$(this);
        var index=$this.index();
        $this.addClass('chos').siblings().removeClass('chos');
        $lis.animate({
           left:-index*$('#lis .list').width()
        });
    })









});