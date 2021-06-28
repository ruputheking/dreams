@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('transactions.manage_expense') }}">List Expense</a></li>
<li class="active">View Expense</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">View Expense</div>

			<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<td>Trans Date</td>
						<td>{{ $transaction->trans_date }}</td>
					</tr>
					<tr>
						<td>Account</td>
						<td>{{ $transaction->account_name }}</td>
					</tr>
					<tr>
						<td>Amount</td>
						<td>{{ $transaction->amount }}</td>
					</tr>
					<tr>
						<td>Income Type</td>
						<td>{{ $transaction->c_type }}</td>
					</tr>
					<tr>
						<td>Payer</td>
						<td>{{ $transaction->payee_payer }}</td>
					</tr>
					<tr>
						<td>Payment Method</td>
						<td>{{ $transaction->payment_method }}</td>
					</tr>
					<tr>
						<td>Reference</td>
						<td>{{ $transaction->reference }}</td>
					</tr>
					<tr>
						<td>Attachment</td>
						<td>
							@if($transaction->attachment != "")
								<a href="{{ asset('frontend/images/transactions/'.$transaction->attachment) }}" target="_blank" class="btn btn-primary">View Attachment</a>
								@else
								<label class="label label-warning">
									<strong>No Atachment Available !</strong>
								</label>
								@endif
						</td>
					</tr>
					<tr>
						<td>Note</td>
						<td>{{ $transaction->note }}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection