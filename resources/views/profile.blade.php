@extends('layouts.base_profile_view')
@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('/vendor/css/bootstrap-datepicker/bootstrap-datepicker.css') }}"/>
@stop
@section("profile-content")
    <ul class="nav nav-tabs">
        <li role="presentation" ng-class="{'active': active_tab == 'general'}"><a href="#" style="color: #259e10" ng-click="getView('general')">Basic Information</a></li>
        <li role="presentation" ng-class="{'active': active_tab == 'academic'}"><a ng-click="getView('academic')" style="color: #259e10" href="#">Academics</a></li>
        <li role="presentation" ng-class="{'active': active_tab == 'professional'}"><a ng-click="getView('professional')" style="color: #259e10" href="#">Qualifications</a></li>
        <li role="presentation" ng-class="{'active': active_tab == 'experience'}"><a ng-click="getView('experience')" style="color: #259e10" href="#">Experience</a></li>
        <li role="presentation" ng-class="{'active': active_tab == 'training'}"><a href="#" style="color: #259e10" ng-click="getView('training')">Training</a></li>
        <li role="presentation" ng-class="{'active': active_tab == 'competency'}"><a ng-click="getView('competency')" style="color: #259e10" href="#">Proficiencies</a></li>
        <!--
        <li role="presentation" ng-class="{'active': active_tab == 'subscription'}"><a href="#" ng-click="getView('subscription')">Subscription Information</a></li>
        <li role="presentation" ng-class="{'active': active_tab == 'billing'}"><a href="#" ng-click="getView('billing')">Billing</a></li>
        <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Other Information <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li role="menuitem" ng-class="{'active': active_tab == 'academic'}"><a ng-click="getView('academic')" href="#">Academics</a></li>
                <li role="menuitem" ng-class="{'active': active_tab == 'professional'}"><a ng-click="getView('professional')" href="#">Qualifications</a></li>
                <li role="menuitem" ng-class="{'active': active_tab == 'experience'}"><a ng-click="getView('experience')" href="#">Experience</a></li>
                <li role="menuitem" ng-class="{'active': active_tab == 'competency'}"><a ng-click="getView('competency')" href="#">Proficiencies</a></li>
            </ul>
        </li>
        -->
    </ul>
    <div  class="col-md-12 padding-0">
        <div class="loading col-md-12" ng-hide="loading"> </div>
        <div id="profile_view_container" class="col-md-12 padding-0">
            @include('layouts.profile_layouts.general_profile_view')
        </div>
    </div>
@stop

@section('footer')
    @parent
    <script src="{{ asset('/vendor/js/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
@stop