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
					<i class="entypo-plus-circled"></i>Update Parent
				</div>
			</div>
			<div class="panel-body">
				<form action="{{route('parents.update',$parent->id)}}" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
					@csrf
					{{ method_field('PATCH') }}
					<div class="form-group">
						<div class="col-md-12">
							<label class="control-label">Parent Name</label>
							<input type="text" class="form-control" name="parent_name" value="{{$parent->parent_name}}" placeholder="Full Name" required>
						</div>
						<div class="col-md-6">
							<label class="control-label">Father's Name</label>
							<input type="text" class="form-control" name="f_name" value="{{$parent->f_name}}" placeholder="Father's Name" required>
						</div>
						<div class="col-md-6">
							<label class="control-label">Mother's Name</label>
							<input type="text" class="form-control" name="m_name" value="{{$parent->m_name}}" placeholder="Mother's Name" required>
						</div>
						<div class="col-md-6">
							<label class="control-label">Father's Profession</label>
							<input type="text" class="form-control" name="f_profession" value="{{$parent->f_profession}}" placeholder="Father's Profession">
						</div>
						<div class="col-md-6">
							<label class="control-label">Mother's Profession</label>
							<input type="text" class="form-control" name="m_profession" value="{{$parent->m_profession}}" placeholder="Mother's Profession">
						</div>
						<div class="col-md-6">
							<label class="control-label">Phone</label>
							<input type="text" class="form-control" name="phone" value="{{$parent->phone}}" placeholder="Phone Number" required>
						</div>
						<div class="col-md-6">
							<label class="control-label">Address</label>
							<input class="form-control" name="address" value="{{$parent->address}}" placeholder="Address">
						</div>
					</div>

					<hr>
					<div class="page-header">
						<h4>Login Details</h4>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<label class="control-label">Email</label>
							<input type="email" class="form-control" name="email" value="{{$parent->email}}" required>
						</div>
						<div class="col-md-6">
							<label class="control-label">Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password (min 6)">
						</div>
						<div class="col-md-6">
							<label class="control-label">Confirm Password</label>
							<input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation">
						</div>

						<div class="col-md-12">
							<label class="control-label">Profile Picture</label>
							<input type="file" class="form-control dropify" name="image" data-default-file="/frontend/images/{{$parent->photo }}" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-5">
							<button type="submit" class="btn btn-info">Update Parent</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection