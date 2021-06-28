@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('coursecomments.index') }}">Comments List</a></li>
<li class="active">View Comment</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">View Comment</div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Name</td>
                        <td>{{ $comment->name }}</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>{{ date('d M, Y - H:i' , strtotime($comment->created_at)) }}</td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td>{{ $comment->email }}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{{ $comment->phone }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            @if ($comment->status == 1)
                            <label class="label label-success">Seen</label>
                            @endif
                            @if ($comment->status == 0)
                            <label class="label label-warning">Unseen</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Comments</td>
                        <td>{{ $comment->comments }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection