@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Job List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">All Jobs</span>
                <a class="btn btn-primary btn-sm pull-right" data-title="Add New Jobs" style="margin-top:-3px;" href="{{route('jobs.create')}}">Add New</a>
            </div>

            <div class="panel-body">
                <div class="content-block box">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Salary</th>
                                    <th>Candidate</th>
                                    <th>Deadline</th>
                                    <th>Views</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($jobs as $key => $data)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->location }}</td>
                                    <td>Rs {{ decimalPlace($data->salary) }}</td>
                                    <td>{{ decimalPlace($data->candidate) }}</td>
                                    <td>{{ date('d-M-Y', strtotime($data->deadline)) }}</td>
                                    <td>{{ decimalPlace($data->view_count) }}</td>
                                    <td>
                                        @if ($data->status == 1)
                                        <label class="label label-success">Active</label>
                                        @endif
                                        @if ($data->status == 0)
                                        <label class="label label-warning">Draft</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('jobs.edit', $data->slug)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="{{route('jobs.show', $data->slug)}}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> View</a>
                                        <!-- Delete Button -->
                                        <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$data->slug}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                                        <div id="{{$data->slug}}deleteModal" class="delete-modal modal fade" role="dialog">
                                            <!-- Delete Modal -->
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <div class="delete-icon"></div>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <h4 class="modal-heading">Are You Sure ?</h4>
                                                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['jobs.destroy', $data->slug]]) !!}
                                                        {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                                                        {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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