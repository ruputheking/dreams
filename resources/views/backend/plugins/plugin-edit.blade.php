@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Plugin Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Plugin Edit
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form action="{{ route('plugins.update', $plugin->id) }}" class="form-horizontal form-groups-bordered validate" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{csrf_field()}}
                        {{ method_field('PATCH') }}
                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="control-label">Title <span class="required">*</span></label>
                            <input type="text" class="form-control" name="title" value="{{ $plugin->title }}" placeholder="Title" required>
                        </div>

                        <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                            <label class="control-label">Code <span class="required">*</span></label>
                            <textarea type="text" class="form-control" rows="10" cols="50" name="code" placeholder="Your Code">{{ $plugin->code }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Update Code</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection