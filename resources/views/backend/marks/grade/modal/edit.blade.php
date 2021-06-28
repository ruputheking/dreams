<form method="post" class="ajax-submit" autocomplete="off" action="{{route('grades.update', $id)}}" enctype="multipart/form-data">
	{{ csrf_field()}}
	<input name="_method" type="hidden" value="PATCH">

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Grade Name <span class="required">*</span></label>
			<input type="text" class="form-control" name="grade_name" value="{{ $grade->grade_name }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Marks From <span class="required">*</span></label>
			<input type="text" class="form-control float-field" name="marks_from" value="{{ $grade->marks_from }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Marks To <span class="required">*</span></label>
			<input type="text" class="form-control float-field" name="marks_to" value="{{ $grade->marks_to }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Point <span class="required">*</span></label>
			<input type="text" class="form-control float-field" name="point" value="{{ $grade->point }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Note</label>
			<textarea class="form-control" name="note">{{$grade->note}}</textarea>
		</div>
	</div>


	<div class="form-group">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
	</div>
</form>