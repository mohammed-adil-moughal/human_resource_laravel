<meta name="csrf-token" content="{{ csrf_token() }}">
<script >
    $(document ).ready(function() {

    });
</script>
<div class="signup-form-container form-page" id="sign_up_form_container">
    <link rel="stylesheet" href="{{ asset('/vendor/css/wizard.css') }}"/>
    @section('navigation')
    <div class="wizard">
        <ul class="steps">
            @section("steps")
            <li class="col-lg-3 active"><span class="badge badge-info current">1</span>Basic Information<span class="chevron"></span></li>
            <li class="col-lg-3"><span class="badge">2</span>Accademic Information<span class="chevron"></span></li>
            <li class="col-lg-3"><span class="badge">3</span>Professional Qualifications<span class="chevron"></span></li>
            <li class="col-lg-3"><span class="badge">4</span>Payment</li>
            @show
        </ul>
    </div>
    @show
    <div class="col-md-12 no-margin">
        <div class="loading col-md-12" ng-hide="loading"></div>
        <div class="tag-box col-md-12 ">
            <h1 class="tag-box-header col-xs-12">@section('form-header') @show</h1>
            @section('signup_form') @show
        </div>
    </div>
</div>