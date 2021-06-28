@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Student Rank</li>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default no-export">
			<div class="panel-heading clearfix">
				<div class="panel-title pull-left">Student Rank</div>
				<div class="col-md-2 pull-right">
					<select id="class" class="select_class select2 pull-right" onchange="showClass(this);">
						<option value="">Select Class</option>
						{{ create_option('courses','id','title',$class) }}
					</select>
				</div>
			</div>

			<div class="panel-body">
				<table class="table table-bordered data-table">
					<thead>
						<th>Profile</th>
						<th>Name</th>
						<th>Class</th>
						<th>Section</th>
						<th>Total Marks</th>
						<th style="text-align:center">Current Position</th>
						<th>Details</th>
					</thead>
					<tbody>
						@php $position = 1;
						@endphp
						@foreach($students as $data)
						<tr>
							<td><img src="{{ asset('/frontend/images/'.$data->photo) }}" width="50px" height="50px" alt=""></td>
							<td>{{ $data->student_name }}</td>
							<td>{{ $data->title }}</td>
							<td>{{ $data->section_name }}</td>
							<td>{{ $data->total_marks }}</td>
							<td style="text-align:center"><label class="label label-primary">{{ $position }}</label></td>
							<td>
								<a href="{{ url('dashboard/marks/view/'.$data->student_id.'/'.$class) }}" class="btn btn-primary btn-sm rect-btn"><i class="fa fa-eye"></i> Details</a>
							</td>
						</tr>
						@php $position ++;
						@endphp
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
<script>
	function showClass(elem) {
		if ($(elem).val() == "") {
			return;
		}
		window.location = "<?php echo url('dashboard/marks/rank') ?>/" + $(elem).val();
	}
</script>
@stop