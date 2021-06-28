@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('galleries.index') }}">Gallery</a></li>
<li class="active">{{$folder->title}}</li>
@endsection

@section('styles')
<link rel="stylesheet" href="/backend/plugins/popup/style.css">
<style media="screen">
    .rounded {
        border-radius: 5px;
    }

    .addbutton {
        position: fixed;
        bottom: 10%;
        right: 4%;
        background-color: #03A9F5;
        border-radius: 50%;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Photos
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-12">

                    @forelse ($folder->images as $image)
                    <div class="member">
                        <div class="member-pic set-bg rounded" data-setbg="{{$image->image_url }}" style="margin:8px;">
                            <div class="image">

                            </div>
                            <img class="member-pic set-bg" src="{{$image->image_url }}" alt="" style="padding:0;">
                            <div class="member-social">
                                {!! Form::open(['method' => 'DELETE', 'route' => ['galleries.destroy', $image->id]]) !!}
                                <a href="{{route('galleries.edit', $image->id)}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{$image->image_url}}" target="_blank"><i class="fa fa-eye"></i></a>
                                <button type="submit"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="clearfix">
                        <span class="col-md-12 alert alert-danger pull-left">
                            No Image has been Found here.
                        </span>
                        <button type="button" class="btn btn-primary pull-right" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-plus"> Add Photo</i></button>
                    </div>
                    @endforelse

                    <div class="addbutton">
                        <button type="button" onclick="document.getElementById('id01').style.display='block'">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('backend.photos.photo-modal')
@endsection

@section('scripts')
<script type="text/javascript" src="/backend/plugins/popup/script.js"></script>
@endsection