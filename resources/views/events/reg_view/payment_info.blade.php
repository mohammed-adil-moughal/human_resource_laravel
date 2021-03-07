<script>
    function win(url)
    {
        location.assign(url);
    }
    </script>
<div class="panel-heading">
        <ul class="progress-indicator">
  <li class="completed"> <span class="bubble"></span> Registration Details </li>
  <li class="completed"> <span class="bubble"></span> Delegates Attending</li>
  <li class="completed"> <span class="bubble"></span> Proforma Invoice </li>
  <li class="completed"> <span class="bubble"></span> Payment </li>
 
</ul>
    </div >

    <div class="panel-group col-md-12" id="accordion">
        <div class="panel panel-default">
            <a onclick="win('{{url('/events/history')}}')" style='width: 100%' class="btn btn-danger" href="{{ url('events/invoicepdf') }}/<% event_id %>" target="_blank" style="font-size: 30px"><p style="font-size: 20px">Download Proforma Invoice </p>    <span class="glyphicon glyphicon-download-alt" style="font-size: 30px"> </span></a>
            <div class="panel-heading padding-0">
                <div class="panel-title">
                    <a class="display-block padding-10" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                       <strong><span class="glyphicon glyphicon-play"></span>   M-PESA</strong></a>
                </div>
            </div>
            <div id="collapse1" class="panel-collapse collapse ">
                <div class="panel-body">
                    <div style="max-width: 300px;">
                    <img src="{{ asset('/assets/images/lipa_na_mpesa.png') }}"  class="img-responsive">
                    </div>
                    <ol>
                        <li>Go to M-PESA option on your phone</li>
                        <li>Select the Lipa Na M-PESA</li>
                        <li>Select Paybill Option option</li>
                        <li>Enter Business number <strong>722722</strong></li>
                        <li>Enter Account no. <strong>INV15179</strong></li>
                         <li>Enter the Amount</li>
                        <li>Enter your M-PESA PIN and Press Send</li>
                        <li>You will receive a confirmation SMS from M-PESA. Code </li>
                        <li>You will receive a confirmation SMS from KISM.</li>
                        <li>Click on Complete Payment Button Below to finish your payment</li>

                    </ol>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading padding-0">
                <div class="panel-title">
                    <a class="display-block padding-10" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                        <strong><span class="glyphicon glyphicon-play"></span>  PesaPal</strong></a>
                </div>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo consequat.</div>
            </div>
        </div>
       
        <div>
            
            <a class="btn btn-danger"  href="{{ url('events/finish') }}/<% event_id %>">Finish</a>
        </div>
    </div>
  