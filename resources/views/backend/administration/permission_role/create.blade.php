@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('permission_roles.index') }}">Permission Role</a></li>
<li class="active">Add Permission Role</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Add Permission Role</div>

			<div class="panel-body">
				<form method="post" class="validate" autocomplete="off" action="{{route('permission_roles.store')}}" enctype="multipart/form-data">
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