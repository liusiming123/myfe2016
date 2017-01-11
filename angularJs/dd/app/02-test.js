var myApp=angular.module('myApp',[]);

myApp.controller('firstController',function($scope){
	$scope.num="789";
	$scope.aa=function(){
		bb();
	}

	var bb=function(){
		alert('aaaa');
	}
	//console.log(this);
	// this.bb=function(){
	// 	alert('aaaa');
	// }
});
// var firstController=function($scope){
// 	$scope.num=456;

// 	$scope.aa=function(){
// 		//alert(123);
// 		$scope.nums=[];
// 	}

// 	$scope.nums=[{'id':1},{'id':2},{'id':3}];

// 	this.bb=function(){

// 	}



	// setInterval(function(){
	// 	console.log($scope.num);
	// },3000);
	// $scope.date=new Date();

	// setInterval(function(){
	// 	$scope.$apply(function(){
	// 		$scope.date=new Date();
	// 	})

		
	// },1000);

// }