@extends('layouts.backend.main')

@section('header')
<li><a href="{{route('dashboard')}}">Dashboard</a></li>
<li><a href="{{route('sliders.index')}}">Sliders Items</a></li>
<li class="active">Update Slider</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Edit New Slider
                </div>
            </div>
            <div class="panel-body">
                <form action="{{route('sliders.update', $slider->id)}}" class="form-group" enctype="multipart/form-data" autocomplete="off" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group col-md-12">
                                <label class="control-label" style="float:left">Slider Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $slider->title }}" placeholder="Slider Title">
                            </div>
                            <div class="form-group col-md-12 {{ $errors->has('summary') ? 'has-error' : '' }}">
                                <label class="control-label">Summary</label>
                                {!! Form::textarea('summary', $slider->details, ['class' => 'form-control border-none input-default bg-ash', 'style' => 'height:100px;']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label" style="float:left">Button First Title</label>
                                <input type="text" class="form-control" name="button_first" value="{{ $slider->button1 }}" placeholder="Button First Title">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label" style="float:left">URL First Link</label>
                                <input type="text" class="form-control" name="url_first" value="{{ $slider->url_link1 }}" placeholder="URL First Link">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label" style="float:left">Button Second Title </label>
                                <input type="text" class="form-control" name="button_second" value="{{ $slider->button2 }}" placeholder="Button Second Title">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label" style="float:left">URL Second Link </label>
                                <input type="text" class="form-control" name="url_second" value="{{ $slider->url_link2 }}" placeholder="URL Second Link">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Position <span class="required">*</span></label>
                                <select class="form-control select2" name="position">
                                    <option>Select One</option>
                                    <option @if($slider->position == 'right') selected
                                        @endif value="right">Right
                                    </option>
                                    <option @if($slider->position == 'left') selected
                                        @endif value="left">Left
                                    </option>
                                    <option @if($slider->position == 'center') selected
                                        @endif value="center">Center
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" style="float:left">Slider Image <span class="required">*</span></label>
                                <input type="file" class="form-control dropify" name="photo" data-default-file="/frontend/images/{{ $slider->photo }}" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" />
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
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