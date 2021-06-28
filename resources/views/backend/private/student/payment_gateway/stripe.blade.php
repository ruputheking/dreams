<h5 class="text-center"><b>Payable Amount : ‎{{ get_option('currency_symbol')." ".(decimalPlace($invoice->total-$invoice->paid)) }}</b></h5>
<style media="screen">
	.invoice-container .invoice-status {
		margin: 20px 0 0 0;
		text-transform: uppercase;
		font-size: 24px;
		font-weight: bold;
	}

	.unpaid {
		color: #cc0000;
	}
</style>
<div class="invoice-col text-center">

	<div class="invoice-status">
		<span class="unpaid">Unpaid</span>
	</div>

	<div class="small-text">
		Due Date: {{ date('d-M-Y', strtotime($invoice->due_date)) }}
	</div>
	<div class="payment-btn-container hidden-print" align="center">
		<p>
			Bank Name: {{ get_option('bank_account_name') }}<br>
			Account Number: {{get_option('bank_id')}}<br>
			Bank Name: {{ get_option('bank_name') }}<br>
			Bank Branch: {{ get_option('bank_branch') }}<br>
		</p>
	</div>

</div>
<form action="{{ route('student.esewa') }}" method="POST" class="form-group" enctype="multipart/form-data">
	@csrf
	<input value="{{ $invoice->id }}" name="invoice_id" type="hidden">
	<div class="form-group">
		<div class="col-md-12">
			<label class="control-label">Amount <span class="required">*</span></label>
			<input type="number" name="amount" value="{{ old('amount') }}" class="form-control" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12">
			<label class="control-label">Document / Image of Your Payment<span class="required">*</span></label>
			<input type="file" class="form-control" name="document" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12">
			<input value="{{Auth::user()->id}}" name="user_id" type="hidden">
			<input type="submit" class="btn btn-primary btn-block mt-15" value="Pay Now">

		</div>
	</div>
</form>