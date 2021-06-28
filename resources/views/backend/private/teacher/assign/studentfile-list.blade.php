@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('assign_student.list') }}">Assignments List</a></li>
<li><a href="{{ route('assigned_student.list', $id) }}">Students List</a></li>
<li class="active">File Collection</li>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h3 class="panel-title pull-left">File Collection</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="example1" class="table table-striped">
                <thead>
                    <th>File</th>
                    <th>Student</th>
                    <th>Assignment</th>
                    <th width="200">Action</th>
                </thead>
                <tbody>
                    @foreach($files AS $data)
                    <tr>
                        <td><img src="{{ asset('frontend/images/assignments/students/'.$data->file_name) }}" width="50px" alt=""></td>
                        <td>{{$data->student_name}}</td>
                        <td>{{$data->title}}</td>
                        <td>
                            <form action="{{route('student.destroy_assignment',$data->id)}}" method="post">
                                {{ method_field('DELETE') }}
                                {{csrf_field()}}
                                <a href="/frontend/images/assignments/students/{{ $data->file_name }}" class="btn btn-info btn-xs" download><i class="fa fa-download" aria-hidden="true"></i> Download</a>
                                <a href="{{ asset('frontend/images/assignments/students/'.$data->file_name) }}" target="_blank" class="btn btn-warning btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                <button type="submit" class="btn btn-danger btn-xs btn-remove"><i class="fa fa-eraser" aria-hidden="true"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection