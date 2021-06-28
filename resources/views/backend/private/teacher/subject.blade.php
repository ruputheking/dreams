@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">My Subjects</li>
@endsection

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					My Subjects
				</div>
			</div>
			<div class="panel-body">
				<table class="table table-bordered data-table">
					<thead>
						<th>Course</th>
						<th>Section</th>
						<th>Subject Name</th>
						<th>Subject Code</th>
						<th>Teacher Name</th>
						<th>Full Mark</th>
						<th>Pass Mark</th>
					</thead>
					<tbody>
						@if ($teacher)
						@forelse ($subjects as $data)
						<tr>
							<td>{{ $data->title }}</td>
							<td>{{ $data->section_name }}</td>
							<td>{{ $data->subject_name }}</td>
							<td>{{ $data->subject_code }}</td>
							<td>{{ $data->name }}</td>
							<td>{{ $data->full_mark }}</td>
							<td>{{ $data->pass_mark }}</td>
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