@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('applications.index') }}">Application List</a></li>
<li class="active">Update Application</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">Edit Application Form</span>
            </div>

            <div class="panel-body">
                <form method="post" autocomplete="off" action="{{route('applications.update', $application->slug)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="col-md-12">
                        <div class="form-group  {{ $errors->has('subject') ? ' has-error' : '' }}">
                            <label class="control-label">Subject <span class="required">*</span></label>
                            <input type="text" class="form-control" name="subject" value="{{ $application->subject }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('starting_date') ? ' has-error' : '' }}">
                            <label class="control-label">From <span class="required">*</span></label>
                            <input type="text" class="form-control datepicker" name="starting_date" value="{{ $application->starting_date }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('ending_date') ? ' has-error' : '' }}">
                            <label class="control-label">To <span class="required">*</span></label>
                            <input type="text" class="form-control datepicker" name="ending_date" value="{{ $application->ending_date }}" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('ending_date') ? ' has-error' : '' }}">
                            <label class="control-label">Reason <span class="required">*</span></label>
                            <textarea name="reason" class="form-control" rows="6" cols="60">{{ $application->reason }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('document') ? ' has-error' : '' }}">
                            <label class="control-label">Document / File</label>
                            <input type="file" name="document" data-value="{{ $application->document }}" class="form-control appsvan-file">
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection