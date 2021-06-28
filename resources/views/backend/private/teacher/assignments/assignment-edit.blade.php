@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('teacher.assignments') }}">Assignments List</a></li>
<li class="active">Update Assignment</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Update Assignment
				</div>
			</div>
			<div class="panel-body">
				<div class="col-md-12">
					<form action="{{ route('teacher.update_assignment', $assignment->id) }}" class="form-horizontal form-groups-bordered validate" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						{{csrf_field()}}
						<div class="modal-body">
							<div class="form-group">
								<div class="col-md-12 {{ $errors->has('title') ? ' has-error' : '' }}">
									<label class="control-label">Assignment Title</label>
									<span class="required">*</span>
									{!! Form::text('title', $assignment->title, ['class' => 'form-control', 'required' => 'required']) !!}
								</div>
								<div class="col-md-12 {{ $errors->has('description') ? ' has-error' : '' }}">
									<label class="control-label">Description</label>
									<textarea class="form-control summernote" name="description">{{ $assignment->description }}</textarea>
								</div>
								<div class="col-md-6 {{ $errors->has('deadline') ? ' has-error' : '' }}">
									<label class="control-label">Deadline</label>
									<span class="required">*</span>
									<input type="text" class="form-control datetimepicker" name="deadline" value="{{ $assignment->deadline }}" required>
								</div>
								<div class="col-md-6 {{ $errors->has('course_id') ? ' has-error' : '' }}">
									<label class="control-label">Course</label>
									<span class="required">*</span><select class="form-control select2" name="course_id" onChange="getData(this.value);" required>
										<option value="">Select One</option>
										{{ create_option('courses','id','title', $assignment->course_id) }}
									</select>
								</div>
								<div class="col-md-6 {{ $errors->has('section_id') ? 'has-error' : '' }}">
									<label class="control-label">Section</label>
									<span class="required">*</span>
									<select name="section_id" onChange="getSubject();" class="form-control select2" required>
										<option value="">Select One</option>
										<option selected value="{{ $assignment->section_id }}">{{ $assignment->section_name }}</option>
									</select>
								</div>
								<div class="col-md-6 {{ $errors->has('subject_id') ? 'has-error' : '' }}">
									<label class="control-label">Subject</label>
									<span class="required">*</span>
									<select name="subject_id" class="form-control select2" required>
										<option value="">Select One</option>
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
						<div class="modal-footer clearfix">
							<div class="btn-group pull-right">
								{!! Form::reset("Reset", ['class' => 'btn btn-default']) !!}
								{!! Form::submit("Update Assignment", ['class' => 'btn btn-success', 'style' => 'margin-left:10px;']) !!}
							</div>
						</div>
					</form>
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
				$('select[name=subject_id]').html("")
				$('select[name=section_id]').html(sections);
			}
		});


	}

	function getSubject() {
		var _token = $('input[name=_token]').val();
		var course_id = $('select[name=course_id]').val();
		var section_id = $('select[name=section_id]').val();
		$.ajax({
			type: "POST",
			url: "{{ url('dashboard/teacher/get_teacher_subject') }}",
			data: {
				_token: _token,
				course_id: course_id,
				section_id: section_id
			},
			success: function(subjects) {
				$('select[name=subject_id]').html(subjects);
			}
		});
	}
</script>
@stop
@endsection