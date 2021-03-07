/**
 * Created by Savatia on 9/18/2016.
 */
angular.module('profileCtrl', [])
    .controller('profileController', ['$scope', '$http', 'Profile', '$compile', function ($scope, $http, Profile, $compile) {
        $scope.memberData = {};
        $scope.experience = {};
        $scope.training = {};
        $scope.academic = {};
        $scope.prof_qualifications = {};
        $scope.password = {};
        $scope.input_form_file = {};
        $scope.uploadFileStart = true;
        $scope.uploadFileFin = true;
        $scope.competencies = [];
        $scope.grade_levels = [];
        $scope.sectors = [];

        $scope.currentView = 'general';
        Profile.getMember().success(function (data) {
            $scope.memberData = data;
        }).error(function (data) {

        });
        $scope.loading = true;
        $scope.active_tab = 'general';

        $scope.getView = function (name) {
            $scope.loading = false;
            //console.log($scope.memberData);
            // Load the next academic and hide loading
            Profile.getView(name)
                .success(function (data) {
                    //replace page with view
                    var temp = $compile(data)($scope);
                    $('#profile_view_container').html(temp);
                    $scope.active_tab = name;
                    $scope.loading = true;
                    $scope.currentView = name;
                    $scope.loading = true;
                    $( document ).ready(function() {
                        var elements  = document.querySelectorAll('input[type=date]');

                        for(var i = 0; i < elements.length;i++) {
                            if ( $(elements[i]).prop('type') != 'date' ) {
                                var picker = new Pikaday({
                                    field: elements[i],
                                    format: 'YYYY-MM-DD'
                                });
                            }
                        }
                    });
                })
                .error(function () {
                    $.notify("Could not get information!", "error");
                    $scope.loading = true;
                });
        };

        $scope.save = function (url, data) {
            if(data.constructor  === Array) data = { data: data };
            Profile.saveData(url, data).success(function (data){
                $('#myModal').modal('hide');
                $.notify("Saved successfully!", "success");
                $scope.getView($scope.currentView);
            }).error(function (data) {
                $.notify("Your changes could not be saved!", "error");
            });
        };

        $scope.getData = function (obj, path) {
            Profile.getData(path).success(function (data) {
                $scope[obj] = data;
            }).error(function (data) {
                $.notify("Could not get information!", "error");
            })
        };

        $scope.changePassword = function()
        {
            if( $scope.password.new_password !== $scope.password.new_password_confirmation)
            {
                $scope.password.password_mismatch = true;
                return;
            };
            
            $scope.password.password_mismatch = false;
            Profile.changePassword($scope.password).success(function(data){
                $('#password_modal').modal('hide');
                //$scope.password.errors = data;

            }).error(function(data){
                $scope.password.errors = data;
            });
        };

        $scope.setPicture = function (data) {
            $scope.picture = data;
        };

        $scope.uploadAttachment = function (file) {
            $scope.uploadFileStart = false;
            $scope.uploadFileFin = true;
            Profile.uploadAttachment(file)
                .success(function (data) {
                    // attachment uploaded
                    $scope.academic.Attachment = data;
                    $scope.academic.attachment_name = data;
                    $scope.uploadFileStart = true;
                    $scope.uploadFileFin = false;

                    $.notify("Successfully uploaded!", "success");
                })
                .error(function (data) {
                    //attachment not uploaded
                    $.notify("Could upload!", "error");
                    $scope.uploadFileFin = true;
                    $scope.uploadFileStart = true;
                });
        };

        $scope.changeCheckbox = function(item, array)
        {
            try {
                var index = $scope[array].indexOf(item);
                if(index < 0)
                    $scope[array].push(item);
                else
                    $scope[array].splice(index, 1);
            }
            catch(err) {
                console.log(array);
            }
        };

        $scope.edit = function (id, resource, obj) {

            Profile.getData(resource+'/'+id)
                .success(function (data) {
                    console.log(data);
                    $scope[obj] = data;
                    $('#myModal').modal('show');
                }).error(function (data) {
                $.notify("Could not get information!", "error");
            })
        };

        $scope.checked = function(item, array)
        {
            var index = $scope[array].indexOf(item);
            return !(index < 0 );
        };
        
    }]).directive('customOnChange', function() {
    return {
        restrict: 'A',
        link: function ($scope, el, attrs) {
            el.bind('change', function (event) {
                var files = event.target.files;
                var file = files[0];
                $scope.input_form_file = file;
                $scope.$eval(attrs.customOnChange);
            });
        }
    }}
    ).directive('limitTo', function () {
    return {
        restrict: "A",
        require: 'ngModel',
        link: function (scope, element, attrs, ngModel) {
            attrs.$set("ngTrim", "false");
            var limitLength = parseInt(attrs.limitTo, 10);// console.log(attrs);
            scope.$watch(attrs.ngModel, function(newValue) {
                if(ngModel.$viewValue == undefined) return;
                if(ngModel.$viewValue.length>limitLength){
                    ngModel.$setViewValue( ngModel.$viewValue.substring(0, limitLength ) );
                    ngModel.$render();
                }
            });
        }
    };
});