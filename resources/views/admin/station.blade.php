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

                            <li class="active">Stations</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div>
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Police Stations</strong>
                <button class=" btn btn-danger float-right" data-toggle="modal" data-target="#mediumModal"> New
                    Station</button>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Number of Police</th>
                            {{-- <th scope="col"></th> --}}
                            <th scope="col">Reported Cases</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count=1;
                        @endphp
                        @foreach ($stations as $station)

                        <tr>
                            <th scope="row">{{$count}}</th>
                            <td>{{$station->name}}</td>
                            <td>{{$station->location}}</td>
                            <td>{{count($station->users->where('role',2))}}</td>
                            {{-- <td>{{count($station->users->where('role',3))}}</td> --}}
                            <td>{{count($station->reports)}}</td>
                            <td>
                                <a href="/stations/{{ $station->id }}" class="btn btn-success">View</a>
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
</div>



{{-- my modals go in here --}}

<div class="modal fade " id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">New Station</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">

                    <div class="card-body card-block">
                        <form id="station-form" action="{{url('/stationpost')}}" method="post">
                            @csrf
                            <div class="form-group"><label for="company" class=" form-control-label">Name</label><input
                                    type="text" name="name" id="company" placeholder="e.g Nchiru police station"
                                    class="form-control" required></div>
                            <div class="form-group"><label for="vat" class=" form-control-label">Location</label><input
                                    type="text" name="location" id="vat" placeholder="e.g Nchiru" class="form-control"
                                    required>
                            </div>

                        </form>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="event.preventDefault();
                document.getElementById('station-form').submit();" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

{{-- edit modals --}}

@foreach ($stations as $station)

<div class="modal fade " id="edit{{$station->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit {{$station->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">

                    <div class="card-body card-block">
                        <form id="station-form{{$station->id}}" action="/stationupdate/{{$station->id}}" method="post">
                            @csrf
                            <div class="form-group"><label for="company" class=" form-control-label">Name</label><input
                                    type="text" name="name" id="company" value="{{$station->name}}"
                                    placeholder="e.g Nchiru police station" class="form-control" required></div>
                            <div class="form-group"><label for="vat" class=" form-control-label">Location</label><input
                                    type="text" name="location" id="vat" value="{{$station->location}}"
                                    placeholder="e.g Nchiru" class="form-control" required>
                            </div>

                        </form>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="event.preventDefault();
            document.getElementById('station-form{{$station->id}}').submit();" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection