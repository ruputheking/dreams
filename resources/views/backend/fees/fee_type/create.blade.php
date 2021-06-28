@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('fee_types.index') }}">Fee Type</a></li>
<li class="active">Add Fee Type</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">Add Fee Type</div>

			<div class="panel-body">
				<form method="post" class="validate" autocomplete="off" action="{{route('fee_types.store')}}" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Fee Type <span class="required">*</span></label>
							<input type="text" class="form-control" name="fee_type" value="{{ old('fee_type') }}" required>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Fee Code <span class="required">*</span></label>
							<input type="text" class="form-control" name="fee_code" value="{{ old('fee_code') }}" required>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Note</label>
							<textarea class="form-control" name="note">{{ old('note') }}</textarea>
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