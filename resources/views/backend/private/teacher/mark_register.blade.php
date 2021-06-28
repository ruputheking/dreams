@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Mark Register</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<span class="panel-title">
					Mark Register
				</span>
			</div>
			<div class="panel-body">
				<form id="search_form" class="params-panel validate" action="{{ url('dashboard/teacher/marks/create') }}" method="post" autocomplete="off" accept-charset="utf-8">
					@csrf
					<div class="col-md-10">
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Course</label>
								<select name="class_id" class="form-control select2" onChange="getData();" required>
									<option value="">Select One</option>
									{{ create_option('courses','id','title') }}
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Section</label>
								<select name="section_id" onChange="getSubject();" class="form-control select2" required>
									<option value="">Select One</option>

								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Subject</label>
								<select name="subject_id" id="subject_id" class="form-control select2" onChange="getExam();" required>
									<option value="">Select One</option>

								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Select Exam</label>
								<select class="form-control select2" name="exam" required>

								</select>
							</div>
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
							<button type="submit" style="margin-top:36px;" class="btn btn-primary btn-block rect-btn">Marks</button>
						</div>
					</div>
				</form>

				@if( !empty($marks) )
				<div class="col-md-12">
					<div class="panel-heading text-center">
						<div class="panel-title">
							{{ ('Mark Details for Class') }} {{ get_class_name($class_id) }}<br>
							{{ ('Exam').": ".get_exam($exam) }} <br>
							{{ ('Section').": ".get_section_name($section_id) }} <br>
							{{ ('Subject').": ".get_subject_name($subject_id) }} <br>
						</div>
					</div>
					<div class="alert alert-info">
						<strong>You May Put 100% marks on exam fields if others field not available for purticular subject !</strong>
					</div>
					<form method="post" action="{{ url('dashboard/teacher/marks/store') }}" class="appsvan-submit" autocomplete="off" accept-charset="utf-8">
						@csrf
						<table class="table table-bordered">
							<thead>
								<th>Name</th>
								@foreach($mark_destributions as $md)
								<th>{{ $md->mark_distribution_type }} ({{ $md->mark_percentage }})</th>
								@endforeach
							</thead>
							<tbody>
								@foreach($marks AS $key => $data)
								<tr>
									<td>{{ $data->student_name }}</td>
									@if( empty($mark_details) )
									@foreach($mark_destributions as $md)
									<td><input type="text" class="form-control float-field" name="marks[{{ $md->mark_distribution_type }}][{{ $data->student_id }}]" value=""></td>
									@endforeach
									@else

									@foreach($mark_details[$data->mark_id] as $md)
										<td><input type="text" class="form-control float-field" name="marks[{{ $md->mark_distribution_type }}][{{ $data->student_id }}]" value="{{ $md->mark_value }}"></td>
										@endforeach

										@if(!empty($new_fields))
										@foreach($new_fields as $md)
										<td><input type="text" class="form-control float-field" name="marks[{{ $md->mark_distribution_type }}][{{ $data->student_id }}]" value=""></td>
										@endforeach
										@endif

										@endif

										<input type="hidden" name="student_id[]" value="{{ $data->student_id }}">
										<input type="hidden" name="exam_id[]" value="{{ $exam  }}">
										<input type="hidden" name="subject_id[]" value="{{ $subject_id  }}">
										<input type="hidden" name="class_id[]" value="{{ $data->class_id }}">
										<input type="hidden" name="section_id[]" value="{{ $data->section_id }}">
										<input type="hidden" name="mark_id[]" value="{{ $data->mark_id }}">
								</tr>
								@endforeach

								<tr>
									<td colspan="100"><button type="submit" class="btn btn-primary pull-right rect-btn">Save Marks</button></td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(window).load(function() {
		getExam();
	});

	function getData() {
		var _token = $('input[name=_token]').val();
		var class_id = $('select[name=class_id]').val();
		$.ajax({
			type: "POST",
			url: "{{url('dashboard/sections/section')}}",
			data: {
				_token: _token,
				course_id: class_id
			},
			beforeSend: function() {
				$("#preloader").css("display", "block");
			},
			success: function(data) {
				$("#preloader").css("display", "none");
				$('select[name=section_id]').html(data);
			}
		});
		$('select[name=exam]').html("");
		getSubject();
	}

	function getSubject() {
		var _token = $('input[name=_token]').val();
		var class_id = $('select[name=class_id]').val();
		var section_id = $('select[name=section_id]').val();
		$.ajax({
			type: "POST",
			url: "{{ url('dashboard/exams/get_teacher_subject') }}",
			data: {
				_token: _token,
				class_id: class_id,
				section_id: section_id
			},
			beforeSend: function() {
				$("#preloader").css("display", "block");
			},
			success: function(data) {
				$("#preloader").css("display", "none");
				$('select[name=subject_id]').html(data);
			}
		});
	}


	function getExam() {
		var _token = $('input[name=_token]').val();
		var subject_id = $('select[name=subject_id]').val();
		$.ajax({
			type: "POST",
			url: "{{url('dashboard/exams/get_exam')}}",
			data: {
				_token: _token,
				subject_id: subject_id
			},
			beforeSend: function() {
				$("#preloader").css("display", "block");
			},
			success: function(data) {
				$("#preloader").css("display", "none");
				$('select[name=exam]').html(data);
			}
		});
	}
</script>
@stop