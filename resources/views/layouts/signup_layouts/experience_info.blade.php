@extends('layouts.signup_forms')
@section('steps')
    <ul class="col-xs-6 no-margin">
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Basic')"><span class="badge  badge-success">1</span>Basic Information<span class="chevron"></span></a></li>
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Contact')"><span class="badge badge-success">2</span>Contact Information<span class="chevron"></span></a></li>
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Academic')"><span class="badge badge-success">3</span>Academic Information<span class="chevron"></span></a></li>
        <li class="col-xs-3 complete" style="z-index: auto"><a href="#" class="complete" ng-click="getView('ProfQualifications')"><span class="badge badge-success">4</span>Professional Qualifications<span style="z-index: 999" class="chevron"></span></a></li>
    </ul>
    <ul class="col-xs-6 no-margin">
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Training')"><span class="badge badge-success">5</span>Training<span class="chevron"></span></a></li>
        <li class="col-xs-3 active"><span class="badge badge-info">6</span>Experience<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">7</span>Competency<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">8</span>Payment</li>
    </ul>
@stop
@section('form-header')<div class="col-xs-6"> Professional Experience</div>
<div class="col-xs-6 text-right "><button type="button" class="btn btn-info" ng-click="clear('experience')"><strong>+ Add New</strong></button>
</div>
@stop
@section('signup_form')
    <table class="table table-striped">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Position</th>
            <th>Firm</th>
            {{--<th>Sector</th>--}}
            <th>Tasks</th>
            <th>From</th>
            <th>To</th>
            <th>Actions</th>
            <!--
            <th>Contact Person</th>
            <th>Contact Email</th>
            <th>Contact Phone</th>
            <th>Contact Title</th>
            -->
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="x in memberData.experience">
            <th scope="row"><span ng-bind="memberData.experience.indexOf(x)+1"></span></th>
            <td><span ng-bind="x.Position_Held"></span></td>
            <td><span ng-bind="x.Name_of_Firm"></span></td>
            {{--<td><span ng-bind="x.Sector"></span></td>--}}
            <td><span ng-bind="x.Tasks_Performed"></span></td>
            <td><span ng-bind="x.From_Date"></span></td>
            <td><span ng-bind="x.To_Date"></span></td>
            <td>
                <a href="#" style="margin-right: 10px" ng-click="deleteItem(x, 'experience')" ><span class="glyphicon glyphicon-remove "></span></a>
                <a href="#" style="margin-right: 10px" ng-click="editItem(x, 'experience', 'experience')" ><span class="glyphicon glyphicon-pencil "></span></a>
            </td>
            <!--
            <td><span ng-bind="x.contact_person"></span></td>
            <td><span ng-bind="x.contact_email"></span></td>
            <td><span ng-bind="x.contact_phone"></span></td>
            <td><span ng-bind="x.contact_title"></span></td>
            -->

        </tr>
        </tbody>
    </table>
    <div ng-hide="memberData.experience.length > 0" class="gray-lighter gray-light-font no-data text-center ">No Previous Experience</div>
    <form class="signup-form-container" ng-submit="getView('Professional')">
        <div class="col-xs-6 padding-0"><a href="#" ng-click="getView('Training')" class="btn btn-proceed"><< Back</a></div>
        <div class="col-xs-6 text-right padding-0"><button type="submit" class="btn btn-proceed"> Proceed >></button></div>
    </form>

    <!-- Modal -->
    <div class="modal fade " id="myModal" role="dialog">
        <div class="modal-dialog ">

            <!-- Modal content-->
            <div class="modal-content col-md-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Professional Experience:</h4>
                </div>
                <div class="modal-body col-md-12">
                    <form class="col-md-12" ng-submit="experience = addItem(experience, 'experience')">
                        @include('layouts.edit_forms.experience_form')
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