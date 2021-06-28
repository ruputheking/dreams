@extends('layouts.backend.main')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default no-export">
			<div class="panel-heading"><span class="panel-title">List Account</span>
				<a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="Add Account" href="{{route('accounts.create')}}" style="margin-top: -3px">Add New</a>
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
							<th>Account Name</th>
							<th>Opening Balance</th>
							<th>Note</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@php $currency = get_option('currency_symbol')
						@endphp
						@foreach($accounts as $account)
						<tr id="row_{{ $account->id }}">
							<td class='account_name'>{{ $account->account_name }}</td>
							<td class='opening_balance'>{{ $currency." ".decimalPlace($account->opening_balance) }}</td>
							<td class='note'>{{ $account->note }}</td>
							<td>
								<form action="{{route('accounts.destroy', $account['id'])}}" method="post">
									<a href="{{route('accounts.edit', $account['id'])}}" data-title="Update Account" class="btn btn-warning btn-sm ajax-modal">Edit</a>
									<a href="{{route('accounts.show', $account['id'])}}" data-title="View Account" class="btn btn-info btn-sm ajax-modal">View</a>
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