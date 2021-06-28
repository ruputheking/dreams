<form method="post" class="ajax-submit" autocomplete="off" action="{{route('permission_roles.update', $id)}}" enctype="multipart/form-data">
	{{ csrf_field()}}
	<input name="_method" type="hidden" value="PATCH">

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Role Name <span class="required">*</span></label>
			<input type="text" class="form-control" name="role_name" value="{{ $role->name }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Display Name <span class="required">*</span></label>
			<input type="text" class="form-control" name="display_name" value="{{ $role->display_name }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Note</label>
			<textarea class="form-control" name="note">{{ $role->description }}</textarea>
		</div>
	</div>


	<div class="form-group">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
	</div>
</form>