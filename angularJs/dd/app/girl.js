var cartController=function($scope){
	//$scope.num=123;
	$scope.cart=[
		{
			id:1000,
			name:'iphone5s',
			quantity:'3',
			price:4300
		},
		{
			id:232,
			name:'mac',
			quantity:'3',
			price:23000
		},
		{
			id:3300,
			name:'iphone5',
			quantity:'30',
			price:3300
		},
		{
			id:2000,
			name:'ipad',
			quantity:'5',
			price:6900
		}

	];

	//计算总价
	$scope.total=function(){
		var total=0;
		angular.forEach($scope.cart,function(item){
			var sum=item.price * item.quantity;
			total+=sum;
		});

		return total;
	};

	$scope.num=function(){
		var num=0;
		angular.forEach($scope.cart,function(item){
			//num+=item.quantity;
			var sumnum=parseInt(item.quantity);
			num+=sumnum;
		});

		return num;
	};

	$scope.del=function(id){
		console.log(id);
		var index=-1;
		angular.forEach($scope.cart,function(item,key){
			//console.log(key);
			if(item.id==id){
				index=key;
			}
		});

		if(index != -1){
			$scope.cart.splice(index,1);
		}
		//从cart数组里找到这个id

		//根据找的id删除这一条数据
	}

	$scope.destory=function(){
		$scope.cart={};
	}

	$scope.reduce=function(id){
		var keyid=findIndex(id);
		if($scope.cart[keyid].quantity>1){
			--$scope.cart[keyid].quantity;
		}else{
			var message=confirm('要删除此商品吗');
			if(message){
				$scope.del(id);
			}
			
		}
		
	}

	$scope.add=function(id){
		var keyid=findIndex(id);
		++$scope.cart[keyid].quantity;
	}

	var findIndex=function(id){
		var index=-1;
		angular.forEach($scope.cart,function(item,key){
			if(item.id==id){
				index=key;
			}
		});

		return index;
	}
}