@extends('layouts.master')

@section('title')
    Contact Us
@stop

@section("content")
    <div class="col-md-12">
        <div class=" padding-0 col-md-12 " style="margin-bottom: 80px">
            <div class="padding-0 col-md-12">
                <div class="h1" style="margin-bottom: 40px">Contact Us</div>
            </div>
            <div class="padding-0 col-md-12">
                <div class="padding-0 col-md-8">
                    <div class="padding-0 col-md-6">
                        <div class="padding-4"><span style="margin: 10px;" class="glyphicon glyphicon-map-marker"></span>Nation Centre,
                            12th Floor Tower B,
                            Nairobi
                        </div>
                        <div class="padding-4"><span  style="margin: 10px;" class="glyphicon glyphicon-pencil"></span> P.O. Box 30400-00100, Nairobi</div>
                        <div class="padding-4"><span  style="margin: 10px;" class="glyphicon glyphicon-phone-alt"></span>+254 (020) 2213908-10</div>
                    </div>
                    <div class="padding-0 col-md-6">
                        <div class="padding-4"><span  style="margin: 10px;" class="glyphicon glyphicon glyphicon-phone"></span>+254 (0)721244828</div>
                        <div class="padding-4"><span  style="margin: 10px;" class="glyphicon glyphicon-envelope"></span>admin@kism.or.ke</div>
                    </div>
                </div>
                <div class="padding-0 col-md-4 text-center">
                    <div style="font-size: 5vw;" class="glyphicon glyphicon-map-marker text-center vertical-center"></div>
                </div>
            </div>
        </div>
        <hr class="separator col-md-12"/>
        <form class="padding-0 col-md-12 contact-us-form" action="{{ URL::to('contact_us') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="padding-0 col-md-8">
                <small>Leave a message</small>
                <div class="padding-0 col-xs-12">
                    <div class="padding-0 col-md-6" style="padding-right:20px;">
                        <input type="text" class="form-control" placeholder="Name:">
                    </div>
                    <div class="padding-0 col-md-6" style="padding-right:20px;">
                        <input type="text" class="form-control" placeholder="Company:">
                    </div>
                </div>
                <div class="padding-0 col-xs-12">
                    <div class="padding-0 col-md-6" style="padding-right:20px;">
                        <input type="text" class="form-control" placeholder="Email:">
                    </div>
                    <div class="padding-0 col-md-6" style="padding-right:20px;">
                        <input type="text" class="form-control" placeholder="Phone:">
                    </div>
                </div>
                <div class="padding-0 col-md-12">
                    <div class="padding-0 col-md-12" style="padding-right:20px;"><textarea class="form-control" placeholder="Message:"></textarea></div>
                </div>
            </div>
            <div class="padding-0 col-md-4">
                <div class="embed-responsive embed-responsive-4by3">
                    <iframe
                            frameborder="0" style="border:0"
                            height="1000px"
                            src="https://maps.google.com/maps?q=Kenya+Institute+of+Supplies+Management&output=embed"></iframe>
                </div>

            </div>
            <div class="col-md-12" style="padding-right:20px;">
                <button type="submit" class="btn btn-info">Contact Us</button>
            </div>
        </form>
    </div>
@stop
