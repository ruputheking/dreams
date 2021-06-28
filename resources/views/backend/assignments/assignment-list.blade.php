@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Assignments list</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">Assignments List</span>
                <a href="{{route('assignments.create')}}" class="btn btn-primary btn-sm pull-right" style="margin-top:-3px;">Add Assignment</a>
            </div>
            <div class="panel-body">
                <table id="example1" class="table table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Subject</th>
                            <th>Deadline</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php($n = 1)

                        @foreach ($assignments as $assignment)
                        <tr>
                            <td>
                                {{$n}}
                                @php($n++)
                            </td>
                            <td>{{$assignment->title}}</td>
                            <td>{{$assignment->title}}</td>
                            <td>{{$assignment->section_name}}</td>
                            <td>{{$assignment->subject_name}}</td>
                            <td>{{$assignment->deadline}}</td>
                            <td>
                                @if($assignment->file)
                                    <li class="dropdown" style="display: inline;">
                                        <a href="#" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            @if($assignment->file)
                                                <li><a href="/frontend/images/{{ $assignment->file }}" download>File 1</a></li>
                                                @endif
                                                @if($assignment->file_2)
                                                    <li><a href="/frontend/images/{{ $assignment->file_2 }}" download>File 2</a></li>
                                                    @endif
                                                    @if($assignment->file_3)
                                                        <li><a href="/frontend/images/{{ $assignment->file_3 }}" download>File 3</a></li>
                                                        @endif
                                                        @if($assignment->file_4)
                                                            <li><a href="/frontend/images/{{ $assignment->file_4 }}" download>File 4</a></li>
                                                            @endif
                                        </ul>
                                    </li>
                                    @endif
                                    <!-- Edit Button -->
                                    <a href="{{route('assignments.edit', $assignment->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <!-- Delete Button -->
                                    <a href="{{route('assignments.show',$assignment->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                    <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$assignment->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                                    <div id="{{$assignment->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['assignments.destroy', $assignment->id]]) !!}
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
@endsection