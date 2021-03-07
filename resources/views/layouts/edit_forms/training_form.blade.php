<div >
    <div class="col-md-12 form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" limit-to="250" required id="name" name="name" ng-model="training.Name"/>
    </div>
</div>
<div>
    <div  class="col-md-12 form-group">
        <label for="organization">Organization:</label>
        <input type="text" list="organization_list" limit-to="250" ng-init="getData('institutions', 'institutions')" class="form-control" required id="organization" ng-model="training.Organization_Company" name="organization"/>
        <datalist id="organization_list"   >
            <option ng-repeat="institution in institutions" ng-value="institution.name"></option>
        </datalist>
    </div>
</div>
<div >
    <div class="col-md-6 form-group">
        <label for="competency">Competency:</label>
        <input list="competencies" class="form-control" limit-to="250" id="competency" required name="competency" ng-model="training.Competency">
        <datalist id="competencies">
            <option value="" selected hidden />
            @foreach($data['competencies'] as $x)
                <option value="{{$x->code}}">{{$x->description }}</option>
            @endforeach
        </datalist>
    </div>
    <div class="col-md-6 form-group">
        <label for="hours">Hours Completed:</label>
        <input type="text" class="form-control" limit-to="250" required id="hours" name="hours" ng-model="training.Hours_Completed"/>
    </div>
</div>
<div >
    <div class="col-md-6 form-group">
        <label for="from_date">From:</label>
        <input type="text" class="form-control" limit-to="250" data-date-format="yyyy-mm-dd"  data-date-end-date="{{ date('Y-m-d') }}" required id="from_date" name="from_date" ng-model="training.From"/>
    </div>
    <div class="col-md-6 form-group">
        <label for="to_date">To:</label>
        <input type="text" limit-to="250" class="form-control" data-date-format="yyyy-mm-dd"  data-date-end-date="{{ date('Y-m-d') }}" required id="to_date" ng-model="training.To" name="to_date"/>
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
<div >
    <div class="col-md-6 form-group">
        <label for="trainer">Trainer:</label>
        <input type="text" class="form-control" limit-to="250" required id="trainer" name="trainer" ng-model="training.Trainer"/>
    </div>
</div>