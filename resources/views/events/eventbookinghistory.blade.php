@extends('events.app')
@section('title')Events Booking History @stop
@section('event_content')
<div class="container">
    <style>
        .event img{
            display: block;
            max-width: 100%;
            height: auto;
        }
    </style>
    <table class="table table-striped">
        <tr>
            <th>Event Name</th>
            <th>Contact Email</th>
            <th>Date Booked</th>
            <th>Attended</th>
            <th>Delegates</th>
            <th>Proforma Invoice</th>
        </tr>
    @foreach($history as $x)
    <tr>
        <?php
         $date = date_create($x->From_Date);
        ?>
        <td>{{$x->Event->Event_Name}}</td>
        <td>{{$x->Contact_Email}}</td>
        <td>{{date_format($date, ' jS F Y')}}</td>
        <td>--</td>
        <td><button type="button" class="fa fa-users" data-toggle="modal" data-target="#myModal"></button></td>
        <td><a href='{{ url('events/invoicepdf')."/".Crypt::encrypt($x->id) }}'>download invoice</a></td>
    </tr> @endforeach
    </table>  
  @foreach($history as $x)
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Attendees</h4>
        </div>
        <div class="modal-body">
              
            <table class="table table-striped">
                <tr>
                    <th>
                        Names
                    </th>
                    <th>
                          Phone Number
                    </th>
                    <th>
                        Member No
                    </th>
                </tr>
                   @foreach($x->Delegates as $key)
                    <tr>
                        <td>  {{$key->Names}}</td>
                        <td>{{$key->Mobile}}</td>
                        <td>{{$key->Member_No}}</td>
                </tr>
        
      
            
          @endforeach 
               
            </table>
                  
                    
                
              
            
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach

</div>
@stop


  
