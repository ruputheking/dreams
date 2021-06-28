@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Parents List</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="panel-title">Parents List</span>
				<a href="{{route('parents.create')}}" class="btn btn-info btn-sm pull-right" style="margin-top:-3px">Add New Parent</a>
			</div>
			<div class="panel-body no-export">
				<table id="example1" class="table table-bordered">
					<thead>
						<th>Profile</th>
						<th>Name</th>
						<th>Student</th>
						<th>Email</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($parents as $data)
						<tr>
							<td><img src="/frontend/images/{{$data->photo}}" width="50px" alt=""></td>
							<td>{{ $data->user_name }}</td>
							<td>{{ $data->student_name ?? '-' }}</td>
							<td>{{ $data->email }}</td>
							<td>
								<form action="{{route('parents.destroy',$data->id)}}" method="post">
									<a href="{{route('parents.show',$data->id)}}" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
									<a href="{{route('parents.edit',$data->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit" aria-hidden="true"></i></a>
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