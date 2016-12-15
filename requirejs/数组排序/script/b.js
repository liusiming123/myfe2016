define(function(){
    function isArr(arr){
        if(arr instanceof Array){
            return true;
        }else{
            return false;
        }
    }
    return isArr;
});