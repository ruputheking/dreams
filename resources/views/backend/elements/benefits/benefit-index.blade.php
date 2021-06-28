@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Why Choose Us</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Edit Why Choose Us
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form action="{{ route('benefits.store') }}" class="form-group form-groups-bordered validate" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{csrf_field()}}

                        <div class="params-panel">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('popular_course') ? ' has-error' : '' }}">
                                    <label class="control-label">Popular Course <span class="required">*</span></label>
                                    <textarea rows="4" cols="60" type="text" class="form-control" name="popular_course" placeholder="Popular Course">{{ get_option('popular-courses') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('modern_book') ? ' has-error' : '' }}">
                                    <label class="control-label">Modern Book <span class="required">*</span></label>
                                    <textarea rows="4" cols="60" type="text" class="form-control" name="modern_book" placeholder="Modern Book">{{ get_option('modern-book-library') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('qualified_teacher') ? ' has-error' : '' }}">
                                    <label class="control-label">Qualified Teacher <span class="required">*</span></label>
                                    <textarea rows="4" cols="60" type="text" class="form-control" name="qualified_teacher" placeholder="Qualified Teacher">{{ get_option('qualified-teacher') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('update_notification') ? ' has-error' : '' }}">
                                    <label class="control-label">Update Notification <span class="required">*</span></label>
                                    <textarea rows="4" cols="60" type="text" class="form-control" name="update_notification" placeholder="Update Notification">{{ get_option('update-notification') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('entertainment_facilities') ? ' has-error' : '' }}">
                                    <label class="control-label">Entertainment Facilities <span class="required">*</span></label>
                                    <textarea rows="4" cols="60" type="text" class="form-control" name="entertainment_facilities" placeholder="Entertainment Facilities">{{ get_option('entertainment-facilities') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('online_support') ? ' has-error' : '' }}">
                                    <label class="control-label">Online Support <span class="required">*</span></label>
                                    <textarea rows="4" cols="60" type="text" name="online_support" class="form-control" placeholder="Online Support">{{ get_option('online-support') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Featured Image <span class="required">*</span></label>
                                    <input type="file" name="featured_image" class="form-control dropify" data-default-file="/frontend/images/{{ get_option('why-choose-us') }}" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
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