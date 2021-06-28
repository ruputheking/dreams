@extends('layouts.backend.main')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Update Grade</div>

			<div class="panel-body">
				<form method="post" class="validate" autocomplete="off" action="{{route('grades.update', $id)}}" enctype="multipart/form-data">
					{{ csrf_field()}}
					<input name="_method" type="hidden" value="PATCH">

					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Grade Name <span class="required">*</span></label>
							<input type="text" class="form-control" name="grade_name" value="{{$grade->grade_name}}" required>
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
							<textarea class="form-control" name="note">{{ $grade->note }}</textarea>
						</div>
					</div>


					<div class="form-group">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection