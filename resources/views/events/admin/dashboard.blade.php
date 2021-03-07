@extends('events.admin.adminh')

@section('content')
<div class="container">

    <div class="h1" style="text-align: center;color: #008000"> UP COMMING EVENTS </div>
    @foreach($records as $x)
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div  class="lollipop col-xs-1" style="padding: 0px; min-width: 50px; margin-right: 20px;">
                <div style="margin: 0 auto;" class="circle row text-center"> 
                    <?php
                    $date = date_create($x->From_Date);
                    ?>
                    <p style="">{{date_format($date,'jS F Y')}}</p>
                </div>
                <div class="" style="display: flex;"> 
                    <div class="col-xs-6" style="height: 200px; border-right: solid #ccc 1px;"></div>
                    <div class="col-xs-6" style="height: 200px; border-left: solid #ccc 1px;"></div>
                </div>
            </div>
            <div class="panel panel col-xs-11" style="width: 85%; padding: 0px;" >

                <div class="panel-heading " >
                    <div class="row">

                        <div class="col-md-10">
                            <h1> <a href="#"> {{$x->Event_Name}}</a></h1>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-1">
                            <span  class="glyphicon glyphicon-calendar "></span>
                        </div>
                        <div class="col-xs-10">
                            <div class="date">{{ date_format(date_create($x->From_Date),'jS F Y H:i') }} to {{ date_format(date_create($x->To_Date),'jS F Y H:i') }}</div>


                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-1">
                            <span class="glyphicon glyphicon-map-marker"></span>
                        </div>
                        <div class="col-xs-10">
                            <p style="font-size: small">{{$x->Venue_Description}}</p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                             <img style="width: 150px;height: 100px" src="{{ url('eventimage') }}/{{ $x->Venue_Image}}" alt="" />

                        </div>
                        <div class="details col-md-8">

                            <p>{!! str_limit($x->Event_Description, $limit = 200, $end = '...') !!} <a  href="#">Read More</a></p>



                            <div  style="display: flex">
                                <div style="margin-left: ">
                                    <a class="btn btn-primary" href="#">Member</a>
                                </div>
                                <div style="margin-left: 1%">
                                    <a class="btn btn-info" href="#">Non-Member</a>
                                </div>
                                
                                <div style="margin-left: 1%">
                                    <a class="btn btn-warning" href="{{ url('events/edit/'.$x->id)}}"><span class="glyphicon glyphicon-pencil"></span>Edit</a>
                                </div>
                               
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
    @endforeach

</div>

<?php
$current = $records->currentPage();
$pages = $records->lastPage();
$links = array();

if ($pages > 3) {
    // this specifies the range of pages we want to show in the middle
    $min = max($current - 2, 2);
    $max = min($current + 2, $pages - 1);

    // we always show the first page
    $links[] = "1";

    // we're more than one space away from the beginning, so we need a separator
    if ($min > 2) {
        $links[] = "...";
    }

    // generate the middle numbers
    for ($i = $min; $i < $max + 1; $i++) {
        $links[] = "$i";
    }

    // we're more than one space away from the end, so we need a separator
    if ($max < $pages - 1) {
        $links[] = "...";
    }
    // we always show the last page
    $links[] = "$pages";
} else {
    // we must special-case three or less, because the above logic won't work
    $links = array("1", "2", "3");
}
?>
<ul class="pagination" style="margin-left: 30%;">
    @foreach($links as $link)
    <li class="{{ $records->currentPage() == $link ? "active": "" }}"><a  href="{{ url("events") }}?page={{ $link }}">{{  $link }}</a></li>
    @endforeach
</ul>
@endsection
