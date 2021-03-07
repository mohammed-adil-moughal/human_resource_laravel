@extends('layouts.master')

@section('title')
    Choose Your Plan
@stop

@section('content')
    <div>
        <h1 class="text-center">Choose Your Membership Plan!</h1>
        @include('layouts.pricing_table')
        <div class="text-center"><a href="{{ URL::to('login') }}">Already have an account? Login</a> </div>
    </div>
@stop