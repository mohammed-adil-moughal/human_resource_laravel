@extends('events.app')

@section('content')
<div style="text-align: center"class="container">
    <h1 style="color: #018637">REGISTER FOR :{{$x->Event_Name}}</h1>
    <h2>Proceed As</h2>
    <a class="btn btn-success" href="{{ url('events/registration/'.$x->id)}}?type=Company"><span style="font-size: 200px"  class="fa fa-users" ></span> <h3>Company</h3></a>
    <a class="btn btn-danger" href="{{ url('events/registration/'.$x->id)}}?type=Individual"><span style="font-size: 200px"  class="fa fa-user"></span><h3> Individual</h3></a>
</div>

   
@endsection
