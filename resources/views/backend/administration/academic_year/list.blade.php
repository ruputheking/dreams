@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">List Academic Session</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><span class="panel-title">List Academic Session</span>
				<a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="Add Academic Year" href="{{route('academic_years.create')}}" style="margin-top:-3px;">Add New</a>
			</div>

			<div class="panel-body">
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Session Name</th>
							<th>Academic Year</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@php
						$i = 1;
						@endphp
						@foreach($academicyears as $academicyear)
						<tr id="row_{{ $academicyear->id }}">
							<td>{{ $i++ }}</td>
							<td class='session'>{{ $academicyear->session }}</td>
							<td class='year'>{{ $academicyear->year }}</td>

							<td>
								<form action="{{route('academic_years.destroy', $academicyear['id'])}}" method="post">
									<a href="{{route('academic_years.show', $academicyear['id'])}}" data-title="View Academic Year" class="btn btn-primary btn-sm ajax-modal">View</a>
									<a href="{{route('academic_years.edit', $academicyear['id'])}}" data-title="Update Academic Year" class="btn btn-warning btn-sm ajax-modal">Edit</a>
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