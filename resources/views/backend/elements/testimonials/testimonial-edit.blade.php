@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('testimonials.index') }}">Testimonial List</a></li>
<li class="active">Update Testimonial</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">Update Testimonial</span>
            </div>

            <div class="panel-body">
                <form method="post" autocomplete="off" action="{{route('testimonials.update', $testimonial->id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="col-md-12">
                        <div class="form-group  {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label">Full Name <span class="required">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ $testimonial->name }}" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group  {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="control-label">Description <span class="required">*</span></label>
                            <textarea type="text" class="form-control" name="description" required>{{ $testimonial->description }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label class="control-label">Photo <span class="required">*</span></label>
                            <input type="file" name="photo" class="form-control dropify" data-default-file="/frontend/images/{{ $testimonial->photo }}" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" required>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection