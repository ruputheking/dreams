@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Children Attendance</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					{{ get_student_name($student_id) }}
				</div>
			</div>

			<div class="panel-body">
				<nav class="navbar navbar-default child-profile-menu">
					<div class="container-fluid">
						<ul class="nav navbar-nav">
							<li><a href="{{ url('dashboard/parent/my_children/'.$student_id) }}">Profile</a></li>
							<li class="active"><a href="{{ url('dashboard/parent/children_attendance/'.$student_id) }}">Attendance</a></li>
							<li><a href="{{ url('dashboard/parent/progress_card/'.$student_id) }}">Progress Card</a></li>
						</ul>
					</div>
				</nav>

				<form id="search_form" class="params-panel validate" action="{{ url('dashboard/parent/children_attendance/'.$student_id) }}" method="post" autocomplete="off" accept-charset="utf-8">
					@csrf

					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Month</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="text" class="form-control monthpicker" name="month" value="{{ isset($month) ? $month : "" }}" readOnly="true" required>
							</div>
						</div>
					</div>


					<div class="col-md-3">
						<div class="form-group">
							<button type="submit" style="margin-top:24px;" class="btn btn-primary btn-block rect-btn">View Attendance</button>
						</div>
					</div>
				</form>

				@if( isset($report_data) )
				<div class="col-md-12 params-panel" id="attendance">
					<button type="button" data-print="attendance" class="btn btn-primary btn-sm pull-right print"><i class="fa fa-print"></i> Print Report</button>
					<div class="text-center clear">
						{{ get_option('welcome_txt') }}<br>
						Attendance Report<br>
						{{ ('Student')." : ".get_student_name($student_id) }}</br>
						{{ $month }}</br></br>
					</div>

					<div class="table-responsive">
						@if( !empty($report_data) )
						<table class="table table-bordered">
							<thead>
								<th>Date</th>
								<th>Attendance</th>
							</thead>
							<tbody>
								@foreach($report_data as $key=>$value)
								<tr>
									<td>{{ date('d/ M/ Y', strtotime($key )) }}</td>
									<td>{{ $value }}</td>
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
		</div>
	</div>
</div>
@endsection