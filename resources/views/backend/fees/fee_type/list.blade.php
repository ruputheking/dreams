@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Fee Type</li>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default no-export">
			<div class="panel-heading"><span class="panel-title">List Fee Type</span>
				<a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="Add Fee Type" href="{{route('fee_types.create')}}" style="margin-top:-3px">Add New</a>
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
							<th>Fee Type</th>
							<th>Fee Code</th>
							<th>Note</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						@foreach($feetypes as $feetype)
						<tr id="row_{{ $feetype->id }}">
							<td class='fee_type'>{{ $feetype->fee_type }}</td>
							<td class='fee_code'>{{ $feetype->fee_code }}</td>
							<td class='note'>{{ $feetype->note }}</td>

							<td>
								<form action="{{route('fee_types.destroy', $feetype['id'])}}" method="post">
									<a href="{{route('fee_types.edit', $feetype['id'])}}" data-title="Update Fee Type" class="btn btn-warning btn-sm ajax-modal">Edit</a>
									<a href="{{route('fee_types.show', $feetype['id'])}}" data-title="View Fee Type" class="btn btn-info btn-sm ajax-modal">View</a>
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