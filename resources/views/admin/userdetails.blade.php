@extends('layouts.admin')
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

                            <li class="active">Users Details</li>

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
            <strong class="card-title">Users Details</strong>

        </div>
        <div class="card-body">


        </div>
        <div class="card-body">
            <div class="row">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">
                        #ID
                    </label>
                </div>
                <div class="col-12">
                    <small class="form-text text-muted">
                        {{  $user->id }}
                    </small>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">
                        Name
                    </label>
                </div>
                <div class="col-12">
                    <small class="form-text text-muted">
                        {{  $user->name }}
                    </small>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">
                        email
                    </label>
                </div>
                <div class="col-12">
                    <small class="form-text text-muted">
                        {{  $user->email }}
                    </small>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>



<div class="content">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Reported Cases</strong>

        </div>
        <div class="card-body">


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Crime Type</th>
                        <th scope="col">Location</th>
                        <th scope="col"> Details</th>
                        <th scope="col"> Date</th>
                        <th scope="col"> action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count=1;
                    @endphp
                    @foreach ($user->reports as $report)

                    <tr>
                        <th scope="row">{{$count}}</th>
                        <td>{{$report->user->name}}</td>
                        <td>{{$report->crime->name}}</td>
                        <td>{{$report->location}}</td>
                        <td>{{ Str::limit($report->details, 30, $end='...')  }}</td>
                        <td>{{\Carbon\Carbon::parse($report->created_at)->diffForhumans() }}</td>
                        <td><a class="btn btn-success" href="/admincrimereportshow/{{  $report->id}} "> View Details</a>
                        </td>

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


<div class="content">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Identified Suspects</strong>
        </div>
        <div class="table-stats order-table ov-h">
            <table class="table ">
                <thead>
                    <tr>
                        <th class="serial">#</th>
                        <th class="avatar">Avatar</th>
                        <th> suspect name</th>
                        <th>Identifier name</th>
                        <th>Last Seen</th>
                        <th>details</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count=1;
                    @endphp
                    @foreach ($user->identifications as $identification)
                    <tr>
                        <td class="serial">{{$count}}</td>
                        <td class="avatar">
                            <div class="round-img">
                                <a href="#"><img class="rounded-circle"
                                        src="/uploads/{{$identification->criminal->pic}}" alt=""></a>
                            </div>
                        </td>
                        <td> {{ $identification->criminal->name }} </td>
                        <td> <span class="name">{{$identification->user->name}}</span> </td>
                        <td> <span class="product">{{$identification->last_seen}}</span> </td>
                        <td><span class="">{{  Str::limit($identification->details, 30, $end='...')   }}</span></td>
                        <td>
                            <a href="/adminidentifiedsuspect/{{ $identification->id }}" class="btn btn-success">view</a>
                        </td>
                    </tr>
                    @php
                    $count++;
                    @endphp
                    @endforeach




                </tbody>
            </table>
        </div> <!-- /.table-stats -->
    </div>
</div>




@endsection