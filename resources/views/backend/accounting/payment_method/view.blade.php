@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('payee_payers.index') }}">Payment Method</a></li>
<li class="active">View Payment Method</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">View Payment Method</div>

			<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<td>Payment Method Name</td>
						<td>{{ $paymentmethod->name }}</td>
					</tr>

				</table>
			</div>
		</div>
	</div>
</div>
@endsection