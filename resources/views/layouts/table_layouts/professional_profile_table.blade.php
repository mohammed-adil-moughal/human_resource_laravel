<table class="table">
    <thead class="thead-inverse">
    <tr>
        <th>#</th>
        <th>Registration No.</th>
        <th>Certificate</th>
        <th>Name of Body</th>
        <th>Stage</th>
        <th>Date Passed</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $count = 0; ?>
    @foreach($data['member_bio_data']->ProfQualifications as $x)
        <tr>
            <th scope="row"><?php echo $count = $count+1; ?></th>
            <td>{{ $x->Registration_No }}</td>
            <td>{{ $x->Qualification_Description }}</td>
            <td>{{ $x->Name_of_Body  }}</td>
            <td>{{ $x->Stages_Sections_Modules  }}</td>
            <td>{{ $x->Date_Passed  }}</td>
            <td>{{ $x->Description  }}</td>
            <td><a href="#" ng-click="edit('{{ $x->id }}','qualifications','prof_qualifications' )"><span class="glyphicon glyphicon-edit"></span> </a></td>
        </tr>
    @endforeach

    </tbody>
</table>
