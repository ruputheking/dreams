@extends('layouts.backend.main')

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">Add Mark Distribution</div>

			<div class="panel-body">
				<form method="post" class="validate" autocomplete="off" action="{{route('mark_distributions.store')}}" enctype="multipart/form-data">
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

					<div class="form-group">
						<div class="col-md-12">
							<button type="reset" class="btn btn-danger">Reset</button>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection