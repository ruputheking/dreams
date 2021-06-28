@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">List Permission Role</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default no-export">
			<div class="panel-heading"><span class="panel-title">List Permission Role</span>
				<a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="Add Permission Role" style="margin-top:-3px;" href="{{route('permission_roles.create')}}">Add New</a>
			</div>

			<div class="panel-body">
				@if (\Session::has('success'))
				<div class="alert alert-success">
					<p>{{ \Session::get('success') }}</p>
				</div>
				<br />
				@endif
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th>Display Name</th>
							<th>Role</th>
							<th>Note</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						@foreach($roles as $role)
						<tr id="row_{{ $role->id }}">
							<td class='role_name'>{{ $role->display_name }}</td>
							<td class='role_name'>{{ $role->name }}</td>
							<td class='note'>{{ $role->description }}</td>

							<td>
								<form action="{{ route('permission_roles.destroy', $role['id'])}}" method="post">
									<a href="{{ route('permission_roles.edit', $role['id'])}}" data-title="Update Permission Role" class="btn btn-warning btn-sm ajax-modal">Edit</a>
									<a href="{{ route('permission_roles.show', $role['id'])}}" data-title="View Permission Role" class="btn btn-info btn-sm ajax-modal">View</a>
									{{ csrf_field() }}
									<input name="_method" type="hidden" value="DELETE">
									<button class="btn btn-danger btn-sm btn-remove" type="submit">Delete</button>
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