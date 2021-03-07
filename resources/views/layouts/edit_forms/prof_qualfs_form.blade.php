<div >
    <div class="col-md-12 form-group">
        <label for="reg_no">Registration No:</label>
        <input type="text" class="form-control" id="reg_no" limit-to="250" required name="reg_no" ng-model="prof_qualifications.Registration_No"/>
    </div>
</div>
<div>
    <div  class="col-md-12 form-group">
        <label for="qualification_description">Qualification:</label>
        <select  class="form-control" limit-to="250" id="qualification_description" required name="qualification_description" ng-init="getData('qualification_types', 'qualification_types')" ng-model="prof_qualifications.Qualification_Description">
            <option value="" selected hidden ng-show>Please Select...</option>
            <option ng-repeat="x in qualification_types" ng-show="x.code === 'CIPS'" ng-selected="x.description == prof_qualifications.Qualification_Description" ng-value="x.description" ng-bind="x.description"></option>
        </select>
    </div>
</div>
<div >
    <div class="col-md-12 form-group">
        <label for="body_name">Name of Body:</label>
        <input type="text" list="body_name_list" class="form-control" limit-to="250" id="body_name" name="body_name" ng-init="getData('institutions', 'institutions')" required ng-model="prof_qualifications.Name_of_Body"/>
        <datalist id="body_name_list"   >
            <option ng-repeat="institution in institutions" ng-value="institution.name"></option>
        </datalist>
    </div>
</div>
<div >
    <div class="col-md-6 form-group">
        <label for="stages_selections_modules">Stage:</label>
        <input type="text" class="form-control" id="stage" limit-to="250" required ng-model="prof_qualifications.Stages_Sections_Modules" name="stages_selections_modules"/>
    </div>
    <div class="col-md-6 form-group">
        <label for="date_passed">Date Passed:</label>
        <input type="text" class="form-control" id="date_passed" limit-to="250" data-provide="datepicker" data-date-format="yyyy-mm-dd"  data-date-end-date="{{ date('Y-m-d') }}"" required name="date_passed" ng-model="prof_qualifications.Date_Passed"/>
    </div>
</div>
<div>
    <div class="col-md-12 form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" limit-to="250" required name="description" ng-model="prof_qualifications.Description"/>
    </div>
</div>