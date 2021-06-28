@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Event Calendar</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title text-center">Event Calendar</h4>
            </div>
            <div class="content">
                <div id='event_calendar'></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@include('backend.dashboard.script')
@endsection