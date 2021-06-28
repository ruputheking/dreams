@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('generalcalls.index') }}">Phone Call Log</a></li>
<li class="active">View Phone Call Log</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">View Phone Call Log</span>
            </div>

            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-bordered">
                            @if ($generalcall->name)
                            <tr>
                                <td>Full Name</td>
                                <td>{{ $generalcall->name }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td>Phone</td>
                                <td>{{ $generalcall->contact }}</td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>{{ $generalcall->date() }}</td>
                            </tr>
                            <tr>
                                <td>Call Type</td>
                                <td>{{ $generalcall->call_type }}</td>
                            </tr>
                            @if ($generalcall->follow_up_date)
                            <tr>
                                <td>Follow Up Date</td>
                                <td>{{ $generalcall->follow_up_date }}</td>
                            </tr>
                            @endif
                            @if ($generalcall->call_duration)
                            <tr>
                                <td>Call Duration</td>
                                <td>{{ $generalcall->call_duration }}</td>
                            </tr>
                            @endif
                            @if ($generalcall->description)
                            <tr>
                                <td>Description</td>
                                <td>{{ $generalcall->description }}</td>
                            </tr>
                            @endif
                            @if ($generalcall->note)
                            <tr>
                                <td>Note</td>
                                <td>{{ $generalcall->note }}</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection