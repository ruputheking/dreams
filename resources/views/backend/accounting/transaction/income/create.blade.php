@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('transactions.manage_income') }}">List Income</a></li>
<li class="active">Add Income</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Add Income</div>

			<div class="panel-body">
				<form method="post" class="validate" autocomplete="off" action="{{ route('transactions.store') }}" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Date <span class="required">*</span></label>
							<input type="text" class="form-control datepicker" name="trans_date" value="{{ old('trans_date') }}" required>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Account <span class="required">*</span></label>
							<select class="form-control select2" name="account_id" required>
								<option value="">Select One</option>
								{{ create_option("bank_cash_accounts","id","account_name",old('account_id')) }}
							</select>
						</div>
					</div>


					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">{{ ('Amount')." ".get_option('currency_symbol') }} <span class="required">*</span></label>
							<input type="text" class="form-control float-field" name="amount" value="{{ old('amount') }}" required>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Income Type <span class="required">*</span></label>
							<select class="form-control select2" name="chart_id" required>
								<option value="">Select One</option>
								{{ create_option("chart_of_accounts","id","name",old('chart_id'),array("type="=>"income")) }}
							</select>
						</div>
					</div>

					<input type="hidden" name="trans_type" value="income">
					<input type="hidden" name="dr_cr" value="cr">

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Payer</label>
							<select class="form-control select2" name="payee_payer_id">
								<option value="">Select One</option>
								{{ create_option("payee_payers","id","name",old('payee_payer_id'),array("type="=>"payer")) }}
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Payment Method</label>
							<select class="form-control select2" name="payment_method_id">
								<option value="">Select One</option>
								{{ create_option("payment_methods","id","name",old('payment_method_id')) }}
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Reference</label>
							<input type="text" class="form-control" name="reference" value="{{ old('reference') }}">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Attachment</label>
							<input type="file" class="form-control appsvan-file" name="attachment">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Note</label>
							<textarea class="form-control" name="note">{{ old('note') }}</textarea>
						</div>
					</div>


					<div class="col-md-12">
						<div class="form-group">
							<button type="reset" class="btn btn-danger">Reset</button>
							<button type="submit" class="btn btn-primary">Save Income</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection