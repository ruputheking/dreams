@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">List Expense</li>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">

			<div class="panel-heading"><span class="panel-title">List Expense</span>

				<a class="btn btn-primary btn-sm pull-right" data-title="Add Expense" href="{{ route('transactions.add_expense') }}" style="margin-top: -3px">Add New</a>
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
							<th>Date</th>
							<th>Account</th>
							<th>Amount</th>
							<th>Expense Type</th>
							<th>Payer</th>
							<th>Payment Method</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						@foreach($transactions as $transaction)
						<tr id="row_{{ $transaction->id }}">
							<td class='trans_date'>{{ $transaction->trans_date }}</td>
							<td class='account_id'>{{ $transaction->account_name }}</td>
							<td class='amount'>{{ $transaction->amount }}</td>
							<td class='chart_id'>{{ $transaction->c_type }}</td>
							<td class='payee_payer_id'>{{ $transaction->payee_payer }}</td>
							<td class='payment_method_id'>{{ $transaction->payment_method }}</td>
							<td>
								<form action="{{route('transactions.destroy', $transaction['id'])}}" method="post">
									<a href="{{route('transactions.edit', $transaction['id'])}}" data-title="Update Income" class="btn btn-warning btn-sm">Edit</a>
									<a href="{{route('transactions.show', $transaction['id'])}}" data-title="View Income" class="btn btn-info btn-sm ajax-modal">View</a>
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