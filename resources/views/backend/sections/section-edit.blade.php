@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('sections.index') }}">Section</a></li>
<li class="active">Update Section</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Update Section
                </div>
            </div>
            <div class="panel-body">
                <form action="{{route('sections.update',$section->id)}}" autocomplete="off" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group {{ $errors->has('section_name') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                            <label class="control-label">Name <span class="required">*</span> </label>
                            <input type="text" class="form-control" name="section_name" value="{{ $section->section_name }}" required>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('course_id') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                            <label class="control-label">Class <span class="required">*</span> </label>
                            <select name="course_id" class="form-control select2" required>
                                <option value="">Select One</option>
                                {{ create_option('courses','id','title',$section->course_id) }}
                            </select>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('teacher_id') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                            <label class="control-label">Class Teacher <span class="required">*</span> </label>
                            <select name="teacher_id" class="form-control select2" required>
                                <option value="">Select One</option>
                                {{ create_option('teachers','id','name',$section->teacher_id) }}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info">Update Section</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading clearfix">
                <div class="panel-title pull-left">Section List</div>
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
                        <th>Class Name</th>
                        <th>Section Name</th>
                        <th>Class Teacher</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse($sections AS $data)
                        <tr>
                            <td>{{$data->title}}</td>
                            <td>{{$data->section_name}}</td>
                            <td>{{$data->teacher_name}}</td>
                            <td>
                                <form action="{{route('sections.destroy',$data->id)}}" method="post">
                                    <a href="{{route('sections.edit',$data->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-xs btn-remove"><i class="fa fa-eraser" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No data found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection