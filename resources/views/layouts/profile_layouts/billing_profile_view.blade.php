<table class="table table-responsive">
    <thead class="thead-inverse">
    <tr>
        <th>Entry Number</th>
        <th>Customer Ledger Entry No</th>
        <th>Old Value</th>
        <th>New Value</th>
        <th>Date</th>
        <th>Type</th>
        <th>Reason</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data['billings'] as $x)
    <tr >
        <th scope="row">{{ @$x->Entry_No  }}</th>
        <td>{{ @$x->Customer_Ledger_Entry_No }}</td>
        <td>{{ @$x->Old_Value  }}</td>
        <td>{{ @$x->New_Value }}</td>
        <td>{{ date_format(date_create($x->Date), 'Y/m/d')  }}</td>
        <td>{{ @$x->BillingType->Description  }}</td>
        <td>{{ @$x->Reason  }}</td>
        <td></td>
    </tr>
    @endforeach
    </tbody>
</table>