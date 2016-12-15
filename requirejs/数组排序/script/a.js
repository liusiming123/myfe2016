define(['b'],function(isArr){
    function sortArray(arr){
        if(isArr(arr)){
            arr = arr.sort(function(a,b){
                return a-b;
            });
            return arr;
        }else{
            console.log('arr不是一个数组');
        }
    }
    return sortArray;
});