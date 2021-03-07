
<div class="container" ng-init="event_id = '{{ Crypt::encrypt($delegates->id) }}'" >
    <div class="panel-heading">
       <ul class="progress-indicator">
  <li class="completed"> <span class="bubble"></span> Registration Details </li>
  <li class="completed"> <span class="bubble"></span> Delegates Attending</li>
  <li class="completed"> <span class="bubble"></span> Proforma Invoice </li>
  <li> <span class="bubble"></span> Payment </li>
 
</ul>
    </div >
    <div >
        <table class="table table-responsive">
           
                
                    
                <tr>
                <th>Names</th>
                <th>Member_No</th>
                <th>Mobile</th>
                <th style="text-transform: uppercase">Cost ( {{$currency}} )</th>
                <th>Vat</th>
                </tr>
                 @foreach($delegates->Delegates as $x)
               
                <tr><td>{{$x->Names}}</td>
                <td>{{$x->Member_No}}</td>
                <td>{{$x->Mobile}}</td>
                <td><?php echo number_format($x->Cost, 2);?></td>
                <td></td>
                </tr>
                
                
                
                @endforeach
                <tr>
                    <th style="text-transform: uppercase">Gross Total ( {{$currency}} )</th>
                    <th></th>
                    <th></th>
                    <th><?php echo number_format($delegates->Gross_total, 2);?></th>
                    <th></th>
                </tr>
                  <tr>
                    <th style="text-transform: uppercase">Vat %</th>
                    <th></th>
                    <th></th>
                    <th>16%</th>
                    <th></th>
                </tr>
                 <tr>
                    <th style="text-transform: uppercase">Net Total( {{$currency}} )</th>
                    <th></th>
                    <th></th>
                    <th><?php  ; echo number_format($delegates->Net_total, 2);?></th>
                    <th></th>
                </tr>
        </table>
        <div >


        </div>
        
        <div class='row'>
            <div class="col-md-6">

                <div  class="form-group">
                    <div style="margin-top: 2%" >
                        <div ng-show="type === 'Company' "  class="form-group col-md-2" style="margin-left:">
                                                <button class="btn btn-danger" ng-click="getView('registration_form_2')">Back <span class="glyphicon glyphicon-arrow-left"></span></button>

                    </div>
                    <div ng-show="type !== 'Company'"  class="form-group col-md-2" style="margin-left: 20%">
                                               <button class="btn btn-danger" ng-click="getView('registration_form_1')">Back <span class="glyphicon glyphicon-arrow-left"></span></button>

                    </div>

                    </div>
                   
                </div>
            </div>
            <div class="col-md-6">


                <div style="float: right;margin-top: 2%" >

                    <div  class="form-group" style="margin-left: 1%">
                        <button class="btn btn-success" ng-click="getView('payment_info')">Proceed  <span class="glyphicon glyphicon-arrow-right"></span></button>
                    </div>
                </div>
            </div>
        </div>
<!--        <a href="{{ url('events/invoicepdf') }}/{{ $delegates->id }}" target="_blank">Print Invoice</a>-->

    </div>