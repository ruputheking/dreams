@extends('layouts.backend.main')

@section('header')
<li><a href="{{route('dashboard')}}">Dashboard</a></li>
<li><a href="{{route('folders.index')}}">Folder List</a></li>
<li class="active">Update Folder</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Update Folder
                </div>
            </div>
            <div class="panel-body">
                <form action="{{route('folders.update',$folder->id)}}" class="form-horizontal form-groups-bordered validate" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="control-label">Folder <span class="required">*</span></label>
                            <input type="text" class="form-control" name="folder" value="{{ $folder->folder }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info">Update Folder</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('backend.folders.folder-table')
</div>
@endsection