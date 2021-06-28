<form method="post" class="ajax-submit" autocomplete="off" action="{{route('mark_distributions.store')}}" enctype="multipart/form-data">
	{{ csrf_field() }}

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Mark Distribution Type <span class="required">*</span></label>
			<input type="text" class="form-control" name="mark_distribution_type" value="{{ old('mark_distribution_type') }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Mark Percentage <span class="required">*</span></label>
			<input type="text" class="form-control float-field" name="mark_percentage" value="{{ old('mark_percentage') }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Active <span class="required">*</span></label>
			<select class="form-control select2" name="is_active" required>
				<option value="yes">Yes</option>
				<option value="no">No</option>
			</select>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<button type="reset" class="btn btn-danger">Reset</button>
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</div>
</form>