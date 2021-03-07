<?php $save = "" ?>
@section('profile_content') @show

<div style="margin-top: 20px" class="col-xs-6 text-left "><button type="button" class="btn btn-success" ng-click="@section('clear_object') @show" data-toggle="modal" data-target="#myModal"><strong>@section('button_text')+ Add New @show</strong></button>
@section("view_more") @show
</div>
<!-- Modal -->
<div class="modal fade " id="myModal" role="dialog">
    <div class="modal-dialog ">

        <!-- Modal content-->
        <div class="modal-content col-md-12">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@section('modal_title') @stop</h4>
            </div>
            <div class="modal-body col-md-12">
                @section('form_open') <form class="col-md-12" ng-submit="save({{ $save }})"> @show
                    @section('modal_form') @show
                    <div class="modal-footer col-md-12">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
<!-- End of modal -->