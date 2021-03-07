@extends('layouts.master')
@section('content')
    <div class="col-md-12 text-center">
        <div class="profile-userpic col-md-12">
            <img id="profile-userpic" class="img-rounded"
                 src="{{ url('/api/member/picture')}}{{ "?no=".\Illuminate\Support\Facades\Crypt::encrypt($data->id) }}" height="200"
                 width="200" class="img-responsive" alt="">
        </div>
        <div class="col-md-12 text-muted ">
            <h1 class="h1">
                {{ $data->Surname }}, {{ $data->Other_Names }}
            </h1>
            <table style="width: 50%;margin: 0 auto;" class="table ">
                <tr >
                    <th >
                        Membership Type:
                    </th>
                    <td class=" text-uppercase">
                        {{ $data->MembershipType->description or "--"}}
                    </td>
                </tr>
                <tr >
                    <th >
                        Status:
                    </th>
                    <td class="text-uppercase">
                        <span class="status status-{{ $data->MemberStatus->description }} text-left">{{ $data->MemberStatus->description or "--"}}</span>
                    </td>
                </tr>
                <tr >
                    <th >
                        Member No:
                    </th>
                    <td class="text-uppercase">
                        {{ $data->Member_No or "--"}}
                    </td>
                </tr>

            </table>
        </div>
    </div>
@stop

@section('title'){{  $data->Other_Names." ".$data->Surname }}@stop