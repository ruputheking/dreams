@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">List Payee Payers</li>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default no-export">
			<div class="panel-heading"><span class="panel-title">List Payee / Payer</span>
				<a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="Add Payee / Payer" href="{{route('payee_payers.create')}}" style="margin-top: -3px">Add New</a>
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
							<th>Note</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						@foreach($payeepayers as $payeepayer)
						<tr id="row_{{ $payeepayer->id }}">
							<td class='name'>{{ $payeepayer->name }}</td>
							<td class='type'>{{ ucwords($payeepayer->type) }}</td>
							<td class='note'>{{ $payeepayer->note }}</td>

							<td>
								<form action="{{route('payee_payers.destroy', $payeepayer['id'])}}" method="post">
									<a href="{{route('payee_payers.edit', $payeepayer['id'])}}" data-title="Update Information" class="btn btn-warning btn-sm ajax-modal">Edit</a>
									<a href="{{route('payee_payers.show', $payeepayer['id'])}}" data-title="View Payee / Payer" class="btn btn-info btn-sm ajax-modal">View</a>
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