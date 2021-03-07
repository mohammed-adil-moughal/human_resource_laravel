<div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="surname">Surname:<span style="color: #f40000">*</span></label>
            <input type="text" limit-to="250" class="form-control" id="surname" required="required" name="surname" ng-model="memberData.Surname" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="other_names">Other Names:<span style="color: #f40000">*</span></label>
            <input type="text" limit-to="250" class="form-control" id="other_names" required="required" ng-model="memberData.Other_Names" name="Other_Names">
        </div>
    </div>
</div>
<div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="id_no">National ID Number:<span style="color: #f40000">*</span></label>
            <span class="text-danger" ng-show="taken">A member with that ID number already exists.</span>
            <input type="number" limit-to="8" ng-change="checkid()" class="form-control" id="id_no" required="required" ng-model="memberData.ID_Number" name="ID_Number">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">Email address:<span style="color: #f40000">*</span></label>
            <input type="email" limit-to="250" class="form-control" id="email" required="required" ng-model="memberData.E_mail" name="E_mail">
        </div>
    </div>
</div>
<div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="mobile_no">Mobile Number:<span style="color: #f40000">*</span></label>
            <input type="text"   limit-to="12"  class="form-control" id="mobile_no" required="required" ng-model="memberData.Mobile_No" name="Mobile_No">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="county">County:<span style="color: #f40000">*</span></label>
            <select class="form-control" id="county"  ng-model="memberData.County" name="County">
                <option selected disabled hidden style='display: none' value=''></option>
                @foreach($data['counties'] as $x)
                    <option value="{{ $x->Code }}">{{ $x->Code }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div>
<!--    <div class="col-md-6">
        <div class="form-group">
            <div>Is your organisation a member of KISM? <span> <input type="checkbox" name="check" value="ON" /> </span></div>
            <label for="parent_institution">Parent Institution:<span style="color: #f40000">*</span><small class="text-muted"></small></label>
            <select type="text" class="form-control"  id="parent_institution" name="parent_institution" ng-model="memberData.Parent_Institution_Customer" >
               <option selected="selected" value="" >None</option>
                @foreach($data['ParentInstitutions'] as $x)
                    <option value="{{ $x->No }}">{{ $x->Name }}</option>
                @endforeach
            </select>
        </div>
    </div>-->
    <div class="col-md-6">
        <div class="form-group" >
            <div>
                <label for="nationality">Nationality:<span style="color: #f40000">*</span></label>
            </div>
            <!--<input type="text" class="form-control" id="nationality" ng-model="memberData.nationality" name="nationality">-->
            <select class="form-control select2-basic-single" id="nationality" required="required" ng-model="memberData.Country_Region_Code" ng-init="memberData.Country_Region_Code = memberData.Country_Region_Code === undefined? 'KE' : memberData.Country_Region_Code" name="nationality" >
                <option ng-value="x.country_code" ng-selected="x.country_code === memberData.Country_Region_Code? 'selected' : ''" ng-repeat="x in countries" ng-bind="x.country_name"></option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" >
            <label for="date_of_birth">Date of Birth:<span style="color: #f40000">*</span></label>
            <input type="text" limit-to="250" class="form-control" data-date-end-date="<?php echo (date('Y') - 18); echo date('-m-d');?>" data-date-format="yyyy-mm-dd" data-provide="datepicker" id="date_of_birth" required="required" ng-model="memberData.Date_Of_Birth" name="date_of_birth">
        </div>
    </div>
</div>
<div>
<!--    <div class="col-md-6">
        <div class="form-group">
            <label for="pin_reg_no">KRA Pin Registration Number:<span style="color: #f40000">*</span></label>
            <input style="text-transform: uppercase" type="text" limit-to="10" class="form-control" id="pin_reg_no" name="pin_reg_no" ng-model="memberData.PIN_Registration_No" >
        </div>
    </div>-->
    
</div>
<div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="picture">Picture:<small class="text-muted">(optional)</small></label>
            <div style="display: flex;">
                <input type="file" class="form-control" id="picture" accept="image/*" custom-on-change="uploadPicture(input_form_file)" name="picture" ng-model="memberData.picture_file" >
                <span ng-hide="uploadPicFin" class="glyphicon glyphicon-ok vertical-center"></span>
                <span ng-hide="uploadPicStart" class="vertical-center"><img src="{{ url('assets/images/ajax_loader.gif') }}" class="img-responsive img-20px"></span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        <label for="gender">Gender:<span style="color: #f40000">*</span></label>
        <div>
            <label class="radio-inline"><input name="gender" required="required" type="radio" ng-model="memberData.Gender" value="male" />Male</label>
            <label class="radio-inline"> <input name="gender"  type="radio" ng-model="memberData.gender" value="female" />Female</label>
        </div>
    </div>
</div>
</div>

<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

<hr class="separator col-md-12">


<div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="conviction">Have you ever been convicted on any offense?<small class="text-muted">(optional)</small></label>
            <input type="checkbox" limit-to="250" id="conviction" name="conviction" ng-model="memberData.Conviction" >
        </div>
    </div>
</div>
<div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="offence">What was your offense?</label>
            <textarea ng-disabled="!memberData.Conviction" limit-to="250"  class="form-control" id="offence" name="offence" ng-model="memberData.Offence" ></textarea>
        </div>
    </div>
</div>
<div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="date_place">Where and when did it occur?</label>
            <textarea ng-disabled="!memberData.Conviction" limit-to="250" class="form-control" id="date_place" name="date_place" ng-model="memberData.Date_and_Place" ></textarea>
        </div>
    </div>
</div>
<div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="sentence">What was your sentence?</label>
            <textarea ng-disabled="!memberData.Conviction" limit-to="250"  class="form-control" id="sentence" name="sentence" ng-model="memberData.Sentence" ></textarea>
        </div>
    </div>
</div>