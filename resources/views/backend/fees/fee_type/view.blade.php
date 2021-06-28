@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('fee_types.index') }}">Fee Type</a></li>
<li class="active">View Fee Type</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">View Fee Type</div>

			<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<td>Fee Type</td>
						<td>{{ $feetype->fee_type }}</td>
					</tr>
					<tr>
						<td>Fee Code</td>
						<td>{{ $feetype->fee_code }}</td>
					</tr>
					<tr>
						<td>Note</td>
						<td>{{ $feetype->note }}</td>
					</tr>

				</table>
			</div>
		</div>
	</div>
</div>
@endsection