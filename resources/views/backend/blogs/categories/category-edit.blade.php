@extends('layouts.backend.main')

@section('header')
<li><a href="{{route('dashboard')}}">Dashboard</a></li>
<li><a href="{{route('categories.index')}}">Category List</a></li>
<li class="active">Update Category</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Update Category
                </div>
            </div>
            <div class="panel-body">
                <form action="{{route('categories.update',$category->slug)}}" class="form-group" autocomplete="off" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="control-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $category->title }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label">Slug <span class="required">*</span></label>
                            <input type="text" class="form-control" name="slug" id="slug" value="{{ $category->slug }}" id="slug" placeholder="Slug">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 mt-15">
                            <button type="submit" class="btn btn-info">Update Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('backend.blogs.categories.category-table')
</div>
@endsection