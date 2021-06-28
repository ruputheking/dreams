@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('payee_payers.index') }}">List Payee Payers</a></li>
<li class="active">View Payee / Payer</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">View Payee / Payer</div>

			<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<td>Name</td>
						<td>{{ $payeepayer->name }}</td>
					</tr>
					<tr>
						<td>Type</td>
						<td>{{ $payeepayer->type }}</td>
					</tr>
					<tr>
						<td>Note</td>
						<td>{{ $payeepayer->note }}</td>
					</tr>

				</table>
			</div>
		</div>
	</div>
</div>
@endsection