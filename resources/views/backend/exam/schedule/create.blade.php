@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Exam
	@if(Request::is('dashboard/exams/schedule/create')) Schedule
	@else Routine @endif</li>
		@endsection

		@section('content')
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading panel-title">Exam Schedule</div>

					<div class="panel-body">
						@if ($type=='create')
						<form method="post" class="params-panel validate" autocomplete="off" action="{{url('dashboard/exams/schedule/create')}}">
							@else
							<form method="post" class="params-panel validate" autocomplete="off" action="{{url('dashboard/exams/schedule')}}">
								@endif

								{{ csrf_field() }}

								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Select Exam <span class="required">*</span></label>
										<select class="form-control select2" name="exam" required>
											<option value="">Select One</option>
											{{ create_option("exams","id","name",isset($exam) ? $exam :old('exam'),array("session_id="=>get_option('academic_years'))) }}
										</select>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Select Class <span class="required">*</span></label>
										<select class="form-control select2" name="class" required>
											<option value="">Select One</option>
											{{ create_option("courses","id","title",isset($class) ? $class :old('class')) }}
										</select>
									</div>
								</div>


								<div class="col-md-4">
									<div class="form-group">
										<button type="submit" style="margin-top:38px;" class="btn btn-primary btn-block rect-btn">Search</button>
									</div>
								</div>
							</form>
					</div>
				</div><!-- End Panel-->

				@if (isset($subjects) && $type=='create')
				@if (count($subjects)>0)
				<div class="panel panel-default">
					<div class="panel-heading panel-title">Exam Schedule</div>

					<div class="panel-body">
						<form action="{{ url('dashboard/exams/store_schedule') }}" class="appsvan-submit" autocomplete="off" method="post">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<th>Subject</th>
										<th>Date</th>
										<th>Start Time</th>
										<th>End Time</th>
										<th>Room</th>
									</thead>
									<tbody>
										{{ csrf_field() }}
										@foreach($subjects as $subject)
										<tr>
											<input type="hidden" name="schedules_id[]" value="{{ $subject->schedules_id }}">
											<input type="hidden" name="subject_id[]" value="{{ $subject->subject_id }}">
											<input type="hidden" name="class_id[]" value="{{ $class }}">
											<input type="hidden" name="exam_id[]" value="{{ $exam }}">

											<td>{{ $subject->subject_name }}</td>
											<td><input type="text" class="form-control datepicker" value="{{ $subject->date }}" name="date[]" required></td>
											<td><input type="text" class="form-control timepicker" value="{{ $subject->start_time }}" name="start_time[]" required></td>
											<td><input type="text" class="form-control timepicker" value="{{ $subject->end_time }}" name="end_time[]" required></td>
											<td><input type="text" class="form-control int-field" value="{{ $subject->room }}" name="room[]" required></td>
										</tr>
										@endforeach
										<tr>
											<td colspan="7"><button type="submit" class="btn btn-primary rect-btn pull-right">Submit Exam Schedule</button></td>
										</tr>
									</tbody>
								</table>
							</div>
						</form>
					</div>

				</div>
				@else
				<div class="alert alert-danger">
					<h5>No Subject Assign for this class !</h5>
				</div>
				@endif

				@endif



				<!--For View Emam Routine-->
				@if (isset($subjects) && $type=='view')
				@if (count($subjects)>0)
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="panel-title">Exam Routine</span>
						<button type="button" data-print="exam_routine" class="btn btn-primary btn-sm pull-right print"><i class="fa fa-print"></i> Print Routine</button>
					</div>

					<div class="panel-body" id="exam_routine">

						<div class="table-responsive">
							<table class="table table-bordered">
								<tr>
									<td colspan="100" class="text-center">
										<span class="f-20">{{ get_option('school_name') }}</span></br>
										<span class="f-18">Exam Routine</span></br>
										<span class="f-16">Class: {{ get_class_name($class) }}</span>
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