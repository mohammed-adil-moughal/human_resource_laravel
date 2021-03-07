@extends('layouts.master')

@section('title')
    Signup
@stop
@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('/vendor/css/select2/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/vendor/css/bootstrap-datepicker/bootstrap-datepicker.css') }}"/>

@stop

@section('content')
    <div  ng-app="registerApp" ng-controller="registerController" >
        @include('layouts.signup_layouts.basic_info')
    </div>
@stop

@section('footer')
    @parent
    <script src="{{ asset('/vendor/js/angularjs/services/registerService.js') }}"></script>
    <script src="{{ asset('/vendor/js/angularjs/controllers/registerController.js') }}"></script>
    <script src=" {{ asset('/vendor/js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('/vendor/js/angularjs/app.js') }}"></script>
    <script src="{{ asset('/vendor/js/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
@stop