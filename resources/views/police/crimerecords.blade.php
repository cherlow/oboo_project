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

                            <li class="active">Crime Records</li>

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

@endsection