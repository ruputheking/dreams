@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Folder List</li>
@endsection

@section('styles')
<link rel="stylesheet" href="/backend/plugins/popup/style.css">
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span>Folder List</span>
            </div>
            <style media="screen">
                .addbutton {
                    position: fixed;
                    bottom: 10%;
                    right: 4%;
                    background-color: #03A9F5;
                    border-radius: 50%;
                }
            </style>
            <div class="panel-body">
                @foreach ($folder as $folder)
                <div class="folder">
                    <a href="{{ route('galleries.show', $folder->slug) }}" class="btn btn-success">
                        <i class="fa fa-folder"></i> {{$folder->title}}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="addbutton">
    <button type="button" onclick="document.getElementById('id01').style.display='block'">
        <i class="fa fa-plus"></i>
    </button>
</div>
<div class="modal_container">
    <div class="modal2 animate" id="id01">
        <div class="modal_content">
            <div class="modal2_title">Add New Folder</div>
            <div class="modal2_body">
                {!! Form::open(['method' => 'POST', 'route' => 'folders.store', 'files' => TRUE, 'autocomplete' => 'off']) !!}
                <div class="col-md-12">
                    <div class="basic-form">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <h4>{!! Form::label('Folder') !!}</h4>
                            {!! Form::text('title', null, ['class' => 'form-control border-none input-default bg-ash', 'placeholder' => 'Folder Name', 'id' => 'title']) !!}
                        </div>
                        <input type="hidden" name="slug" class="form-control" id="slug">
                    </div>
                </div>
                <div class="col-md-12 modal2_footer">
                    <div class="basic-form">
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-default" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection