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

                            <li class="active">Identified Suspect Details</li>

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
            <strong class="card-title"> Identified Suspect Details</strong>
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
                        {{ $identification->id }}
                    </small>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">
                        suspect avatar
                    </label>
                </div>
                <div class="col-12">
                    <img class="rounded" src="/uploads/{{$identification->criminal->pic}}" alt="">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">
                        Suspect Name
                    </label>
                </div>
                <div class="col-12">
                    <small class="form-text text-muted">
                        {{ $identification->criminal->name}}
                    </small>
                </div>
            </div>
            <br>


            <div class="row">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">
                        Identifier Name
                    </label>
                </div>
                <div class="col-12">
                    <small class="form-text text-muted">
                        {{$identification->user->name}}
                    </small>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">
                        Last Seen
                    </label>
                </div>
                <div class="col-12 ">
                    <small class="form-text text-muted">
                        {{ $identification->last_seen}}
                    </small>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">
                        Details
                    </label>
                </div>
                <div class="col-12">
                    <small class="form-text text-muted">
                        {{ $identification->details}}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection