@extends('layouts.master')

@section('styles')
@parent
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
<link rel="stylesheet" href="{{asset('/vendor/css/progress-wizard.min.css')}}">
<!-- Styles -->
<!--    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}" >
  <link rel="stylesheet" href="{{ URL::asset('css/font_awesome.css') }}">-->

<link rel="stylesheet" href="{{ URL::asset('vendor/css/event.css') }}">
{{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

<style>
    body {
        font-family: 'Lato';
    }

    .fa-btn {
        margin-right: 6px;
    }
</style>
@stop

@section('content')
<div id="app-layout">
    <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
        <div class="container-fluid">
            <div class="navbar-header" style=";background-color:"><a class="navbar-brand " href="{{url('events/')}}"><span class="glyphicon glyphicon-calendar" style="margin-left:2px;font-weight: 28px;color:#006600 "></span>EventBooking</p></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse navbar-menubuilder">
                <ul class="nav navbar-nav navbar-left">
                    <li ><a href="{{url('events/category/seminars')}}">Seminars</a>
                    </li>
                    <li><a href="{{url('events/category/conferences')}}">Conferences</a>
                    </li>
                    <li><a href="{{url('events/category/courses')}}">Courses</a>
                    </li>
                    <li><a href="{{url('events/category/special_events')}}">Special Events</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @section('event_content') @show
</div>
@stop


@section('footer')
    @parent
<script src="{{URL::asset('vendor/js/angularjs/event.js')}}"></script>
@stop
