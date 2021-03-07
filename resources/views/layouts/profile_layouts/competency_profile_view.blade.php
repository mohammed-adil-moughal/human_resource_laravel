@extends('layouts.profile_layouts.base_profile_layout')
@section('profile_content')
<div class="col-xs-12 text-muted">These are some of the competencies that you have acquired:</div>
<div class="col-xs-12">
    <ul>
        @if(isset($data['member_bio_data']))
            @foreach($data['member_bio_data']->MemberCompetencies as $x)
                <li>{{ $x->Competency['description'] }}</li>
            @endforeach
        @endif
    </ul>
</div>
<hr class="col-xs-12">

<div class="col-xs-12 text-muted">These are some of the sectors that you have worked in:</div>
<div class="col-xs-12">
    <ul>
        @if(isset($data['member_bio_data']))
            @foreach($data['member_bio_data']->MemberIndustrySectors as $x)
                <li>{{ $x->IndustrySector['description'] }}</li>
            @endforeach
        @endif
    </ul>
</div>
@stop

@section('modal_form') @include('layouts.edit_forms.competency_form') @stop
@section('form_open') <form class="col-md-12" ng-submit="save('competencies', competencies);save('industry_sectors', sectors)"> @stop
