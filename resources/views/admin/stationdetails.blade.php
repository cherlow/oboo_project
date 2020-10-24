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

                            <li class="active">StationDetails</li>

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
            <strong class="card-title">Station</strong>

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
                        {{  $station->id }}
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
                        {{  $station->name }}
                    </small>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">
                        Location
                    </label>
                </div>
                <div class="col-12">
                    <small class="form-text text-muted">
                        {{  $station->location }}
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
            <strong class="card-title">Suspect Records</strong>

        </div>
        <div class="card-body">



            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th class="avatar">Avatar</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Police Station</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $crime=1;
                        @endphp
                        @foreach ($station->criminals as $criminal)

                        <tr>
                            <td class="serial">{{$crime}}</td>
                            <td class="avatar">
                                <div class="round-img">
                                    <a href="#"><img class="rounded-circle" src="/uploads/{{$criminal->pic}}"
                                            alt=""></a>
                                </div>
                            </td>
                            <td> {{ $criminal->national_id }} </td>
                            <td> <span class="name">{{$criminal->name}}</span> </td>
                            <td> <span class="product">{{$criminal->age}}</span> </td>
                            <td><span class="">{{$criminal->gender}}</span></td>
                            <td><span class="">{{$criminal->station->name}}</span></td>
                            <td>{{\Carbon\Carbon::parse($criminal->created_at)->diffForhumans() }}</td>

                            <td>
                                <a class="btn btn-success" href="/wanted/{{ $criminal->id }}"> View Details</a>
                            </td>
                        </tr>
                        @php
                        $crime++;
                        @endphp
                        @endforeach


                    </tbody>
                </table>
            </div> <!-- /.table-stats -->







        </div>
    </div>
</div>


<div class="content">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Police Officers</strong>

        </div>
        <div class="card-body">






            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th class="avatar">Avatar</th>
                            <th>Police Id</th>
                            <th>Name</th>
                            <th>Station</th>
                            <th>Email</th>
                            {{-- <th>Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count=1;
                        @endphp
                        @foreach ( $station->users->where("role",2) as $police)

                        <tr>
                            <td class="serial">{{$count}}</td>
                            <td class="avatar">
                                <div class="round-img">
                                    <a href="#"><img class="rounded-circle" src="/uploads/{{$police->cover_pic}}"
                                            alt=""></a>
                                </div>
                            </td>
                            <td> {{ $police->police_number }} </td>
                            <td> <span class="name">{{$police->name}}</span> </td>
                            <td> <span class="product">{{$police->station->name}}</span> </td>
                            <td>{{$police->email}}</td>
                            {{-- <td>
                                <a href="#" class="btn btn-success">View</a>
                            </td> --}}
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
                    @foreach ($station->reports as $report)

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



@endsection