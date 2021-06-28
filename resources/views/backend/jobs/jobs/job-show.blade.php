@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('jobs.index') }}">Job List</a></li>
<li class="active">View Job</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">View Job</div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Title</td>
                        <td>{{ $job->title }}</td>
                    </tr>
                    <tr>
                        <td>Views</td>
                        <td>{{ decimalPlace($job->view_count) }}</td>
                    </tr>
                    <tr>
                        <td>Deadline</td>
                        <td>{{ date('d M, Y - H:i' , strtotime($job->deadline)) }}</td>
                    </tr>
                    <tr>
                        <td>Required Candidate</td>
                        <td>{{ decimalPlace($job->candidate) ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Salary</td>
                        <td>{{ $job->salary ?? 'Negotiable' }}</td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td>{{ $job->location }}</td>
                    </tr>
                    <tr>
                        <td>In Short</td>
                        <td>{{ $job->summary }}</td>
                    </tr>
                    <tr>
                        <td>Details</td>
                        <td>{!! $job->details !!}</td>
                    </tr>
                    <tr>
                        <td>Seo Keywords</td>
                        <td>{{ $job->seo_meta_keywords }}</td>
                    </tr>
                    <tr>
                        <td>Seo Description</td>
                        <td>{{ $job->seo_meta_description }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection