@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">My Students</li>
@endsection

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					My Student
				</div>
			</div>
			<div class="panel-body">
				<table class="table table-bordered data-table">
					<thead>
						<th>#</th>
						<th>Student Name</th>
						<th>Course</th>
						<th>Section</th>
					</thead>
					<tbody>
						@if ($teacher)
						@php
						$i = 1;
						@endphp
						@forelse ($subjects as $data)
						<tr>
							<td>
								{{ $i++ }}
							</td>
							<td>{{ $data->student_name }}</td>
							<td>{{ $data->title }}</td>
							<td>{{ $data->section_name }}</td>
						</tr>
						@empty
						<tr>
							<td colspan="6" class="text-center">
								No Subject Assigned
							</td>
						</tr>
						@endforelse
						@else
						<tr>
							<td colspan="6" class="text-center">
								No Subject Assigned
							</td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>

	</div>
</div>
@endsection