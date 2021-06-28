@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Profile</li>
@endsection

@section('content')
<style media="screen">
	.social-link {
		text-align: center;
		list-style: none;
		overflow: hidden;
		font-size: 24px;
		padding: 0px;
		margin: 0px;
	}

	.social-link a {
		color: black;
	}

	.social-link a:hover {
		color: #3c8dbc;
	}

	.social-link li {
		display: inline;
		margin: 5px;
	}

	.table>tbody>tr {
		position: relative;
	}
</style>
<div class="row">
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					Profile
				</div>
			</div>
			<div class="panel-body">
				<table class="table table-bordered" width="100%">
					<tbody style="text-align: center;">
						<tr class="text-center">
							@if ($profile->photo)
							<td colspan="2"><img src="{{ asset('/frontend/images/'.$profile->photo) }}" style="width: 100px; height: 100px;border-radius: 5px"></td>
							@else
							<td colspan="2"><img src="{{ asset('/frontend/images/profile.png') }}" style="width: 100px; height: 100px;border-radius: 5px"></td>
							@endif
						</tr>
						<tr class="text-center">
							<td>Name</td>
							<td>{{ $profile->user_name }}</td>
						</tr>
						<tr class="text-center">
							<td>User Type</td>
							<td>{{ Auth::user()->roles()->first()->display_name }}</td>
						</tr>
						<tr class="text-center">
							<td>Email</td>
							<td>{{ $profile->email }}</td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection