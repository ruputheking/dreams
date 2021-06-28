<form action="{{route('user_parents.store')}}" class="ajax-submit" enctype="multipart/form-data" method="post" accept-charset="utf-8">
	@csrf
	<div class="col-sm-12">
		<div class="form-group">
			<label class="control-label">Parent Name <span class="required">*</span></label>
			<input type="text" class="form-control" name="parent_name" value="{{ old('parent_name') }}" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Father's Name <span class="required">*</span></label>
			<input type="text" class="form-control" name="f_name" value="{{ old('f_name') }}" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Mother's Name <span class="required">*</span></label>
			<input type="text" class="form-control" name="m_name" value="{{ old('m_name') }}" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Father's Profession</label>
			<input type="text" class="form-control" name="f_profession" value="{{ old('f_profession') }}">
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Mother's Profession</label>
			<input type="text" class="form-control" name="m_profession" value="{{ old('m_profession') }}">
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Phone <span class="required">*</span></label>
			<input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Address</label>
			<textarea class="form-control" name="address">{{ old('address') }}</textarea>
		</div>
	</div>


	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Email <span class="required">*</span></label>
			<input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Password <span class="required">*</span></label>
			<input type="password" class="form-control" name="password" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Confirm Password <span class="required">*</span></label>
			<input type="password" class="form-control" name="password_confirmation" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Profile Picture</label>
			<input type="file" class="form-control dropify" name="image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
		</div>
	</div>
	<script type="text/javascript">
		$('.dropify').dropify();
	</script>
	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" class="btn btn-info btn-block">Save Parent</button>
		</div>
	</div>
</form>