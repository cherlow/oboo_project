@extends('layouts.user')

@section('content')

<!-- Animated -->
<div class="content">
    <div class="animated fadeIn">


        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Wanted Suspects </h4>
                        </div>
                        <div class="card-body--">
                            <!-- /.table-stats -->

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
                                                    <a href="#"><img class="rounded-circle"
                                                            src="/uploads/{{$criminal->pic}}" alt=""></a>
                                                </div>
                                            </td>
                                            <td> {{ $criminal->national_id }} </td>
                                            <td> <span class="name">{{$criminal->name}}</span> </td>
                                            <td> <span class="product">{{$criminal->age}}</span> </td>
                                            <td><span class="">{{$criminal->gender}}</span></td>
                                            <td><span class="">{{$criminal->station->name}}</span></td>
                                            <td>

                                                <a href="/wanted/{{ $criminal->id }}"> <span
                                                        class="badge badge-complete">view
                                                        details</span></a>

                                            </td>
                                        </tr>
                                        @php
                                        $crime++;
                                        @endphp
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- /.card -->
                </div> <!-- /.col-lg-8 -->

                <!-- /.col-md-4 -->
            </div>
        </div>







    </div>
</div>
<!-- .animated -->


@endsection