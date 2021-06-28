<form method="post" class="ajax-submit" autocomplete="off" action="{{ route('permission_roles.store') }}" enctype="multipart/form-data">
	{{ csrf_field() }}

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Role Name <span class="required">*</span></label>
			<input type="text" class="form-control" name="role_name" value="{{ old('role_name') }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Display Name <span class="required">*</span></label>
			<input type="text" class="form-control" name="display_name" value="{{ old('display_name') }}" required>
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