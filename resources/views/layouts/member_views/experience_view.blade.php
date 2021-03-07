@extends('layouts.master')
@section('content')
@include('layouts.table_layouts.experience_profile_table')
@if( $data['member_bio_data']->MemberExperiences->count() < 1)
    <div  class="gray-lighter gray-light-font no-data text-center ">No Previous Experience</div>
@endif
@endsection