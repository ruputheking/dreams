@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">My Syllabus</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					My Syllabus
				</div>
			</div>
			<div class="panel-body">
				<table class="table table-bordered data-table">
					<thead>
						<th>Title</th>
						<th>Description</th>
						<th>Class</th>
						<th>File</th>
						<th style="width:120px">View Details</th>
					</thead>
					<tbody>
						@foreach($syllabus AS $data)
						<tr>
							<td>{{$data->title}}</td>
							<td>{{substr(strip_tags($data->description),0,100)}}...</td>
							<td>{{$data->title}}</td>
							<td>{{$data->file}}</td>
							<td>
								<a href="{{ asset('frontend/images/syllabus/'.$data->file) }}" target="_blank" class="btn btn-info btn-xs rect-btn" download><i class="fa fa-download" aria-hidden="true"></i></a>
								<a href="{{ url('dashboard/student/view_syllabus/'.$data->id) }}" class="btn btn-primary btn-xs ajax-modal rect-btn" data-title="View Syllabus" data-fullscreen="true"><i class="fa fa-eye" aria-hidden="true"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection