@extends('layouts.backend.main')

@section('header')
<li><a href="{{route('dashboard')}}">Dashboard</a></li>
<li><a href="{{route('sliders.index')}}">Sliders Items</a></li>
<li class="active">Add Slider</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Add New Slider
                </div>
            </div>
            <div class="panel-body">
                <form action="{{route('sliders.store')}}" class="form-group" enctype="multipart/form-data" autocomplete="off" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group col-md-12">
                                <label class="control-label" style="float:left">Slider Title</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Slider Title">
                            </div>
                            <div class="form-group col-md-12 {{ $errors->has('summary') ? 'has-error' : '' }}">
                                <label class="control-label">Summary</label>
                                {!! Form::textarea('summary', old('summary'), ['class' => 'form-control border-none input-default bg-ash', 'style' => 'height:100px;']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label" style="float:left">Button First Title</label>
                                <input type="text" class="form-control" name="button_first" value="{{ old('button_first') }}" placeholder="Button First Title">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label" style="float:left">URL First Link</label>
                                <input type="text" class="form-control" name="url_first" value="{{ old('url_first') }}" placeholder="URL First Link">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label" style="float:left">Button Second Title </label>
                                <input type="text" class="form-control" name="button_second" value="{{ old('button_second') }}" placeholder="Button Second Title">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label" style="float:left">URL Second Link </label>
                                <input type="text" class="form-control" name="url_second" value="{{ old('url_second') }}" placeholder="URL Second Link">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Position <span class="required">*</span></label>
                                <select class="form-control select2" name="position">
                                    <option>Select One</option>
                                    <option @if(old('position') == 'right') selected
                                    @endif value="right">Right
                                    </option>
                                    <option @if(old('position') == 'left') selected
                                    @endif value="left">Left
                                    </option>
                                    <option @if(old('position') == 'center') selected
                                    @endif value="center">Center
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" style="float:left">Slider Image <span class="required">*</span></label>
                                <input type="file" class="form-control dropify" name="photo" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" />
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Save Slider</button>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection