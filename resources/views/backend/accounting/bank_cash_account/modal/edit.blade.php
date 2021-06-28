<form method="post" class="ajax-submit" autocomplete="off" action="{{route('accounts.update', $id)}}" enctype="multipart/form-data">
	{{ csrf_field()}}
	<input name="_method" type="hidden" value="PATCH">

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Account Name <span class="required">*</span></label>
			<input type="text" class="form-control" name="account_name" value="{{ $account->account_name }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">{{ ('Opening Balance')." ".get_option('currency_symbol') }} <span class="required">*</span></label>
			<input type="text" class="form-control float-field" name="opening_balance" value="{{ $account->opening_balance }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Note</label>
			<textarea class="form-control" name="note">{{ $account->note }}</textarea>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
	</div>
</form>