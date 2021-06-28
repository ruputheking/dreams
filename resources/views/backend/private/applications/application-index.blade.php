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
                <span class="panel-title">All Applications</span>
                <a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="Application Form" style="margin-top:-3px;" href="{{route('applications.create')}}">Apply Leave</a>
            </div>

            <div class="panel-body">
                <div class="content-block box">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subject</th>
                                    <th>Leave Duration</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($applications as $key => $application)
                                <tr>
                                    @php
                                    $j = ++$i;
                                    @endphp
                                    <td>{{ ++$key }}</td>
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
                                        <a href="{{route('applications.show', $application->slug)}}" data-title="View Application" class="btn btn-primary btn-xs ajax-modal"><i class="fa fa-eye"></i> View</a>
                                        @if ($application->status == 0)
                                        <a href="{{route('applications.edit', $application->slug)}}" data-title="Update Application" class="btn btn-warning btn-xs"><i class="fa fa-tools"></i> Edit</a>
                                        <a type="submit" onclick="event.preventDefault();document.getElementById('cancel{{$j}}').submit();" class="btn btn-danger btn-xs"><i class="fa fa-stop-check" aria-hidden="true"></i> Cancel</a>
                                        @endif
                                        <!-- Delete Button -->
                                        <form id="cancel{{$j}}" action="{{route('applications.cancel', $application->slug)}}" method="post" style="display:none;">
                                            {{csrf_field()}}
                                            <input type="hidden" name="status" value="3">
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