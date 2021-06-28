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
                <span class="panel-title">All Candidate</span>
            </div>

            <div class="panel-body">
                <div class="content-block box">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Job</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Qualification</th>
                                    <th>Applied Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($applications as $data)
                                <tr>
                                    <td><img src="/frontend/images/{{ $data->photo }}" style="width:50px; height: 50px;" /></td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->job->title }}</td>
                                    <td>{{ $data->gender }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->qualification }}</td>
                                    <td>{{ date('d-M-Y - H:i', strtotime($data->created_at)) }}</td>
                                    <td>
                                        <a href="{{route('jobappications.show', $data->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> View</a>
                                        <!-- Delete Button -->
                                        <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$data->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                                        <div id="{{$data->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['jobappications.destroy', $data->id]]) !!}
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