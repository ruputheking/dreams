@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">My Payment History</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="panel-title">My Payment History</span>
			</div>

			<div class="panel-body">
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th>Invoice ID</th>
							<th>Date</th>
							<th>Amount</th>
							<th>Note</th>
							<th>View Invoice</th>
						</tr>
					</thead>
					<tbody>
						@php $currency = get_option('currency_symbol')
						@endphp
						@foreach($studentpayments as $studentpayment)
						<tr id="row_{{ $studentpayment->id }}">
							<td class='invoice_id'>{{ $studentpayment->invoice_id }}</td>
							<td class='date'>{{ date('d/ M/ Y', strtotime($studentpayment->date)) }}</td>
							<td class='amount'>{{ $currency." ".$studentpayment->amount }}</td>
							<td class='note'>{{ $studentpayment->note }}</td>
							<td><a href="{{ url('dashboard/student/view_invoice/'.$studentpayment->invoice_id) }}" data-title="View Invoice" data-fullscreen="true" class="btn btn-primary btn-sm ajax-modal">View Invoice</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
<script>
	function showClass(elem) {
		if ($(elem).val() == "") {
			return;
		}
		window.location = "<?php echo url('dashboard/student_payments/class') ?>/" + $(elem).val();
	}
</script>
@stop