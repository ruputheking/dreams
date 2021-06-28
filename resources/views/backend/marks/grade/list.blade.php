@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">List Grade</li>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><span class="panel-title">List Grade</span>
				<a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="Add Grade" href="{{route('grades.create')}}" style="margin-top: -3px;">Add New</a>
			</div>

			<div class="panel-body">
				@if (\Session::has('success'))
				<div class="alert alert-success">
					<p>{{ \Session::get('success') }}</p>
				</div>
				<br />
				@endif
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th>Grade Name</th>
							<th>Marks From</th>
							<th>Marks To</th>
							<th>Point</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						@foreach($grades as $grade)
						<tr id="row_{{ $grade->id }}">
							<td class='grade_name'>{{ $grade->grade_name }}</td>
							<td class='marks_from'>{{ decimalPlace($grade->marks_from) }}</td>
							<td class='marks_to'>{{ decimalPlace($grade->marks_to) }}</td>
							<td class='point'>{{ decimalPlace($grade->point) }}</td>
							<td>
								<form action="{{route('grades.destroy', $grade['id'])}}" method="post">
									<a href="{{route('grades.edit', $grade['id'])}}" data-title="Update Grade" class="btn btn-warning btn-sm ajax-modal">Edit</a>
									<a href="{{route('grades.show', $grade['id'])}}" data-title="View Grade" class="btn btn-info btn-sm ajax-modal">View</a>
									{{ csrf_field() }}
									<input name="_method" type="hidden" value="DELETE">
									<button class="btn btn-danger btn-sm btn-remove" type="submit">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection