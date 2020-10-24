@extends('layouts.admin')
@section('content')
<!-- Animated -->
<div class="content">
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-cash"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $station }}</span></div>
                                    <div class="stat-heading">Stations</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $police }}</span></div>
                                    <div class="stat-heading">Police </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7s-browser"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $report }}</span></div>
                                    <div class="stat-heading">Records</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $user }}</span></div>
                                    <div class="stat-heading">Users</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>







    </div>

    <div class="content">
        <div class="card">
            <div class="card-header">
                <strong>Search For Crime Records</strong>

            </div>
            <div class="card-body">
                <small class=" text-info pl-5 ml-5">* search for crime records of a particular suspect
                    using(name,alias,national id,gender,location)</small>
                <div class="m-5 p-5">
                    <form action="/search" method="post">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-12">
                                <div class="input-group">
                                    <input type="text" id="input2-group2" name="search" placeholder="search keyword"
                                        class="form-control">
                                    <div class="input-group-btn"><button class="btn btn-primary">Search</button></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .animated -->
@endsection