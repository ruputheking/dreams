@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('courseappications.index') }}">Application List</a></li>
<li class="active">View Candidate</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">View Candidate</div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr class="text-center">
                        <td colspan="2"><img src="{{ asset('/frontend/images/'. $candidate->photo) }}" style="width: 400px; border-radius: 5px"></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $candidate->name }}</td>
                    </tr>
                    <tr>
                        <td>Applied Course</td>
                        <td>{{ $candidate->course->title }}</td>
                    </tr>
                    <tr>
                        <td>Applied Date</td>
                        <td>{{ date('d M, Y - H:i' , strtotime($candidate->created_at)) }}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>{{ $candidate->gender }}</td>
                    </tr>
                    <tr>
                        <td>Birth Date</td>
                        <td>{{ date('d M, Y - H:i' , strtotime($candidate->birthday)) }}</td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td>{{ $candidate->email }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $candidate->phone }}</td>
                    </tr>
                    <tr>
                        <td>Qualification</td>
                        <td>{{ $candidate->qualification ?? '-' }}</td>
                    </tr>
                    <tr>
                        @if ($candidate->attachment)
                        <td>Attachment</td>
                        <td>
                            <a href="{{ asset('/frontend/images/'. $candidate->attachment) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> View</a>
                            <a href="{{ asset('/frontend/images/'. $candidate->attachment) }}" class="btn btn-primary btn-xs" download><i class="fa fa-download"></i> Download</a>
                        </td>
                        @endif
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection