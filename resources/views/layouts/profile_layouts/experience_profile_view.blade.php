@extends('layouts.profile_layouts.base_profile_layout')

@section('profile_content')

@include('layouts.table_layouts.experience_profile_table')

@if( $data['member_bio_data']->MemberExperiences->count() < 1)
    <div  class="gray-lighter gray-light-font no-data text-center ">No Previous Experience</div>
@endif
@stop

@section('view_more') <a href="{{url('/experience')}}" class="btn btn-danger"><span class="fa fa-align-justify"></span><b style="margin-left: 1%">View All</b></a>@stop
@section('modal_form') @include('layouts.edit_forms.experience_form') @stop
@section('form_open') <form class="col-md-12" ng-submit="save('experience', experience)"> @stop
    @section('clear_object') experience= {} @stop