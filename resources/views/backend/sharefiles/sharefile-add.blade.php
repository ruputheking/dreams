@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('sharefiles.index') }}">File List</a></li>
<li class="active">Add New File</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Add New File
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    {!! Form::open(['method' => 'POST', 'route' => 'sharefiles.store','files' => TRUE, 'autocomplete' => 'off']) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('file_name') ? ' has-error' : '' }}">
                                    {!! Form::label('file_name', 'File Name') !!}
                                    <span class="required">*</span>
                                    {!! Form::text('file_name', old('file_name'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'File Name']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('course_id') ? ' has-error' : '' }}">
                                    {!! Form::label('course_id', 'Class') !!}
                                    <span class="required">*</span><select class="form-control select2" name="course_id" onChange="getData(this.value);" required>
                                        <option value="">{{ 'Select One' }}</option>
                                        {{ create_option('courses','id','title', old('course_id')) }}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('section_id') ? 'has-error' : '' }}">
                                    {!! Form::label('section_id', 'Section') !!}
                                    <span class="required">*</span>
                                    <select name="section_id" class="form-control select2" required>
                                        <option value="">{{ 'Select One' }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('subject_id') ? 'has-error' : '' }}">
                                    {!! Form::label('subject_id', 'Subject') !!}
                                    <span class="required">*</span>
                                    <select name="subject_id" class="form-control select2" required>
                                        <option value="">{{ 'Select One' }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
                                    {!! Form::label('file', 'File') !!}
                                    <span class="required">*</span>
                                    <input type="file" class="dropify" name="file[]" multiple required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer clearfix">
                        <div class="btn-group pull-right">
                            {!! Form::reset("Reset", ['class' => 'btn btn-default']) !!}
                            {!! Form::submit("Share File", ['class' => 'btn btn-success', 'style' => 'margin-left:10px;']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script type="text/javascript">
    function getData(val) {
        var _token = $('input[name=_token]').val();
        var course_id = $('select[name=course_id]').val();
        $.ajax({
            type: "POST",
            url: "{{url('dashboard/sections/section')}}",
            data: {
                _token: _token,
                course_id: course_id
            },
            success: function(sections) {
                $('select[name=section_id]').html(sections);
            }
        });
        $.ajax({
            type: "POST",
            url: "{{url('dashboard/subjects/subject')}}",
            data: {
                _token: _token,
                course_id: course_id
            },
            success: function(subjects) {
                $('select[name=subject_id]').html(subjects);
            }
        });
    }
</script>
@stop
@endsection