<form method="post" class="ajax-submit" autocomplete="off" action="{{route('payee_payers.store')}}" enctype="multipart/form-data">
	{{ csrf_field() }}

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Name <span class="required">*</span></label>
			<input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Type <span class="required">*</span></label>
			<select class="form-control" name="type" required>
				<option value="">Select One</option>
				<option value="payer">Payer</option>
				<option value="payee">Payee</option>
			</select>
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