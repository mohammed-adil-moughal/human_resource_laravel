@extends('layouts.base_profile_view')
@section('profile-content')

        <table class="table table-responsive">
            <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>User ID</th>
                <th>Period</th>
                <th>Card Printed</th>
                <th>Card Print Date</th>
                <th>Card Print UserID</th>
                <th>Card Collected</th>
                <th>Card Collection Date</th>
                <th>Card Collected By</th>
            </tr>
            </thead>
            <tbody>
            <?php $count = 1; ?>
            @foreach($data["member_bio_data"]->MemberSubscriptions as $x)
                <tr >
                    <th scope="row">{{ $count }}</th>
                    <td>{{ $x->User_ID }}</td>
                    <td>{{ $x->Subscription_Period }}</td>
                    <td>{{ $x->Card_Printed }}</td>
                    <td>{{ date_format(date_create($x->Card_Print_Date), 'Y-m-d') }}</td>
                    <td>{{ $x->Card_Print_UserID }}</td>
                    <td>{{ $x->Card_Collected }}</td>
                    <td>{{ date_format(date_create($x->Card_Collection_Date), 'Y-m-d') }}</td>
                    <td>{{ $x->Card_Collected_By }}</td>
                </tr>
            <?php $count++; ?>
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
@stop