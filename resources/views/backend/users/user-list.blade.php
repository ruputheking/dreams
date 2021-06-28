@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Users List</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="panel-title">Users List</h4></span>
				<a href="{{route('users.create')}}" class="btn btn-primary btn-sm pull-right" style="margin-top:-3px;">Add New User</a>
			</div>
			<div class="panel-body">
				<table class="table table-bordered data-table">
					<thead>
						<th>Profile</th>
						<th>Name</th>
						<th>Email</th>
						<th>Type</th>
						<th width="200">Action</th>
					</thead>
					<tbody>
						@foreach($users AS $data)
						<tr>
							@if ($data->photo)
							<td><img src="{{ asset('frontend/images/'. $data->photo) }}" width="50px" height="50" alt=""></td>
							@else
							<td><img src="{{ asset('frontend/images/profile.png') }}" width="50px" height="50" alt=""></td>
							@endif
							<td>{{$data->user_name}}</td>
							<td>{{$data->email}}</td>
							<td>
								{{ $data->roles()->first()->display_name ??"None" }}
							</td>
							<td>
								<form action="{{route('users.destroy',$data->email)}}" method="post">
									<a href="{{route('users.show',$data->email)}}" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
									<a href="{{route('users.edit',$data->email)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
									{{ method_field('DELETE') }}
									{{csrf_field()}}
									<button type="submit" class="btn btn-danger btn-xs btn-remove"><i class="fa fa-eraser" aria-hidden="true"></i> Delete</button>
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