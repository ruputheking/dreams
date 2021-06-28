@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('news.index') }}">News List</a></li>
<li class="active">Add New News</li>
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
                    Add New News
                </div>
            </div>
            <div class="panel-body">
                <form id="post-form" class="form-group" action="{{ route('news.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="basic-form">
                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <h4>Title <span class="required">*</span></h4>
                                    <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control" placeholder="Enter News Title">
                                </div>
                                <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                                    <h4>Slug <span class="required">*</span></h4>
                                    <input type="text" id="slug" name="slug" value="{{ old('slug') }}" class="form-control" placeholder="Enter News Slug">
                                </div>
                                <div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">
                                    <h4>Summary <span class="required">*</span></h4>
                                    <textarea name="summary" rows="6" cols="80" class="form-control">{{ old('summary') }}</textarea>
                                </div>
                                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                    <h4>Description <span class="required">*</span></h4>
                                    <textarea name="description" class="form-control textarea">{{ old('description') }}</textarea>
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
                                        <textarea type="text" class="form-control" name="seo_meta_keywords" value="{{ old('seo_meta_keywords') }}" placeholder="Meta Keywords"></textarea>
                                    </div>
                                    <div class="col-md-12 {{ $errors->has('seo_meta_description') ? ' has-error' : '' }}">
                                        <label class="control-label">Meta Description</label>
                                        <textarea type="text" class="form-control" name="seo_meta_description" value="{{ old('seo_meta_description') }}" placeholder="Meta Description"></textarea>
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
                                    <option @if($data->id == old('category_id')) selected
                                        @endif value="{{ $data->id }}">{{ $data->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
                                <h4>Published Date</h4>
                                <div class='input-group date datetimepicker'>
                                    <input type="text" name="published_at" value="{{ old('published_at') }}" class="form-control">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="form-group {{ $errors->has('feature_image') ? 'has-error' : '' }}">
                                    <h4>Feature Image <span class="required">*</span></h4>
                                    <input type="file" name="feature_image" class="dropify" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                </div>
                            </div>
                            <div class="box-footer pull-right mt-4">
                                <a id="draft-btn" class="btn btn-default">Save Draft</a>
                                {!! Form::submit('Publish', ['class' => 'btn btn-success']) !!}
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