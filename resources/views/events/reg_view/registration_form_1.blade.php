<div class="panel-heading">
 
    <ul class="progress-indicator">
  <li class="completed"> <span class="bubble"></span> Registration Details </li>
  <li > <span class="bubble"></span> Delegates Attending</li>
  <li> <span class="bubble"></span> Proforma Invoice </li>
  <li> <span class="bubble"></span> Payment </li>
 
</ul>
</div >
<div class="panel-body">
    <form class="form-group"  ng-submit="getView('registration_form_2')" ng-init="setType('{{ @$data['type'] }}')">

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class='row'>
            <div class="col-md-6">          
                <input type="checkbox" name="selfsposored"  ng-model="self"> Self Sponsored<br>
               
                @if(!$data['member']->Parent_Institution_Customer)
                 <div  class="form-group">
                    Company Name
                   
                    <input  ng-disabled="self"  class="form-control" type="text" name="Names" ng-init="event_entry.Names" id="" ng-model="event_entry.Names" required>
                </div>
                @else
                 <div  class="form-group">
                    Company Name
                   
                    <input  class="form-control" type="text" name="Names" ng-init="event_entry.Names='{{ $data['member']->Parent_Institution_Customer }}'" id="" ng-model="event_entry.Names">
                </div>
                @endif
               
                
                @if(!$data['member']->Address)
                   <div  class="form-group">
                    Address
                    <input class="form-control" type="text" name="Address" id="" ng-init="event_entry.Address" ng-model="event_entry.Address">
                </div>
                @else
                   <div  class="form-group">
                    Address
                    <input class="form-control" type="text" name="Address" id="" ng-init="event_entry.Address='{{ $data['member']->Address }}'" ng-model="event_entry.Address">
                </div>
                @endif
               
             @if(!$data['member']->Post_Code )
              <div  class="form-group">
                    Postal_Code 
                    <input class="form-control" type="text" name="Post_Code" id="" ng-init="event_entry.Post_Code"  ng-model="event_entry.Post_Code">
                </div>
             @else
              <div  class="form-group">
                    Postal_Code 
                    <input class="form-control" type="text" name="Post_Code" id="" ng-init="event_entry.Post_Code='{{ $data['member']->Post_Code }}'"  ng-model="event_entry.Post_Code">
                </div>
             @endif
                
               
             @if(!$data['member']->City)
             <div  class="form-group">
                    Town/City
                    <input class="form-control" type="text" name="City" id="" ng-init="event_entry.City" ng-model="event_entry.City">
                </div>
             @else
             <div  class="form-group">
                    Town/City
                    <input class="form-control" type="text" name="City" id="" ng-init="event_entry.City='{{ $data['member']->City }}'" ng-model="event_entry.City">
                </div>
             @endif
                

            </div>
            <div class="col-md-6">
               
                <div  class="form-group">
                    Contact Person
                    <input required class="form-control" type="text" name="Contact_Person" id="" ng-model="event_entry.Contact_Person">
                    <div style="margin-top: 2%" >
                       

                    </div>
                </div>
                
                @if(!$data['member']->Mobile_No)
                 <div  class="form-group">
                    Phone
                    <input required class="form-control" type="text" name="Phone_No" id="" ng-init="event_entry.Phone_No" ng-model="event_entry.Phone_No">
                </div>
                
                @else
                 <div  class="form-group">
                    Phone 
                    <input required class="form-control" type="text" name="Phone_No" id="" ng-init="event_entry.Phone_No= '{{ $data['member']->Mobile_No }}'" ng-model="event_entry.Phone_No">
                </div>
                
                @endif
               
                
                @if(! $data['member']->E_mail)
                <div  class="form-group">
                    Contact Email
                    <input required class="form-control" required type="email" name="E_mail"  ng-init="event_entry.E_mail" id="" ng-model="event_entry.E_mail">
                </div>
                @else
                <div  class="form-group">
                    Contact Email
                    <input required class="form-control" required type="email" name="E_mail"  ng-init="event_entry.E_mail='{{ $data['member']->E_mail}}'" id="" ng-model="event_entry.E_mail">
                </div>
                @endif
                
                @if(!$data['member']->PIN_Registration_No)
                 <div  class="form-group">
                  KRA REGISTRATION NUMBER
                    <input style="text-transform: uppercase" required class="form-control" required type="text" name="PIN" id="" ng-init="event_entry.PIN_Registration_No" ng-model="event_entry.PIN_Registration_No">
                </div>
                @else
                 <div  class="form-group">
                  KRA REGISTRATION NUMBER
                    <input style="text-transform: uppercase" required class="form-control" required type="text" name="PIN" id="" ng-init="event_entry.PIN_Registration_No='{{ $data['member']->PIN_Registration_No }}'" ng-model="event_entry.PIN_Registration_No">
                </div>
                @endif
                <div  class="form-group">
               <input style="text-transform: uppercase" required class="form-control" required type="hidden" name="Date_of_Registration" id="" ng-init="event_entry.Date_of_Registration='<?php getdate() ?>'" ng-model="event_entry.Date_of_Registration">
                </div>
               
                <div style="float: right;margin-top: 2%" >

                  
                  <div ng-show="type === 'Company' "  class="form-group col-md-2" style="margin-left:">
                        <button class="btn btn-success" type="submit" >Proceed <span class="glyphicon glyphicon-arrow-right"></span></button>
                    </div>
           
                  <div ng-show="type !== 'Company'"  class="form-group col-md-2" style="margin-left: 20%">
                        <button class="btn btn-danger" ng-click="inoviceskip = true" >Proceed to Invoice <span class="glyphicon glyphicon-arrow-right"></span></button>
                   </div>
                </div>
            </div>
        </div>
    </form>
</div>
