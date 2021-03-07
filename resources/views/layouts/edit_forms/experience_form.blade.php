<div >
    <div class="col-md-6 form-group">
        <label for="position_held">Position Held:</label>
        <input type="text" class="form-control" id="position_held" required name="position_held" ng-model="experience.Position_Held"/>
    </div>
    {{--<div class="col-md-6 form-group">--}}
        {{--<label for="sector">Sector:</label>--}}
        {{--<input class="form-control" id="sector" list="sectors" required name="sector" ng-model="experience.Sector">--}}
        {{--<datalist id="sectors">--}}
            {{--@foreach($data['sectors'] as $x)--}}
                {{--<option value="{{$x->code}}">{{$x->description }}</option>--}}
            {{--@endforeach--}}
        {{--</datalist>--}}
    {{--</div>--}}

</div>
<div >
    <div  class="col-md-12 form-group">
        <label for="firm_name">Firm Name:</label>
        <input type="text" class="form-control" id="firm_name" limit-to="250" required ng-model="experience.Name_of_Firm" name="firm_name"/>
    </div>
</div>
<div >
    <div class="col-md-12 form-group">
        <label for="tasks">Tasks Performed:</label>
        <textarea class="form-control" limit-to="250" id="tasks" name="tasks" required ng-model="experience.Tasks_Performed"></textarea>
    </div>
</div>
<div >
    <div class="col-md-6 form-group">
        <label for="from_date">Start Date:</label>
        <input type="text" class="form-control" limit-to="250" data-date-format="yyyy-mm-dd"  data-date-end-date="{{ date('Y-m-d') }}"  id="from_date" required name="from_date" ng-model="experience.From_Date"/>
    </div>
    <div class="col-md-6 form-group">
        <label for="to_date">End Date: <span style="margin-right: 4px;" class="text-muted small float-right">Ongoing<input type="checkbox" ng-model="ex_ongoing"></span></label>
    <input type="text" class="form-control" limit-to="250" data-date-format="yyyy-mm-dd" ng-disabled="ex_ongoing"  data-date-end-date="{{ date('Y-m-d') }}"  id="to_date" required name="to_date" ng-model="experience.To_Date"/>
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
<hr class="separator col-md-12"/>
<div >
    <div class="col-md-6 form-group">
        <label for="contact_person">Contact Person:</label>
        <input type="text" class="form-control" limit-to="250" id="contact_person" name="contact_person" ng-model="experience.Contact_Person"/>
    </div>
    <div  class="col-md-6 form-group">
        <label for="contact_title">Contact Title:</label>
        <input type="text" class="form-control" limit-to="250" id="contact_title" ng-model="experience.Contact_Title" name="contact_title"/>
    </div>
</div>
<div >
    <div class="col-md-6 form-group">
        <label for="contact_phone">Contact Phone Number:</label>
        <input type="text" class="form-control" limit-to="250" id="contact_phone" name="contact_phone" ng-model="experience.Contact_Phone_No"/>
    </div>
    <div  class="col-md-6 form-group">
        <label for="contact_email">Contact Email:</label>
        <input type="email" class="form-control" limit-to="250" id="contact_email" ng-model="experience.Contact_Email" name="Contact_Email"/>
    </div>
</div>