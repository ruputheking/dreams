<form method="post" class="ajax-submit" autocomplete="off" action="{{route('accounts.store')}}" enctype="multipart/form-data">
	{{ csrf_field() }}

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Account Name <span class="required">*</span></label>
			<input type="text" class="form-control" name="account_name" value="{{ old('account_name') }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">{{ ('Opening Balance')." ".get_option('currency_symbol') }} <span class="required">*</span></label>
			<input type="text" class="form-control float-field" name="opening_balance" value="{{ old('opening_balance') }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Note</label>
			<textarea class="form-control" name="note">{{ old('note') }}</textarea>
		</div>
	</div>



	<div class="col-md-12">
		<div class="form-group">
			<button type="reset" class="btn btn-danger">Reset</button>
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</div>
</form>