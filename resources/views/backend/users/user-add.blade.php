@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('users.index') }}">User List</a></li>
<li class="active">Add New User</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Add New User
				</div>
			</div>
			<div class="panel-body">
				<div class="col-md-12">
					<form action="{{route('users.store')}}" class="form-horizontal form-groups-bordered validate" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						{{csrf_field()}}
						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<label class="control-label">Name <span class="required">*</span></label>
							<input type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="Full Name">
						</div>
						<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
							<label class="control-label">Email <span class="required">*</span></label>
							<input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email Address">
						</div>

						<div class="form-group {{ $errors->has('user_type') ? ' has-error' : '' }}">
							<label class="control-label">User Type <span class="required">*</span></label>
							<select name="user_type" id="user_type" class="form-control select2" required>
								<option value="">Select One</option>
								<option @if(old('user_type') == 1) selected
								@endif value="1">Admin</option>
								<option @if(old('user_type') == 5) selected
								@endif value="5">Accountant</option>
								<option @if(old('user_type') == 6) selected
								@endif value="6">Receptionist</option>
							</select>
						</div>
						<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
							<label class="control-label">Password <span class="required">*</span></label>
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
						<div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<label class="control-label">Confirm Password <span class="required">*</span></label>
							<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
						</div>

						<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
							<label class="control-label">Profile</label>
							<input type="file" class="form-control dropify" name="image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
						</div>

						<div class="form-group">
							<div class="col-sm-5">
								<button type="submit" class="btn btn-info">Add User</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
	$("#user_type").val("{{ old('user_type') }}");
</script>
@endsection