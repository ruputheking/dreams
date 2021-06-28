@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">About Us</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Edit About Us
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form action="{{ route('journey.store') }}" class="form-group form-groups-bordered validate" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{csrf_field()}}

                        <div class="params-panel">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('journey_title') ? ' has-error' : '' }}">
                                    <label class="control-label">Title <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="journey_title" placeholder="Title" value="{{ get_option('journey-title') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('journey_youtube') ? ' has-error' : '' }}">
                                    <label class="control-label">Youtube Video Link <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="journey_youtube" placeholder="Video Link" value="{{ get_option('journey-youtube') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('journey_details') ? ' has-error' : '' }}">
                                    <label class="control-label">In Details <span class="required">*</span></label>
                                    <textarea rows="4" cols="60" type="text" class="form-control summernote" name="journey_details" placeholder="About Dreams Academy">{{ get_option('journey-details') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Video Poster <span class="required">*</span></label>
                                    <input type="file" name="journey_poster" class="form-control dropify" data-default-file="/frontend/images/{{ get_option('journey-poster') }}" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Update Details</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection