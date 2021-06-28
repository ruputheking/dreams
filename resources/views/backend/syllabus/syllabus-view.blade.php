@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('syllabus.index') }}">Syllabus List</a></li>
<li class="active">View Syllabus</li>
@endsection

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Syllabus
				</div>
			</div>
			<table class="table table-striped table-bordered" width="100%">
				<tbody>
					<tr>
						<td>Title</td>
						<td>{{$syllabus->title}}</td>
					</tr>
					<tr>
						<td>Description</td>
						<td>{!! $syllabus->description !!}</td>
					</tr>
					<tr>
						<td>Course</td>
						<td>{{$syllabus->class_name}}</td>
					</tr>
					<tr>
						<td>File</td>
						<td>
							<a class="btn btn-info btn-sm" href="{{ asset('frontend/images/syllabus/'.$syllabus->file) }}">Click to Download</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection