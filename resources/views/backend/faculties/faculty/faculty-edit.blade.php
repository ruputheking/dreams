@extends('layouts.backend.main')

@section('header')
<li><a href="{{route('dashboard')}}">Dashboard</a></li>
<li><a href="{{route('team_members.index')}}">Team Members</a></li>
<li class="active">Update Profile</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Edit Profile
                </div>
            </div>
            <div class="panel-body">
                <form action="{{route('team_members.update', $faculty->slug)}}" class="form-group" enctype="multipart/form-data" autocomplete="off" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="form-group col-md-12">
                        <label class="control-label">Member Name <span class="required">*</span></label>
                        <input type="text" class="form-control" id="title" name="name" value="{{ $faculty->name }}" placeholder="Full Name">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Slug <span class="required">*</span></label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ $faculty->slug }}" placeholder="Slug">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Member Positon <span class="required">*</span></label>
                        <select class="form-control select2" name="position_id">
                            <option value="">Select One</option>
                            @foreach ($categories as $category)
                            <option @if($category->id == $faculty->position_id) selected
                                @endif value="{{ $category->id }}">{{ $category->title }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12 {{ $errors->has('details') ? 'has-error' : '' }}">
                        <label class="control-label">Bio</label>
                        {!! Form::textarea('details', $faculty->details, ['class' => 'form-control border-none input-default bg-ash', 'style' => 'height:100px;']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Facebook</label>
                        <input type="text" class="form-control" name="facebook" value="{{ $faculty->facebook }}" placeholder="facebook link">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Instagram</label>
                        <input type="text" class="form-control" name="instagram" value="{{ $faculty->instagram }}" placeholder="instagram link">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Twitter</label>
                        <input type="text" class="form-control" name="twitter" value="{{ $faculty->twitter }}" placeholder="twitter link">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Skype</label>
                        <input type="text" class="form-control" name="skype" value="{{ $faculty->skype }}" placeholder="skype link">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Member Photo</label>
                        <input type="file" class="form-control dropify" name="photo" data-default-file="/frontend/images/{{ $faculty->photo }}" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Save Member</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection