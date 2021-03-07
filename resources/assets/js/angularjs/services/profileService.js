/**
 * Created by Savatia on 9/18/2016.
 */
angular.module('profileService', [])
    .factory('Profile', function ($http) {
        return{
            save: function (memberData) {
                return $http({
                    method: 'POST',
                    url: '/member',
                    headers: {'Content-type': 'application/x-www-form-urlencoded','X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: $.param(memberData)
                })
            },

            // function to get a form
            getView: function (name) {
                return $http.get('/api/member/getProfileView?view='+name);
            },

            // get the list of countries
            getCountries: function () {
                return $http.get('/api/countries/all');
            }

        }
    });