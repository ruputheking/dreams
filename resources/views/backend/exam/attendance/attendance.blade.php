@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Exam Attendance</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<span class="panel-title">
					Exam Attendance
				</span>
			</div>
			<div class="panel-body">
				<form id="search_form" class="params-panel validate" action="{{ url('dashboard/exams/attendance') }}" method="post" autocomplete="off" accept-charset="utf-8">
					@csrf
					<div class="col-md-10">
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Class <span class="required">*</span></label>
								<select name="course_id" class="form-control select2" onChange="getData();" required>
									<option value="">Select One</option>
									{{ create_option('courses','id','title',$class_id) }}
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Section <span class="required">*</span></label>
								<select name="section_id" class="form-control select2" required>
									<option value="">Select One</option>
									{{ create_option('sections','id','section_name',$section_id, array("course_id = "=>$class_id)) }}
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Subject <span class="required">*</span></label>
								<select name="subject_id" id="subject_id" class="form-control select2" onChange="getExam();" required>
									<option value="">Select One</option>
									{{ create_option('subjects','id','subject_name',$subject_id, array("course_id = "=>$class_id)) }}
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Select Exam <span class="required">*</span></label>
								<select class="form-control select2" name="exam" required>

								</select>
							</div>
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
							<button type="submit" style="margin-top:38px;" class="btn btn-primary btn-block rect-btn">Next</button>
						</div>
					</div>
				</form>

				@if( !empty($attendance) )
				<div class="col-md-12" id="attendance">
					<div class="panel-heading text-center">
						<div class="panel-title">
							{{ ('Exam Attendance For Class') }} {{ get_class_name($class_id) }}<br>
							{{ ('Section').": ".get_section_name($section_id) }} <br>
							{{ ('Subject').": ".get_subject_name($subject_id) }} <br>
							{{ date('d-M-Y') }}<br>
						</div>
					</div>
					<form action="{{ url('dashboard/exams/store_exam_attendance') }}" class="appsvan-submit-validate" method="post" accept-charset="utf-8">
						@csrf
						<table class="table table-bordered">
							<thead>
								<th>Name</th>
								<th><label class="c-container">Present<input type="checkbox" id="present_all" onclick="present(this)"><span class="checkmark"></span></label></th>
								<th><label class="c-container">Absent<input type="checkbox" id="absent_all" onclick="absent(this)"><span class="checkmark"></span></label></th>
								<th><label class="c-container">Late<input type="checkbox" id="late_all" onclick="late(this)"><span class="checkmark"></span></label></th>
							</thead>
							<tbody>
								@foreach($attendance AS $key => $data)
								<tr>
									<td>{{ $data->student_name }}</td>
									<input type="hidden" name="student_id[]" value="{{ $data->student_id }}">
									<input type="hidden" name="exam_id[]" value="{{ $exam  }}">
									<input type="hidden" name="subject_id[]" value="{{ $subject_id  }}">
									<input type="hidden" name="class_id[]" value="{{ $data->class_id }}">
									<input type="hidden" name="section_id[]" value="{{ $data->section_id }}">
									<input type="hidden" name="date" value="{{ date('Y-m-d') }}">
									<input type="hidden" name="attendance_id[]" value="{{ $data->attendance_id }}">
									<td><label class="c-container"><input type="checkbox" name="attendance[{{ $key }}][]" @if($data->attendance=='1') checked
											@endif value="1" class="present"><span class="checkmark"></span>
										</label></td>
									<td><label class="c-container"><input type="checkbox" name="attendance[{{ $key }}][]" @if($data->attendance=='2') checked
											@endif value="2" class="absent"><span class="checkmark"></span>
										</label></td>
									<td><label class="c-container"><input type="checkbox" name="attendance[{{ $key }}][]" @if($data->attendance=='3') checked
											@endif value="3" class="late"><span class="checkmark"></span>
										</label></td>
								</tr>
								@endforeach

								<tr>
									<td colspan="100"><button type="submit" class="btn btn-primary pull-right rect-btn">Save Attendance</button></td>
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
		var course_id = $('select[name=course_id]').val();
		$.ajax({
			type: "POST",
			url: "{{url('dashboard/sections/section')}}",
			data: {
				_token: _token,
				course_id: course_id
			},
			success: function(data) {
				$('select[name=section_id]').html(data);
			}
		});
		$('select[name=exam]').html("");
		getSubject();
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
			success: function(data) {
				$('select[name=exam]').html(data);
				$('select[name=exam]').val({{ $exam }});
			}
		});
	}

	function getSubject() {
		var _token = $('input[name=_token]').val();
		var course_id = $('select[name=course_id]').val();
		$.ajax({
			type: "POST",
			url: "{{url('dashboard/exams/get_subject')}}",
			data: {
				_token: _token,
				course_id: course_id
			},
			success: function(sections) {
				$('select[name=subject_id]').html(sections);
			}
		});
	}


	$("input:checkbox").on('click', function() {

		var $box = $(this);
		if ($box.is(":checked")) {
			var group = "input:checkbox[name='" + $box.attr("name") + "']";
			$(group).prop("checked", false);
			$box.prop("checked", true);
		} else {
			$box.prop("checked", false);
		}
	});

	function present(source) {
		$(".absent,.late,.present,#late_all,#absent_all").prop("checked", false);
		var checkboxes = document.querySelectorAll('.present');
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i] != source)
				checkboxes[i].checked = source.checked;
		}
	}

	function absent(source) {
		$(".absent,.late,.present,#present_all,#late_all").prop("checked", false);
		var checkboxes = document.querySelectorAll('.absent');
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i] != source)
				checkboxes[i].checked = source.checked;
		}
	}

	function late(source) {
		$(".absent,.late,.present,#present_all,#absent_all").prop("checked", false);
		var checkboxes = document.querySelectorAll('.late');
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i] != source)
				checkboxes[i].checked = source.checked;
		}
	}
</script>
@stop