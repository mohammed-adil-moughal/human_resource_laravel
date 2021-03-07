angular.module('testCtrl', [])
    .controller('testController', function ($scope, $http, Member) {
        $scope.proceedAcademic = function () {
            console.log('here');
        };
    });