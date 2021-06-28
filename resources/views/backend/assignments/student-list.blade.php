@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('assignments.student') }}">Assignment List</a></li>
<li class="active">Student List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <div class="panel-title pull-left">
                    Student List
                </div>
            </div>
            <div class="panel-body">
                <table id="example1" class="table table-stripped">
                    <thead>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Due Date</th>
                        <th>Assign Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($files as $data)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $data->student_name }}</td>
                            <td>{{ $data->deadline }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>
                                @if ($data->value == 1)
                                Submitted
                                @endif
                                @if ($data->value == 0)
                                Unsubmitted
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('assigned.student_show',[ $assignmentid = $data->topic_id, $studentid = $data->student_id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
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
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['destory.assigned_student', $data->id]]) !!}
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
    @endsection