<?php

?>
<html>
<head>
    <title>Search </title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <link rel="icon" href="https://angularjs.org/favicon.ico" type="image/x-icon">
    <style>
        .form_style
        {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="container" ng-app="myapp1" ng-controller="searchApp" ng-init="fetchData()">
    <br />
    <h3 align="center">Search Users</h3>
    <br />
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Search</span>
            <input type="text" name="search_query" ng-model="search_query" ng-keyup="fetchData()" placeholder="Search USer Details" class="form-control" />
        </div>
    </div>
    <br />
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th> UID</th>
            <th> First Name</th>
            <th> Last Name</th>
            <th> BirthDate</th>
            <th>age</th>
            <th>City</th>
            <th>Email / User Name</th>
            <th>Phone</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="data in searchData">
            <td>{{ data.user_id }}</td>
            <td>{{ data.fname }}</td>
            <td>{{ data.lname }}</td>
            <td>{{ data.dob }}</td>
            <td>{{ data.age }}</td>
            <td>{{ data.city }}</td>
            <td>{{ data.email }}</td>
            <td>{{ data.phone }}</td>
        </tr>
        </tbody>
    </table>
</div>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128987902-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-128987902-1');
</script>
</body>
</html>

<script>
    var app = angular.module('myapp1', []);
    app.controller('searchApp', function($scope, $http){
        $scope.fetchData = function(){
            $http({
                method:"POST",
                url:"fetch.php",
                data:{search_query:$scope.search_query}
            }).success(function(data){
                $scope.searchData = data;
            });
        };
    });
</script>
