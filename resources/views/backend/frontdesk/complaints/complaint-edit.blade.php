@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('complaints.index') }}">Complain Book</a></li>
<li class="active">Update Complain</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">Update Complain</span>
            </div>

            <div class="panel-body">
                <form method="post" autocomplete="off" action="{{route('complaints.update', $complaint->slug)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('complaint_by') ? ' has-error' : '' }}">
                            <label class="control-label">Complain By <span class="required">*</span></label>
                            <input type="text" class="form-control" name="complaint_by" value="{{ $complaint->complaint_by }}" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('source') ? ' has-error' : '' }}">
                            <label class="control-label">Source</label>
                            <input type="text" class="form-control" name="source" value="{{ $complaint->source }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="control-label">Phone <span class="required">*</span></label>
                            <input type="text" class="form-control" name="phone" value="{{ $complaint->phone }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                            <label class="control-label">Date <span class="required">*</span></label>
                            <input type="text" class="form-control datepicker" name="date" value="{{ $complaint->date }}" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="control-label">Description</label>
                            <textarea type="text" class="form-control" name="description">{{ $complaint->description }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('action_taken') ? ' has-error' : '' }}">
                            <label class="control-label">Action Taken</label>
                            <input type="text" class="form-control" name="action_taken" value="{{ $complaint->action_taken }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('assigned_by') ? ' has-error' : '' }}">
                            <label class="control-label">Assigned By <span class="required">*</span></label>
                            <input type="text" class="form-control" name="assigned_by" value="{{ $complaint->assigned_by }}" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('note') ? ' has-error' : '' }}">
                            <label class="control-label">Note</label>
                            <textarea type="text" class="form-control" name="note">{{ $complaint->note }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                            <label class="control-label">Attach Document</label>
                            <input type="file" name="image" class="form-control dropify" data-default-file="/frontend/images/complaints/{{ $complaint->image }}" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                        </div>
                    </div>


                    <div class="col-md-12 mb-10">
                        <div class="form-group">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection