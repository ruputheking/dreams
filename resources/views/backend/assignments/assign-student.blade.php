@extends('layouts.backend.main')

@section('header')
Assignments List
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <div class="panel-title pull-left">Assignments List</div>
                <div class="col-md-2 pull-right" style="margin-top:-10px;">
                    <select id="class" class="form-control select2 pull-right" onchange="showClass(this);">
                        <option value="">Select Class</option>
                        {{ create_option('courses','id','title',$class) }}
                    </select>
                </div>
            </div>
            <div class="panel-body">
                <div class="content-block box">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-striped">
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
                                    <td>{{$assignment->class_name}}</td>
                                    <td>{{$assignment->section_name}}</td>
                                    <td>{{$assignment->subject_name}}</td>
                                    <td>{{$assignment->deadline}}</td>
                                    <td>
                                        <!-- View Button -->
                                        <a href="{{route('assignments.list',$assignment->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View Student</a>
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

@section('scripts')
<script>
    function showClass(elem) {
        if ($(elem).val() == "") {
            return;
        }
        window.location = "<?php echo url('dashboard/assignment/student/class') ?>/" + $(elem).val();
    }
</script>
@endsection