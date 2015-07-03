/**
 * Created by Jesse on 5/11/2015.
 */
var myApp = angular.module('myApp', ['ngRoute']);

myApp.controller('mainController', ['$scope', '$filter', '$http', function($scope, $filter, $http) {

    $scope.status = '';
    $scope.pageClass = 'display-page';

    $http.get('/starwarsevents/web/app_dev.php/ang_api')
        .success(function (response) {
            $scope.players = response;
        })
        .error(function (e){

        });

    $scope.deletePlayer = function() {

        $http.delete('/starwarsevents/web/app_dev.php/delete_angplayer', $scope.players[0])
            .success(function (d) {
                console.log('success delete');
            })
            .error(function (d) {
                console.log(d);
            });

    };


}]);

myApp.controller('postingController', ['$scope','$filter','$http', function($scope, $filter, $http){


    $scope.pageClass = 'posting-page';
    $scope.addPlayer = function(){
        $http.post('/starwarsevents/web/app_dev.php/process_angplayer',$scope.angForm)
            .success(function(data, status, headers, config){
                $scope.successfullpost = "success!";
                window.location.replace("#/");

            })
            .error(function(e){
                $scope.successfullpost = "fail!";
            });
    };
}]);

myApp.controller('deletingController', ['$scope', '$http', function($scope,$http){

    $scope.deletePlayer = function() {
        $scope.showstatus = "deleted: " + $scope.id + " " + $scope.name;


    };

}]);

myApp.config(function($routeProvider){
    $routeProvider
        .when('/deleteang',{
            controller: 'deletingController',
            templateUrl: '/starwarsevents/web/app_dev.php/create_angplayer'

        })
        .when('/createang',{
            controller: 'postingController',
            templateUrl: '/starwarsevents/web/app_dev.php/create_angplayer'

        })
        .when('/',{
          controller: 'mainController',
          templateUrl: '/starwarsevents/web/app_dev.php/show_angplayer'

        });


});