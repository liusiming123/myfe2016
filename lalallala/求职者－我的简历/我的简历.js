
$(function(){
//����
    $('.personal-center li').on('click',function(){
        console.log('123');
        $(this).siblings().find('.a1').remove();
        $(this).children('.menu').append('<div class="a1"></div>');
        return false;
    });
//��ʵ����
    if($('.name-flag').html()==0){
        $('ture-name').append();
    }

});
