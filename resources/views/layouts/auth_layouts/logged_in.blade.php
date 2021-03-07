<li class="header-link"><a style="color: #CC0000" href="{{ url('billing') }}">Billing</a></li>
<li class="header-link"><a style="color: #CC0000" href="{{ url('/subscription') }}">Subscription</a></li>
{{--<li class="dropdown">--}}
    {{--<a href="#"  class="dropdown-toggle header-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Subscription<span class="caret"></span></a>--}}
    {{--<ul class="dropdown-menu">--}}
        {{--<li class="header-link"><a style="color: #CC0000" href="{{ url('/subscription') }}"><span class="glyphicon glyphicon-align-center"></span> Manage your subscription</a></li>--}}
        {{----}}
        {{--<li class="header-link"><a style="color: #CC0000" href="#"><span class="glyphicon glyphicon-refresh"></span> Renew Membership</a></li>--}}
      {{----}}
        {{--<li class="header-link"><a style="color: #CC0000" href="#"><span class="glyphicon glyphicon-copy"></span> Apply for a license</a></li>--}}
    {{--</ul>--}}
{{--</li>--}}
<li class="dropdown">
    <a href="#"  class="dropdown-toggle header-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li class="header-link"><a style="color: #CC0000" href="{{ url('/profile') }}"> <span class="glyphicon glyphicon-user"></span> Profile</a></li>
        <li class="header-link"><a  style="color: #CC0000" href="{{ url('/profile/settings') }}"> <span class="glyphicon glyphicon-cog"></span> Settings</a></li>
        <li role="separator" class="divider"></li>
        <li class="header-link"><a style="color: #CC0000" href="{{ url('/logout') }}"> <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
</li>