@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('visitors.index') }}">Visitor Book</a></li>
<li class="active">View Visitor</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">View Visitor</span>
            </div>

            <div class="panel-body">
                <table class="table table-bordered">
                    @if ($visitor->image)
                    <tr>
                        <td colspan="2" class="text-center"><img src="/frontend/images/visitors/{{ $visitor->image }}" width="100" height="100" /></td>
                    </tr>
                    @endif
                    <tr>
                        <td>Full Name</td>
                        <td>{{ $visitor->name }}</td>
                    </tr>
                    <tr>
                        <td>Purpose</td>
                        <td>{{ $visitor->purpose }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $visitor->phone }}</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>{{ $visitor->date() }}</td>
                    </tr>
                    <tr>
                        <td>In Time</td>
                        <td>{{ $visitor->in_time() }}</td>
                    </tr>
                    <tr>
                        <td>Out Time</td>
                        <td>{{ $visitor->out_time() }}</td>
                    </tr>
                    <tr>
                        <td>No of People</td>
                        <td>{{ $visitor->no_of_people }}</td>
                    </tr>
                    @if ($visitor->note)
                    <tr>
                        <td>Note</td>
                        <td>{{ $visitor->note }}</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection