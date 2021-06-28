@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Student</li>
@endsection

@section('content')
<style media="screen">
    .karuna {
        padding: 5px 10px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{route('students.create')}}"="button" class="btn btn-primary btn-sm">Add New Student</a>
                <div class=" pull-right" style="width:200px;margin-top:-7px">

                    <select id="class" class="karuna select2 pull-right" onchange="showClass(this);">
                        <option value="">Select Course</option>
                        {{ create_option('courses','id','title', $class) }}
                    </select>
                </div>
            </div>
            <div class="panel-body">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Section</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $key => $student)
                        <tr>
                            <td><img src="/frontend/images/{{ $student->photo }}" width="50px" alt=""></td>
                            <td>{{$student->student_name}}</td>
                            <td>{{$student->title}}</td>
                            <td>{{$student->section_name}}</td>
                            <td>{{$student->gender}}</td>
                            <td>{{$student->phone}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->address}}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{route('students.show', $student->id)}}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                                <a href="{{route('students.edit', $student->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                                <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$student->id}}deleteModal"><i class="fa fa-eraser"></i></a>
                                <!-- Delete Button -->
                                <div id="{{$student->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['students.destroy', $student->id]]) !!}
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

@section('scripts')
<script>
    function showClass(elem) {
        if ($(elem).val() == "") {
            return;
        }
        window.location = "<?php echo url('dashboard/students/class') ?>/" + $(elem).val();
    }
</script>
@stop