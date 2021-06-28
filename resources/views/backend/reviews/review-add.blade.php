@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">New Review</li>
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
                    New Review
                </div>
            </div>
            <div class="panel-body">
                <form action="{{ route('reviews.store') }}" class="form-group" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    {{csrf_field()}}
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label">User Name <span class="required">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('details') ? ' has-error' : '' }}">
                            <label class="control-label">Details</label>
                            <textarea type="text" class="form-control" name="details" cols="50" rows="10" placeholder="Your Views">{{ old('details') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" style="float:left">Slider Image <span class="required">*</span></label>
                            <input type="text" id="result" class="form-control border-none input-default bg-ash" style="width:100%;" name="image" readonly />
                            <div class="clearfix">
                                <button class="btn btn-primary pull-right" type="button" onclick="document.getElementById('id01').style.display='block'" style="margin-top:10px;">Gallery</button>
                            </div>
                        </div>
                    </div>
                    @include('backend.partial.popup')

                    <div class="form-group mt-4 col-md-12">
                        <button type="submit" class="btn btn-info">Save Details</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="/backend/plugins/popup/script.js"></script>
@endsection