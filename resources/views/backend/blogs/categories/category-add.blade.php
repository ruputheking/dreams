@extends('layouts.backend.main')

@section('header')
<li><a href="{{route('dashboard')}}">Dashboard</a></li>
<li class="active">Category List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Add New Category
                </div>
            </div>
            <div class="panel-body">
                <form action="{{route('categories.store')}}" class="form-group" autocomplete="off" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label">Title <span class="required">*</span></label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title" placeholder="Category Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label">Slug <span class="required">*</span></label>
                            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}" id="slug" placeholder="Slug">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 mt-15">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('backend.blogs.categories.category-table')
</div>
@endsection