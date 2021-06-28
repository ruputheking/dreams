@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('news.index') }}">News List</a></li>
<li class="active">Update News</li>
@endsection

@section('styles')
<link rel="stylesheet" href="/backend/plugins/popup/style.css">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>Update Blog
                </div>
            </div>
            <div class="panel-body">
                <form id="post-form" class="form-group" action="{{ route('news.update', $post->slug) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}

                    <div class="row">
                        <div class="col-xs-8">
                            <div class="basic-form">
                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <h4>Title <span class="required">*</span></h4>
                                    <input type="text" id="title" name="title" value="{{ $post->title }}" class="form-control" placeholder="Enter News Title">
                                </div>
                                <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                                    <h4>Slug <span class="required">*</span></h4>
                                    <input type="text" id="slug" name="slug" value="{{ $post->slug }}" class="form-control" placeholder="Enter News Slug">
                                </div>
                                <div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">
                                    <h4>Summary <span class="required">*</span></h4>
                                    <textarea name="summary" rows="6" cols="80" class="form-control">{{ $post->summary }}</textarea>
                                </div>
                                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                    <h4>Description <span class="required">*</span></h4>
                                    <textarea name="description" class="form-control textarea">{{ $post->description }}</textarea>
                                </div>
                                <div class="card-header" style="border-bottom:1px solid #ccc;" id="headingTwo">
                                    <h4 class="mb-0">
                                        <span style="cursor:pointer;" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            SEO Details <i class="fa fa-arrow-down"></i>
                                        </span>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="collapse mb-4" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="col-md-12 {{ $errors->has('seo_meta_keywords') ? ' has-error' : '' }}">
                                        <label class="control-label">Meta Keywords</label>
                                        <textarea type="text" class="form-control" name="seo_meta_keywords" value="{{ $post->seo_meta_keywords }}" placeholder="Meta Keywords"></textarea>
                                    </div>
                                    <div class="col-md-12 {{ $errors->has('seo_meta_description') ? ' has-error' : '' }}">
                                        <label class="control-label">Meta Description</label>
                                        <textarea type="text" class="form-control" name="seo_meta_description" value="{{ $post->seo_meta_description }}" placeholder="Meta Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                                <h4>Category <span class="required">*</span></h4>
                                <select class="form-control select2" name="category_id">
                                    <option value="">Select One</option>
                                    @foreach ($categories as $data)
                                    <option @if($data->id == $post->category_id) selected
                                        @endif value="{{ $data->id }}">{{ $data->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
                                <h4>Published Date</h4>
                                <div class='input-group datetimepicker'>
                                    <input type="text" name="published_at" value="{{ $post->published_at }}" class="form-control">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="form-group {{ $errors->has('feature_image') ? 'has-error' : '' }}">
                                    <h4>Image <span class="required">*</span></h4>
                                    <input type="file" name="feature_image" class="dropify" data-default-file="/frontend/images/{{ $post->feature_image }}" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                </div>
                            </div>
                            <div class="box-footer pull-right mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('news.index') }}" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection