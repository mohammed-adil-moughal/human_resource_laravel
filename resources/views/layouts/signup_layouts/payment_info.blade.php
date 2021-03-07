@extends('layouts.signup_forms')
@section('steps')
    <ul class="col-xs-6 no-margin">
        <li class="col-xs-3 "><span class="badge">1</span>Basic Information<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">2</span>Contact Information<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">3</span>Academic Information<span class="chevron"></span></li>
        <li class="col-xs-3" style="z-index: auto"><span class="badge">4</span>Professional Qualifications<span style="z-index: 999" class="chevron"></span></li>
    </ul>
    <ul class="col-xs-6 no-margin">
        <li class="col-xs-3"><span class="badge">5</span>Training<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">6</span>Experience<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">7</span>Competency<span class="chevron"></span></li>
        <li class="col-xs-3 active"><span class="badge badge-info current">8</span>Payment</li>
    </ul>
@stop
@section('form-header')
    <div class="col-xs-6"> Make Your Payment </div>
    {{--<div class="text-right "><a class="btn btn-success" ng-click="printForm()">Print Application Form <span class="glyphicon glyphicon-download-alt"></span> </a></div>--}}
@stop
@section('signup_form')

    <div class="col-md-12"> </div>
    <hr>
    <div class="panel-group col-md-12" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading padding-0">
                <div class="panel-title">
                    <a class="display-block padding-10" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                       <strong><span class="glyphicon glyphicon-play"></span>   M-PESA</strong></a>
                </div>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">
                    <div style="max-width: 300px;">
                    <img src="{{ asset('/assets/images/lipa_na_mpesa.png') }}"  class="img-responsive">
                    </div>
                    <ol>
                        <li>Go to M-PESA option on your phone</li>
                        <li>Select the Lipa Na M-PESA</li>
                        <li>Select Paybill Option option</li>
                        <li>Enter Business number <strong>552500</strong></li>
                        <li>Enter Account no. <strong>YOUR NAME WITH NO SPACING e.g janeDoe</strong></li>
                         <li>Enter the Amount <strong>Ksh {{ @$data->application_fee }}</strong></li>
                        <li>Enter your M-PESA PIN and Press Send</li>
                        <li>Click on Complete Payment Button Below to finish your payment</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading padding-0">
                <div class="panel-title">
                    <a class="display-block padding-10" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                        <strong><span class="glyphicon glyphicon-play"></span>  PesaPal</strong></a>
                </div>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body"></div>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-xs-6 padding-0"><a href="#" ng-click="getView('Professional')" class="btn btn-proceed" ><< Back</a></div>
        <div class="col-xs-6 text-right padding-0"><button type="submit" class="btn btn-proceed" data-toggle="modal" data-target="#myModal"> Complete Your Application >></button></div>
    </div>
    <div class="modal fade " id="myModal" role="dialog">
        <div class="modal-dialog ">

            <!-- Modal content-->
            <div class="modal-content col-md-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">KENYA INSTITUTE OF SUPPLIES MANAGEMENT TERMS AND CONDITIONS</h4>
                </div>
                <div class="modal-body col-md-12 ">
                        <div>By applying for membership in the Kenya Institute of Supplies Management, you hereby agree to the following:</div>
                        <div class="terms-and-conditions">
                            <h3>Declaration:</h3>
                                I hereby declare that the foregoing statements are true in every respect and that none of the disqualifications listed in Sections 16(4) of the Supplies Procurement Management Act
                                2007 apply to me. I acknowledge that any statement contained anywhere in this form which is known by me to be
                                false shall invalidate this application and any decision reached thereon by he Registration Committee. I have
                                read the Supplies Practitioners Management Act 2007. I am Aware of the penalties stipulated in The Act and I
                                understand that,if Registered, I shall be bound thereby and by any amendments thereto and to the regulations
                                made under the Act so long as my name appears in the Register.
                        </div>
                        <div class="modal-footer col-md-12">
                            <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">I Disagree</button>
                            <button type="submit" class="btn btn-default btn-success" ng-click="proceedPayment()">I Agree</button>
                        </div>
                </div>

            </div>

        </div>
    </div>

@stop