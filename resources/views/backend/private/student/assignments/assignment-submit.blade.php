@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('student.my_assignment') }}">My Assignment</a></li>
<li class="active">Submit Assignment</li>
@endsection

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <h3 class="panel-title pull-left">You Can Chose Multiple Images</h3>
            <form class="pull-right" action="{{route('student.assign_student')}}" method="post">
                {{csrf_field()}}
                <input type="text" name="topic_id" value="{{$assignment->id}}" hidden>
                @if (!$submit)
                <input type="text" name="value" value="1" hidden>
                <button type="submit">Submit</button>
                @else
                @if ($submit->value == 1)
                <input type="text" name="assign_id" value="{{$submit->id}}" hidden>
                <input type="text" name="value" value="0" hidden>
                <button type="submit" name="button">Unsubmit</button>
                @endif
                @if ($submit->value == 0)
                <input type="text" name="assign_id" value="{{$submit->id}}" hidden>
                <input type="text" name="value1" value="1" hidden>
                <input type="text" name="value" value="2" hidden>
                <button type="submit">Submit</button>
                @endif
                @endif
            </form>
        </div>
        <div class="panel-body">
            <br />
            <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-3" align="right">
                        <h4>Select Images</h4>
                    </div>
                    <div class="col-md-6">
                        <input type="file" class="dropify" name="file_name[]" accept="image/*" multiple required />
                        <input type="text" name="assignment_id" value="{{$assignment->id}}" hidden>
                        <input type="text" name="student_id" value="{{get_student_id()}}" hidden>
                    </div>
                    <div class="col-md-3">
                        <input type="submit" name="upload" value="Upload" class="btn btn-success" />
                    </div>
                </div>
            </form>

            @if ($assign->count()
            != 0)
            <hr>
            <div class="table-responsive" style="margin-top:50px;">
                <table id="example1" class="table table-striped">
                    <thead>
                        <th>File</th>
                        <th>Assignment</th>
                        <th>Subject</th>
                        <th width="200">Action</th>
                    </thead>
                    <tbody>
                        @foreach($assign AS $data)
                        <tr>
                            <td><img src="{{ asset('frontend/images/assignments/students/'.$data->file_name) }}" width="50px" alt=""></td>
                            <td>{{$assignment->title}}</td>
                            <td>{{$assignment->subject_name}}</td>
                            <td>
                                <form action="{{route('student.destroy_assignment',$data->id)}}" method="post">
                                    <a href="{{ asset('frontend/images/assignments/students/'.$data->file_name) }}" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                    {{ method_field('DELETE') }}
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-danger btn-xs btn-remove"><i class="fa fa-eraser" aria-hidden="true"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @endif
        </div>
    </div>
</div>
@endsection