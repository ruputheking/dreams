@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Notification List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    Notification List
                </div>
            </div>
            <div class="panel-body">
                <table class="table data-table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $i => $data)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$data->title}}</td>
                            <td>{{Carbon\Carbon::parse($data->created_at)->format('d F Y g:i A')}}</td>
                            <td>
                                @if ($data->status == 1)
                                <span class="label label-success">Seen</span>
                                @endif
                                @if ($data->status == 0)
                                <span class="label label-warning">Unseen</span>
                                @endif
                            </td>
                            <td>
                                @if ($data->address)
                                <a href="{{ $data->address }}" class="btn btn-xs btn-success">View</a>
                                @endif
                                <a href="{{ route('notifications.show', $data->id) }}" class="btn btn-xs btn-default">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection