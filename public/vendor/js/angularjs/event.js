angular.module('regEventService', [])
    .factory('Event', function ($http) {
        return {
            getView: function (view) {
                return $http({
                    method: 'GET',
                    url: APP_URL + '/events/getRegEventView/' + view
                });
            },
            postevent: function (data) {
                return $http({
                    method: 'POST',
                    url: APP_URL + '/events/register',
                    headers: {'Content-type': 'application/x-www-form-urlencoded'},
                    data: $.param(data)
                });
            },
            getMember: function (no) {
                return $http({
                    method: 'GET',
                    url: APP_URL + '/member?no=' + no
                });
            }
        };


    });
var app = angular.module('myApp', ['regEventService'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('add_entry', ['$scope', '$compile', 'Event', function ($scope, $compile, Event) {
        
    $scope.event_id = null;
    $scope.type = null;
    $scope.event_entry = {};
    $scope.inoviceskip = false;
    var url = window.location.pathname.split('/');
    $scope.event_entry.Event_Id = url[url.length - 1];
    $scope.errors = false;
    $scope.event_entry.Member_No = member_no;
    $scope.getView = function (view) {
        //console.log($scope.event_entry);
        console.log($scope.type);
        if ($scope.inoviceskip) {
            $scope.postevent();
            return;
            
        }
        Event.getView(view)
            .success(function (data) {
                console.log($scope.type);
                attachView(data);
            })
            .error(function (data) {
            })
        ;
    };

    $scope.attendees = [];

    $scope.addAttendee = function (is_member) {
        var attendee = {};
        attendee.is_member = is_member;
        $scope.attendees.push(attendee);
    };

    $scope.removeAttendee = function (index) {
        $scope.attendees.splice(index, 1);
    };

    $scope.postevent = function () {
        var data = {};
        $scope.inoviceskip = false;
        data.event_entry = $scope.event_entry;
        data.attendees = $scope.attendees;
        if ($scope.errors) return;
        Event.postevent(data).success(
            function (data1) {
                // console.log(data1);
                if (!data) {
                    window.alert('no member number')
                }
                attachView(data1);
            }).error(
            function (data1) {
                console.log(data1);
            });
    };

    $scope.getMember = function (no, obj) {
        Event.getMember(no).success(
            function (data) {
                if (data === null || data === "") {
                    return;
                }
                $scope.errors = false;
                obj.Names = data;
                obj.disabled = true;
            }).error(
            function (data) {
                $scope.errors = true;
                console.log(data1);
            });
    };

    $scope.validate = function (obj, type) {
        switch (type) {
            case 'number':
                return obj.match(/[0-9]*/);
                break;
        }
    };
    $scope.setType=function(type)
    {
        if($scope.type == null)
            $scope.type = type;
        console.log($scope.type);
    }

    function attachView(view) {
        var temp = $compile(view)($scope);
        $("#reg_form").html(temp);
        console.log("something");
    };


}]);

/*
 angular.module('eventRegService', [])
 .factory('Event', function($http)
 {
 return{
 getView: function(view){
 return $http({
 method: 'GET',
 url: APP_URL+'/getRegEventView/'+view
 });
 }
 };
 });

 */

