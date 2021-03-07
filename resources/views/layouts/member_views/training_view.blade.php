@extends('layouts.master')
@section('content')
@include('layouts.table_layouts.training_profile_table')
@if( $data['member_bio_data']->MemberTrainings->count() < 1)
    <div  class="gray-lighter gray-light-font no-data text-center ">No Previous Training</div>
@endif
@endsection