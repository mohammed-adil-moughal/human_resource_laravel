<div xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12 form-group">
        <label for="qualification_description">Qualification:</label>
        <select class="form-control" limit-to="250" list="qualf_types" id="qualification_description" required name="qualification_description" ng-init="getData('qualification_types', 'qualification_types')" ng-model="academic.Qualification_Description">
            <option selected value='' >Please Select</option>
            <option ng-repeat="x in qualification_types" ng-selected="x.description == academic.Qualification_Description" ng-value="x.description" ng-bind="x.description"></option>
        </select>
    </div>
</div>
<div>
    <div class="col-md-12">
        <div class="form-group" >
            <div>
                <label for="area_of_specialization">Area of Specialization:<small class="text-muted">{{ "&nbsp;" }}e.g Bachelor of ..</small></label>
            </div>
            <input list="qualification_types" limit-to="250" type="text" class="form-control"  ng-init="getData('qualification_types', 'qualification_types')" id="institution" ng-model="academic.Area_of_Specialization" name="area_of_specialization">
            <datalist id="qualification_types">
                <option selected disabled hidden style='display: none' value='' ></option>
                <option ng-repeat="qualification_type in qualification_types" ng-value="qualification_type.description"></option>
            </datalist>
        </div>
    </div>
</div>
<div>
    <div class="col-md-12">
        <div class="form-group" >
            <div>
                <label for="institution">Institute:</label>
            </div>
            <input list="institutions" limit-to="250" type="text" class="form-control"  ng-init="getData('institutions', 'institutions')" id="institution" ng-model="academic.Institution" name="institution">
            <datalist id="institutions">
                <option selected disabled hidden style='display: none' value='' ></option>
                <option ng-repeat="institution in institutions" ng-value="institution.name"></option>
            </datalist>
        </div>
    </div>
</div>
<div >
    <div class="col-md-6 form-group">
        <label for="description">Grade:</label>
        <select class="form-control" id="grade_levles" required name="description" ng-init="getData('grade_levels', 'grade_levels')" ng-model="academic.Grade_Level_Attained">
            <option selected value='' >Please Select</option>
            <option ng-repeat="x in grade_levels"  ng-selected="x.Code == academic.Grade_Level_Attained && x.Qualification == academic.Qualification_Description" ng-hide="x.Qualification != academic.Qualification_Description"  ng-bind="(x.Name === undefined || x.Name === '' || x.Name === null )? x.Code : x.Name" ng-value="x.Code"></option>
        </select>
    </div>
    <div class="col-md-6 form-group">
        <label for="file">Attachment:</label>
        <div style="display: flex;">
            <input type="file" class="form-control" required id="file" custom-on-change="uploadAttachment(input_form_file)" name="file"/>
            <span ng-hide="academic.Attachment === undefined" class="glyphicon glyphicon-ok vertical-center"></span>
            <span ng-hide="uploadFileStart" class="vertical-center"><img src="{{ url('assets/images/ajax_loader.gif') }}" class="img-responsive img-20px"></span>
        </div>
        <span ng-bind="academic.Attachment"></span>
    </div>
</div>
<div >
    <div class="col-md-6 form-group">
        <label for="from_date">Start Date:</label>
        <input type="text" limit-to="250" class="datepicker form-control" id="from_date" data-date-format="yyyy-mm-dd"  data-date-end-date="{{ date('Y-m-d') }}" name="from_date" required ng-model="academic.From_Date"/>
    </div>
    <div class="col-md-6 form-group">
        <label for="to_date" style="width: 100%">End Date: <span style="margin-right: 4px;" class="text-muted small float-right">Ongoing<input type="checkbox" ng-model="ac_ongoing"></span></label>
        <span><input type="text" limit-to="250" ng-disabled="ac_ongoing" class="datepicker form-control" id="to_date" data-date-format="yyyy-mm-dd" data-date-end-date="{{ date('Y-m-d') }}" name="to_date" required ng-model="academic.To_Date"/>
    </div>
    <script>
        $(document).ready(function(){

            $("#from_date").datepicker({
                autoclose: true,
            }).on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#to_date').datepicker('setStartDate', minDate);
                if($('#to_date').datepicker('getDate') >= minDate)
                {
                    $('#to_date').datepicker('setDate',null );
                }

            });

            $("#to_date").datepicker()
                    .on('changeDate', function (selected) {
                        var minDate = new Date(selected.date.valueOf());
                        $('#from_date').datepicker('setEndDate', minDate);
                    });

        });
    </script>
</div>