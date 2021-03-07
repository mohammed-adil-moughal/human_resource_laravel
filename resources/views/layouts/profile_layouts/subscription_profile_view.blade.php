<table class="table table-responsive">
    <thead class="thead-inverse">
    <tr>
        <th>#</th>
        <th>Status</th>
        <th>Type</th>
        <th>From</th>
        <th>To</th>
        <th>Created</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($subscription_periods as $x)
    <tr >
        <th scope="row">1</th>
        <td><span class="status-grey status">Ended</span></td>
        <td>{{ $x->Description }}</td>
        <td>{{ date_format(date_create($x->Start_Date), 'Y-m-d') }}</td>
        <td>{{ date_format(date_create($x->End_Date), 'Y-m-d') }}</td>
        <td>2015-09-21</td>
        <td><?php
                if($x->Current)
                echo '<a href="#" class="btn btn-success">Renew</a>';
            ?>
        </td>
    </tr>
    @endforeach
    {{----}}
    {{--<tr >--}}
        {{--<th scope="row">2</th>--}}
        {{--<td><span class="status-grey status">Ended</span></td>--}}
        {{--<td>Practicing Member</td>--}}
        {{--<td>2016-09-09</td>--}}
        {{--<td>2017-09-08</td>--}}
        {{--<td>2015-09-21</td>--}}
    {{--</tr>--}}
    {{--<tr >--}}
        {{--<th scope="row">3</th>--}}
        {{--<td><span class="status-green status">Active</span></td>--}}
        {{--<td>Practicing Member</td>--}}
        {{--<td>2016-09-09</td>--}}
        {{--<td>2017-09-08</td>--}}
        {{--<td>2015-09-21</td>--}}
    {{--</tr>--}}
    {{--</tbody>--}}
</table>
<!--<div ng-hide="memberData.training.length > 0" class="gray-lighter gray-light-font no-data text-center ">No Previous Training</div>-->