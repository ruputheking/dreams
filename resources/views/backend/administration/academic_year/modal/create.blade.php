<form method="post" class="ajax-submit" autocomplete="off" action="{{route('academic_years.store')}}" enctype="multipart/form-data">
	{{ csrf_field() }}

	<div class="col-md-12">
		<div class="form-group  {{ $errors->has('session') ? ' has-error' : '' }}">
			<label class="control-label">Session Name <span class="required">*</span></label>
			<input type="text" class="form-control" name="session" value="{{ old('session') }}" required>
			<small class="text-danger">{{ $errors->first('session') }}</small>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group  {{ $errors->has('year') ? ' has-error' : '' }}">
			<label class="control-label">Academic Year <span class="required">*</span></label>
			<input type="text" class="form-control year" name="year" value="{{ old('year') }}" required>
			<small class="text-danger">{{ $errors->first('year') }}</small>
		</div>
	</div>


	<div class="col-md-12">
		<div class="form-group">
			<button type="reset" class="btn btn-danger">Reset</button>
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</div>
</form>