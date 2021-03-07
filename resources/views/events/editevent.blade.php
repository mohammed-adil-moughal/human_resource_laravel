@extends('events.admin.adminh')

@section('content')
    <style>
        html, body{
            height: 100% !important;
        }
        .navbar{
            margin-bottom: 0px;
        }
        .page-container {
            margin: 20px;
        }


        /* horizontal panel*/

        .panel-container {
            display: flex;
            flex-direction: row;
            overflow: hidden;
            margin: 0;
            padding: 0;
            max-width: 100% !important;
            /* avoid browser level touch actions */
            xtouch-action: none;
        }

        .panel-left {
            flex: 0 0 auto;
            /* only manually resize */
            padding: 10px;
            width: 50%;
            min-height: 200px;
            min-width: 150px;
            white-space: nowrap;
        }

        .splitter {
            flex: 0 0 auto;
            width: 18px;
            background: url(https://raw.githubusercontent.com/RickStrahl/jquery-resizable/master/assets/vsizegrip.png) center center no-repeat #535353;
            min-height: 200px;
            cursor: col-resize;
        }

        .panel-right {
            flex: 1 1 auto;
            /* resizable */
            padding: 10px;
            width: 100%;
            min-height: 200px;
            min-width: 200px;
        }



        pre {
            margin: 20px;
            padding: 10px;
            background: #eee;
            border: 1px solid silver;
            border-radius: 4px;
            overflow: auto;
        }
        #editdesc{
            height: 100%;
        }

    </style>


    <script>
        $( document ).ready(function() {
            $(".panel-left").resizable({
                handleSelector: ".splitter",
                resizeHeight: false
            });

            $(".panel-top").resizable({
                handleSelector: ".splitter-horizontal",
                resizeWidth: false
            });
        });

    </script>
        <div style="height: 100%; margin-bottom: -52px;" class="panel-container" >
            <div style="height: 100%" class="panel-left">
                <div style="height: 100%">
                    <meta name="crsf-token" content="{{ csrf_token() }}">
                    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                    <script>
                        tinymce.init({
                            setup:function(ed) {
                                ed.on('keyup', function(e) {
                                    $('#preview').html( ed.getContent());
                                });
                            },
                            selector: 'textarea',
                            relative_urls: false,
                            height: 200,
                            plugins: [
                                'save advlist autolink image lists link charmap print preview anchor',
                                'searchreplace visualblocks code fullscreen',
                                'insertdatetime  textcolor colorpicker textpattern  table contextmenu paste'
                            ],
                            toolbar: 'save |insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link ',
                            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link ',
                            toolbar2: ' preview  | forecolor backcolor emoticons',
                            file_browser_callback: function (field_name, url, type, win) {
                                var input = $(document.createElement('input'));
                                input.attr("type", "file");
                                input.change(function () {
                                    postdata = new FormData();
                                    postdata.append("picture", input[0].files[0]);
                                    console.log(postdata);

                                    $.ajax({
                                        method: 'POST',
                                        processData: false,  // tell jQuery not to process the data
                                        contentType: false,  // tell jQuery not to set contentTyp
                                        url: "{{ url('/events/postpictures') }}/{{ $data->id }}",
                                        data: postdata
                                    }).done(function (path) {
                                                win.document.getElementById(field_name).value = path;
                                            }
                                    ).fail(function (fail) {
                                        console.log(postdata);
                                        console.log(fail.responseText);
                                    });

                                });
                                input.trigger('click');


                            }
                        });</script>
                    <form method="Post" style="height: 80%" action="{{url('/events/saveedit') }}/{{ $data->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>Edit Event Description
                                    <button style="margin-left: 1%" class="btn btn-danger" type="submit"><span
                                                class="glyphicon glyphicon-save"></span>Save
                                    </button>
                                </h2>
                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <textarea id="editdesc" name="editdesc">{{$data->Event_Description}}</textarea>

                    </form>
                    <div style="height: 20%" style="border-style: solid;border-right-color: transparent;border-left-color: transparent;border-top-color: transparent;border-bottom-color: #cccccc;margin-top: 4%">
                        <form method="Post" enctype="multipart/form-data"
                              action="{{url('/events/postpicture') }}/{{ $data->id }}">
                            <h2>Choose Event Image</h2>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div style="margin-bottom: 2%" class="row">
                                <div class="col-xs-6"><input type="file" class="form-control" name="picture"></div>
                                <div class="col-xs-6 ">
                                    <button style="" class="btn btn-danger float-right" type="submit"><span
                                                class="glyphicon glyphicon-save"></span>save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="splitter"></div>
            <div class="panel-right" style="overflow-x: hidden; overflow-y: scroll !important; max-height: 100% !important;">
                <style>
                    .event img {
                        display: block;
                        max-width: 100%;
                        height: auto;
                        width: 100%;
                    }
                </style>
                <div class="event">
                    <div class="h1" style="color: #4e4848">{{$data->Event_Name}} </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div style="margin-bottom: 3%" class="description">
                                <div class="h3"> Description</div>
                                <div class="col-md-12">
                                    <img class="img-responsive" src="{{ url('eventimage') }}/{{ $data->Venue_Image}}" alt=""/>
                                    <div id="preview">{!! $data->Event_Description !!}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div style="margin-top: 5%">
                                <h3 style="color:#4e4848">Register Now As</h3>
                                <div style="display: flex">
                                    <div style="margin-left: ">
                                        <a class="btn btn-primary"
                                           href="{{ url('events/registration/member/'.$data->id)}}">Member</a>
                                    </div>
                                    <div style="margin-left: 1%">
                                        <a class="btn btn-info" href="{{ url('events/reg/nonmember/'.$data->id)}}">Non-Member</a>
                                    </div>

                                </div>
                            </div>
                            <div style="margin-bottom: 3%">
                                <div class="row">
                                    <div class="col-md-6" style="">
                                        <?php
                                        $startdate = date_create($data->From_Date);
                                        $enddate = date_create($data->To_Date);
                                        $cutoff = date_create($data->Eventpricing[0]->Early_Bird_Booking_Cutoff);

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
                                        <p>{{$data->Contact_Phone_No}}</p>
                                    </div>
                                    <div class="col-md-4">

                                        <p class="h5" style="color:#4e4848">Email</p>
                                        <p>{{$data->Contact_Email}}</p>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <tr>
                                    <th style="color:#4e4848" colspan="2">Type</th>
                                    <th style="color:#4e4848" colspan="2">Cost</th>
                                </tr>
                                <?php $count = 0; ?>
                                @foreach($data->Eventpricing()->orderBy('Price')->get() as $c)
                                    <tr>

                                        <td style="text-transform: uppercase"> {{ $data->Eventpricing->first()? $data->Eventpricing[$count]->Type : "" }}</td>
                                        @if($data->Eventpricing->first()? $data->Eventpricing[$count]->Early_Bird : ""  == 0)
                                            <td>Normal</td>
                                        @else
                                            <td><b>EarlyBird</b></td>
                                        @endif


                                        <td style="text-transform: uppercase"> {{ $data->Eventpricing->first()? $data->Eventpricing[$count]->Currency : "" }}</td>
                                        <td>{{ $data->Eventpricing->first()? number_format($data->Eventpricing[$count]->Price, 2) : "" }}</td>
                                    </tr>
                                    <?php $count++ ?>
                                @endforeach
                            </table>
                            <div style="margin-left: 5%">



                            </div>

                        </div>


                        <div class="row">
                            <div style="text-align: center;">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


@endsection