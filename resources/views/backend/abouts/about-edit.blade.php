@extends('layouts.backend.main')

@section('header')
<li><a href="{{route('dashboard')}}">Dashboard</a></li>
<li class="active">Update About</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Update About
                </div>
            </div>
            <div class="panel-body">
                <form action="{{route('abouts.update', $about->id)}}" class="form-horizontal form-groups-bordered validate" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">Title <span class="required">*</span></label>
                                <input type="text" class="form-control" name="title" value="{{ $about->title }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label">Name</label>
                                <input type="text" class="form-control" name="name" required value="{{ $about->name }}" placeholder="Name">
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label">Position / Address</label>
                                <input type="text" class="form-control" name="position" required value="{{ $about->position }}" placeholder="Position / Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">Direction <span class="required">*</span></label>
                                <select class="form-control select2" name="direction">
                                    <option value="">Select One</option>
                                    <option @if($about->direction == 'left') selected
                                        @endif value="left">Left
                                    </option>
                                    <option @if($about->direction == 'right') selected
                                        @endif value="right">Right
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">Details <span class="required">*</span></label>
                                <textarea type="text" class="form-control textarea" name="details" required>{{ $about->details }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">Facebook <span class="required">*</span></label>
                                <input type="text" name="facebook" value="{{ $about->facebook }}" class="form-control" placeholder="Facebook Link">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">Twitter <span class="required">*</span></label>
                                <input type="text" name="twitter" value="{{ $about->twitter }}" class="form-control" placeholder="Twitter Link">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">Instagram <span class="required">*</span></label>
                                <input type="text" name="instagram" value="{{ $about->instagram }}" class="form-control" placeholder="Instagram Link">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">Linkedin <span class="required">*</span></label>
                                <input type="text" name="linkedin" value="{{ $about->linkedin }}" class="form-control" placeholder="Linkedin Link">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label" style="float:left">Image</label>
                                <input type="file" class="form-control border-none dropify input-default bg-ash" style="width:100%;" data-default-file="{{ asset('frontend/img/'.$about->file) }}" name="image" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-info">Update About</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection