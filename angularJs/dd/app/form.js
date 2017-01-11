var myApp=angular.module('myApp',[]);

myApp.controller('firstController',function($scope){
	$scope.hobbies=[
		{
			id:1,
			name:'玩游戏'
		},
		{
			id:2,
			name:'写代码'
		},
		{
			id:3,
			name:'睡觉'
		}
	];

	$scope.data={
		hobbies:[1,2]
	};

	$scope.toggleHobbySelection=function(id){
		var index=$scope.data.hobbies.indexOf(id);
		if(index == -1){
			$scope.data.hobbies.push(id);
		}else{
			$scope.data.hobbies.splice(index,1);
		}

		console.log($scope.data.hobbies);
	}
});