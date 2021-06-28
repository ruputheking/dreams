@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">News List</li>
@endsection

@section('content')
@if(session('trash-message'))
<?php list($message, $postId) = session('trash-message') ?>
{!! Form::open(['method' => 'PUT', 'route' => ['news.restore', $postId]]) !!}
<div class="alert alert-info" id="success" style="padding:12px 20px;z-index: 999999;border-radius: 5px;position:absolute;top:10px;right:15px;">
    {{ $message }}
    <br>
    <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-undo"></i> Undo</button>
</div>
{!! Form::close() !!}
@endif
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{route('news.create')}}"="button" class="btn btn-primary btn-sm">Add New Blog</a>
                <div class=" pull-right" style="margin-top:4px">
                    <?php $links = [] ?>
                    @foreach($statusList as $key => $value)
                    @if($value)
                    <?php $selected = Request::get('status') == $key ? 'selected-status' : '' ?>
                    <?php $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($key) . "({$value})</a>" ?>
                    @endif
                    @endforeach
                    {!! implode(' | ', $links) !!}
                </div>
            </div>
            <div class="panel-body">
                @if($onlyTrashed)
                @include('backend.blogs.blogs.blog-table-trash')
                @else
                @include('backend.blogs.blogs.blog-table')
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    setTimeout(function() {
        $('#success').fadeOut('slow');
    }, 8000);
</script>
@endsection