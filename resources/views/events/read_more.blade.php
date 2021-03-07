@extends('events.app')

@section('title'){{$data->Description}} @stop
@section('event_content')
    <style>
        .event img {
            display: block;
            max-width: 100%;
            height: auto;
            width: 100%;
        }
    </style>
    <div class="container event">
        <div class="h1" style="text-transform: uppercase;color:  #018637">{{$data->Description}} </div>
        <div class="row">
            <div class="col-md-8">
                <div style="margin-bottom: 3%" class="description">
                    <div class="h3" style="color:  #c9302c"> Description</div>
                    <div class="col-md-12">
                        <img class="img-responsive" src="{{ url('eventimage') }}/{{ $data->Venue_Image}}" alt=""/>
                        <p>{!! $data->Event_Description !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div style="margin-top: 5%">
                    <h3 style="color:  #c9302c">Register Now As</h3>
                    <div style="display: flex">
                        <div style="margin-left: ">
                            <a class="btn btn-success" style="background-color: #006600"
                               href="{{ url('events/registration/member/'.$data->id)}}"">Member</a>
                        </div>
                        <div style="margin-left: 1%">
                            <a style="color: white;background-color: #CC0033" class="btn btn-default" href="{{ url('events/reg/nonmember/'.$data->id)}}">Non-Member</a>
                        </div>

                    </div>
                </div>
                <div style="margin-bottom: 3%">
                    <div class="row">
                        <div class="col-md-6" style="">
                            <?php
                            $startdate = date_create($data->Start_Date);
                            $enddate = date_create($data->End_Date);
                            $cutoff = date_create($data->Eventpricing[0]->Early_Bird_CutOff_Date);

                            ?>
                            <p class="h5" style="color: #e11e0c">Start Date</p>
                            <p style="margin-top: -4%"> {{ date_format($startdate, ' jS F Y') }}</p>
                        </div>
                        <div class="col-md-6" style="">

                            <p class="h5" style="color: #ffbf00">End Date</p>
                            <p style="margin-top: -4%">{{ date_format($enddate, ' jS F Y') }}</p>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 0%;">

                        <h5 style="margin-top: -1%;text-transform: uppercase;color: #17a50e"> EarlyBird Cut-off </h5>
                        <h5 style="margin-top: -2%">{{date_format($cutoff, ' jS F Y') }}</h5>
                    </div>
                    <div class="row" style="margin-top: 1%">

                        <div class="col-xs-2">
                            <p style="color:#4e4848">Venue:</p>
                        </div>
                        <div class="col-xs-4">
                            <p style="font-size: small">{{$data->Venue_Description}}</p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="h5" style="color:#4e4848">Contact Phone</p>
                            <p>0721-244828</p>
                        </div>
                        <div class="col-md-4">

                            <p class="h5" style="color:#4e4848">Email</p>
                            <p>admin@kism.or.ke</p>
                        </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <tr>
                        <th style="color:#4e4848" colspan="2">Type</th>
                        <th style="color:#4e4848" colspan="2">Early Bird</th>
                        <th style="color:#4e4848" colspan="2">Regular</th>
                    </tr>
                    <?php $count = 0; ?>
                    @foreach($data->Eventpricing as $c)
                        <tr>

                         @if($data->Eventpricing[$count]->Membership_Type == 0)  
                        <td style="text-transform: uppercase"> Member</td>

                         @else
                        <td style="text-transform: uppercase"> Non Member</td>

                        @endif
                         <td style="text-transform: uppercase"> {{ $data->Eventpricing->first()? $data->Eventpricing[$count]->Currency : "" }}</td>
                         <td>{{ $data->Eventpricing->first()? number_format($data->Eventpricing[$count]->Early_Bird_Price, 2) : "" }}</td>

                       
                      
                       <td style="text-transform: uppercase"> {{ $data->Eventpricing->first()? $data->Eventpricing[$count]->Currency : "" }}</td>
                         <td>{{ $data->Eventpricing->first()? number_format($data->Eventpricing[$count]->Regular_Price, 2) : "" }}</td>

                        
                          

                        </tr>
                        <?php $count++ ?>
                    @endforeach
                </table>
              
                
                
                <div style="margin-left: 5%">


                    <div class="row">
                        <h3 style="color:  #c9302c">UpComming Events</h3>
                        @foreach($upcomming as $y)
                            <hr>
                            <?php
                            $from_date = date_create($y->From_Date);
                            ?>
                            <div class=""><span
                                        class="glyphicon glyphicon-time"></span>{{ date_format( $from_date, ' jS F Y')}}
                            </div>

                            <div class=""><span class="glyphicon glyphicon-tag"></span> {{$y->Description}}</div>
                            <div><p>{{ strip_tags(str_limit($y->Event_Description, $limit = 250, $end = '...')) }} <a
                                            href="{{ url('events/'.$y->id)}}">Read More</a></p></div>
                        @endforeach
                    </div>
                </div>

            </div>


            <div class="row">
                <div style="text-align: center;">

                </div>
            </div>
        </div>
    </div>
@endsection