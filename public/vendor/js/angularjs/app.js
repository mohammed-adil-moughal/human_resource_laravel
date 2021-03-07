var registerApp = angular.module('registerApp', ['registerCtrl', 'registerService'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
var profileApp = angular.module('profileApp', ['profileCtrl', 'profileService']);