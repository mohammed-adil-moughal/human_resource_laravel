<table class="table table-responsive">
    <thead class="thead-inverse">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Organization</th>
        <th>From</th>
        <th>To</th>
        <th>Competency</th>
        <th>Hours</th>
        <th>Trainer</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $count = 0; ?>
    @foreach($data['member_bio_data']->MemberTrainings as $x)
        <tr>
            <th scope="row"><?php echo $count = $count+1; ?></th>
            <td>{{ $x->Name }}</td>
            <td>{{ $x->Organization_Company }}</td>
            <td>{{ $x->From  }}</td>
            <td>{{ $x->To  }}</td>
            <td>{{ $x->Competency  }}</td>
            <td>{{ $x->Hours_Completed  }}</td>
            <td>{{ $x->Trainer  }}</td>
            <td><a href="#" ng-click="edit('{{ $x->id }}','trainings','training' )"><span class="glyphicon glyphicon-edit"></span> </a></td>
        </tr>
    @endforeach

    </tbody>
</table>