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

                            <li class="active">Users</li>

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
            <strong class="card-title">Users</strong>

        </div>
        <div class="card-body">


        </div>
        <div class="card-body">
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="serial">#</th>


                            <th>Name</th>
                            <th>Email</th>
                            <th>Reported Cases</th>
                            <th>Identified Suspects</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count=1;
                        @endphp
                        @foreach ($users as $user)

                        <tr>
                            <td class="serial">{{$count}}</td>
                            <td>{{ $user->name }}</td>
                            <td> {{$user->email }} </td>
                            <td> <span class="name">{{ count($user->reports) }}</span> </td>
                            <td> <span class="product">{{ count($user->identifications) }}</span> </td>

                            <td>

                                <a href="/userdetails/{{ $user->id }}" class="btn btn-success">view details</a>

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







@endsection