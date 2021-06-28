@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('fee_types.index') }}">Fee Type</a></li>
<li class="active">Update Fee Type</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">Update Fee Type</div>

			<div class="panel-body">
				<form method="post" class="validate" autocomplete="off" action="{{route('fee_types.update', $id)}}" enctype="multipart/form-data">
					{{ csrf_field()}}
					<input name="_method" type="hidden" value="PATCH">

					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Fee Type <span class="required">*</span></label>
							<input type="text" class="form-control" name="fee_type" value="{{ $feetype->fee_type }}" required>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Fee Code <span class="required">*</span></label>
							<input type="text" class="form-control" name="fee_code" value="{{ $feetype->fee_code }}" required>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Note</label>
							<textarea class="form-control" name="note">{{ $feetype->note }}</textarea>
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