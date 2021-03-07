@extends('layouts.master')

@section('title')Manage Your Subscriptions @stop
@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('/vendor/css/profile.css') }}"/>
@stop

@section('content')
    <div class="h1 col-md-12 padding-0">
        Membership Billing
    </div>
    <div class="col-md-12 padding-0 overflow-scroll">
        @include('layouts.profile_layouts.billing_profile_view')
    </div>
@stop

