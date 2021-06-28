@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('accounts.index') }}">Accounts</a></li>
<li class="active">View</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">View Account</div>

			<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<td>Account Name</td>
						<td>{{ $account->account_name }}</td>
					</tr>
					<tr>
						<td>Opening Balance</td>
						<td>{{ get_option('currency_symbol')." ".$account->opening_balance }}</td>
					</tr>
					<tr>
						<td>Note</td>
						<td>{{ $account->note }}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection