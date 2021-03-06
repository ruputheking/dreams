<form method="post" class="ajax-submit" autocomplete="off" action="{{route('student_payments.store')}}" enctype="multipart/form-data">
	{{ csrf_field() }}

	<input type="hidden" class="form-control" name="invoice_id" value="{{ $invoice_id }}" required>
	@php $currency = get_option('currency_symbol');
	@endphp

	@if(!empty($history))
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
				<th colspan="3" class="text-center">{{ ('Payment History') }}</th>
			</thead>
			<thead>
				<th>{{ ('Date') }}</th>
				<th>{{ ('Amount') }}</th>
				<th>{{ ('Note') }}</th>
			</thead>
			<tbody>
				@foreach($history as $payment)
				<tr>
					<td>{{ $payment->date }}</td>
					<td>{{ $currency." ".$payment->amount }}</td>
					<td>{{ $payment->note }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@endif

	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label">{{ ('Total Amount')." ".$currency }}</label>
			<input type="text" class="form-control" value="{{ $invoice->total }}" readOnly="true">
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label">{{ ('Total Paid')." ".$currency }}</label>
			<input type="text" class="form-control" value="{{ $invoice->paid }}" readOnly="true">
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label">{{ ('Date') }}</label>
			<input type="text" class="form-control datepicker" name="date" value="{{ old('date') }}" required>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label class="control-label">{{ ('Payable Amount')." ".$currency }}</label>
			<input type="text" class="form-control float-field" name="amount" value="{{ old('amount') }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">{{ ('Note') }}</label>
			<textarea class="form-control" name="note">{{ old('note') }}</textarea>
		</div>
	</div>


	<div class="col-md-12">
		<div class="form-group">
			<button type="submit" class="btn btn-primary">{{ ('Save') }}</button>
		</div>
	</div>
</form>