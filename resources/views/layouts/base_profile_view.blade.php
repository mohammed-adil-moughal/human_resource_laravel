@extends('layouts.master')

@section('title')Your Profile @stop

@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('/vendor/css/profile.css') }}"/>
@stop
@section("content")

    <div class="row profile col-md-12 padding-0" ng-app="profileApp" ng-controller="profileController">
        <div class="col-md-3 ">
            <div class="profile-sidebar col-md-12">
                <div class="profile-userpic col-md-12">
                    <img id="profile-userpic" class="img-rounded" src="{{ url('/api/member/picture')}}{{ "?dummy=".substr( md5(rand()), 0, 7) }}" height="200" width="200" class="img-responsive" alt="">
                </div>
                <div class="profile-usertitle col-md-12 text-muted">
                    <div class="profile-usertitle-name ">
                        {{ $data['member_bio_data']->Surname }}, {{ $data['member_bio_data']->Other_Names }}
                    </div>
                    <div class="profile-usertitle-job padding-0">
                        <div class="col-xs-9 padding-0"><?php if($data['member_bio_data']->MembershipType) echo $data['member_bio_data']->MembershipType->description ?></div>
                        {{--<div class="col-xs-3 padding-0"><span class="status status-green bg-success">PAID</span></div>--}}
                    </div>
                    <div class="col-xs-12 padding-0">
                        <table>
                            <tbody>
                            <tr>
                                <td>ID NUMBER:</td><td>{{ "&nbsp;" }}{{ $data['member_bio_data']->ID_Number or "--"}}</td>
                            </tr>
                            <tr>
                                <td>STATUS:</td><td>{{ "&nbsp;" }}<span  class="status status-grey text-left">{{ $data['member_bio_data']->MemberStatus->description or "--"}}</span></td>
                            </tr>
                            <tr>
                                <td>APPLICATION NO:</td><td>{{ "&nbsp;" }}{{ $data['member_bio_data']->NavRecID or "--"}}</td>
                            </tr>
                            <tr>
                                <td> MEMBER NO:</td><td>{{ "&nbsp;" }}{{ $data['member_bio_data']->Member_No or "--"}}</td>
                            </tr>
                            <tr>
                                <td> CERTIFICATE NO:</td><td>{{ "&nbsp;" }}{{ $data['member_bio_data']->Certificate_No or "--" }}</td>
                            </tr>
                            <tr>
                                <td>LICENCE NO:</td><td>{{ "&nbsp;" }}{{ $data['member_bio_data']->Practitioner_License_No or "--" }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="col-xs-12 padding-0">
                            <a href="{{url('/applicationform')}}" class="btn btn-success" target="_blank">Print Application<span class="glyphicon glyphicon-download-alt"></span> </a>
                        </div>
                    </div>
                </div>
                <div class="profile-usermenu col-md-12 ">
                    <ul class="nav">
                        <li class="{{ Request::url() == url('profile')? "active":"" }}">
                            <a style="color: #CC0033;" href="{{ url('profile') }}">
                                <i class=" page-links-a  glyphicon glyphicon-home"></i>
                                Overview 
                            </a>
                        </li>
                        <li class="{{ Request::url() == url('profile/settings')? "active":"" }}">
                            <a style="color: #CC0033;"  href="{{ url('profile/settings') }}">
                                <i class=" page-links-a glyphicon glyphicon-user"></i>
                                Account Settings
                            </a>
                        </li>
                        <li class="{{ Request::url() == url('cards') ? "active":"" }}">
                            <a style="color: #CC0033;"  href="{{ url('cards') }}">
                                <i class=" page-links-a glyphicon glyphicon-credit-card"></i>
                                Membership Cards
                            </a>
                        </li>
                        <li class="{{ Request::url() == url('certificates')? "active":"" }}">
                            <a style="color: #CC0033;"  href="{{ url('certificates') }}" >
                                <i class=" page-links-a glyphicon glyphicon-list-alt"></i>
                                Membership Certificates 
                            </a>
                        </li>
                        <li class="{{ $data["active"]=="help"? "active":"" }}">
                            <a style="color: #CC0033;"  href="#">
                                <i class=" page-links-a glyphicon glyphicon-flag"></i>
                                Help 
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 padding-0">
            <div class="profile-content">
                @section("profile-content")@show
            </div>
        </div>
    </div>
@stop
@section('footer')
    @parent
    <script src="{{ asset('/vendor/js/angularjs/services/profileService.js') }}"></script>
    <script src="{{ asset('/vendor/js/angularjs/controllers/profileController.js') }}"></script>
    <script src="{{ asset('/vendor/js/angularjs/app.js') }}"></script>
    <script src=" {{ asset('/vendor/js/select2/select2.min.js') }}"></script>

@stop