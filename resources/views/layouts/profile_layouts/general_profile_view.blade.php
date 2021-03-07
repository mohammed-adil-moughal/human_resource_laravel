@extends('layouts.profile_layouts.base_profile_layout')
@section('profile_content')
<div class="col-xs-12 ">
    <div class="col-xs-12 padding-0">
        <div class="col-xs-12">
            <h3>General Information</h3>
        </div>

        <div class="col-xs-12 padding-0">
            <div class="col-xs-12 padding-0">
                <div class="col-xs-4 padding-0">
                    <strong>Surname:</strong>
                </div>
                <div class="col-xs-8 padding-0 text-muted">
                    {{ @$data['member_bio_data']->Surname }}
                </div>
            </div>
        </div>

        <div class="col-xs-12 padding-0">
            <div class="col-xs-12 padding-0">
                <div class="col-xs-4 padding-0">
                    <strong>Other Names:</strong>
                </div>
                <div class="col-xs-8 padding-0 text-muted">
                    {{ @$data['member_bio_data']->Other_Names }}
                </div>
            </div>
        </div>

        <div class="col-xs-12 padding-0">
            <div class="col-xs-12 padding-0">
                <div class="col-xs-4 padding-0">
                    <strong>ID Number:</strong>
                </div>
                <div class="col-xs-8 padding-0 text-muted">
                    {{ @$data['member_bio_data']->ID_Number }}
                </div>
            </div>
        </div>

        <div class="col-xs-12 padding-0">
            <div class="col-xs-12 padding-0">
                <div class="col-xs-4 padding-0">
                    <strong>Date of Birth:</strong>
                </div>
                <div class="col-xs-8 padding-0 text-muted">
                    <?php
                        $date = date_create($data['member_bio_data']->Date_Of_Birth);

                    ?>
                    {{ @date_format($date, 'l jS F Y') }}
                </div>
            </div>
        </div>

        <div class="col-xs-12 padding-0">
            <div class="col-xs-12 padding-0">
                <div class="col-xs-4 padding-0">
                    <strong>Parent Institution:</strong>
                </div>
                <div class="col-xs-8 padding-0 text-muted">
                    {{ @$data['member_bio_data']->Parent_Institution_Customer }}
                </div>
            </div>
        </div>

        <div class="col-xs-12 padding-0">
            <div class="col-xs-12 padding-0">
                <div class="col-xs-4 padding-0">
                    <strong>Membership Type:</strong>
                </div>
                <div class="col-xs-8 padding-0 text-muted">
                    <?php if($data['member_bio_data']->MembershipType) echo $data['member_bio_data']->MembershipType->description ?>
                </div>
            </div>
        </div>

        <div class="col-xs-12 padding-0">
            <div class="col-xs-12 padding-0">
                <div class="col-xs-4 padding-0">
                    <strong>Status:</strong>
                </div>
                <div class="col-xs-8 padding-0 text-muted">
                <span class="status status-{{ @$data['member_bio_data']->MemberStatus->description }} text-left">{{ @$data['member_bio_data']->MemberStatus->description }}</span>

               
                </div>
            </div>
        </div>

    </div>
    <div class="col-xs-12 padding-0">
        <div class="col-xs-12">
            <h3>Contact Information</h3>
        </div>

        <div class="col-xs-12 padding-0">
            <div class="col-xs-12 padding-0">
                <div class="col-xs-4 padding-0">
                    <strong>Email:</strong>
                </div>
                <div class="col-xs-8 padding-0 text-muted">{{ @$data['member_bio_data']->E_mail }}</div>
            </div>
        </div>

        <div class="col-xs-12 padding-0">
            <div class="col-xs-12 padding-0">
                <div class="col-xs-4 padding-0">
                    <strong>Mobile Phone:</strong>
                </div>
                <div class="col-xs-8 padding-0 text-muted">{{ @$data['member_bio_data']->Mobile_No }}</div>
            </div>
        </div>

        <div class="col-xs-12 padding-0">
            <div class="col-xs-12 padding-0">
                <div class="col-xs-4 padding-0">
                    <strong>Website:</strong>
                </div>
                <div class="col-xs-8 padding-0 text-muted">{{ @$data['member_bio_data']->Home_Page }}</div>
            </div>
        </div>

        <div class="col-xs-12 padding-0">
            <div class="col-xs-12 padding-0">
                <div class="col-xs-4 padding-0">
                    <strong>Address:</strong>
                </div>
                <div class="col-xs-8 padding-0 text-muted">{{ @$data['member_bio_data']->Address }}</div>
            </div>
        </div>

        <div class="col-xs-12 padding-0">
            <div class="col-xs-12 padding-0">
                <div class="col-xs-4 padding-0">
                    <strong>Post Code:</strong>
                </div>
                <div class="col-xs-8 padding-0 text-muted">{{ @$data['member_bio_data']->Post_Code }}</div>
            </div>
        </div>

        <div class="col-xs-12 padding-0">
            <div class="col-xs-12 padding-0">
                <div class="col-xs-4 padding-0">
                    <strong>City:</strong>
                </div>
                <div class="col-xs-8 padding-0 text-muted">{{ @$data['member_bio_data']->City }}</div>
            </div>
        </div>

        <div class="col-xs-12 padding-0">
            <div class="col-xs-12 padding-0">
                <div class="col-xs-4 padding-0">
                    <strong>County:</strong>
                </div>
                <div class="col-xs-8 padding-0 text-muted">{{ @$data['member_bio_data']->County }}</div>
            </div>
        </div>

    </div>
</div>
@stop
@section('button_text')Edit Details @stop
@section('modal_form') @include('layouts.edit_forms.contact_form') @stop
@section('form_open') <form class="col-md-12" ng-submit="save('member/update', memberData)"> @stop