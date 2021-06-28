@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('application_requests.index') }}">Application List</a></li>
<li class="active">View Application</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">View Application</span>
            </div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Applicant Name</td>
                        <td>{{ $application->user->user_name }}</td>
                    </tr>
                    <tr>
                        <td>Leave Duration</td>
                        <td>{{ $application->fromMonth() }} {{ $application->fromDay() }}, {{ $application->fromYear() }} - {{ $application->toMonth() }} {{ $application->toDay() }}, {{ $application->toYear() }}</td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td>{{ $application->subject }}</td>
                    </tr>
                    @if ($application->document)
                    <tr>
                        <td>Document</td>
                        <td>
                            <a href="/frontend/images/applications/{{ $application->document }}" class="btn btn-primary btn-xs" download><i class="fa fa-download"></i> Download</a>
                        </td>
                    </tr>
                    @endif
                    @if ($application->reason)
                    <tr>
                        <td colspan="2">{!! $application->reason !!}</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection