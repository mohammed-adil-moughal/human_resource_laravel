@extends('layouts.signup_forms')
@section('steps')
    <ul class="col-xs-6 no-margin">
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Basic')"><span class="badge  badge-success">1</span>Basic Information<span class="chevron"></span></a></li>
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Contact')"><span class="badge badge-success">2</span>Contact Information<span class="chevron"></span></a></li>
        <li class="col-xs-3 active"><span class="badge badge-info">3</span>Academic Information<span class="chevron"></span></li>
        <li class="col-xs-3" style="z-index: auto"><span class="badge">4</span>Professional Qualifications<span style="z-index: 999" class="chevron"></span></li>
    </ul>
    <ul class="col-xs-6 no-margin">
        <li class="col-xs-3"><span class="badge">5</span>Training<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">6</span>Experience<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">7</span>Competency<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">8</span>Payment</li>
    </ul>
@stop
@section('form-header')<div class="col-xs-6"> Academic Information</div>
    <div class="col-xs-6 text-right "><button type="button" class="btn btn-info"  ng-click="clear('academic')" ><strong>+ Add New</strong></button>
        </div>
@stop
@section('signup_form')
    <table class="table table-striped">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Certificate</th>
            <th>Institute</th>
            <th>Grade/Level</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Attachment</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="x in memberData.academics">
            <th scope="row"><span ng-bind="memberData.academics.indexOf(x)+1"></span></th>
            <td><span ng-bind="x.Qualification_Description "></span></td>
            <td><span ng-bind="x.Institution "></span></td>
            <td><span ng-bind="x.Grade_Level_Attained"></span></td>
            <td><span ng-bind="x.From_Date"></span></td>
            <td><span ng-bind="x.To_Date"></span></td>
            <td><span ng-bind="x.attachment_name"></span></td>
            <td>
                <a href="#" style="margin-right: 10px" ng-click="deleteItem(x, 'academics')" ><span class="glyphicon glyphicon-remove "></span></a>
                <a href="#" style="margin-right: 10px" ng-click="editItem(x, 'academic', 'academics')" ><span class="glyphicon glyphicon-pencil "></span></a>
            </td>
        </tr>
        </tbody>
    </table>
    <div ng-hide="memberData.academics.length > 0" class="gray-lighter gray-light-font no-data text-center ">No Academic Information</div>
    <form class="signup-form-container" ng-submit="getView('ProfQualifications')">
        <div class="col-xs-6 padding-0"><a href="#" ng-click="getView('Contact')" class="btn btn-proceed" ><< Back</a></div>
        <div class="col-xs-6 text-right padding-0"><button type="submit" class="btn btn-proceed"> Proceed >></button></div>
    </form>

    <!-- Modal -->
    <div class="modal fade " id="myModal" role="dialog">
        <div class="modal-dialog ">
            <!-- Modal content-->
            <div class="modal-content col-md-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Academic Details:</h4>
                </div>

                    <div class="modal-body col-md-12">
                        <form class="col-md-12" ng-submit="academic = addItem(academic, 'academics')">
                            @include('layouts.edit_forms.academic_form')
                            <div class="modal-footer col-md-12">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-default"  >Save</button>
                            </div>
                        </form>
                    </div>

            </div>

        </div>
    </div>
    <!-- End of modal -->

@stop