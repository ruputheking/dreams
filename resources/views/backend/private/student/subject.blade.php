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
						<th>Teacher</th>
						<th>Contact</th>
						<th>Subject Name</th>
						<th>Subject Code</th>
						<th>Full Mark</th>
						<th>Pass Mark</th>
					</thead>
					<tbody>
						@forelse ($subjects as $data)
						<tr>
							<td>{{ $data->title }}</td>
							<td>
								@php
								$teacher = \App\Models\AssignSubject::select('*', 'assign_subjects.id')
								->join('teachers', 'teachers.id', '=', 'assign_subjects.teacher_id')
								->where('assign_subjects.subject_id', $data->id)->first();
								@endphp
								{{ $teacher->name ?? '-' }}
							</td>
							<td>
								@php
								$teacher = \App\Models\AssignSubject::select('*', 'assign_subjects.id')
								->join('teachers', 'teachers.id', '=', 'assign_subjects.teacher_id')
								->where('assign_subjects.subject_id', $data->id)->first();
								@endphp
								{{ $teacher->phone ?? '-' }}
							</td>
							<td>{{ $data->subject_name }}</td>
							<td>{{ $data->subject_code }}</td>
							<td>{{ $data->full_mark }}</td>
							<td>{{ $data->pass_mark }}</td>
						</tr>
						@empty
						<tr>
							<td colspan="5">No Subject Found</td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
	@endsection