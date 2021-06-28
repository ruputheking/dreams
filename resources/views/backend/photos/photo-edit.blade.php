@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('galleries.index') }}">Gallery</a></li>
<li><a href="{{ route('galleries.show', $photo->folder->slug) }}">{{ $photo->folder->title }}</a></li>
<li class="active">Edit Photo</li>
@endsection

@section('styles')
<link rel="stylesheet" href="/backend/plugins/popup/style.css">
@endsection

@section('content')
<style media="screen">
    .addbutton {
        position: fixed;
        bottom: 10%;
        right: 4%;
        background-color: #03A9F5;
        border-radius: 50%;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Photos
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-12">

                    <form class="form-group" action="{{ route('galleries.update', $photo->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}

                        <div class="row">
                            <div class="col-md-12 modal2_footer">
                                <div class="basic-form">
                                    <label class="control-label">Image</label>
                                    <input type="file" name="image" id="input-file-now" data-default-file="{{$photo->image_url}}" class="dropify" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="basic-form">
                                    <div class="form-group {{ $errors->has('image_name') ? 'has-error' : '' }}">
                                        <label class="control-label">Image Name</label>
                                        <input type="text" name="image_name" value="{{ $photo->image_name }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="basic-form">
                                    <div class="form-group {{ $errors->has('folder_id') ? 'has-error' : '' }}">
                                        <label class="control-label">Folder Name</label>
                                        {!! Form::select('folder_id', App\Models\Folder::pluck('title', 'id'), null, ['class' => 'form-control select2']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="basic-form">
                                    <div class="card-footer clearfix">
                                        <button type="submit" class="btn btn-primary">{{ $photo->exists ? 'Update' : 'Save' }}</button>
                                    </div>
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

@section('scripts')
<script type="text/javascript" src="/backend/plugins/popup/script.js"></script>
@endsection