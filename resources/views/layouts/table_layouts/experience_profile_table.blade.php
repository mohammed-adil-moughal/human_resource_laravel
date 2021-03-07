<table class="table">
    <thead class="thead-inverse">
    <tr>
        <th>#</th>
        <th>Position</th>
        <th>Firm</th>
        <th>Tasks</th>
        <th>From</th>
        <th>To</th>
        <th>Actions</th>
        <!--
        <th>Contact Person</th>
        <th>Contact Email</th>
        <th>Contact Phone</th>
        <th>Contact Title</th>
        -->
    </tr>
    </thead>
    <tbody>
    <?php $count = 0; ?>
    @foreach($data['member_bio_data']->MemberExperiences as $x)
        <tr>
            <th scope="row"><?php echo $count = $count+1; ?></th>
            <td>{{ $x->Position_Held }}</td>
            <td>{{ $x->Name_of_Firm }}</td>
            <td>{{ $x->Tasks_Performed  }}</td>
            <td>{{ $x->From_Date  }}</td>
            <td>{{ $x->To_Date  }}</td>
            <td><a href="#" ng-click="edit('{{ $x->id }}','experiences','experience' )"><span class="glyphicon glyphicon-edit"></span> </a></td>
        </tr>
    @endforeach

    </tbody>
</table>
