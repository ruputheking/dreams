@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">File List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">

            @if (get_auth() == 'teacher')
            <div class="panel-heading">
                <span class="panel-title">File List</span>
                <a href="{{ route('sharefiles.create')}}" class="btn btn-info btn-sm pull-right" style="margin-top:-3px">Add New</a>
            </div>
            @endif
            @if (get_auth() == 'admin')
            <div class="panel-heading clearfix">
                <div class="col-md-2 pull-left" style="margin-top:-5px;">
                    <select id="class" class="form-control select2" onchange="showClass(this);">
                        <option value="">Select Class</option>
                        {{ create_option('courses','id','title',$course_id) }}
                    </select>
                </div>
                <a href="{{ route('sharefiles.create')}}" class="btn btn-info btn-sm pull-right" style="margin-top:5px">Add New</a>
                @endif
            </div>
            <div class="panel-body">
                <table id="example1" class="table table-stripped">
                    @php
                    $i = 1;
                    @endphp
                    <thead>
                        <th>#</th>
                        <th>File Name</th>
                        <th>Course</th>
                        <th>Subject</th>
                        <th>Section</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($files as $data)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $data->file_name }}</td>
                            <td>{{ $data->class_name }}</td>
                            <td>{{ $data->subject_name }}</td>
                            <td>{{ $data->section_name }}</td>
                            <td>
                                <a href="/frontend/images/{{ $data->file }}" class="btn btn-primary btn-xs" download><i class="fa fa-download" aria-hidden="true"></i> Download</a>
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
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['sharefiles.destroy', $data->id]]) !!}
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
@role(['admin'])
<script>
    function showClass(elem) {
        if ($(elem).val() == "") {
            return;
        }
        window.location = "<?php echo url('dashboard/sharefiles/class') ?>/" + $(elem).val();
    }
</script>
@endrole
@endsection