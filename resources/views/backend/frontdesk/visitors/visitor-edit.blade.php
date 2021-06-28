@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('visitors.index') }}">Visitor Book</a></li>
<li class="active">Update Visitor</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">Update Visitor</span>
            </div>

            <div class="panel-body">
                <form method="post" autocomplete="off" action="{{route('visitors.update', $visitor->slug)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="params-panel">
                        <div class="col-md-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label">Full Name <span class="required">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ $visitor->name }}" required>
                        </div>

                        <div class="col-md-12 {{ $errors->has('purpose') ? ' has-error' : '' }}">
                            <label class="control-label">Purpose <span class="required">*</span></label>
                            <input type="text" class="form-control" name="purpose" value="{{ $visitor->purpose }}" required>
                        </div>

                        <div class="col-md-12 {{ $errors->has('date') ? ' has-error' : '' }}">
                            <label class="control-label">Date <span class="required">*</span></label>
                            <input type="text" class="form-control datepicker" name="date" value="{{ $visitor->date }}" required>
                        </div>

                        <div class="col-md-6 {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="control-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="{{ $visitor->phone }}" required>
                        </div>

                        <div class="col-md-6 {{ $errors->has('no_of_people') ? ' has-error' : '' }}">
                            <label class="control-label">No of People <span class="required">*</span></label>
                            <input type="text" class="form-control" name="no_of_people" value="{{ $visitor->no_of_people }}" required>
                        </div>

                        <div class="col-md-6 {{ $errors->has('in_time') ? ' has-error' : '' }}">
                            <label class="control-label">In Time <span class="required">*</span></label>
                            <input type="text" class="form-control timepicker" name="in_time" value="{{ $visitor->in_time }}" required>
                        </div>

                        <div class="col-md-6 {{ $errors->has('out_time') ? ' has-error' : '' }}">
                            <label class="control-label">Out Time <span class="required">*</span></label>
                            <input type="text" class="form-control timepicker" name="out_time" value="{{ $visitor->out_time }}" required>
                        </div>

                        <div class="col-md-12 {{ $errors->has('note') ? ' has-error' : '' }}">
                            <label class="control-label">Note</label>
                            <textarea type="text" class="form-control" name="note">{{ $visitor->note }}</textarea>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                <label class="control-label">Attach Document</label>
                                <input type="file" name="image" class="form-control dropify" data-default-file="/frontend/images/visitors/{{ $visitor->image }}" data-allowed-file-extensions="png PNG jpg JPG jpeg JPEG">
                            </div>
                        </div>

                        <div class="col-md-12 mb-10">
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection