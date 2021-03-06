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

                            <li class="active">Identified Suspects</li>

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
                    @foreach ($identifications as $identification)
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
                            <a href="/identifiedsuspect/{{ $identification->id }}" class="btn btn-success">view</a>
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