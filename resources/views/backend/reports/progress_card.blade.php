@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Progress Card</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="panel-title">
					Progress Card
				</span>
			</div>
			<div class="panel-body">
				<form id="search_form" class="params-panel validate" action="{{ url('dashboard/reports/progress_card/view') }}" method="post" autocomplete="off" accept-charset="utf-8">
					@csrf

					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label">Class <span class="required">*</span></label>
							<select name="class_id" class="form-control select2" onChange="getData(this.value);" required>
								<option value="">Select One</option>
								{{ create_option('courses','id','title',$class_id) }}
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label">Section <span class="required">*</span></label>
							<select name="section_id" onchange="get_students();" class="form-control select2" required>
								<option value="">Select One</option>
								{{ create_option('sections','id','section_name',$section_id,array("course_id="=>$class_id)) }}
							</select>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label">Select Student <span class="required">*</span></label>
							<select name="student_id" id="student_id" class="form-control select2">
								<option value="">Select One</option>
							</select>
						</div>
					</div>


					<div class="col-sm-3">
						<div class="form-group">
							<button type="submit" style="margin-top:38px;" class="btn btn-primary btn-block rect-btn">View Report</button>
						</div>
					</div>
				</form>


				<!--Show Full Report Card-->
				@if(!empty($exams))
				<div class="panel panel-default" id="progress_card">
					<div class="panel-heading">
						<span class="panel-title">Progress Card</span>
						<button type="button" data-print="progress_card" class="btn btn-primary btn-sm pull-right print"><i class="fa fa-print"></i> Print Progress Card</button>
					</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<tr>
								<td colspan="4" style="text-align:center;"><img width="100px" style="border-radius: 8px; padding:5px; border:2px solid #ccc;" src="{{ asset('frontend/images/'.$student->photo) }}"></td>
							</tr>
							<tr>
								<td><b>School</b></td>
								<td>{{ get_option('welcome_txt') }}</td>
								<td><b>Student Name</b></td>
								<td>{{ $student->student_name }}</td>
							</tr>
							<tr>
								<td><b>Class</b></td>
								<td>{{ $student->title }}</td>
								<td><b>Section</b></td>
								<td>{{ $student->section_name }}</td>
							</tr>
							<tr>
								<td><b>Academic Year</b></td>
								<td>{{ get_academic_year(get_option('academic_years')) }}</td>
							</tr>
						</table>
						<div class="table-responsive">
							<table class="table table-bordered report-card">
								<thead>
									<tr>
										<th rowspan="2">Subject</th>
										@foreach($exams as $exam)
										<th colspan="{{ count($mark_head) }}" style="background:#bdc3c7;text-align:center"><b>{{ $exam->name }}</b></th>
										@endforeach
										<th rowspan="2">Total</th>
										<th rowspan="2">Grade</th>
										<th rowspan="2">Point</th>
									</tr>

									<tr>
										@foreach($exams as $exam)
										@foreach($mark_head as $mh)
										<th style="background:#bdc3c7">{{ $mh->mark_type }}</th>
										@endforeach
										@endforeach
									</tr>
								</thead>
								<tbody>

									@php $total = 0;
									@endphp
									@php $total_subject = 0;
									@endphp

									@foreach($subjects as $subject)
									@php $row_total=0;
									@endphp
									@php $point=0;
									@endphp
									<tr>
										<td>{{ $subject->subject_name }}</td>
										@foreach($exams as $exam)

										@foreach($mark_details[$subject->id][$exam->exam_id] as $md)
											@php
											$row_total = $row_total + $md->mark_value;
											$point = get_point($row_total/count($exams));
											$grade = get_grade($row_total/count($exams));
											@endphp
											<td style="text-align:center">{{ $md->mark_value }}</td>
											@endforeach
											@php $total_subject++
											@endphp
											@endforeach
											<td>{{ $row_total }}</td>
											<td>{{ $grade }}</td>
											<td>{{ $point }}</td>
									</tr>
									@php $total = $total + $row_total;
									@endphp
									@endforeach
									<tr>
										<td colspan="100%" style="text-align:center">
											<h5>{!! ('Total Marks')." : <b>".$total."</b>" !!}</h5>
										</td>
									</tr>

									<tr>
										<td colspan="100%" style="text-align:center">
											<h5>{!! ('Average Marks')." : <b>".($total/$total_subject)."</b>" !!}</h5>
										</td>
									</tr>

									<tr>
										<td colspan="100%" style="text-align:center">
											<h5>{!! ('Point')." : <b>".get_point($total/$total_subject)."</b>" !!}</h5>
										</td>
									</tr>

									<tr>
										<td colspan="100%" style="text-align:center">
											<h5>{!! ('Grade')." : <b>".get_grade($total/$total_subject)."</b>" !!}</h5>
										</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	function getData(val) {
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
			success: function(sections) {
				$("#preloader").css("display", "none");
				$('select[name=section_id]').html(sections);
			}
		});
	}

	function get_students() {

		var class_id = "/" + $('select[name=class_id]').val();
		var section_id = "/" + $('select[name=section_id]').val();
		var link = "{{ url('dashboard/students/get_students') }}" + class_id + section_id;
		$.ajax({
			url: link,
			beforeSend: function() {
				$("#preloader").css("display", "block");
			},
			success: function(data) {
				$("#preloader").css("display", "none");
				var json = JSON.parse(data);
				$('select[name=student_id]').html("");

				jQuery.each(json, function(i, val) {
					$('select[name=student_id]').append("<option value='" + val['id'] + "'>" + val['student_name'] + "</option>");
				});

			}
		});
	}
</script>
@stop