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

                            <li class="active">Crime Report Details</li>

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
            <strong class="card-title"> Crime Report Details</strong>
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
                        {{ $report->id }}
                    </small>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">
                        Reported At
                    </label>
                </div>
                <div class="col-12">
                    <small class="form-text text-muted">
                        {{ $report->created_at }}
                    </small>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">
                        Crime Type
                    </label>
                </div>
                <div class="col-12">
                    <small class="form-text text-muted">
                        {{ $report->crime->name}}
                    </small>
                </div>
            </div>
            <br>


            <div class="row">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">
                        Crime Location
                    </label>
                </div>
                <div class="col-12">
                    <small class="form-text text-muted">
                        {{ $report->location}}
                    </small>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">
                        Crime Details
                    </label>
                </div>
                <div class="col-12 ">
                    <small class="form-text text-muted">
                        {{ $report->details}}
                    </small>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">
                        Station Reported
                    </label>
                </div>
                <div class="col-12">
                    <small class="form-text text-muted">
                        {{ $report->station->name}}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection