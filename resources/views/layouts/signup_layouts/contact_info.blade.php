@extends('layouts.signup_forms')
@section('form-header') Contact Information @stop
@section('steps')
    <ul class="col-xs-6 no-margin">
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Basic')"><span class="badge  badge-success">1</span>Basic Information<span class="chevron"></span></a></li>
        <li class="col-xs-3 active"><span class="badge badge-info">2</span>Contact Information<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">3</span>Academic Information<span class="chevron"></span></li>
        <li class="col-xs-3" style="z-index: auto"><span class="badge">4</span>Professional Qualifications<span style="z-index: 999" class="chevron"></span></li>
    </ul>
    <ul class="col-xs-6 no-margin">
        <li class="col-xs-3"><span class="badge">5</span>Training<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">6</span>Experience<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">7</span>Competency<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">8</span>Payment</li>
    </ul>

@stop
@section('signup_form')
    <form class="signup-form-container" ng-submit="getView('Academic')">
        @include('layouts.edit_forms.contact_form')
        <div class="col-md-12">
            <div class="col-xs-6 padding-0"><a href="#" ng-click="getView('Basic')" class="btn btn-proceed"><< Back</a></div>
            <div class="col-xs-6 text-right padding-0"><button type="submit" class="btn btn-proceed"> Proceed >></button></div>
        </div>
    </form>
@stop