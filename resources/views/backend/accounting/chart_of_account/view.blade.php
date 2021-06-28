@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('chart_of_accounts.index') }}">Chart Of Account</a></li>
<li class="active">View Chart Of Account</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">View Chart Of Account</div>

			<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<td>Name</td>
						<td>{{ $chartofaccount->name }}</td>
					</tr>
					<tr>
						<td>Type</td>
						<td>{{ $chartofaccount->type }}</td>
					</tr>

				</table>
			</div>
		</div>
	</div>
</div>
@endsection