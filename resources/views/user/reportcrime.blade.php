@extends('layouts.user')
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

                            <li class="active">Report A Crime</li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="card">
        <div class="card-header"><strong>Crime Report Form</strong></div>
        <div class="card-body card-block">
            <form action="/report" method="POST">
                @csrf
                <div class="form-group"><label for="company" class=" form-control-label">Crime</label>
                    <select name="crime" id="select" class="form-control" required>
                      @foreach ($crimes as $crime)
                          
                    <option value="{{$crime->id}}">{{$crime->name}}</option>
                      @endforeach
                        
                    </select>
                </div>
                <div class="form-group"><label for="company" class=" form-control-label">Station to report</label>
                    <select name="station" id="select" class="form-control" required>
                        @foreach ($stations as $station)
                            
                    <option value="{{$station->id}}">{{$station->name}}</option>
                        @endforeach
                       
                    </select>
                </div>
                <div class="form-group"><label for="company" class=" form-control-label">Crime Location</label><input
                        type="text" name="location" id="company" placeholder="Enter your company name"
                        class="form-control" required></div>

                <div class="form-group"><label for="company" class=" form-control-label">Crime Details</label>
                    <textarea name="details" id="textarea-input" rows="9" placeholder="Content..."
                        class="form-control" required></textarea>
                </div>
                <button class="btn btn-dark" type="submit">Submit</button>
            </form>



        </div>
    </div>
</div>

@endsection