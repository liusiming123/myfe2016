var firstController=function($scope){
	$scope.date=new Date();

	setInterval(function(){
		//$scope.date=new Date();
		$scope.$apply(function(){
			$scope.date=new Date();
		});
	},1000);

	//$scope.
}