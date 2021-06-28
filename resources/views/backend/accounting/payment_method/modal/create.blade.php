<form method="post" class="ajax-submit" autocomplete="off" action="{{route('payment_methods.store')}}" enctype="multipart/form-data">
	{{ csrf_field() }}

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Payment Method Name <span class="required">*</span></label>
			<input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
		</div>
	</div>


	<div class="col-md-12">
		<div class="form-group">
			<button type="reset" class="btn btn-danger">Reset</button>
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</div>
</form>