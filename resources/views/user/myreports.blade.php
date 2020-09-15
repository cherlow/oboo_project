@extends('layouts.user')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>

                            <li class="active">My Reported Crimes</li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Reported Crimes</strong>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>

                        <th scope="col">Crime Type</th>
                        <th scope="col">Location</th>
                        <th scope="col"> Details</th>
                        <th scope="col"> Date</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count=1;
                    @endphp
                    @foreach ($reports as $report)

                    <tr>
                        <th scope="row">{{$count}}</th>

                        <td>{{$report->crime->name}}</td>
                        <td>{{$report->location}}</td>
                        <td>{{$report->details}}</td>
                        <td>{{\Carbon\Carbon::parse($report->created_at)->diffForhumans() }}</td>
                    </tr>
                    @php
                    $count++;
                    @endphp
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection