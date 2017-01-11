function firstController($scope){
	$scope.name="laoshan";
	$scope.num1=1;
	$scope.num2=2;
	$scope.aa=function(){
		return 12345;
	}

	//this.name="xx";

}

function secondController($scope){
	$scope.ss="laoxie";

	setTimeout(function(){
		console.log($scope.ss);
		//$scope.ss="xiaowu loves laoxie too";
	},2000);
}