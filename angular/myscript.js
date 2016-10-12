var global;
var model={
user:"User1",
courses:[{name:"Html,css",passed:true},
{name:"java script",passed:false},
{name:"jQuery",passed:true}]
};
var courseList=angular.module("courseList",[]);
courseList.controller("CourseListCtrl",function($scope){
	$scope.list=model;

	$scope.addNew=function(){
		$scope.list.courses.push({
			name:$scope.courseName,
			passed:false
            
		});
		$scope.courseName="";
        var limit=$scope.limitValue;
        $scope.refresh()
        if(limit+1==$scope.courseSize.length)
            $scope.limitValue=$scope.courseSize.length;
        else
            $scope.limitValue=Math.round($scope.courseSize/(limit+1))+1;
	}
	$scope.showText=function(passed){
		return passed ? "Да ":"Нет";
	}
	$scope.setStyle=function(passed){
		return passed ?"color:green":"color:red";
	}
	$scope.elem=false
	$scope.style={
		background:"yellowgreen"
	}
    $scope.limitValue=2;
	$scope.e=1;
	$scope.copy=function(){
		var selection=window.getSelection();
		var text=selection.toString();
		text=text+" mysite.ru";
		$scope.e=text;
	}
    $scope.courseSize=[];
    
    $scope.refresh=function(){
     for(var i=0;i<$scope.list.courses.length;i++){
        $scope.courseSize[i]=i+1;
    }
    }
    $scope.refresh();
    
});

