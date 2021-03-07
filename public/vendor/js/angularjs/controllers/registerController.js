angular.module('registerCtrl', [])
    .controller('registerController',['$scope','$http','Member','$compile','$window',  function ($scope, $http, Member, $compile, $window) {
        $scope.memberData = {};
        //$scope.memberData.membership_type = $routeParams.membership_type;
        $scope.memberData.academics = [];
        $scope.memberData.experience = [];
        $scope.memberData.prof_qualifications = [];
        $scope.memberData.training = [];
        $scope.memberData.sectors = [];
        $scope.memberData.competencies = [];
        $scope.custom_competencies = [];
        $scope.custom_sectors = [];

        var name = $("#u_name").val().split(' ');

        var surname = name[name.length-1];
        var other_names = "";

        for(var i = 0; i < name.length -1; i++)
        {
            other_names += name[i] + " ";
        }

        $scope.memberData.Surname = surname;
        $scope.memberData.Other_Names = other_names;
        $scope.memberData.E_mail = $("#u_email").val();
        $scope.memberData.MemberShip_Type = $("#membership_type").val();
        $scope.prof_qualifications = {};
        $scope.academic = {};

        $scope.taken = false;

        $scope.experience = {};
        $scope.training = {};
        $scope.editArray = null;

        $scope.loading = true;
        $scope.countries = [];
        $scope.competency_areas = [];
        $scope.industry_sectors = [];

        $scope.uploadPicFin = true;
        $scope.uploadPicStart = true;

        $scope.uploadFileFin = true;
        $scope.uploadFileStart = true;
        $scope.hide_modal = true;

        Member.getCountries()
            .success(function (data) {
                for(var x in data){
                    $scope.countries.push(data[x]);
                }

            })
            .error(function (data) {

                $window.location.href = APP_URL +'/signup';
            });

        Member.getIndustrySectors()
            .success(function (data) {
                for(var x in data){
                    $scope.industry_sectors.push(data[x]);
                }
            })
            .error(function (data) {
            });

        Member.getCompetencyAreas()
            .success(function (data) {
                for(var x in data){
                    $scope.competency_areas.push(data[x]);
                }
            })
            .error(function (data) {
            });
        
        
        $scope.getView = function (name) {
            $scope.loading = false;
            // Load the next academic and hide loading

            $scope.loading = false;
            // Load the next academic and hide loading
            var options = undefined;
            if(name === 'Payment')
                options = "?membership_type="+$scope.memberData.MemberShip_Type;

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

        $scope.checkid = function () {
            Member.checkid({ ID_Number: $scope.memberData.ID_Number})
                .success(function (data) {
                    $scope.taken = JSON.parse(data);
                    console.log($scope.taken);
                })
        };

        $scope.uploadPicture = function (file) {
            $scope.uploadPicStart = false;
            $scope.uploadPicFin = true;
            Member.uploadPicture(file)
                .success(function (data) {
                    // image uploaded
                    console.log(data);
                    $scope.memberData.Picture = data;
                    $scope.uploadPicStart = true;
                    $scope.uploadPicFin = false;

                })
                .error(function (data) {
                    //image not uploaded
                    console.log(data);
                    $scope.uploadPicFin = true;
                    $scope.uploadPicStart = true;
                });
        };

        $scope.uploadAttachment = function (file) {
            $scope.uploadFileStart = false;
            $scope.uploadFileFin = true;
            Member.uploadAttachment(file)
                .success(function (data) {
                    // attachment uploaded
                    $scope.academic.Attachment = data;
                    $scope.academic.attachment_name = data;

                    $scope.uploadFileStart = true;
                    $scope.uploadFileFin = false;
                })
                .error(function (data) {
                    //attachment not uploaded
                    console.log(data);
                    $scope.uploadFileFin = true;
                    $scope.uploadFileStart = true;
                });
        };


        $scope.printForm = function () {
                Member.printForm($scope.memberData)
                .success(function (data) {
                        // download the data
                    console.log(data);
                      var blob = new Blob([data], {
                        type: 'octet/stream'
                        });
                    var fileURL = URL.createObjectURL(blob);
                    var a         = document.createElement('a');
                    a.href        = fileURL; 
                    a.target      = '_blank';
                    a.download    = $scope.selectedFile+'.pdf';
                    document.body.appendChild(a);
                    a.click();
               
                })
                .error(function (data) {
                    console.log(data);
                });
        };
       

        $scope.proceedPayment = function () {
                $scope.memberData.sectors.concat($scope.custom_sectors);
                $scope.memberData.competencies.concat($scope.custom_competencies);
            Member.save($scope.memberData)
                .success(function (data) {
                    // Redirect to the profile page
                    console.log(data);
                    $window.location.href = APP_URL +'/profile';
                })
                .error(function (data) {
                    console.log($scope.memberData);
                    console.log(data);
                });
        };

        $scope.deleteItem = function (item, array)
        {
            $scope.memberData[array].splice(array.indexOf(item), 1);
        };

        $scope.clear = function (item)
        {
                $scope[item] = {};
                $('#myModal').modal('show');
                $scope.editArray = null;
        };

        $scope.addItem = function (obj, array)
        {
            if($scope.editArray != null)
            {
                $scope.memberData[array] = $scope.editArray;
                obj = {};
                $scope.editArray = null;
                $('#myModal').modal('hide');
                return;
            }
            var temp = $.extend(true, {}, obj);
            $scope.memberData[array].push(temp);
            $('#myModal').modal('hide');
            obj = {};
            return ;
        };

        // Will add edit
        $scope.editItem = function (item, obj, array)
        {
            var index = $scope.memberData[array].indexOf(item);
            $scope.editArray = JSON.parse(JSON.stringify($scope.memberData[array]));
            //$scope.editArray = array.slice(0);
            $scope[obj] = $scope.editArray[index];
            $('#myModal').modal('show');
        };

        $scope.addProf = function (el, obj)
        {
           console.log( $scope[obj]);
        };
        
        $scope.getData = function (obj, path) {
            Member.getData(path).success(function (data) {
                $scope[obj] = data;
            }).error(function (data) {
                console.log(data);
            })
        };

        $scope.changeCheckbox = function(item, array)
        {
            var index = $scope.memberData[array].indexOf(item);
            if(index < 0)
                $scope.memberData[array].push(item);
            else
                $scope.memberData[array].splice(index, 1);
        };

        $scope.checked = function(item, array)
        {
            var index = $scope.memberData[array].indexOf(item);
            return !(index < 0 );
        };


        $scope.getapi = function(obj, url) {
            Member.getapi(url).success(function (data) {
                $scope[obj] = data;
                console.log(data);
            }).error(function (data) {

            });
        }
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
    })
    .directive('limitTo', function () {
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
