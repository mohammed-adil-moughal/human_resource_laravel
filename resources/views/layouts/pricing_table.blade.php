<div class="row">
    <?php $index=0; ?>
    @foreach($data['membertypes'] as $membertype)
        @if($membertype->code != 'DECLINE')
        <div class="col-sm-3">
            <div class=" text-center pricing pricing-{{ $index }}">
                <h3 class="price-type price-type-{{$index}}">{{ $membertype->description }}</h3>
                <div class="price-container price-container-{{$index}} text-center" >Ksh. {{ $membertype->application_fee }}</div>
                <div class="price-details-container text-center" >
                    An annual fee of Ksh. {{ $membertype->SubscriptionFee }}.
                </div>

                <div class="text-muted">
                    {{ $membertype->Write_Up }}
                </div>
                <div class="price-submit-container text-center" ><a class="btn btn-proceed btn-proceed-npm" href="{{ URL::to('signup') }}?membership_type={{ $membertype->code }}"> Proceed <span class="glyphicon glyphicon-log-in"/></a></div>
            </div>
        </div>
        <?php $index++; ?>
        @endif
    @endforeach
    <!--
    <div class="col-sm-4">
        <div class=" text-center pricing pricing-npm">
            <h3 class="price-type price-type-npm">Non Practicing Member</h3>
            <div class="price-container price-container-npm text-center" >Ksh. 12000 </div>
            <div class="price-details-container text-center" >
                <ul>
                    <li>Similarly, create split button dropdowns with the same markup changes, only with a separate button.</li>
                    <li>Button dropdowns work with buttons of all sizes.</li>
                    <li>Extend form controls by adding text or buttons before, after, or on both sides of any text-based.</li>
                </ul>
            </div>
            <div class="price-submit-container text-center" ><a class="btn btn-proceed btn-proceed-npm" href="{{ URL::to('signup') }}?membership_type=npm"> Proceed <span class="glyphicon glyphicon-ok-circle"/></a></div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class=" text-center pricing pricing-s">
            <h3 class="price-type price-type-s">Student</h3>
            <div class="price-container price-container-s text-center">Ksh. 1500</div>
            <div class="price-details-container text-center" >
                <ul>
                    <li>Similarly, create split button dropdowns with the same markup changes, only with a separate button.</li>
                    <li>Button dropdowns work with buttons of all sizes.</li>
                    <li>Extend form controls by adding text or buttons before, after, or on both sides of any text-based.</li>
                </ul>
            </div>
            <div class="price-submit-container text-center" ><a class="btn btn-proceed btn-proceed-s" href="{{ URL::to('signup') }}?membership_type=s"> Proceed <span class="glyphicon glyphicon-ok-circle"/></a></div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="text-center pricing pricing-pm">
            <h3 class="price-type price-type-pm">Practicing Member</h3>
            <div class="price-container price-container-pm text-center">Ksh. 7500</div>
            <div class="price-details-container text-center" >
                <ul>
                    <li>Similarly, create split button dropdowns with the same markup changes, only with a separate button.</li>
                    <li>Button dropdowns work with buttons of all sizes.</li>
                    <li>Extend form controls by adding text or buttons before, after, or on both sides of any text-based.</li>
                </ul>
            </div>
            <div class="price-submit-container text-center" ><a class="btn btn-proceed btn-proceed-pm" href="{{ URL::to('signup') }}?membership_type=pm"> Proceed <span class="glyphicon glyphicon-ok-circle"/> </a> </div>
        </div>
    </div>
    -->
</div>