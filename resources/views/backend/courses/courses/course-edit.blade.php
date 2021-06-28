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
<li><a href="{{ route('courses.index') }}">Course List</a></li>
<li class="active">Update Course</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Course</div>

            <div class="panel-body">
                <form method="post" class="validate" autocomplete="off" action="{{ route('courses.update', $course->slug) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group col-md-12 {{ $errors->has('title') ? ' has-error' : '' }}">
                                <label class="control-label">Title <span class="required">*</span></label>
                                <input id="title" type="text" class="form-control" name="title" value="{{ $course->title }}" placeholder="Course title" required>
                            </div>
                            <div class="form-group col-md-12 {{ $errors->has('slug') ? ' has-error' : '' }}">
                                <label class="control-label">Slug <span class="required">*</span></label>
                                <input id="slug" type="text" class="form-control" name="slug" value="{{ $course->slug }}" placeholder="Course Slug" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Category <span class="required">*</span></label>
                                <select class="form-control select2" name="category_id">
                                    <option value="">Select One</option>
                                    @foreach ($categories as $data)
                                    <option @if($data->id == $course->category_id) selected
                                        @endif value="{{ $data->id }}">{{ $data->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4 {{ $errors->has('starting_date') ? ' has-error' : '' }}">
                                <label class="control-label">Start Date</label>
                                <input type="text" class="form-control datetimepicker" name="starting_date" value="{{ $course->starting_date }}" placeholder="Starting Date">
                            </div>
                            <div class="form-group col-md-4 {{ $errors->has('starting_time') ? ' has-error' : '' }}">
                                <label class="control-label">Starting Time</label>
                                <input type="text" class="form-control timepicker" name="starting_time" value="{{ $course->starting_time }}" placeholder="Starting Time">
                            </div>
                            <div class="form-group col-md-4 {{ $errors->has('ending_time') ? ' has-error' : '' }}">
                                <label class="control-label">Ending Time</label>
                                <input type="text" class="form-control timepicker" name="ending_time" value="{{ $course->ending_time }}" placeholder="Ending Time">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Schedule</label>
                                <input type="text" class="form-control" name="schedule" value="{{ $course->schedule }}" placeholder="Course Schedule">
                            </div>
                            <div class="form-group col-md-12 {{ $errors->has('summary') ? ' has-error' : '' }}">
                                <label class="control-label">In Short </label>
                                <textarea class="form-control" rows="4" name="summary" placeholder="Course summary">{{ $course->summary }}</textarea>
                            </div>
                            <div class="form-group col-md-12 {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="control-label">Description <span class="required">*</span></label>
                                <textarea class="form-control summernote" name="description">{{ $course->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label">Status <span class="required">*</span></label>
                                <select class="form-control select2" name="status">
                                    <option value="">Select One</option>
                                    <option @if($course->status == '1') selected
                                        @endif value="1">Active
                                    </option>
                                    <option @if($course->status == '0') selected
                                        @endif value="0">Draft
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Duration</label>
                                <input type="text" class="form-control" name="duration" value="{{ $course->duration }}" placeholder="Course Duration">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Total Credits</label>
                                <input type="number" class="form-control" name="total_credit" value="{{ $course->total_credit }}" placeholder="Course Credits">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Max Students</label>
                                <input type="number" class="form-control" name="max_student" value="{{ $course->max_student }}" placeholder="Total Students">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Price (Rs)</label>
                                <input type="number" class="form-control" name="price" value="{{ $course->price }}" placeholder="Course Price">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Feature Image <span class="required">*</span></label>
                                <input type="file" name="feature_image" class="form-control dropify" data-default-file="/frontend/images/{{$course->feature_image}}" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 mt-15">
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection