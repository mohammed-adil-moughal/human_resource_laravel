<table class="table">
    <thead class="thead-inverse">
    <tr>
        <th>#</th>
        <th>Certificate</th>
        <th>Institute</th>
        <th>Grade/Level</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Attachment</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $count = 0; ?>
    @foreach($data['member_bio_data']->AcademicQualifications as $x)
        <tr>
            <th scope="row"><?php echo $count = $count+1; ?></th>
            <td>{{ @$x->Qualification->description }}</td>
            <td>{{  @$x->Institution }}</td>
            <td>{{ @$x->GradeLevel->Name  }}</td>
            <td>{{ @$x->From_Date  }}</td>
            <td>{{ @$x->To_Date  }}</td>
            <td><a href="{{ URL::to('/academic/getAttachment')."/".$x->id }}">{{ $x->attachment}}</a></td>
            <td><a href="#" ng-click="edit('{{ $x->id }}','academics','academic' )"><span class="glyphicon glyphicon-edit"></span> </a></td>
        </tr>
    @endforeach

    </tbody>
</table>