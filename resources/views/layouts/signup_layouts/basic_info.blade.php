@extends('layouts.signup_forms')
@section('form-header') Basic Information @stop
@section('steps')
    <ul class="col-xs-6 no-margin">
        <li class="col-xs-3 active"><span class="badge badge-info current">1</span>Basic Information<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">2</span>Contact Information<span class="chevron"></span></li>
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
<form class="signup-form-container" ng-submit="getView('Contact')">
    @include('layouts.edit_forms.general_form')
    <input value="{{ isset($data['membership_type']) ? $data['membership_type'] : null}}" id="membership_type" type="hidden">
    <input value="{{  isset($data['user'])? $data['user']->email: null }}" id="u_email" type="hidden">
    <input value="{{ isset($data['user'])?$data['user']->name:null }}" id="u_name" type="hidden">

    <div class="text-right col-md-12"><button type="submit" ng-disabled="taken" class="btn btn-proceed"> Proceed >></button></div>
</form>
@stop
@section('footer')
    @parent
    <script type="text/javascript">
        $(".select2-basic-single").select2();
    </script>
@stop