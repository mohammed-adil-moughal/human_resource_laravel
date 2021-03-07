@extends('layouts.signup_forms')
@section('steps')
    <ul class="col-xs-6 no-margin">
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Basic')"><span class="badge  badge-success">1</span>Basic Information<span class="chevron"></span></a></li>
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Contact')"><span class="badge badge-success">2</span>Contact Information<span class="chevron"></span></a></li>
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Academic')"><span class="badge badge-success">3</span>Academic Information<span class="chevron"></span></a></li>
        <li class="col-xs-3 active" style="z-index: auto"><span class="badge badge-info">4</span>Professional Qualifications<span style="z-index: 999" class="chevron"></span></li>
    </ul>
    <ul class="col-xs-6 no-margin">
        <li class="col-xs-3"><span class="badge">5</span>Training<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">6</span>Experience<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">7</span>Competency<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">8</span>Payment</li>
    </ul>
@stop
@section('form-header')<div class="col-xs-6"> Professional Qualifications</div>
<div class="col-xs-6 text-right "><button type="button" class="btn btn-info" ng-click="clear('prof_qualifications')"><strong>+ Add New</strong></button>
</div>
@stop
@section('signup_form')
    <table class="table table-striped">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Registration No.</th>
            <th>Certificate</th>
            <th>Name of Body</th>
            <th>Stage</th>
            <th>Date Passed</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="x in memberData.prof_qualifications">
            <th scope="row"><span ng-bind="memberData.prof_qualifications.indexOf(x)+1"></span></th>
            <td><span ng-bind="x.Registration_No"></span></td>
            <td><span ng-bind="x.Qualification_Description"></span></td>
            <td><span ng-bind="x.Name_of_Body"></span></td>
            <td><span ng-bind="x.Stages_Sections_Modules"></span></td>
            <td><span ng-bind="x.Date_Passed"></span></td>
            <td><span ng-bind="x.Description"></span></td>
            <td>
                <a href="#" ng-click="deleteItem(x, memberData.prof_qualifications)" ><span class="glyphicon glyphicon-remove "></span></a>
                <a href="#" style="margin-right: 10px" ng-click="editItem(x, 'prof_qualifications', 'prof_qualifications')" ><span class="glyphicon glyphicon-pencil "></span></a>
            </td>
        </tr>
        </tbody>
    </table>
    <div ng-hide="memberData.prof_qualifications.length > 0" class="gray-lighter gray-light-font no-data text-center ">No Professional Qualifications</div>
    <form class="signup-form-container" ng-submit="getView('Training')">
        <div class="col-xs-6 padding-0"><a href="#" ng-click="getView('Academic')" class="btn btn-proceed"><< Back</a></div>
        <div class="col-xs-6 text-right padding-0"><button type="submit" class="btn btn-proceed"> Proceed >></button></div>
    </form>

    <!-- Modal -->
    <div class="modal fade " id="myModal" role="dialog">
        <div class="modal-dialog ">

            <!-- Modal content-->
            <div class="modal-content col-md-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add a Professional Qualification:</h4>
                </div>
                <div class="modal-body col-md-12">
                    <form class="col-md-12" ng-submit="prof_qualifications = addItem(prof_qualifications, 'prof_qualifications')">
                        @include('layouts.edit_forms.prof_qualfs_form')
                        <div class="modal-footer col-md-12">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-default" >Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- End of modal -->

@stop