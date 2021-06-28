@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('visitors.index') }}">Visitor Book</a></li>
<li class="active">Add New Visitor</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">New Visitor</span>
            </div>

            <div class="panel-body">
                <form method="post" autocomplete="off" action="{{route('visitors.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="col-md-12">
                        <div class="form-group  {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label">Full Name <span class="required">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group  {{ $errors->has('purpose') ? ' has-error' : '' }}">
                            <label class="control-label">Purpose <span class="required">*</span></label>
                            <input type="text" class="form-control" name="purpose" value="{{ old('purpose') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group  {{ $errors->has('date') ? ' has-error' : '' }}">
                            <label class="control-label">Date <span class="required">*</span></label>
                            <input type="text" class="form-control datepicker" name="date" value="{{ old('date') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group  {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="control-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group  {{ $errors->has('no_of_people') ? ' has-error' : '' }}">
                            <label class="control-label">No of People <span class="required">*</span></label>
                            <input type="text" class="form-control" name="no_of_people" value="{{ old('no_of_people') }}" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group  {{ $errors->has('in_time') ? ' has-error' : '' }}">
                            <label class="control-label">In Time <span class="required">*</span></label>
                            <input type="text" class="form-control timepicker" name="in_time" value="{{ old('in_time') }}" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group  {{ $errors->has('out_time') ? ' has-error' : '' }}">
                            <label class="control-label">Out Time <span class="required">*</span></label>
                            <input type="text" class="form-control timepicker" name="out_time" value="{{ old('out_time') }}" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group  {{ $errors->has('note') ? ' has-error' : '' }}">
                            <label class="control-label">Note <span class="required">*</span></label>
                            <textarea type="text" class="form-control" name="note" required>{{ old('note') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                            <label class="control-label">Attach Document <span class="required">*</span></label>
                            <input type="file" name="image" class="form-control appsvan-file" required>
                        </div>
                    </div>


                    <div class="col-md-12 mb-10">
                        <div class="form-group">
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