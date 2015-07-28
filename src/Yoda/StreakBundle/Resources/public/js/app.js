var myApp = angular.module('myApp', []).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});;


myApp.controller('showBetsController', ['$scope','$log', '$filter', '$http', function($scope, $log, $filter, $http) {

    $scope.post_path = Routing.generate('update_bet');
    $scope.get_path = Routing.generate('get_all_bet_data');

    $http.get($scope.get_path)
        .success(function(data){
            $scope.bets = JSON.parse(data);
            $log.info($scope.bets);
        })
        .error(function (data) {
            $log.error(data);
        });
    $scope.selected = '';

    $scope.getTemplate = function (bet) {
        if (bet.id === $scope.selected.id) return 'editbets';
        else return 'showbets';
    };

    $scope.showEdits = function (bet) {
        $log.info(bet);
        $scope.selected = angular.copy(bet);
    };

    $scope.cancel = function () {
        $scope.selected = false;
    };

    $scope.saveBet = function (bet) {
        $log.info(bet);
      $http.post($scope.post_path, bet)
          .success(function(data) {
             $log.info('success');
              $log.info(data);
          })
          .error(function(data) {

          });
        $scope.selected = false;
    };
}]);

