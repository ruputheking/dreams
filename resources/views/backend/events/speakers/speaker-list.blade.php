@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Speaker List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading"><span class="panel-title">All Speaker</span>
                <a class="btn btn-primary btn-sm pull-right" data-title="Add New Event" style="margin-top:-3px;" href="{{route('speakers.create')}}">Add New</a>
            </div>

            <div class="panel-body">
                <div class="content-block box">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Event</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($speakers as $speaker)
                                <tr>
                                    <td>
                                        <img src="/frontend/images/{{ $speaker->photo }}" alt="{{ $speaker->name }}" style="width:50px;height:50px;">
                                    </td>
                                    <td>{{ $speaker->name }}</td>
                                    <td>{{ $speaker->position }}</td>
                                    <td>{{ $speaker->event->title ?? '-' }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="{{route('speakers.edit', $speaker->id)}}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        <!-- Delete Button -->
                                        <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$speaker->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                                        <div id="{{$speaker->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['speakers.destroy', $speaker->id]]) !!}
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