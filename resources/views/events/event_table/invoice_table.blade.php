
<table style=" border: 1px solid black;border-style: groove "class="table table-responsive">
           
                
                    
                <tr style=" border: 1px solid black;border-style: groove">
                <th>Names</th>
                <th>Member_No</th>
                <th>Mobile</th>
                <th style="text-transform: uppercase">Cost ( {{$currency}} )</th>
                <th>Vat</th>
                </tr>
                 @foreach($delegates->Delegates as $x)
               
                <tr style=" border: 1px solid black;border-style: groove">
                    <td>{{$x->Names}}</td>
                <td>{{$x->Member_No}}</td>
                <td>{{$x->Mobile}}</td>
                <td><?php echo number_format($x->Cost, 2);?></td>
                <td>15%</td>
                </tr>
                
                
                
                @endforeach
                <tr>
                    <th style="text-transform: uppercase">Gross Total ( {{$currency}} )</th>
                    <th></th>
                    <th></th>
                    <th><?php echo number_format($total, 2);?></th>
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
                    <th><?php  $net=$total; echo number_format($net, 2);?></th>
                    <th></th>
                </tr>
               
        </table>
 <a href="{{url($download)}}" style="color: greenyellow">CLICK here to DOWNLOAD invoice</a>
                <a href="{{url($cancel)}}" style="color: red">CLICK here to CANCEL booking</a>