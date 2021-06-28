@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('parents.index') }}">Parents</a></li>
<li class="active">Parent Profile</li>
@endsection

@section('content')
<div class="row">
	<div class="col-sm-10">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Parent Profile
				</div>
			</div>
			<table class="table table-striped table-bordered" width="100%">
				<tbody>
					<tr>
						<td style="text-align: center;" colspan="4"><img width="200px" style="border-radius: 7px;" src="{{ asset('frontend/images/'.$parent->photo) }}"></td>
					</tr>
					<tr>
						<td colspan="2">Guardian Name</td>
						<td colspan="2">{{ $parent->parent_name }}</td>
					</tr>
					<tr>
						<td colspan="2">Student Name</td>
						<td colspan="2">{{ $parent->student_name ?? '-' }}</td>
					</tr>
					<tr>
						<td>Class</td>
						<td>{{ $parent->class_name ?? '-' }}</td>
						<td>Section</td>
						<td>{{ $parent->section_name ?? '-' }}</td>
					</tr>
					<tr>
						<td>Father's Name</td>
						<td>{{ $parent->f_name }}</td>
						<td>Mother's Name</td>
						<td>{{ $parent->m_name }}</td>
					</tr>
					<tr>
						<td>Father's Profession</td>
						<td>{{ $parent->f_profession ?? '-' }}</td>
						<td>Mothers's Profession</td>
						<td>{{ $parent->m_profession ?? '-' }}</td>
					</tr>
					<tr>
						<td>Phone</td>
						<td>{{ $parent->phone }}</td>
						<td>Email</td>
						<td>{{ $parent->email }}</td>
					</tr>
					<tr>
						<td colspan="2">Address</td>
						<td colspan="2">{{ $parent->address ?? '-' }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection