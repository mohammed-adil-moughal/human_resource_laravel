@extends('layouts.master')
@section('content')
@include('layouts.table_layouts.professional_profile_table')
@if( $data['member_bio_data']->ProfQualifications->count() < 1)
    <div  class="gray-lighter gray-light-font no-data text-center ">No Professional Certificates</div>
@endif
@endsection