/**
 * Created by Savatia on 9/18/2016.
 */
angular.module('profileCtrl', [])
    .controller('profileController',['$scope','$http','Profile','$compile', function ($scope, $http, Profile, $compile) {
        $scope.memberData = {};
        $scope.loading = true;
        $scope.active_tab = 'general';

        $scope.getView = function (name) {
            $scope.loading = false;
            // Load the next academic and hide loading
            Profile.getView(name)
                .success(function (data) {
                    //replace page with view
                    var temp = $compile(data)($scope);
                    $('#profile_view_container').html(temp);
                    $scope.active_tab = name;
                    $scope.loading = true;
                })
                .error(function () {
                    //display an error message
                    $scope.loading = true;
                });
        };

    }])
;