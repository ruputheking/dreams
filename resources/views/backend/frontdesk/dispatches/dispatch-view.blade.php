@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('dispatches.index') }}">Postal Dispatch</a></li>
<li class="active">View Postal Dispatch</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">View Postal Dispatch</span>
            </div>

            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>To Title</td>
                                <td>{{ $dispatch->to_title }}</td>
                            </tr>
                            @if ($dispatch->address)
                            <tr>
                                <td>Address</td>
                                <td>{{ $dispatch->address }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td>From Title</td>
                                <td>{{ $dispatch->from_title }}</td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>{{ $dispatch->date() }}</td>
                            </tr>
                            @if ($dispatch->image)
                            <tr>
                                <td>Attach Document</td>
                                <td><a href="/frontend/images/dispatches/{{ $dispatch->image }}" class="btn btn-primary btn-sm" download>Download</a> </td>
                            </tr>
                            @endif
                            @if ($dispatch->note)
                            <tr>
                                <td>Note</td>
                                <td>{{ $dispatch->note }}</td>
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