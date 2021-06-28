@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">My Profile</li>
@endsection

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					My Profile
				</div>
			</div>
			<table class="table table-striped table-bordered" width="100%">
				<tbody>
					<tr>
						<td style="text-align: center;" colspan="4"><img width="200px" style="border-radius: 7px;" src="{{ asset('frontend/images/'.$teacher->photo) }}"></td>
					</tr>
					<tr>
						<td colspan="2">Name</td>
						<td colspan="2">{{ $teacher->name }}</td>
					</tr>
					<tr>
						<td>Date Of Birth</td>
						<td>{{ $teacher->birthday }}</td>
						<td>Gender</td>
						<td>{{ $teacher->gender }}</td>
					</tr>
					<tr>
						<td>Religion</td>
						<td>{{ $teacher->religion }}</td>
						<td>Address</td>
						<td>{{ $teacher->address }}</td>
					</tr>
					<tr>
						<td>Phone</td>
						<td>{{ $teacher->phone }}</td>
						<td>Email</td>
						<td>{{ $teacher->email }}</td>
					</tr>
					<tr>
						<td>Joining Date</td>
						<td>{{ $teacher->joining_date }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection