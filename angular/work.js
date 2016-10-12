var model;
var request;
var listGetWall=angular.module("listGetWall",[]);
listGetWall.controller("listGetWallCtrl",function($scope,$http){
$scope.text='';
$scope.elem=false;
$scope.getInfo=function(){
var promise=$http.post("model.php");//.success(function(data){
// $scope.items=data;
// $scope.convert=function(date){
// 	var time=new Date(date*1000)
// 	return time.toLocaleString();
// }

// });
promise.then(fullfilled,rejected);
}
function fullfilled(response){
	console.log("Status: "+response.status+":"+response.statusText);
	console.log(response.headers('content-type'));
	$scope.items=response.data;
	$scope.convert=function(date){
	var time=new Date(date*1000)
	return time.toLocaleString();
	}
}
function rejected(error){
	console.log(error.status);
}
$scope.nitems=[{prop1:'item 1',prop2:1},
{prop1:'item 2',prop2:2},
{prop1:'item 3',prop2:3}];
$scope.selected=$scope.nitems[0];
$scope.url="../buttons.html";
});
listGetWall.directive("order",function(){
	return function(scope,elem,attr){
		var attrValue=attr['order'];
		var data=scope[attrValue];
		elem.append(document.createTextNode(data));
	}
});
listGetWall.controller("baseCtrl",function($scope,$rootScope){
	$scope.value="startValue";
	$scope.changeValue=function(){
		$scope.value=new Date().toLocaleString();
		$rootScope.$broadcast("messageEvent",{
			message:$scope.value
		});
	}
});
listGetWall.controller("childCtrl",function($scope){
    
	$scope.newValue="Unknown";
	$scope.$on("messageEvent",function(event,args){
		$scope.newValue=args.message;
	});
});
listGetWall.controller("countCtrl",function($scope,$interval){
$scope.counter=0;
// $scope.$watch("counter",function(newValue,oldValue){
// console.log(oldValue+"->"+newValue);
// });
$scope.inc=function(){
	$scope.counter++;
	console.log($scope.$$watchers);
}
setInterval(function(){
	$scope.counter++;
	$scope.$digest();
}
	,1000);
// $interval(function(){
// 	$scope.counter++;
// },1000);
});
window.onload=build;
function build(){
	angular.element(maint).scope().getInfo();
}

