var myApp=angular.module('myApp',[]);

// myApp.factory('Data',function(){
// 	return {
// 		message:'共享数据',
// 	}
// });

myApp.controller('firstController',function($scope){
	//console.log(Data);
	$scope.data={
		'name':'laoshan'
	};
	//console.log($scope);
	//console.log()
});

myApp.controller('secondController',function($scope){
	//console.log(Data);
	//console.log($scope.name);
	//console.log($scope);
	$scope.data=$scope.$$prevSibling.data;
});