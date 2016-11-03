/**
 * Created by º«Ð¡Ã« on 2016/11/2.
 */
$(function(){
    /**header start**/
    var $search=$('#search input');
    $search.on('focus',function(){

        if(this.value==this.defaultValue){
            this.value='';
        }else{
            this.value=this.value;
        }
        $search.select();
    }).on('blur',function(){
            if(this.value==''){
                this.value=this.defaultValue
            }
    });
    $search.on('keypress',function(e){
        if(e.which == 13){
            if(this.value==''){
                this.value=this.defaultValue
            }
        }
    });
    /**header  end*/
    /**banner start**/
    var $index=0;
    var $img=$('#img img');
    $('#prve').on('click',function(){
       $index--;
        if($index<0){
            $index=$img.length-1;
        }
        $img.eq($index).show().siblings().hide();
    });
    $('#next').on('click',function(){
       $index();
    });
    setInterval(function(){
        $next();
    },1000);
    var $next=function(){
        $index++;
        if($index==$img.length){
            $index=0;
        }
        $img.eq($index).show().siblings().hide();
    }
    });
