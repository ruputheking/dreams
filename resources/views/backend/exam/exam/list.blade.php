@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Exam List</li>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default no-export">
			<div class="panel-heading"><span class="panel-title">List Exam</span>
				<a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="Add Exam" href="{{route('exams.create')}}" style="margin-top: -3px">Add New</a>
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
							<th>Name</th>
							<th>Note</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						@foreach($exams as $exam)
						<tr id="row_{{ $exam->id }}">
							<td class='name'>{{ $exam->name }}</td>
							<td class='note'>{{ $exam->note }}</td>
							<td>
								<form action="{{route('exams.destroy', $exam['id'])}}" method="post">
									<a href="{{route('exams.edit', $exam['id'])}}" data-title="Update Exam" class="btn btn-warning btn-sm ajax-modal">Edit</a>
									<a href="{{route('exams.show', $exam['id'])}}" data-title="View Exam" class="btn btn-info btn-sm ajax-modal">View</a>
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