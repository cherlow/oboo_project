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

                            <li class="active">Suspect Details</li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <div class="card-header"><strong>{{$criminal->name}}</strong></div>
        <div class="card-body card-block">
            <div class="form-group"><label for="company" class=" form-control-label">Picture</label>
                <p><img src="/uploads/{{$criminal->pic}}" alt=""></p>
            </div>
            <div class="form-group"><label for="company" class=" form-control-label">Name</label><input type="text"
                    id="company" value="{{$criminal->name}}" class="form-control" readonly></div>
            <div class="form-group"><label for="vat" class=" form-control-label">Alias</label><input type="text"
                    value="{{$criminal->alias}}" id="vat" class="form-control" readonly>
            </div>
            <div class="form-group"><label for="vat" class=" form-control-label">Wanted for</label><input type="text"
                    value="{{$criminal->crime->name}}" id="vat" class="form-control" readonly>
            </div>
            <div class="form-group"><label for="street" class=" form-control-label">National Id</label><input
                    type="text" id="street" value="{{$criminal->national_id}}" class="form-control" readonly></div>
            <div class="row form-group">
                <div class="col-8">
                    <div class="form-group"><label for="city" class=" form-control-label">Age</label><input type="text"
                            id="city" value="{{$criminal->age}}" class="form-control" readonly></div>
                </div>
                <div class="col-8">
                    <div class="form-group"><label for="postal-code" class=" form-control-label">Gender
                        </label><input type="text" id="postal-code" value="{{$criminal->gender}}" class="form-control"
                            readonly></div>
                </div>
            </div>
            <div class="form-group"><label for="country" class=" form-control-label">Last Location</label><input
                    type="text" id="country" value="{{$criminal->location}}" class="form-control" readonly></div>
            <div class="form-group"><label for="country" class=" form-control-label">Crime Details</label>
                <textarea name="textarea-input" id="textarea-input" rows="9" class="form-control"
                    readonly>{{$criminal->details}}</textarea>
            </div>



            <a href="/changestatus/{{ $criminal->id }}" type="button" class="btn btn-secondary mb-1">

                @if ($criminal->is_loose==1)

                archive criminal record

                @else
                mark as wanted

                @endif

            </a>
        </div>
    </div>
</div>



{{-- my modal goes here --}}

<div class="modal fade " id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5> --}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header"><strong>Suspect Identification Form</strong></div>
                    <div class="card-body card-block">
                        <form action="/identify" method="post">
                            @csrf
                            <div class="form-group"><label for="company" class=" form-control-label">Suspect
                                    Name</label><input type="text" id="company" value="{{$criminal->name}}"
                                    class="form-control" readonly>
                            </div>
                            <input type="hidden" name="id" value="{{$criminal->id}}">

                            <div class="form-group"><label for="company" class=" form-control-label">Last Seen At
                                </label><input type="text" id="company" name="location" class="form-control" required>
                            </div>


                            <div class="form-group"><label for="company" class=" form-control-label">Provide Details
                                </label>
                                <textarea name="details" id="textarea-input" rows="9" placeholder="Content..."
                                    class="form-control" required></textarea>
                            </div>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>

                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

@endsection