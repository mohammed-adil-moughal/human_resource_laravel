/**
 * Created by Savatia on 9/18/2016.
 */
angular.module('profileService', [])
    .factory('Profile', function ($http) {
        return{
            save: function (memberData) {
                return $http({
                    method: 'POST',
                    url: APP_URL +'/member',
                    headers: {'Content-type': 'application/x-www-form-urlencoded','X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: $.param(memberData)
                })
            },

            // function to get a form
            getView: function (name) {
                return $http.get(APP_URL +'/api/member/getProfileView?view='+name);
            },
            // function to get a form
            changePassword: function (data) {
                
                return $http({
                    method: 'POST',
                    url: APP_URL +'/password/change',
                    headers: {'Content-type': 'application/x-www-form-urlencoded','X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: $.param(data)
                })
            },
            
            getData: function (path) {
                return $http.get(APP_URL +'/api/'+path);
            },

            // get the list of countries
            getMember: function () {
                return $http.get(APP_URL +'/member');
            },

            getCountries: function () {
                return $http.get(APP_URL +'/api/countries/all');
            },

            saveData: function (url, data) {
                return $http({
                    method: 'POST',
                    url: url,
                    headers: {'Content-type': 'application/x-www-form-urlencoded','X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: $.param(data)
                })
            },

            // get the upload picture
            uploadPicture: function (picture) {
                return $http({
                    url: APP_URL +'/api/member/uploadPicture',
                    method: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        picture: picture
                    },
                    transformRequest: function (data, headersGetter) {
                        var formData = new FormData();
                        angular.forEach(data, function (value, key) {
                            formData.append(key, value);
                        });
                        var headers = headersGetter();
                        delete headers["Content-Type"];
                        return formData;
                    }
                });
            },

            uploadAttachment: function (attachment) {
                console.log(attachment);
                return $http({
                    url: APP_URL +'/api/member/uploadAttachment',
                    method: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        attachment: attachment
                    },
                    transformRequest: function (data, headersGetter) {
                        var formData = new FormData();
                        angular.forEach(data, function (value, key) {
                            formData.append(key, value);
                        });
                        var headers = headersGetter();
                        delete headers["Content-Type"];
                        return formData;
                    }
                });
            }

        }
    });