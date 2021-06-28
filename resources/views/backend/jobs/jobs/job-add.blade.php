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
<li><a href="{{ route('jobs.index') }}">Job List</a></li>
<li class="active">Add Job</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Add New Job</div>

            <div class="panel-body">
                <form method="post" class="validate" autocomplete="off" action="{{ route('jobs.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group col-md-12 {{ $errors->has('title') ? ' has-error' : '' }}">
                                <label class="control-label">Title <span class="required">*</span></label>
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Job title" required>
                            </div>
                            <div class="form-group col-md-12 {{ $errors->has('slug') ? ' has-error' : '' }}">
                                <label class="control-label">Slug <span class="required">*</span></label>
                                <input id="slug" type="text" class="form-control" name="slug" value="{{ old('slug') }}" placeholder="Job Slug" required>
                            </div>
                            <div class="form-group col-md-12 {{ $errors->has('summary') ? ' has-error' : '' }}">
                                <label class="control-label">In Short <span class="required">*</span></label>
                                <textarea class="form-control" rows="4" name="summary" placeholder="Job summary">{{ old('summary') }}</textarea>
                            </div>
                            <div class="form-group col-md-12 {{ $errors->has('details') ? ' has-error' : '' }}">
                                <label class="control-label">Details <span class="required">*</span></label>
                                <textarea class="form-control summernote" name="details">{{ old('details') }}</textarea>
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
                            <div class="form-group col-md-12 {{ $errors->has('location') ? ' has-error' : '' }}">
                                <label class="control-label">Location <span class="required">*</span></label>
                                <input type="text" class="form-control" name="location" value="{{ old('location') }}" placeholder="Location" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Total Candidate <span class="required">*</span></label>
                                <input type="number" class="form-control" name="candidate" value="{{ old('candidate') }}" placeholder="Total Candidate">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Salary (Rs)</label>
                                <input type="number" class="form-control" name="salary" value="{{ old('salary') }}" placeholder="Defualt Negotiable">
                            </div>
                            <div class="form-group col-md-12 {{ $errors->has('deadline') ? ' has-error' : '' }}">
                                <label class="control-label">Deadline <span class="required">*</span></label>
                                <input type="text" class="form-control datetimepicker" name="deadline" value="{{ old('deadline') }}" placeholder="Deadline" required>
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