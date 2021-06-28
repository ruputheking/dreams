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
						<td style="text-align: center;" colspan="4"><img width="200px" style="border-radius: 7px;" src="{{ asset('frontend/images/'.$parent->photo) }}"></td>
					</tr>
					<tr>
						<td>Name</td>
						<td colspan="3">{{ $parent->parent_name }}</td>
					</tr>
					<tr>
						<td>Student Name</td>
						<td colspan="3">{{ $parent->student_name }}</td>
					</tr>
					<tr>
						<td>Course</td>
						<td>{{ $parent->title }}</td>
						<td>Section</td>
						<td>{{ $parent->section_name }}</td>
					</tr>
					<tr>
						<td>Citizenship</td>
						<td>{{ $parent->citizenship_no }}</td>
						<td>Passport No</td>
						<td>{{ $parent->passport ?? '-' }}</td>
					</tr>
					<tr>
						<td>Father's Name</td>
						<td>{{ $parent->f_name }}</td>
						<td>Mother's Name</td>
						<td>{{ $parent->m_name }}</td>
					</tr>
					<tr>
						<td>Father's Profession</td>
						<td>{{ $parent->f_profession }}</td>
						<td>Mothers's Profession</td>
						<td>{{ $parent->m_profession }}</td>
					</tr>
					<tr>
						<td>Phone</td>
						<td>{{ $parent->phone }}</td>
						<td>Email</td>
						<td>{{ $parent->email }}</td>
					</tr>
					<tr>
						<td>Address</td>
						<td colspan="3">{{ $parent->address }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection