@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Student Attendance Report</li>
@endsection

@section('content')
<style media="screen">
	thead {
		background: rgba(149, 165, 166, .3);
		color: rgba(44, 62, 80, 1.0);
		border-top: 1px solid #bdc3c7;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="panel-title">
					Student Attendance Report
				</span>
			</div>
			<div class="panel-body">
				<form id="search_form" class="params-panel validate" action="{{ url('dashboard/reports/student_attendance_report/view') }}" method="post" autocomplete="off" accept-charset="utf-8">
					{{csrf_field()}}

					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label">Course <span class="required">*</span></label>
							<select name="class_id" class="form-control select2" onChange="getData(this.value);" required>
								<option value="">Select One</option>
								{{ create_option('courses','id','title',$class_id) }}
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label">Section <span class="required">*</span></label>
							<select name="section_id" class="form-control select2" required>
								<option value="">Select One</option>
								{{ create_option('sections','id','section_name',$section_id,array("course_id="=>$class_id)) }}
							</select>
						</div>
					</div>
					<div class="col-sm-3" style="margin-top:5px;">
						<div class="form-group">
							<label class="control-label">Month <span class="required">*</span></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="text" class="form-control monthpicker" name="month" value="{{$month}}" readOnly="true" required>
							</div>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							<button type="submit" style="margin-top:38px;" class="btn btn-primary btn-block rect-btn">View Report</button>
						</div>
					</div>
				</form>

				@if( isset($report_data) )
				<div class="col-md-12 params-panel" id="attendance">
					<button type="button" data-print="attendance" class="btn btn-primary btn-sm pull-right print"><i class="fa fa-print"></i> Print Report</button>
					<div class="panel-heading text-center">
						{{ get_option('welcome_txt') }}<br>
						Attendance Report for Class {{ $class }}<br>
						{{ 'Section: '." ".$section }} </br>
						{{ $month }}</br></br>
					</div>

					<div class="table-responsive">
						@if( !empty($report_data) )
						<table class="table table-bordered">
							<thead>
								<th>Student Name</th>
								@for($day = 1; $day <= $num_of_days; $day++) <th>{{ $day }}</th>
									@endfor
							</thead>
							<tbody>
								@foreach($report_data as $key=>$value)
								<tr>
									<td>{{ $students[$key]->student_name }}</td>
									@foreach($value as $student=>$attendance)
									<td class="text-center">{{ $attendance }}</td>
									@endforeach
								</tr>
								@endforeach
							</tbody>
						</table>
						@else
						<h4 class="text-center">No Records Found !</h4>
						@endif
					</div>

				</div>
				@endif
			</div>
			<!--End panel-->
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
</script>
@stop