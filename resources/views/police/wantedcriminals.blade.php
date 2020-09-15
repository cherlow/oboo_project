@extends('layouts.police')
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

                            <li class="active">Wanted Criminals</li>

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
            <strong class="card-title">Wanted Criminals</strong>
        </div>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $crime=1;
                    @endphp
                    @foreach ($criminals as $criminal)

                    <tr>
                        <td class="serial">{{$crime}}</td>
                        <td class="avatar">
                            <div class="round-img">
                                <a href="#"><img class="rounded-circle" src="/uploads/{{$criminal->pic}}" alt=""></a>
                            </div>
                        </td>
                        <td> {{ $criminal->national_id }} </td>
                        <td> <span class="name">{{$criminal->name}}</span> </td>
                        <td> <span class="product">{{$criminal->age}}</span> </td>
                        <td><span class="">{{$criminal->gender}}</span></td>
                        <td><span class="">{{$criminal->station->name}}</span></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#edit{{$criminal->id}}" class=" text-primary">
                                <i class="fa fa-edit"></i></a>
                            <a href="#" class="text-success"> <i class="fa fa-eye"></i></a>
                            <a href="#" class="text-danger"> <i class="fa fa-trash"></i></a>
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
@endsection