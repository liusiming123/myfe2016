/**
 * Created by 韩小毛 on 2017/4/12.
 */
$(function(){
    //导航栏显示隐藏
    var $sidebar = $('#sidebar');
    $sidebar.children('.sidebar-sub').css('display','none');
    $sidebar.hover(function(){
        $sidebar.children('.sidebar-sub').css('display','block');
    },function(){
        $sidebar.children('.sidebar-sub').css('display','none');
    });

    //如果传入图片的小框是空，添加默认图片
    $('#files').change(function(){
        if($('#prvid').html() == ''){
            $('#prvid').html('<img src="images/upload-picture.png" alt=""/>');
        }
    });
    //点击性别换小框框
    var $infContent = $('#person-information .information-content');
    $(' label',$infContent).on('click',function(){
        var radioId = $(this).attr('for');
        $(this).siblings('label').css('background-image','url(images/frame.png)');
        $(this).css('background-image','url(images/yesframe.png)');
        $(this).siblings('input[type="radio"]').removeAttr('checked');
        $('#' + radioId).attr('checked', 'true');
    });












});