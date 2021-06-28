@extends('layouts.errors.main')

@section('title', 'Page Forbidden')

@section('content')
<div class="col-md-7">
    <h1 class="font-200 line-height-1em mt-0 mb-0 text-theme-colored">403!</h1>
    <h2 class="mt-0">Oops! Action Forbidden</h2>
    <p>{{$exception->getMessage() ?: 'Forbidden'}}</p>
    <a class="btn btn-border btn-gray btn-transparent btn-circled" href="{{ route('pages.home') }}">Return Home
    </a>
</div>
@endsection