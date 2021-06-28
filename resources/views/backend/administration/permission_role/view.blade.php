@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('permission_roles.index') }}">Permission Role</a></li>
<li class="active">View Permission Role</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">View Permission Role</div>

			<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<td>Role Name</td>
						<td>{{ $role->role_name }}</td>
					</tr>
					<tr>
						<td>Note</td>
						<td>{{ $role->note }}</td>
					</tr>

				</table>
			</div>
		</div>
	</div>
</div>
@endsection