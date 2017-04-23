$(function(){
    //首页js
    var $bnerBox = $('#bner .bner-box');
    var $num=0;
    var $bner = $('#bner');
    var timer;
    bnerBg();
    play();
    //轮播图上面小图片加点击事件
    $('.bner-tab span',$bnerBox).on('click',function(){
        clearInterval(timer);
        var $index = $(this).index();
        $num=$index;
        fn($index);
    });
    //换图片
    function fn(index){
        $('.bner-tab span',$bnerBox).eq(index).children('img').addClass('img-opacity');
        $('.bner-tab span',$bnerBox).eq(index).siblings().children('img').removeClass('img-opacity');
        $('.bner-warp a',$bnerBox).eq(index).fadeIn(1000).siblings().fadeOut();
        bnerBg();
    }
    //换大容器的背景颜色，为了好看
    function bnerBg(){
        if($num == 0){
            $bner.css('background','rgb(251, 213, 181)');
        }else if($num == 1){
            $bner.css('background','rgb(219, 238, 243)');
        }else if($num == 2){
            $bner.css('background','rgb(235, 241, 221)');
        }else if($num == 3){
            $bner.css('background','rgb(195, 214, 155)');
        }
    }
    //轮播图定时器
    function play(){
        timer=setInterval(function(){
            $num++;
            if($num==4){
                $num=0;
            }
            fn($num);
        },3000);
    }

    //商品加入划入划出
    var $snacks = $('#content .snacks');
    $('li',$snacks).hover(function(){
        $(this).css('border','2px solid #dd546d');
    },function(){
        $(this).css('border','2px solid gainsboro');
    });


    //个人中心按钮划入显示   画出隐藏
    var $login = $('#header .login');
    $('.click-warp',$login).on('mouseover',function(){
        $(this).css({
            background:'#ddd'
        });
        $(this).children('ul').show();
    }).on('mouseout',function(){
        $(this).css({
            background:'white'
        });
        $(this).children('ul').hide();
    });















});
