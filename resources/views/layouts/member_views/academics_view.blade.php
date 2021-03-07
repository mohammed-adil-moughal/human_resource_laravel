@extends('layouts.master')
@section('content')
@include('layouts.table_layouts.academic_profile_table')
@if( $data['member_bio_data']->AcademicQualifications->count() < 1)
<div  class="gray-lighter gray-light-font no-data text-center ">No Academic Information</div>
@endif

@endsection