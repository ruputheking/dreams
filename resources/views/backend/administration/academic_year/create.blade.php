@extends('layouts.admin')@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('academic_years.index') }}">List Academic Session</a></li>
<li class="active">Add Academic Year</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Add Academic Year</div>

            <div class="panel-body">
                <form method="post" class="validate" autocomplete="off" action="{{route('academic_years.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('session') ? ' has-error' : '' }}">
                            <label class="control-label">Session Name <span class="required">*</span></label>
                            <input type="text" class="form-control" name="session" value="{{ old('session') }}" required>
                            <small class="text-danger">{{ $errors->first('session') }}</small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('year') ? ' has-error' : '' }}">
                            <label class="control-label">Academic Year <span class="required">*</span></label>
                            <input type="text" class="form-control year" name="year" value="{{ old('year') }}" required>
                            <small class="text-danger">{{ $errors->first('year') }}</small>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12">
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