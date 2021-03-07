<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>@section('title') @show | KISM</title>
        <script type="text/javascript">var APP_URL = "{{ url('/') }}" ;</script>
        @section('styles')
        <link rel="stylesheet" href="{{asset('/vendor/css/bootstrap/bootstrap.min.css')}}"/>
        <link rel="stylesheet" href="{{ asset('/vendor/css/main.css') }}"/>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
            <script src="{{ asset('/vendor/js/jquery/jquery-3.1.0.min.js') }}"></script>
            <script src="{{ asset('/vendor/js/notifyjs/notify.js') }}"></script>
            <script src="http://momentjs.com/downloads/moment.js"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1"/>
        @show
    </head>
    <body>
        @section('header')
            @include('layouts.heading')
        @show
        @section('sidebar')
        @show
        <div class="container">
            @if(Session::has('messages'))
                @foreach(Session::get('messages') as $message)
                    <div class="alert alert-{{ $message['type'] }} fade in">
                        {{ $message['message'] }}
                    </div>
                @endforeach
                <?php Session::forget('messages');?>
            @endif
            @section('content')
            @show
        </div>
        @section('footer')
            @include("layouts.footer")
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
            <script src="{{ asset('/vendor/js/bootstrap/bootstrap.min.js') }}"></script>
            <script src="{{ asset('/vendor/js/angularjs/angular.min.js') }}"></script>
            <script>
                $( document ).ready(function() {
                    var elements  = document.querySelectorAll('input[type=date]');

                    for(var i = 0; i < elements.length;i++) {
                        if ( $(elements[i]).prop('type') != 'date' ) {
                            var picker = new Pikaday({
                                field: elements[i],
                                format: 'YYYY-MM-DD'
                            });
                        }
                    }
                });

            </script>
        @show
    </body>
</html>