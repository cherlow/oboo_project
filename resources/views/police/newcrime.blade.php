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

                            <li class="active">New Crime Record</li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <div class="card-header"><strong> New Crime Form</strong></div>
        <div class="card-body card-block">
            <form action="/newcrime" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group"><label for="company" class=" form-control-label">Name</label>
                    <input type="text" id="company" name="name" class="form-control"></div>
                <div class="form-group"><label for="vat" class=" form-control-label">Alias</label><input type="text"
                        id="vat" name="alias" class="form-control"></div>
                <div class="form-group"><label for="street" class=" form-control-label">National Id</label><input
                        type="text" id="street" name="id" class="form-control"></div>
                <div class="form-group"><label for="street" class=" form-control-label">Age</label><input type="number"
                        id="street" name="age" class="form-control"></div>

                <div class="form-group"><label for="country" class=" form-control-label">Crime Type</label>
                    <select name="select" id="select" class="form-control" name="crime_type">
                        @foreach ($crimes as $crime)
                            
                    <option value="{{$crime->id}}">{{$crime->name}}</option>
                        @endforeach
                        
                    </select></div>
                <div class="form-group"><label for="country" class=" form-control-label">Gender</label>
                    <div class="radio pl-4">
                        <label for="radio1" class="form-check-label ">
                            <input type="radio" id="radio1" name="gender" value="male" class="form-check-input"> Male
                        </label>
                    </div>
                    <div class="radio pl-4">
                        <label for="radio1" class="form-check-label ">
                            <input type="radio" id="radio1" name="gender" value="female" class="form-check-input">
                            Female
                        </label>
                    </div>
                </div>

                <div class="form-group"><label for="street" class=" form-control-label">Location</label><input
                        type="text" id="street" name="location" class="form-control"></div>
                <div class="form-group"><label for="street" class=" form-control-label">Crime Details</label>
                    <textarea name="details" id="textarea-input" rows="9" placeholder="Content..."
                        class="form-control"></textarea>
                </div>
                <div class="form-group"><label for="street" class=" form-control-label">Picture</label><input
                        type="file" id="street" name="pic" class="form-control"></div>

                <div class="form-group"><label for="street" class=" form-control-label">Wanted?</label>
                    <div class="checkbox pl-4">
                        <label for="checkbox2" class="form-check-label ">
                            <input type="checkbox" id="checkbox2" name="is_wanted" value="true"
                                class="form-check-input"> Yes
                        </label>
                    </div>
                </div>
                <button class="btn btn-dark" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection