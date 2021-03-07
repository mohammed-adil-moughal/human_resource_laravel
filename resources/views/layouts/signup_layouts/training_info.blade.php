@extends('layouts.signup_forms')
@section('steps')
    <ul class="col-xs-6 no-margin">
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Basic')"><span class="badge  badge-success">1</span>Basic Information<span class="chevron"></span></a></li>
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Contact')"><span class="badge badge-success">2</span>Contact Information<span class="chevron"></span></a></li>
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Academic')"><span class="badge badge-success">3</span>Academic Information<span class="chevron"></span></a></li>
        <li class="col-xs-3 complete" style="z-index: auto"><a href="#" class="complete" ng-click="getView('ProfQualifications')"><span class="badge badge-success">4</span>Professional Qualifications<span style="z-index: 999" class="chevron"></span></a></li>
    </ul>
    <ul class="col-xs-6 no-margin">
        <li class="col-xs-3 active"><span class="badge badge-info">5</span>Training<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">6</span>Experience<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">7</span>Competency<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">8</span>Payment</li>
    </ul>
@stop
@section('form-header')<div class="col-xs-6">Training and Continous Professional Development</div>
<div class="col-xs-6 text-right "><button type="button" class="btn btn-info" ng-click="clear('training')"><strong>+ Add New</strong></button>
</div>
@stop
@section('signup_form')
    <table class="table table-striped">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Organization</th>
            <th>From</th>
            <th>To</th>
            <th>Competency</th>
            <th>Hours</th>
            <th>Trainer</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="x in memberData.training">
            <th scope="row"><span ng-bind="memberData.training.indexOf(x)+1"></span></th>
            <td><span ng-bind="x.Name"></span></td>
            <td><span ng-bind="x.Organization_Company"></span></td>
            <td><span ng-bind="x.From"></span></td>
            <td><span ng-bind="x.To"></span></td>
            <td><span ng-bind="x.Competency"></span></td>
            <td><span ng-bind="x.Hours_Completed"></span></td>
            <td><span ng-bind="x.Trainer"></span></td>
            <td>
                <a href="#" style="margin-right: 10px" ng-click="deleteItem(x, 'training')" ><span class="glyphicon glyphicon-remove "></span></a>
                <a href="#" style="margin-right: 10px" ng-click="editItem(x, 'training', 'training')" ><span class="glyphicon glyphicon-pencil "></span></a>
            </td>
        </tr>
        </tbody>
    </table>
    <div ng-hide="memberData.training.length > 0" class="gray-lighter gray-light-font no-data text-center ">No Previous Training</div>
    <form class="signup-form-container" ng-submit="getView('Experience')">
        <div class="col-xs-6 padding-0"><a href="#" ng-click="getView('ProfQualifications')" class="btn btn-proceed"><< Back</a></div>
        <div class="col-xs-6 text-right padding-0"><button type="submit" class="btn btn-proceed"> Proceed >></button></div>
    </form>

    <!-- Modal -->
    <div class="modal fade " id="myModal" role="dialog">
        <div class="modal-dialog ">

            <!-- Modal content-->
            <div class="modal-content col-md-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Training and Continous Professional Development:</h4>
                </div>
                <div class="modal-body col-md-12">
                    <form class="col-md-12" ng-submit="training=addItem(training, 'training')">
                        @include('layouts.edit_forms.training_form')
                        <div class="modal-footer col-md-12">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-default">Save</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
    <!-- End of modal -->

@stop