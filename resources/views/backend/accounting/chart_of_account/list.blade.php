@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Chart Of Account</li>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><span class="panel-title">List Chart Of Account</span>
				<a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="Add Chart Of Account" href="{{route('chart_of_accounts.create')}}" style="margin-top:-3px">Add New</a>
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
							<th>Type</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						@foreach($chartofaccounts as $chartofaccount)
						<tr id="row_{{ $chartofaccount->id }}">
							<td class='name'>{{ $chartofaccount->name }}</td>
							<td class='type'>{{ ucwords($chartofaccount->type) }}</td>
							<td>
								<form action="{{route('chart_of_accounts.destroy', $chartofaccount['id'])}}" method="post">
									<a href="{{route('chart_of_accounts.edit', $chartofaccount['id'])}}" data-title="Update Chart Of Account" class="btn btn-warning btn-sm ajax-modal">Edit</a>
									<a href="{{route('chart_of_accounts.show', $chartofaccount['id'])}}" data-title="View Chart Of Account" class="btn btn-info btn-sm ajax-modal">View</a>
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