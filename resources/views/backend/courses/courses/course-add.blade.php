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
<li class="active">Add Course</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Add New Course</div>

            <div class="panel-body">
                <form method="post" class="validate" autocomplete="off" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group col-md-12 {{ $errors->has('title') ? ' has-error' : '' }}">
                                <label class="control-label">Title <span class="required">*</span></label>
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Course title" required>
                            </div>
                            <div class="form-group col-md-12 {{ $errors->has('slug') ? ' has-error' : '' }}">
                                <label class="control-label">Slug <span class="required">*</span></label>
                                <input id="slug" type="text" class="form-control" name="slug" value="{{ old('slug') }}" placeholder="Course Slug" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Category <span class="required">*</span></label>
                                <select class="form-control select2" name="category_id">
                                    <option value="">Select One</option>
                                    @foreach ($categories as $data)
                                    <option @if($data->id == old('category_id')) selected
                                        @endif value="{{ $data->id }}">{{ $data->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4 {{ $errors->has('starting_date') ? ' has-error' : '' }}">
                                <label class="control-label">Start Date</label>
                                <input type="text" class="form-control datetimepicker" name="starting_date" value="{{ old('starting_date') }}" placeholder="Starting Date">
                            </div>
                            <div class="form-group col-md-4 {{ $errors->has('starting_time') ? ' has-error' : '' }}">
                                <label class="control-label">Starting Time</label>
                                <input type="text" class="form-control timepicker" name="starting_time" value="{{ old('starting_time') }}" placeholder="Starting Time">
                            </div>
                            <div class="form-group col-md-4 {{ $errors->has('ending_time') ? ' has-error' : '' }}">
                                <label class="control-label">Ending Time</label>
                                <input type="text" class="form-control timepicker" name="ending_time" value="{{ old('ending_time') }}" placeholder="Ending Time">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Schedule</label>
                                <input type="text" class="form-control" name="schedule" value="{{ old('schedule') }}" placeholder="Course Schedule">
                            </div>
                            <div class="form-group col-md-12 {{ $errors->has('summary') ? ' has-error' : '' }}">
                                <label class="control-label">In Short <span class="required">*</span></label>
                                <textarea class="form-control" rows="4" name="summary" placeholder="Course summary" required>{{ old('summary') }}</textarea>
                            </div>
                            <div class="form-group col-md-12 {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="control-label">Description <span class="required">*</span></label>
                                <textarea class="form-control summernote" name="description">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group col-md-12 mt-10">
                                <div class="card-header mb-20" style="border-bottom:1px solid #ccc;" id="headingTwo">
                                    <h4 class="mb-0">
                                        <span style="cursor:pointer;" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            SEO Details <i class="fa fa-arrow-down"></i>
                                        </span>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="col-md-12 {{ $errors->has('seo_meta_keywords') ? ' has-error' : '' }}">
                                        <label class="control-label mt-0">Meta Keywords</label>
                                        <textarea type="text" class="form-control" name="seo_meta_keywords" value="{{ old('seo_meta_keywords') }}" placeholder="Meta Keywords"></textarea>
                                    </div>
                                    <div class="col-md-12 mb-15 {{ $errors->has('seo_meta_description') ? ' has-error' : '' }}">
                                        <label class="control-label">Meta Description</label>
                                        <textarea type="text" class="form-control" name="seo_meta_description" value="{{ old('seo_meta_description') }}" placeholder="Meta Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12">
                                <label class="control-label">Status <span class="required">*</span></label>
                                <select class="form-control select2" name="status">
                                    <option value="">Select One</option>
                                    <option @if(old('status') == '1') selected
                                    @endif value="1">Active</option>
                                    <option @if(old('status') == '0') selected
                                    @endif value="0">Draft</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Duration</label>
                                <input type="text" class="form-control" name="duration" value="{{ old('duration') }}" placeholder="Course Duration">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Total Credits</label>
                                <input type="number" class="form-control" name="total_credit" value="{{ old('total_credit') }}" placeholder="Course Credits">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Max Students</label>
                                <input type="number" class="form-control" name="max_student" value="{{ old('max_student') }}" placeholder="Total Students">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Price (Rs)</label>
                                <input type="number" class="form-control" name="price" value="{{ old('price') }}" placeholder="Course Price">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Feature Image <span class="required">*</span></label>
                                <input type="file" name="feature_image" class="form-control dropify" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" required>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 mt-15">
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
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