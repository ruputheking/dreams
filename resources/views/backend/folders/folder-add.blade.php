@extends('layouts.backend.main')

@section('header')
<li><a href="{{route('dashboard')}}">Dashboard</a></li>
<li class="active">Folder List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Add New Folder
                </div>
            </div>
            <div class="panel-body">
                <form action="{{route('folders.store')}}" class="form-horizontal validate" enctype="multipart/form-data" autocomplete="off" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label">Folder Name <span class="required">*</span></label>
                            <input type="text" class="form-control" name="folder" value="{{ old('folder') }}" placeholder="Folder Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('backend.folders.folder-table')
</div>
@endsection