@extends('layouts.base_profile_view')
@section('profile-content')
    <div class="col-md-12 padding-4">
        <div class="col-xs-6">Password:</div>
        <div class="col-xs-6"><button class="btn btn-info" data-toggle="modal" data-target="#password_modal"><strong>Change your password</strong></button> </div>
    </div>
    <div class="col-md-12 padding-4">
        <div class="col-xs-6">Profile Picture:</div>
        <div class="col-xs-6"><button class="btn btn-info" data-toggle="modal" data-target="#picture_modal"><strong>Change your picture</strong></button> </div>
    </div>
    <hr class="col-md-12"/>
    <div class="col-md-12 padding-4 text-muted">Additional account information:</div>
    <div class="col-md-12 padding-4">
        <div class="col-xs-6">Application Date:</div>
        <div class="col-xs-6 text-muted">{{ $data["member_bio_data"]->created_at or "--" }} </div>
    </div>
    <div class="col-md-12 padding-4">
        <div class="col-xs-6">Reviewed Date:</div>
        <div class="col-xs-6 text-muted">{{ $data["member_bio_data"]->Date_Of_Review or "--"  }}</div>
    </div>
    <div class="col-md-12 padding-4">
        <div class="col-xs-6">Admission Date:</div>
        <div class="col-xs-6 text-muted">{{ $data["member_bio_data"]->Date_Of_Admission or "--" }}</div>
    </div>
    <div class="col-md-12 padding-4">
        <div class="col-xs-6">Last Modified Date:</div>
        <div class="col-xs-6 text-muted">{{ $data["member_bio_data"]->updated_at or "--"  }}</div>
    </div>
    <div class="modal fade " id="password_modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content col-md-12">
                <form ng-submit="changePassword()">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change Your Password</h4>
                </div>
                <div class="modal-body col-md-12 ">
                    <div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="password">Old Password:</label>
                                <input type="password" class="form-control" id="password" required="required" name="password" ng-model="password.password" >
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group" ng-class="{'has-error': password.password_mismatch}">
                                <div class="text-muted text-danger" ng-show="password.password_mismatch">The passwords to not match!</div>
                                <div class="text-muted text-danger" ><span ng-bind="password.errors"></span></div>
                                <label for="new_password">New Password:</label>
                                <input type="password" class="form-control" required id="new_password" ng-model="password.new_password" name="password.new_password">
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="new_password_confirmation">New Password Confirmation:</label>
                                <input type="password" class="form-control" required id="new_password_confirmation" ng-model="password.new_password_confirmation" name="password.new_password_confirmation">
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer col-md-12">
                        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-default btn-success" ng-click="proceedPayment()">Change</button>
                    </div>
                </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade " id="picture_modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content col-md-12">
                <form action="{{ url('/api/member/uploadPicture') }}" enctype="multipart/form-data" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Change Your Picture</h4>
                    </div>
                    <div class="modal-body col-md-12 ">
                        <div>
                            {{ csrf_field() }}
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="picture">Choose a picture:</label>
                                    <input type="file" class="form-control" id="picture" required="required" accept="image/*" name="picture">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer col-md-12">
                        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-default btn-success">Change</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>
@stop