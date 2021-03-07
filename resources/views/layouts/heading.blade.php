@section('heading-content')
    <nav class="navbar navbar-default topbar">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class=" img-responsive logo-link " href="{{ URL::to('/') }}"><img class="img-responsive vertical-center" id="logo" src="{{ asset('/assets/images/logo.png') }}"></a>
                <button type="button" class="navbar-toggle collapsed header-expand-button no-margin" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right " id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav menu-toggle">
                    <li class="header-link"><a style="color: #CC0000" href="{{URL::to('/')}}">Home</a></li>
                    <li class="header-link"><a style="color: #CC0000" href="{{URL::to('search')}}">Search</a></li>
                    <?php
                        if(Auth::user())
                            {
                                echo view('layouts/auth_layouts/logged_in');
                            }
                        else
                        {
                            echo view('layouts/auth_layouts/logged_out');
                        }
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
@show