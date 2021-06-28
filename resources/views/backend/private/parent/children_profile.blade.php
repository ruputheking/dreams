@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">My Children</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					{{ get_student_name($student_id) }}
				</div>
			</div>

			<div class="panel-body">
				<nav class="navbar navbar-default child-profile-menu">
					<div class="container-fluid">
						<ul class="nav navbar-nav">
							<li class="active"><a href="{{ url('dashboard/parent/my_children/'.$student_id) }}">Profile</a></li>
							<li><a href="{{ url('dashboard/parent/children_attendance/'.$student_id) }}">Attendance</a></li>
							<li><a href="{{ url('dashboard/parent/progress_card/'.$student_id) }}">Progress Card</a></li>
						</ul>
					</div>
				</nav>

				<table class="table table-striped table-bordered" width="100%">
					<tbody>
						<tr>
							<td style="text-align: center;" colspan="4"><img width="200px" style="border-radius: 7px;" src="{{ asset('frontend/images/'.$student->photo) }}"></td>
						</tr>
						<tr>
							<td colspan="2">Name</td>
							<td colspan="2">{{ $student->student_name }}</td>
						</tr>
						<tr>
							<td>Guardian</td>
							<td>{{$student->parent_name}}</td>
							<td>Date Of Birth</td>
							<td>{{$student->birthday}}</td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>{{$student->gender}}</td>
							<td>Blood Group</td>
							<td>{{$student->blood_group}}</td>
						</tr>
						<tr>
							<td>Religion</td>
							<td>{{$student->religion}}</td>
							<td>Address</td>
							<td>{{$student->address}}</td>
						</tr>
						<tr>
							<td>Phone</td>
							<td>{{$student->phone}}</td>
							<td>Email</td>
							<td>{{$student->email}}</td>
						</tr>
						<tr>
							<td>Class</td>
							<td>{{$student->title}}</td>
							<td>Section</td>
							<td>{{$student->section_name}}</td>
						</tr>
						<tr>
							<td>Citizenship</td>
							<td>{{$student->citizenship_no}}</td>
							<td>Passport No</td>
							<td>{{$student->passport}}</td>
						</tr>
						<tr>
							<td>Remarks</td>
							<td colspan="3">{{$student->remarks}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection