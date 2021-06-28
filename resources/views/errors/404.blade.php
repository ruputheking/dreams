@extends('layouts.errors.main')

@section('title', 'Page Not Found')

@section('content')
<div class="col-md-7">
    <h1 class="font-200 line-height-1em mt-0 mb-0 text-theme-colored">404!</h1>
    <h2 class="mt-0">Oops! Page Not Found</h2>
    <p>The page you were looking for could not be found.</p>
    <a class="btn btn-border btn-gray btn-transparent btn-circled" href="{{ route('pages.home') }}">Return Home
    </a>
</div>
@endsection