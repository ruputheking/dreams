@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('teachers.index') }}">Teachers List</a></li>
<li class="active">Edit Teacher</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Update Teacher
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <form action="{{route('teachers.update',$teacher->id)}}" autocomplete="off" class="form-horizontal validate" enctype="multipart/form-data" autocomplete="off" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="col-md-12 {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="control-label">Name <span class="required">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ $teacher->name }}" required placeholder="Teacher Name">
                        </div>

                        <div class="col-md-6 {{ $errors->has('birthday') ? 'has-error' : '' }}">
                            <label class="control-label">Birthday <span class="required">*</span></label>
                            <input type="text" class="form-control datepicker" name="birthday" value="{{ $teacher->birthday }}" placeholder="Date of Birth" required>
                        </div>
                        <div class="col-md-6 {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label class="control-label">Phone <span class="required">*</span></label>
                            <input type="text" class="form-control" name="phone" value="{{ $teacher->phone }}" placeholder="Phone Number" required>
                        </div>
                        <div class="col-md-6 {{ $errors->has('gender') ? 'has-error' : '' }}">
                            <label class="control-label">Gender <span class="required">*</span></label>
                            <select name="gender" class="form-control select2" required>
                                <option @if($teacher->gender=='Male') selected
                                    @endif value="Male">Male
                                </option>
                                <option @if($teacher->gender=='Female') selected
                                    @endif value="Female">Female
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6 {{ $errors->has('religion') ? 'has-error' : '' }}">
                            <label class="control-label">Religion <span class="required">*</span></label>
                            <select name="religion" class="form-control select2" required>
                                <option value="">Select One</option>
                                {{ create_option("picklists","value","value",$teacher->religion,array("type="=>"Religion")) }}
                            </select>
                        </div>
                        <div class="col-md-6 {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label class="control-label">Address <span class="required">*</span></label>
                            <input class="form-control" name="address" placeholder="Current Address" value="{{ $teacher->address }}">
                        </div>
                        <div class="col-md-6 {{ $errors->has('joining_date') ? 'has-error' : '' }}">
                            <label class="control-label">Joining Date <span class="required">*</span></label>
                            <input type="text" class="form-control datepicker" placeholder="Joining Date" name="joining_date" value="{{ $teacher->joining_date }}" required>
                        </div>

                        <div class="col-md-12">
                            <hr>
                            <div class="page-header">
                                <h4>Login Details</h4>
                            </div>
                        </div>

                        <div class="col-md-12 {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="control-label">Email <span class="required">*</span></label>
                            <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{ $teacher->email }}" required>
                        </div>
                        <div class="col-md-6 {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label class="control-label">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="col-md-6 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            <label class="control-label">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                        </div>

                        <div class="col-md-12 {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label class="control-label">Profile Picture</label>
                            <input type="file" class="form-control dropify" name="image" data-default-file="/frontend/images/{{ $teacher->photo }}" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                        </div>

                        <div class="col-sm-5" style="margin-top:20px">
                            <button type="submit" class="btn btn-info">Update Teacher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection