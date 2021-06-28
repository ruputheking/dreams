@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">My Profile</li>
@endsection

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					My Profile
				</div>
			</div>

			<table class="table table-striped table-bordered" width="100%">
				<tbody>
					<tr>
						<td style="text-align: center;" colspan="4"><img width="200px" height="200px" style="border-radius: 7px;" src="{{ asset('frontend/images/'.$student->photo) }}"></td>
					</tr>
					<tr>
						<td colspan="2">Name</td>
						<td colspan="2">{{$student->student_name}}</td>
					</tr>
					<tr>
						<td>Guardian</td>
						<td>{{ $student->parent_name }}</td>
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
						<td>Course</td>
						<td>{{$student->title}}</td>
						<td>Section</td>
						<td>{{$student->section_name}}</td>
					</tr>
					<tr>
						<td>Citizenship</td>
						<td>{{$student->citizenship_no ?? '-'}}</td>
						<td>Passport</td>
						<td>{{$student->passport ?? '-'}}</td>
					</tr>
					<tr>
						<td>Remarks</td>
						<td>{{$student->remarks ?? '-'}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection