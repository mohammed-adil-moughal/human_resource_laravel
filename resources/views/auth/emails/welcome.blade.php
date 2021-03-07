
@extends('auth.emails.master_email')

@section('heading') Welcome to the KISM Portal @stop

@section('content')
    Welcome to the KISM portal.
    If this was not you please click <a href="#"> here</a> to cancel;
@stop

@section('button')
    <tr>
        <td>
            <table height="30" align="left" valign="middle" border="0" cellpadding="0"
                   cellspacing="0" class="tablet-button" st-button="edit">
                <tbody>
                <tr>
                    <td width="auto" align="center" valign="middle" height="30"
                        style=" background-color:#0db9ea; border-top-left-radius:4px; border-bottom-left-radius:4px;border-top-right-radius:4px; border-bottom-right-radius:4px; background-clip: padding-box;font-size:13px; font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300; padding-left:18px; padding-right:18px;">

                                                                           <span style="color: #ffffff; font-weight: 300;">
                                                                              <a style="color: #ffffff; text-align:center;text-decoration: none;"
                                                                                 href="http://197.254.121.26:8080/login">Login Here!</a>
                                                                           </span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
@stop