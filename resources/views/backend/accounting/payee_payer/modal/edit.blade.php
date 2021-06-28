<form method="post" class="ajax-submit" autocomplete="off" action="{{route('payee_payers.update', $id)}}" enctype="multipart/form-data">
	{{ csrf_field()}}
	<input name="_method" type="hidden" value="PATCH">

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Name <span class="required">*</span></label>
			<input type="text" class="form-control" name="name" value="{{ $payeepayer->name }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Type <span class="required">*</span></label>
			<select class="form-control" name="type" required>
				<option value="">Select One</option>
				<option value="payer" @if($payeepayer->type=="payer") selected @endif>Payer</option>
				<option value="payee" @if($payeepayer->type=="payee") selected @endif>Payee</option>
			</select>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Note</label>
			<textarea class="form-control" name="note">{{ $payeepayer->note }}</textarea>
		</div>
	</div>


	<div class="form-group">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
	</div>
</form>