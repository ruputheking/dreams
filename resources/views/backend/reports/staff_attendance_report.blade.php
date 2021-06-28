@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Staff Attendance Report</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="panel-title">
					Staff Attendance Report
				</span>
			</div>
			<div class="panel-body">
				<form id="search_form" class="params-panel validate" action="{{ url('dashboard/reports/staff_attendance_report/view') }}" method="post" autocomplete="off" accept-charset="utf-8">
					{{csrf_field()}}
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Role <span class="required">*</span></label>
							<select name="user_type" class="form-control select2" required>
								<option value="">Select One</option>
								<option @if($user_type=='Teacher' ) selected
								@endif value="2">Teacher</option>
								<option @if($user_type=='Accountant' ) selected
								@endif value="5">Accountant</option>
								<option @if($user_type=='Receptionist' ) selected
								@endif value="6">Receptionist</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Month <span class="required">*</span></label>
							<div class="input-group" style="margin-top:6px;">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="text" class="form-control monthpicker" name="month" value="{{ $month }}" readOnly="true" required>
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
					<div class="text-center clear">
						{{ get_option('welcome_txt') }}<br>
						Attendance Report for {{ $user_type }}<br>
						{{ $month }}</br></br>
					</div>

					<div class="table-responsive">
						@if( !empty($report_data) )
						<table class="table table-bordered">
							<thead>
								<th>{{ $user_type." ".'Name' }}</th>
								@for($day = 1; $day <= $num_of_days; $day++) <th>{{ $day }}</th>
									@endfor
							</thead>
							<tbody>
								@foreach($report_data as $key=>$value)
								<tr>
									<td>{{ $users[$key]->user_name }}</td>
									@foreach($value as $user=>$attendance)
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
				<!--End panel-->
			</div>
			@endif
		</div>
	</div>
</div>
</div>
@endsection