@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Exam Routine</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading panel-title">Exam Routine</div>

			<div class="panel-body">
				<form method="post" class="params-panel validate" autocomplete="off" action="{{url('dashboard/student/exam_routine/view')}}">
					{{ csrf_field() }}

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Select Exam</label>
							<select class="form-control select2" name="exam_id" required>
								<option value="">Select One</option>
								{{ create_option("exams","id","name",$exam_id) }}
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<button type="submit" style="margin-top:32px;" class="btn btn-primary btn-block rect-btn">View Report</button>
						</div>
					</div>
				</form>
			</div>
		</div><!-- End Panel-->

		<!--For View Emam Routine-->
		@if (isset($subjects))
		@if (count($subjects)>0)
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="panel-title">Exam Routine</span>
				<button type="button" data-print="exam_routine" class="btn btn-primary btn-sm pull-right print" style="margin-top:-3px"><i class="fa fa-print"></i> Print Routine</button>
			</div>

			<div class="panel-body" id="exam_routine">

				<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<td colspan="100" class="text-center">
								<span class="f-20">{{ get_option('welcome_txt') }}</span></br>
								<span class="f-18">Exam Routine</span></br>
								<span class="f-16">Class: {{ get_class_name($class_id) }}</span>
							</td>
						</tr>
					</table>

					<table class="table table-bordered">
						<tbody>
							<thead>
								<th>Subject</th>
								<th>Date</th>
								<th>Start Time</th>
								<th>End Time</th>
								<th>Room</th>
							</thead>
							@foreach($subjects as $subject)
							<tr>
								<td>{{ $subject->subject_name }}</td>
								<td>{{ $subject->date }}</td>
								<td>{{ $subject->start_time }}</td>
								<td>{{ $subject->end_time }}</td>
								<td>{{ $subject->room }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		@else
		<div class="alert alert-danger">
			<h5>No Subject Assign for this class !</h5>
		</div>
		@endif
		@endif
	</div>
</div>
@endsection