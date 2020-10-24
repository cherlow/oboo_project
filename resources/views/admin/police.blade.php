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

                            <li class="active">Police</li>

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
            <strong class="card-title">Police Officers</strong>
            <button class=" btn btn-danger float-right" data-toggle="modal" data-target="#mediumModal"> New
                Police Officer</button>
        </div>
        <div class="card-body">


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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count=1;
                        @endphp
                        @foreach ($polices as $police)

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
                            <td>

                                <button class="btn btn-success" data-toggle="modal"
                                    data-target="#l{{ $police->id }}mediumModal">Transfer</button>

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
</div>

{{-- my modals here --}}

<div class="modal fade " id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">New Police Officer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">

                    <div class="card-body card-block">
                        <form id="station-form" action="police" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group"><label for="company" class=" form-control-label">Name</label><input
                                    type="text" name="name" id="company" placeholder="" class="form-control" required>
                            </div>
                            <div class="form-group"><label for="vat" class=" form-control-label">Email</label><input
                                    type="email" name="email" id="vat" placeholder="" class="form-control" required>
                            </div>
                            <div class="form-group"><label for="vat" class=" form-control-label">Police Id</label><input
                                    type="number" name="id" id="vat" placeholder="" class="form-control" required>
                            </div>
                            <div class="form-group"><label for="vat" class=" form-control-label">Station</label>
                                <select id="select" class="form-control" name="station" required>
                                    @foreach ($stations as $station)

                                    <option value="{{$station->id}}">{{$station->name}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group"><label for="vat" class=" form-control-label">Image</label><input
                                    type="file" name="image" id="vat" placeholder="" class="form-control" required>
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





{{-- loop modals here --}}


@foreach ($polices as $police)

<div class="modal fade " id="l{{ $police->id }}mediumModal" tabindex="-1" role="dialog"
    aria-labelledby="mediumModalLabel" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Transfer {{ $police->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">

                    <div class="card-body card-block">
                        <form id="station-form{{ $police->id }}" action="/transferpolice/{{ $police->id }}"
                            method="post">
                            @csrf



                            <div class="form-group"><label for="vat" class=" form-control-label">Station</label>
                                <select id="select" class="form-control" name="station" required>
                                    @foreach ($stations as $station)

                                    <option value="{{$station->id}}">{{$station->name}}</option>
                                    @endforeach

                                </select>
                            </div>



                        </form>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="event.preventDefault();
                document.getElementById('station-form{{ $police->id }}').submit();"
                    class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection