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

                            <li class="active">Crime Types</li>

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
            <strong class="card-title">Crime Types</strong>
            <button class=" btn btn-danger float-right" data-toggle="modal" data-target="#mediumModal"> New
                Crime Type</button>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Details</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count=1
                    @endphp
                    @foreach ($crimes as $crime)

                    <tr>
                        <th scope="row">{{$count}}</th>
                        <td>{{$crime->name}}</td>
                        <td>{{$crime->details}}</td>
                        <td> <a href="/crimetype/{{ $crime->id }}" class="btn btn-danger">Delete</a></td>
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


{{-- my modals go here --}}

<div class="modal fade " id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">New Crime Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">

                    <div class="card-body card-block">
                        <form id="station-form" action="crimes" method="post">
                            @csrf
                            <div class="form-group"><label for="company" class=" form-control-label">Type</label><input
                                    type="text" name="name" id="company" placeholder="" class="form-control" required>
                            </div>
                            <div class="form-group"><label for="company" class=" form-control-label">Details</label>
                                <textarea name="details" id="textarea-input" rows="9" placeholder="Content..."
                                    class="form-control"></textarea>

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

@endsection