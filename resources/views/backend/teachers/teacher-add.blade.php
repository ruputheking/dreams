@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('teachers.index') }}">Teachers List</a></li>
<li class="active">Add New Teacher</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Add New Teacher
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <form action="{{route('teachers.store')}}" method="post" autocomplete="off" class="form-horizontal validate" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label">Name <span class="required">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Teacher Name" required>
                        </div>
                        <div class="col-md-6 {{ $errors->has('birthday') ? ' has-error' : '' }}">
                            <label class="control-label">Birthday <span class="required">*</span></label>
                            <input type="text" class="form-control datepicker" name="birthday" value="{{ old('birthday') }}" placeholder="Date of Birth" required>
                        </div>
                        <div class="col-md-6 {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="control-label">Phone <span class="required">*</span></label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required placeholder="Phone Number">
                        </div>
                        <div class="col-md-6 {{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label class="control-label">Gender <span class="required">*</span></label>
                            <select name="gender" class="form-control select2" required>
                                <option value="">Select One</option>
                                <option @if(old('gender')=='Male' ) selected
                                @endif value="Male">Male</option>
                                <option @if(old('gender')=='Female' ) selected
                                @endif value="Female">Female</option>
                                <option @if(old('gender')=='Other' ) selected
                                @endif value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 {{ $errors->has('religion') ? ' has-error' : '' }}">
                            <label class="control-label">Religion <span class="required">*</span></label>
                            <select name="religion" class="form-control select2" required>
                                <option value="">Select One</option>
                                {{ create_option("picklists","value","value",old('religion')) }}
                            </select>
                        </div>
                        <div class="col-md-6 {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="control-label">Address <span class="required">*</span></label>
                            <input class="form-control" name="address" value="{{ old('address') }}" placeholder="Current Address">
                        </div>
                        <div class="col-md-6 {{ $errors->has('joining_date') ? ' has-error' : '' }}">
                            <label class="control-label">Joining Date <span class="required">*</span></label>
                            <input type="text" class="form-control datepicker" name="joining_date" placeholder="Joining Date" value="{{ old('joining_date') }}" required>
                        </div>

                        <div class="col-md-12">
                            <hr>
                            <div class="page-header">
                                <h4>Login Details</h4>
                            </div>
                        </div>

                        <div class="col-md-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label">Email <span class="required">*</span></label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email Address">
                        </div>
                        <div class="col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="control-label">Password <span class="required">*</span></label>
                            <input type="password" class="form-control" name="password" required placeholder="Password">
                        </div>
                        <div class="col-md-6 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="control-label">Confirm Password <span class="required">*</span></label>
                            <input type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                        </div>
                        <div class="col-md-12 {{ $errors->has('image') ? ' has-error' : '' }}">
                            <label class="control-label">Profile Picture</label>
                            <input type="file" class="form-control dropify" name="image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                        </div>
                        <div class="col-sm-5" style="margin-top:20px">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection