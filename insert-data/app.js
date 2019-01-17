var application = angular.module("myapp", []);
application.controller("formcontroller", function($scope, $http){
    $scope.insert = {};
    $scope.insertData = function(){
        $http({
            method:"POST",
            url:"insert.php",
            data:$scope.insert,
        }).success(function(data){
            if(data.error)
            {
                $scope.errorFirstname = data.error.first_name;
                $scope.errorLastname = data.error.last_name;
                $scope.errorDob = data.error.dob;
                $scope.errorAge = data.error.age;
                $scope.errorCity = data.error.city;
                $scope.errorEmail = data.error.email;
                $scope.errorPhone = data.error.phone;
                $scope.errorPass= data.error.pass;
                $scope.successMsg = null;
            }
            else
            {
                $scope.insert = null;
                $scope.errorFirstname = null;
                $scope.errorLastname = null;
                $scope.errorDob = null;
                $scope.errorAge = null;
                $scope.errorCity = null;
                $scope.errorEmail = null;
                $scope.errorPhone = null;
                $scope.errorPass = null;
                $scope.successMsg = data.message;
            }
        });
    }
});