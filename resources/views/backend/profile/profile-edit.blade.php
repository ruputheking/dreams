@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Edit Profile</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Edit Profile
				</div>
			</div>
			<div class="panel-body">
				<div class="col-md-8">
					<form action="{{ route('profile.update') }}" class="form-horizontal form-groups-bordered validate" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						{{csrf_field()}}
						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<label class="col-sm-3 control-label">Name <span class="required">*</span></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="name" value="{{$profile->user_name}}" placeholder="Full Name" required>
							</div>
						</div>
						<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
							<label class="col-sm-3 control-label">Email <span class="required">*</span></label>
							<div class="col-sm-9">
								<input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ $profile->email }}" required>
							</div>
						</div>
						<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
							<label class="col-sm-3 control-label">Image</label>
							<div class="col-sm-9">
								@if ($profile->photo)
								<input type="file" class="form-control dropify" data-default-file="{{ asset('frontend/images/'.$profile->photo) }}" name="image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
								@else
								<input type="file" class="form-control dropify" data-default-file="{{ asset('frontend/images/profile.png') }}" name="image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" class="btn btn-info">Update Profile</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection