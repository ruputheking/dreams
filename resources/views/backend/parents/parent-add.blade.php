@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('parents.index') }}">Parents</a></li>
<li class="active">Add New Parent</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Add New Parent
				</div>
			</div>
			<div class="panel-body">
				<form autocomplete="off" action="{{route('parents.store')}}" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
					@csrf
					<div class="form-group">
						<div class="col-md-12 {{ $errors->has('parent_name') ? ' has-error' : '' }}">
							<label class="control-label">Parent Name <span class="required">*</span></label>
							<input type="text" class="form-control" name="parent_name" value="{{ old('parent_name') }}" required placeholder="Full Name">
						</div>
						<div class="col-md-6">
							<label class="control-label">Father's Name <span class="required">*</span></label>
							<input type="text" class="form-control" name="f_name" value="{{ old('f_name') }}" required placeholder="Father's Name">
						</div>
						<div class="col-md-6">
							<label class="control-label">Mother's Name <span class="required">*</span></label>
							<input type="text" class="form-control" name="m_name" value="{{ old('m_name') }}" required placeholder="Mother's Name">
						</div>
						<div class="col-md-6">
							<label class="control-label">Father's Profession</label>
							<input type="text" class="form-control" name="f_profession" value="{{ old('f_profession') }}" placeholder="Father's Profession">
						</div>
						<div class="col-md-6">
							<label class="control-label">Mother's Profession</label>
							<input type="text" class="form-control" name="m_profession" value="{{ old('m_profession') }}" placeholder="Mother's Profession">
						</div>
						<div class="col-md-6">
							<label class="control-label">Phone <span class="required">*</span></label>
							<input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required placeholder="Phone Number">
						</div>
						<div class="col-md-6">
							<label class="control-label">Address</label>
							<input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Address">
						</div>
					</div>

					<hr>
					<div class="page-header">
						<h4>Login Details</h4>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<label class="control-label">Email <span class="required">*</span></label>
							<input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email Address">
						</div>
						<div class="col-md-6">
							<label class="control-label">Password <span class="required">*</span></label>
							<input type="password" class="form-control" name="password" required placeholder="Password (min 6)">
						</div>
						<div class="col-md-6">
							<label class="control-label">Confirm Password <span class="required">*</span></label>
							<input type="password" class="form-control" name="password_confirmation" required placeholder="Password Confirmation">
						</div>
						<div class="col-md-12">
							<label class="control-label">Profile Picture</label>
							<input type="file" class="form-control dropify" name="image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-0 col-sm-5">
							<button type="submit" class="btn btn-info">Save Parent</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection