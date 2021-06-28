@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Progress Card</li>
@endsection

@section('content')
<div class="row" id="print">
	<div class="col-md-12">
		@if(empty($exams))
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="panel-title">No Exam Found</span>
			</div>
			<div class="panel-body">
				<div class="alert alert-danger">
					<h5>Sorry No Exam Found !</h5>
				</div>
			</div>
		</div>
		@endif

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
						<td colspan="4" style="text-align:center;"><img width="100px" style="border-radius: 8px; padding:5px; border:2px solid #ccc;" src="{{ asset('/frontend/images/'.$student->photo) }}"></td>
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
						<td><b>Citizenship</b></td>
						<td>{{ $student->citizenship_no }}</td>
						<td><b>Pasport No</b></td>
						<td>{{ $student->passport }}</td>
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


		<!--Show Seperate Result-->
		@foreach($exams as $exam)
		<div class="panel panel-default" id="exam_{{ $exam->exam_id }}">
			<div class="panel-heading">
				<span class="panel-title">{{ $exam->name }}</span>
				<button type="button" data-print="exam_{{ $exam->exam_id }}" class="btn btn-primary btn-sm pull-right print"><i class="fa fa-print"></i> {{ ('Print')." ".$exam->name." ".('Only') }}</button>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<td colspan="2" style="text-align:center;"><img width="100px" style="border-radius: 8px; padding:5px; border:2px solid #ccc;" src="{{ asset('/frontend/images/'.$student->photo) }}"></td>
					</tr>
					<tr>
						<td><b>Name</b></td>
						<td>{{ $student->student_name }}</td>
					</tr>
					<tr>
						<td><b>Class</b></td>
						<td>{{ $student->title }}</td>
					</tr>
					<tr>
						<td><b>Section</b></td>
						<td>{{ $student->section_name }}</td>
					</tr>
				</table>
				<table class="table table-bordered">
					<thead>
						<th>Subject</th>
						@foreach($mark_head as $mh)
						<th style="text-align:center">{{ $mh->mark_type }}</th>
						@endforeach
						<th style="text-align:center">Total</th>
						<th style="text-align:center">Grade</th>
						<th style="text-align:center">Point</th>
					</thead>
					<tbody>
						@php $total = 0;
						@endphp
						@php $total_point = 0;
						@endphp
						@php $total_subject = 0;
						@endphp
						@php $fail = false;
						@endphp

						@foreach($subjects as $subject)
						<tr>
							<td>{{ $subject->subject_name }}</td>

							@php $row_total=0;
							@endphp
							@php $point=0;
							@endphp

							@foreach($mark_details[$subject->id][$exam->exam_id] as $md)
								@php
								$row_total = $row_total + $md->mark_value;
								$point = get_point($row_total);
								@endphp
								<td style="text-align:center">{{ $md->mark_value }}</td>
								@endforeach
								<td style="text-align:center">{{ $row_total }}</td>
								<td style="text-align:center">{{ get_grade($row_total) }}</td>
								<td style="text-align:center">{{ $point }}</td>
						</tr>
						@php $total = $total + $row_total;
						@endphp
						@php $total_point = $total_point + $point;
						@endphp
						@php $total_subject++;
						@endphp
						@php if($subject->pass_mark>$row_total){ $fail = true;}
						@endphp
						@endforeach

						<tr>
							<td><b>{{ ('Total Marks') }}</b></td>
							@foreach($mark_head as $mh)
							<td style="text-align:center"></td>
							@endforeach
							<td style="text-align:center">{{ $total }}</td>
							<td style="text-align:center">{{ ("Avg Grade")." ".decimalPlace(($total_point/$total_subject)) }}</td>
							<td style="text-align:center">{{ decimalPlace($total_point) }}</td>
						</tr>
						<tr>
							<td colspan="100%">
								@if ($fail == true)
								<div class="alert alert-danger">
									<h5>{{ ("Final Grade")." ".("FAIL") }}</h5>
								</div>
								@else
								<div class="alert alert-success">
									<h5>{{ ("Final Grade")." ".get_final_grade(($total_point/$total_subject)) }}</h5>
								</div>
								@endif
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection