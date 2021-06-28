@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">List Mark Distribution</li>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><span class="panel-title">List Mark Distribution</span>
				<a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="Add Mark Distribution" href="{{route('mark_distributions.create')}}" style="margin-top:-3px;">Add New</a>
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
							<th>Mark Distribution Type</th>
							<th>Mark Percentage</th>
							<th style="text-align: center;">Active</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						@foreach($markdistributions as $markdistribution)
						<tr id="row_{{ $markdistribution->id }}">
							<td class='mark_distribution_type'>{{ $markdistribution->mark_distribution_type }}</td>
							<td class='mark_percentage'>{{ decimalPlace($markdistribution->mark_percentage) }}</td>
							<td class='marks_to' style="text-align: center;">
								<span class="label {{ $markdistribution->is_active=='yes' ? 'label-info' : 'label-danger' }}">{{ ucwords($markdistribution->is_active) }}</span>
							</td>
							<td>
								@if ($markdistribution->is_exam == 'no')
								<form action="{{route('mark_distributions.destroy', $markdistribution['id'])}}" method="post">
									<a href="{{route('mark_distributions.edit', $markdistribution['id'])}}" data-title="Update Mark Distribution" class="btn btn-warning btn-sm ajax-modal">Edit</a>
									<a href="{{route('mark_distributions.show', $markdistribution['id'])}}" data-title="View Mark Distribution" class="btn btn-info btn-sm ajax-modal">View</a>
									{{ csrf_field() }}
									<input name="_method" type="hidden" value="DELETE">
									<button class="btn btn-danger btn-sm btn-remove" type="submit">Delete</button>
								</form>
								@else
								<a href="{{route('mark_distributions.edit', $markdistribution['id'])}}" data-title="Update Mark Distribution" class="btn btn-warning btn-sm">Edit</a>
								<a href="{{route('mark_distributions.show', $markdistribution['id'])}}" data-title="View Mark Distribution" class="btn btn-info btn-sm ajax-modal">View</a>
								@endif
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