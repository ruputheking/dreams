@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('notifications.index') }}">Notification List</a></li>
<li class="active">View Notification</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">View Notification</div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Subject</td>
                        <td>{{ $notification->title }}</td>
                    </tr>
                    <tr>
                        <td>Message</td>
                        <td>{{ $notification->message }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            @if ($notification->status == 1)
                            <label class="label label-success">Seen</label>
                            @endif
                            @if ($notification->status == 0)
                            <label class="label label-warning">Unseen</label>
                            @endif
                        </td>
                    </tr>
                    @if ($notification->address)
                    <tr>
                        <td>View</td>
                        <td><a href="{{ $notification->address }}" class="label label-primary">View</a></td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection