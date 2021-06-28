@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Application List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">All Application</span>
            </div>

            <div class="panel-body">
                <div class="content-block box">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Applicant Name</th>
                                    <th>Applicant Type</th>
                                    <th>Subject</th>
                                    <th>Leave Duration</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($applications as $key => $application)
                                <tr>
                                    @php
                                    $j = ++$key;
                                    @endphp
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $application->user->user_name }}</td>
                                    <td>{{ $application->user->roles()->first()->display_name }}</td>
                                    <td>{{ $application->subject }}</td>
                                    <td>{{ $application->fromMonth() }} {{ $application->fromDay() }}, {{ $application->fromYear() }} - {{ $application->toMonth() }} {{ $application->toDay() }}, {{ $application->toYear() }}</td>
                                    <td>
                                        @if ($application->status == 0)
                                        <label class="label label-warning">Pending</label>
                                        @endif
                                        @if ($application->status == 1)
                                        <label class="label label-danger">Rejected</label>
                                        @endif
                                        @if ($application->status == 2)
                                        <label class="label label-success">Approved</label>
                                        @endif
                                        @if ($application->status == 3)
                                        <label class="label label-primary">Cancel</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a type="submit" onclick="event.preventDefault();document.getElementById('accept{{$j}}').submit();" class="btn btn-success btn-xs"><i class="fa fa-stop-check" aria-hidden="true"></i> Approve</a>
                                        <a type="submit" onclick="event.preventDefault();document.getElementById('reject{{$j}}').submit();" class="btn btn-warning btn-xs"><i class="fa fa-stop-check" aria-hidden="true"></i> Reject</a>
                                        <a href="{{route('application_requests.show', $application->slug)}}" data-title="View Application" class="btn btn-primary btn-xs ajax-modal"><i class="fa fa-eye"></i> View</a>
                                        <a type="submit" onclick="event.preventDefault();document.getElementById('delete{{$j}}').submit();" class="btn btn-danger btn-xs"><i class="fa fa-stop-check" aria-hidden="true"></i> Delete</a>
                                        <!-- Delete Button -->
                                        <form id="accept{{$j}}" action="{{route('application_requests.update', $application->slug)}}" method="post" style="display:none;">
                                            {{csrf_field()}}
                                            <input type="hidden" name="status" value="2">
                                        </form>
                                        <form id="reject{{$j}}" action="{{route('application_requests.update', $application->slug)}}" method="post" style="display:none;">
                                            {{csrf_field()}}
                                            <input type="hidden" name="status" value="1">
                                        </form>
                                        <form id="delete{{$j}}" action="{{route('application_requests.update', $application->slug)}}" method="post" style="display:none;">
                                            {{csrf_field()}}
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection