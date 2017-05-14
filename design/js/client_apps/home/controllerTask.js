(function(){
	angular.module("hola").controller("listTasksController",listTasksController);

	listTasksController.$inject =["$scope","$http"];

	function listTasksController($scope,$http){
		var vm = this;
		vm.carrot = [];

		vm.mundo = "HOLA MUNDOTE";

		
		$http.get("rest",{
		}).success(function(data,status,headers,config){
			vm.carrot = data;
		}).error(function(error,status,headers,config){
			console.log(error);
		});
	}
})();