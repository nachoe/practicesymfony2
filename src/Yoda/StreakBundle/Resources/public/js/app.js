var myApp = angular.module('myApp', []);


myApp.controller('showBetsController', function($scope, $log, $filter) {
    $scope.name = "Jane Doe";
    $scope.occupation = "Programmer";

    $scope.getname = function() {
      return $scope.name;
    };
    $scope.formattedname = $filter('uppercase')($scope.name);
    $log.error('error');

    console.log($scope.formattedname);
});