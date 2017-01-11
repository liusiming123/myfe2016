// var myApp=angular.module('myApp',[]);

// myApp.controller('cartController',function($scope){
// 		$scope.cart=[
// 		{
// 			id:1000,
// 			name:'iphone5s',
// 			quantuty:3,
// 			price:4300,
// 		},
// 		{
// 			id:3300,
// 			name:'iphone5',
// 			quantuty:30,
// 			price:3300,
// 		},
// 		{
// 			id:232,
// 			name:'mac',
// 			quantuty:4,
// 			price:23000,
// 		},
// 		{
// 			id:2000,
// 			name:'ipad',
// 			quantuty:5,
// 			price:6900,
// 		}

// 	];
// });

var cartController=function($scope){
	$scope.cart=[
		{
			id:1000,
			name:'iphone5s',
			quantuty:3,
			price:4300,
		},
		{
			id:3300,
			name:'iphone5',
			quantuty:30,
			price:3300,
		},
		{
			id:232,
			name:'mac',
			quantuty:4,
			price:23000,
		},
		{
			id:2000,
			name:'ipad',
			quantuty:5,
			price:6900,
		}

	];

	//计算总价
	$scope.totalPrice=function(){
		var total = 0;
		angular.forEach($scope.cart,function(item){
			total+=item.quantuty * item.price;

		});
		return total;
	}

	//计算数量
	$scope.totalQuantity=function(){
		var total=0;
		angular.forEach($scope.cart,function(item){
			var num=parseInt(item.quantuty);
			total+=num;
		});
		return total;
	}

	//移除
	$scope.remove=function(id){
		//alert(id);
		//主动触发脏检查
		var index=-1;
		console.log(index);
		angular.forEach($scope.cart,function(item,key){
			//console.log(key)
			if(item.id == id){
				index=key;
				console.log(index);
			}

			

		});

		if(index != -1){
				$scope.cart.splice(index,1);
		}
	}

	// $scope.destory=function(){
	// 	$scope.cart={

	// 	};
	// }

	$scope.add=function(id){
		var index=findIndex(id);
		//console.log(index);
		if(index != -1){
			//if(index)
			++$scope.cart[index].quantuty;
		}
	}

	$scope.reduce=function(id){
		var index=findIndex(id);
		if(index !=-1){
			var item=$scope.cart[index];
			if(item.quantuty>1){
				--$scope.cart[index].quantuty;
			}else{
				var returnKey=confirm('从购物车内删除该产品！');
				if(returnKey){
					$scope.remove(id);
				}
			}
			
		}
	}

	//找一个元素的索引
	var findIndex=function(id){
		var index=-1;

		angular.forEach($scope.cart,function(item,key){
			if(item.id==id){
				index=key;
				return;
			}
		});

		return index;

	}

	$scope.$watch('cart',function(newValue,oldValue){
		//console.log(newValue);
		angular.forEach(newValue,function(item,key){
			if(item.quantuty<1){
				var returnKey=confirm('从购物车内删除该产品！');
				if(returnKey){
					$scope.remove(item.id);
				}else{
					item.quantuty=oldValue[key].quantuty;
				}

				//return ;
			}
		})
	},true);
}