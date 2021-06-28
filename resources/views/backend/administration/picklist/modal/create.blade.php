@extends('layouts.admin')

@section('header')
Add Picklist
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">Add Picklist</div>

			<div class="panel-body">
				<form method="post" class="validate" autocomplete="off" action="{{route('picklists.store')}}" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Type</label>
							<select name="type" class="form-control select2" required>
								<option>Religion</option>
							</select>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Value</label>
							<input type="text" class="form-control" name="value" value="{{ old('value') }}" required>
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