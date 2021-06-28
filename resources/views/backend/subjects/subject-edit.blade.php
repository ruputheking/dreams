@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('subjects.index') }}">Subject List</a></li>
<li class="active">Update Subject</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Update Subject
                </div>
            </div>
            <div class="panel-body">
                <form action="{{route('subjects.update', $subject->id)}}" class="validate" autocomplete="off" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="col-sm-12">
                        <div class="form-group {{ $errors->has('subject_name') ? ' has-error' : '' }}">
                            <label class="control-label">Subject Name <span class="required">*</span></label>
                            <input type="text" class="form-control" name="subject_name" value="{{ $subject->subject_name }}" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group {{ $errors->has('subject_code') ? ' has-error' : '' }}">
                            <label class="control-label">Subject Code <span class="required">*</span></label>
                            <input type="text" class="form-control" name="subject_code" value="{{ $subject->subject_code }}" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group {{ $errors->has('course_id') ? ' has-error' : '' }}">
                            <label class="control-label">Course <span class="required">*</span></label>
                            <select name="course_id" class="form-control select2" required>
                                <option value="">Select One</option>
                                {{ create_option('courses','id','title',$subject->course_id) }}
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Full Mark</label>
                            <input class="form-control" type="text" name="full_mark" value="{{ $subject->full_mark }}" placeholder="Full Mark">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Pass Mark</label>
                            <input class="form-control" type="text" name="pass_mark" value="{{ $subject->pass_mark }}" placeholder="Pass Mark">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group {{ $errors->has('subject_type') ? ' has-error' : '' }}">
                            <label class="control-label">Subject Type <span class="required">*</span></label>
                            <select name="subject_type" class="form-control select2" required>
                                <option value="">Select One</option>
                                <option @if('Theory'==$subject->subject_type) selected
                                    @endif value="Theory">Theory
                                </option>
                                <option @if('Practical'==$subject->subject_type) selected
                                    @endif value="Practical">Practical
                                </option>
                                <option @if('Both'==$subject->subject_type) selected
                                    @endif
                                    value="Both">Both
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Subject</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading clearfix">
                <div class="panel-title pull-left">Subjects List</div>
                <div class="col-md-4 pull-right" style="margin-top:-3px">
                    <select id="class" class="select_class select2 pull-right" onchange="showClass(this);">
                        <option value="">Select Class</option>
                        {{ create_option('courses','id','title',$class) }}
                    </select>
                </div>
            </div>
            <div class="panel-body no-export">
                <table class="table table-bordered data-table">
                    <thead>
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Course</th>
                        <th>Full Mark</th>
                        <th>Pass Mark</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse($subjects AS $data)
                        <tr>
                            <td>{{ $data->subject_name }}</td>
                            <td>{{ $data->subject_code }}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->full_mark }}</td>
                            <td>{{ $data->pass_mark }}</td>
                            <td>
                                <form action="{{route('subjects.destroy',$data->id)}}" method="post">
                                    <a href="{{route('subjects.edit',$data->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    {{ method_field('DELETE') }}
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-danger btn-xs btn-remove"><i class="fa fa-eraser" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center"> No data found</td>
                        </tr>
                        @endforelse
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
        window.location = "<?php echo url('dashboard/subjects/class') ?>/" + $(elem).val();
    }
</script>
@endsection