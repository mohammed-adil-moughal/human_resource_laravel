angular.module('registerService', [])
    .factory('Member', function ($http) {
        return{
            save: function (memberData) {
                return $http({
                    method: 'POST',
                    url: APP_URL +'/member',
                    headers: {'Content-type': 'application/x-www-form-urlencoded','X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: $.param(memberData)
                })
            },

            printForm: function (memberData) {
                return $http({
                    method: 'POST',
                    url: APP_URL +'/applicationform',
                    responseType: 'arraybuffer',
                    headers: {'Content-type': 'application/x-www-form-urlencoded','X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: $.param(memberData)
                })
            },

            // function to get a form
            getView: function (name, options) {
                if(options === undefined)
                    return $http.get('/api/signup/get'+name+'View');
                return $http.get('/api/signup/get'+name+'View'+options);
            },

            // get the list of countries
            getCountries: function () {
                return $http.get(APP_URL +'/api/countries/all');
            },

            // get competency areas
            getCompetencyAreas: function () {
                return $http.get(APP_URL +'/api/CompetencyAreas/all');
            },

            getIndustrySectors: function () {
                return $http.get(APP_URL +'/api/IndustrySectors/all');
            },
            getData: function (path) {
                return $http.get(APP_URL +'/api/'+path);
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

            // upload the picture to /api/member/uploadAttachment
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
            },
            checkid: function (data) {
                return $http({
                    method: 'POST',
                    url: APP_URL +'/checkid',
                    headers: {'Content-type': 'application/x-www-form-urlencoded','X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: $.param(data)
                })
            },
            getapi: function (url) {
                return $http.get(url);
            },

            postapi: function (data, url) {
                return $http({
                    method: 'POST',
                    url: url,
                    headers: {'Content-type': 'application/x-www-form-urlencoded','X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: $.param(data)
                })
            }

        }
    });