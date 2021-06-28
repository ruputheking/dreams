@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('academic_years.index') }}">List Academic Session</a></li>
<li class="active">Update Academic Year</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">Update Academic Year</div>

            <div class="panel-body">
                <form method="post" class="validate" autocomplete="off" action="{{route('academic_years.update', $id)}}" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <input name="_method" type="hidden" value="PATCH">

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('session') ? ' has-error' : '' }}">
                            <label class="control-label">Session Name <span class="required">*</span></label>
                            <input type="text" class="form-control" name="session" value="{{$academicyear->session}}" required>
                            <small class="text-danger">{{ $errors->first('session') }}</small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('year') ? ' has-error' : '' }}">
                            <label class="control-label">Academic Year <span class="required">*</span></label>
                            <input type="text" class="form-control" name="year" value="{{$academicyear->year}}" required>
                            <small class="text-danger">{{ $errors->first('year') }}</small>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection