/**
 * Created by Jesse on 5/11/2015.
 */
var myApp = angular.module('myApp', []);

myApp.controller('mainController', ['$scope', '$filter', '$http', function($scope, $filter, $http) {


    $http.get('/starwarsevents/web/app_dev.php/async_api')
        .success(function(result){
            $scope.lname=result.lName;
        });

}]);