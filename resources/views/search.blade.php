@extends('layouts.master')
@section('content')
    @include('layouts.search')
    <div class="col-md-12 padding-0">
        @if($data)
        <div class="col-md-12 padding-0">
            <h3>Results for "{{ $query }}":</h3>
        </div>

        <div class="col-md-12 padding-0">
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Member No</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $x)
                    <tr>
                        <td><a href="{{ url('members/') }}/{{ $x->id }}">
                            {{ @$x->Other_Names.' '.@$x->Surname }}
                            </a>
                        </td>
                        <td>{{ $x->Member_No or '--'}}</td>
                        <td> <span class="status status-{{ @$x->MemberStatus->description }} text-left">{{ $x->MemberStatus->description or "--"}}</span></td>
                       
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
            <?php
            $current = $data->currentPage();
            $pages = $data->lastPage();
            $links = array();

            if ($pages > 3) {
                // this specifies the range of pages we want to show in the middle
                $min = max($current - 2, 2);
                $max = min($current + 2, $pages - 1);

                // we always show the first page
                $links[] = "1";

                // we're more than one space away from the beginning, so we need a separator
                if ($min > 2) {
                    $links[] = "...";
                }

                // generate the middle numbers
                for ($i = $min; $i < $max + 1; $i++) {
                    $links[] = "$i";
                }

                // we're more than one space away from the end, so we need a separator
                if ($max < $pages - 1) {
                    $links[] = "...";
                }
                // we always show the last page
                $links[] = "$pages";
            }
            else{
                // we must special-case three or less, because the above logic won't work
                for($i = 0; $i < $pages; $i++)
                {
                    $links[] = "".($i+1)."";
                }
            }
            ?>
        <div class="col-md-12">
            <div class="text-center">
                <ul class="pagination text-center" >
                    @foreach($links as $link)
                        <li class="{{ $data->currentPage() == $link ? "active": "" }}"><a  href="{{ url("search") }}?q={{ $query }}&page={{ $link }}">{{  $link }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>
@stop

@section('title')Search @stop