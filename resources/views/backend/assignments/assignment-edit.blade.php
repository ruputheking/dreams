@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('assignments.index') }}">Assignments List</a></li>
<li class="active">Update Assignment</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="modal-title">Update Assignment</h4>
			</div>

			{!! Form::open(['method' => 'PUT', 'route' => ['assignments.update', $assignment->id],'files' => TRUE, 'autocomplete' => 'off']) !!}
			<div class="modal-body">
				<div class="row">
					<div class="form-group">
						<div class="col-md-12 {{ $errors->has('title') ? ' has-error' : '' }}">
							<label class="control-label">Name</label>
							<span class="required">*</span>
							{!! Form::text('title',$assignment->title, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Assignment Name']) !!}
						</div>
						<div class="col-md-12 {{ $errors->has('description') ? ' has-error' : '' }}">
							<label class="control-label">Description</label>
							<textarea class="form-control summernote" name="description">{{$assignment->description}}</textarea>
						</div>
						<div class="col-md-6 {{ $errors->has('deadline') ? ' has-error' : '' }}">
							<label class="control-label">Deadline</label>
							<span class="required">*</span>
							<input type="text" class="form-control datetimepicker" name="deadline" value="{{$assignment->deadline}}" required placeholder="Deadline">
						</div>
						<div class="col-md-6 {{ $errors->has('course_id') ? ' has-error' : '' }}">
							<label class="control-label">Class</label>
							<span class="required">*</span><select class="form-control select2" name="course_id" onChange="getData(this.value);" required>
								<option value="">{{ 'Select One' }}</option>
								{{ create_option('courses','id','title',$assignment->course_id) }}
							</select>
						</div>
						<div class="col-md-6 {{ $errors->has('section_id') ? 'has-error' : '' }}">
							<label class="control-label">Section</label>
							<span class="required">*</span>
							<select name="section_id" class="form-control select2" required>
								<option value="">{{ 'Select One' }}</option>
								<option selected value="{{ $assignment->section_id }}">{{ $assignment->section_name }}</option>
							</select>
						</div>
						<div class="col-md-6 {{ $errors->has('subject_id') ? 'has-error' : '' }}">
							<label class="control-label">Subject</label>
							<span class="required">*</span>
							<select name="subject_id" class="form-control select2" required>
								<option value="">{{ 'Select One' }}</option>
								<option selected value="{{ $assignment->subject_id }}">{{ $assignment->subject_name }}</option>
							</select>
						</div>
						<div class="col-md-6 {{ $errors->has('file') ? 'has-error' : '' }}">
							<label class="control-label">File</label>
							<input type="file" class="form-control appsvan-file" data-value="{{ $assignment->file }}" name="file">
						</div>
						<div class="col-md-6 {{ $errors->has('file_2') ? 'has-error' : '' }}">
							<label class="control-label">File</label>
							<input type="file" class="form-control appsvan-file" data-value="{{ $assignment->file_2 }}" name="file_2">
						</div>
						<div class="col-md-6 {{ $errors->has('file_3') ? 'has-error' : '' }}">
							<label class="control-label">File</label>
							<input type="file" class="form-control appsvan-file" data-value="{{ $assignment->file_3 }}" name="file_3">
						</div>
						<div class="col-md-6 {{ $errors->has('file_4') ? 'has-error' : '' }}">
							<label class="control-label">File</label>
							<input type="file" class="form-control appsvan-file" data-value="{{ $assignment->file_4 }}" name="file_4">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="btn-group pull-right">
					{!! Form::reset("Reset", ['class' => 'btn btn-default', 'style' => 'margin-right: 10px']) !!}
					{!! Form::submit("Update Assignment", ['class' => 'btn btn-success']) !!}
				</div>
			</div>
			{!! Form::close() !!}
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