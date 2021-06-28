@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Syllabus List</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default clearfix">
			<div class="panel-heading clearfix">
				<div class="panel-title pull-left" style="margin-top:-6px">
					<h4 class="title">Syllabus List</h4>
				</div>
				<div class="pull-right">
					<a href="{{route('syllabus.create')}}" class="btn btn-info btn-sm">Add New Syllabus</a>
				</div>
			</div>
			<div class="panel-body no-export">
				<table class="table table-bordered data-table">
					<thead>
						<th>Title</th>
						<th>Description</th>
						<th>Course</th>
						<th>File</th>
						<th style="width: 155px;">Action</th>
					</thead>
					<tbody>
						@foreach($syllabus AS $data)
						<tr>
							<td>{{$data->title}}</td>
							<td>{{substr(strip_tags($data->description),0,100)}}...</td>
							<td>{{$data->class_name}}</td>
							<td>{{$data->file}}</td>
							<td>
								<form action="{{route('syllabus.destroy',$data->id)}}" method="post">
									<a href="{{ asset('frontend/images/syllabus/'.$data->file) }}" class="btn btn-info btn-xs"><i class="fa fa-download" aria-hidden="true"></i></a>
									<a href="{{route('syllabus.show',$data->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
									<a href="{{route('syllabus.edit',$data->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit" aria-hidden="true"></i></a>
									{{ method_field('DELETE') }}
									@csrf
									<button type="submit" class="btn btn-danger btn-xs btn-remove"><i class="fa fa-eraser" aria-hidden="true"></i></button>
								</form>
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