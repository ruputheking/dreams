@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('transactions.manage_income') }}">List Income</a></li>
<li class="active">Update Income</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Update Income</div>

			<div class="panel-body">
				<form method="post" class="validate" autocomplete="off" action="{{route('transactions.update', $id)}}" enctype="multipart/form-data">
					{{ csrf_field()}}
					<input name="_method" type="hidden" value="PATCH">

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Trans Date <span class="required">*</span></label>
							<input type="text" class="form-control datepicker" name="trans_date" value="{{ $transaction->trans_date }}" required>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Account <span class="required">*</span></label>
							<select class="form-control select2" name="account_id" required>
								<option value="">Select One</option>
								{{ create_option("bank_cash_accounts","id","account_name",$transaction->account_id) }}
							</select>
						</div>
					</div>


					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">{{('Amount')." ".get_option('currency_symbol') }} <span class="required">*</span></label>
							<input type="text" class="form-control float-field" name="amount" value="{{ $transaction->amount }}" required>
						</div>
					</div>


					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Income Type <span class="required">*</span></label>
							<select class="form-control select2" name="chart_id" required>
								<option value="">Select One</option>
								{{ create_option("chart_of_accounts","id","name",$transaction->chart_id,array("type="=>"income")) }}
							</select>
						</div>
					</div>

					<input type="hidden" name="trans_type" value="income">
					<input type="hidden" name="dr_cr" value="cr">

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Payer</label>
							<select class="form-control select2" name="payee_payer_id" required>
								<option value="">Select One</option>
								{{ create_option("payee_payers","id","name",$transaction->payee_payer_id,array("type="=>"payer")) }}
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Payment Method</label>
							<select class="form-control select2" name="payment_method_id" required>
								<option value="">Select One</option>
								{{ create_option("payment_methods","id","name",$transaction->payment_method_id) }}
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Reference</label>
							<input type="text" class="form-control" name="reference" value="{{ $transaction->reference }}">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Attachment</label>
							<input type="file" class="form-control appsvan-file" data-value="{{ $transaction->attachment}}" name="attachment">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Note</label>
							<textarea class="form-control" name="note">{{ $transaction->note }}</textarea>
						</div>
					</div>


					<div class="col-md-12">
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection