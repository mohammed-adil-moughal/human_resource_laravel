
<div class="container" >
    <div class="panel-heading">
         <ul class="progress-indicator">
  <li class="completed"> <span class="bubble"></span> Registration Details </li>
  <li class="completed"> <span class="bubble"></span> Delegates Attending</li>
  <li> <span class="bubble"></span> Proforma Invoice </li>
  <li> <span class="bubble"></span> Payment </li>
 
</ul>
    </div >
    <div >
        <form ng-submit="postevent();" onsubmit="return confirm('Are you sure you want to proceed?')">
        <table class="table  table-responsive">
            <tr>
                <th>Member No</th>
                 <th>Names</th>
                <th>ID Number</th>
                <th>KRA_PIN</th>
                <th>Mobile</th>
                <th>E-mail</th>
               
                <th></th>
            </tr>
            
            <tr ng-repeat="x in attendees">
                <td><div class="form-group has-errors"> <input required ng-blur="getMember(x.Member_No, x)" ng-model="x.Member_No" class="form-control" ng-disabled="!x.is_member || x.disabled" type="text" placeholder="Member_Id"></div></td>
                <td><div class="form-group"><input required ng-model="x.Names" class="form-control"type="text" placeholder="Names" ng-disabled="x.disabled"></div></td>
                <td><div class="form-group" ><input required ng-model="x.ID_Number" class="form-control text-danger" type="number" placeholder="ID_Number" ng-disabled="x.disabled"></div></td>
                <td><div class="form-group" ><input required ng-model="x.PIN_Registration_No" class="form-control text-danger" type="text"placeholder="KRA_PIN" ng-disabled="x.disabled"></div></td>

                <td><div class="form-group"><input required ng-model="x.Phone_No" class="form-control" type="text" placeholder="Phone_No" ng-disabled="x.disabled"></div></td>
                <td><div class="form-group"><input required ng-model="x.E_mail" class="form-control" type="email" placeholder="E_mail" ng-disabled="x.disabled"></div></td>
                
               <td><span ng-click="removeAttendee($index)" class="fa fa-times-circle-o" style="font-size: 30px;color: red"></span></td>
            </tr>
            
        </table>
            
             <div >


        </div>
        <div  class="row">
            <a class="btn btn-primary" ng-click="addAttendee(false)"><span class="fa fa-user-times" > </span> Add Non_member</a>
            <a class="btn btn-info" ng-click="addAttendee(true)"><span class="fa fa-user-plus"></span> Add Member</a>
        </div>
        <div class='row'>
            <div class="col-md-6">

               
            </div>
            <div class="col-md-6">


                <div style="float: right;margin-top: 2%" >

                    <div  class="form-group" style="margin-left: 1%">
                        <button class="btn btn-success" type="submit" >Generate Proforma Invoice <span class="glyphicon glyphicon-arrow-right"></span></button>
                    </div>
                </div>
            </div>
        </div>

        </form>
         <div  class="form-group">
                    <div style="margin-top: 2%" >
                        <div  class="form-group">
                            <button class="btn btn-danger" ng-click="getView('registration_form_1')">Back <span class="glyphicon glyphicon-arrow-left"></span></button>
                        </div>

                    </div>
                </div>

    </div>