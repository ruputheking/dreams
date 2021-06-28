@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('users.index') }}">User List</a></li>
<li class="active">Update User</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					Update User
				</div>
			</div>
			<div class="panel-body">
				<div class="col-md-12">
					<form action="{{route('users.update', $user->id)}}" autocomplete="off" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						{{csrf_field()}}
						{{ method_field('put') }}
						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<label class="control-label">Name <span class="required">*</span></label>
							<input type="text" class="form-control" name="name" value="{{ $user->user_name }}" required>
						</div>
						<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
							<label class="control-label">Email <span class="required">*</span></label>
							<input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
						</div>
						<div class="form-group {{ $errors->has('user_type') ? ' has-error' : '' }}">
							<label class="control-label">User Type <span class="required">*</span></label>
							<select name="user_type" class="form-control select2" required>
								<option value="">Select One</option>
								<option @if($user->roles()->first()->id=='1') selected
									@endif value="1">Admin
								</option>
								<option @if($user->roles()->first()->id=='5') selected
									@endif value="5">Accountant
								</option>
								<option @if($user->roles()->first()->id=='6') selected
									@endif value="6">Receptionist
								</option>
							</select>
						</div>

						<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
							<label class="control-label">Profile</label>
							<input type="file" class="form-control dropify" name="image" data-default-file="{{ asset('frontend/images/'.$user->photo) }}" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
						</div>
						<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
							<label class="control-label">Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
						<div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<label class="control-label">Confirm Password</label>
							<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
						</div>

						<div class="form-group">
							<div class="col-sm-offset-0 col-sm-5">
								<button type="submit" class="btn btn-info">Update User</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection