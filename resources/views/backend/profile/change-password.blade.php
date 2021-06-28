@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Change Profile</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					Change Password
				</div>
			</div>
			<div class="panel-body">
				<div class="col-md-8">
					<form action="{{ route('profile.passwordUpdate') }}" class="form-horizontal form-groups-bordered validate" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						{{csrf_field()}}
						<div class="form-group {{ $errors->has('oldpassword') ? 'has-error' : '' }}">
							<label class="col-sm-3 control-label">Old Password <span class="required">*</span></label>
							<div class="col-sm-9">
								<input type="password" class="form-control" name="oldpassword" placeholder="Current Password" required>
							</div>
						</div>
						<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
							<label class="col-sm-3 control-label">New Password <span class="required">*</span></label>
							<div class="col-sm-9">
								<input type="password" class="form-control" name="password" placeholder="New Password" required>
							</div>
						</div>
						<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
							<label class="col-sm-3 control-label">Confirm Password <span class="required">*</span></label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="password-confirm" placeholder="Confirm Password" name="password_confirmation" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" class="btn btn-info">Update Password</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection