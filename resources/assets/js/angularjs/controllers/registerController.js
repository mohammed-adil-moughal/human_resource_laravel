angular.module('registerCtrl', [])
    .controller('registerController',['$scope','$http','Member','$compile','$window', function ($scope, $http, Member, $compile, $window) {
        $scope.memberData = {};
        $scope.memberData.academics = [];
        $scope.memberData.experience = [];
        $scope.memberData.prof_qualifications = [];
        $scope.memberData.training = [];

        $scope.prof_qualifications = {};
        $scope.academic = {};
        $scope.experience = {};
        $scope.training = {};

        $scope.loading = true;
        $scope.countries = [];

        $scope.hide_modal = true;
        Member.getCountries()
            .success(function (data) {
                for(var x in data){
                    $scope.countries.push(data[x]);

                }

            })
            .error(function (data) {
               //console.log(data);
            });
        
        
        $scope.getView = function (name) {
            $scope.loading = false;
            // Load the next academic and hide loading
            var options = undefined;
            if(name === 'Payment')
            {

                options = "?membership_type="+$scope.memberData.MemberShip_Type;
                console.log(options);
            }



            Member.getView(name, options)
                .success(function (data) {
                    //replace page with view
                    var temp = $compile(data)($scope);
                    $('#sign_up_form_container').html(temp);
                    $scope.loading = true;
                })
                .error(function () {
                    //display an error message
                    $scope.loading = true;
                });

        };

        $scope.uploadPicture = function (file) {

            Member.uploadPicture(file)
                .success(function (data) {
                    // image uploaded
                    console.log(data);
                    $scope.memberData.picture = data.id;
                })
                .error(function (data) {
                    //image not uploaded
                    console.log(data);
                });

        };

        $scope.uploadAttachment = function (file) {
            console.log(file);
            Member.uploadAttachment(file)
                .success(function (data) {
                    // attachment uploaded
                    console.log(data);
                    $scope.academic.attachment = data.id;
                    $scope.academic.attachment_name = data.file_name;
                })
                .error(function (data) {
                    //attachment not uploaded
                    console.log(data);
                });

        };

        $scope.proceedPayment = function () {
            Member.save($scope.memberData)
                .success(function (data) {
                    // Redirect to the profile page
                    $window.location.href = '/profile';
                })
                .error(function (data) {
                    //console.log(data);
                })

        };

        $scope.deleteItem = function (item, array)
        {
            array.splice(array.indexOf(item), 1);
        };

        $scope.addItem = function (obj, array)
        {
            var temp = $.extend(true, {}, obj);
            array.push(temp);
            return obj = {};
        };

        // Will add edit
        $scope.editItem = function (item, obj, array)
        {
            obj = item;
            //console.log($scope.academic);
        };

    }])
    .directive('customOnChange', function() {
        return {
            restrict: 'A',
            link: function($scope, el, attrs){
                el.bind('change', function(event){
                    var files = event.target.files;
                    var file = files[0];
                    $scope.input_form_file = file;
                    $scope.$eval(attrs.customOnChange);
                });
            }
        };
    });
