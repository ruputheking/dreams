@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('generalcalls.index') }}">Phone Call Log</a></li>
<li class="active">New Phone Call Log</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">New Phone Call Log</span>
            </div>

            <div class="panel-body">
                <form method="post" autocomplete="off" action="{{route('generalcalls.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="params-panel">
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="control-label">Full Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label class="control-label">Phone <span class="required">*</span></label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                                <label class="control-label">Date <span class="required">*</span></label>
                                <input type="text" class="form-control datepicker" name="date" value="{{ old('date') }}" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="control-label">Description</label>
                                <textarea type="text" class="form-control" name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('follow_up_date') ? ' has-error' : '' }}">
                                <label class="control-label">Follow up Date</label>
                                <input type="text" class="form-control datepicker" name="follow_up_date" value="{{ old('follow_up_date') }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('call_duration') ? ' has-error' : '' }}">
                                <label class="control-label">Call Duration</label>
                                <input type="text" class="form-control" name="call_duration" value="{{ old('call_duration') }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('note') ? ' has-error' : '' }}">
                                <label class="control-label">Note</label>
                                <textarea type="text" class="form-control" name="note">{{ old('note') }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('call_type') ? ' has-error' : '' }}">
                                <label class="control-label">Call Type <span class="required">*</span></label>
                                <select class="form-control select2" name="call_type">
                                    <option value="">Select One</option>
                                    <option @if(old('call_type') == 'Incoming') selected
                                    @endif value="Incoming">Incoming
                                    </option>
                                    <option @if(old('call_type') == 'Outgoing') selected
                                    @endif value="Outgoing">Outgoing
                                    </option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-12 mb-10">
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection