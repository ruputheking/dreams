<form method="post" class="ajax-submit" autocomplete="off" action="{{route('fee_types.update', $id)}}" enctype="multipart/form-data">
	{{ csrf_field()}}
	<input name="_method" type="hidden" value="PATCH">

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Fee Type <span class="required">*</span></label>
			<input type="text" class="form-control" name="fee_type" value="{{ $feetype->fee_type }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Fee Code <span class="required">*</span></label>
			<input type="text" class="form-control" name="fee_code" value="{{ $feetype->fee_code }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Note</label>
			<textarea class="form-control" name="note">{{ $feetype->note }}</textarea>
		</div>
	</div>


	<div class="form-group">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
	</div>
</form>