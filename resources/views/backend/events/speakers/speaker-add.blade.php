@extends('layouts.backend.main')

@section('styles')
<style media="screen">
    .form-group {
        margin-bottom: 0
    }

    .panel {
        margin-bottom: 0
    }
</style>
@endsection

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Add Speaker</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Add New Speaker</div>

            <div class="panel-body">
                <form method="post" class="validate" autocomplete="off" action="{{ route('speakers.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label">Name <span class="required">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Event Name" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('position') ? ' has-error' : '' }}">
                            <label class="control-label">Position <span class="required">*</span></label>
                            <input type="text" class="form-control" name="position" value="{{ old('position') }}" placeholder="Event Position" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('event_id') ? ' has-error' : '' }}">
                            <label class="control-label">Event <span class="required">*</span></label>
                            <select class="form-control select2" name="event_id">
                                <option value="">Select One</option>
                                @foreach ($events as $data)
                                <option @if($data->id == old('event_id')) selected
                                    @endif value="{{ $data->id }}">{{ $data->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label class="control-label">Photo <span class="required">*</span></label>
                            <input type="file" class="form-control dropify" name="photo" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 mt-15">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection