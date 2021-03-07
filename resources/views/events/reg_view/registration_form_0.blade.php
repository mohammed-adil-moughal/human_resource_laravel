@extends('events.app')
@section('content')
<div class="h2" style="text-align: center;color: #018637">Registering for {{$data['event']->Event_Name}} </div>
<div class="container" class="panel-body" ng-app="myApp" ng-controller="add_entry" ng-init="event_entry.Event_Code = {{ $data['event']->No }}">
    
    <script> var member_no =  <?php echo $data['member']->Member_No ? '\''.$data['member']->Member_No.'\'' : "null";  ?> ;</script>
    <div >        
        <div id="reg_form">
            @include('events.reg_view.registration_form_1')
        </div>
    </div>
</div>
@stop