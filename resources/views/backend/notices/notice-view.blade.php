@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('notices.index') }}">List Notice</a></li>
<li class="active">View Notice</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading panel-title">View Notice</div>

			<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<td>
							<h4>{{ $notice->title ?? '' }}</h4>
						</td>
					</tr>
					<tr>
						<td class="details-td">{!! $notice->details !!}</td>
					</tr>
					<tr>
						<td>Notice Can See Only : {{ object_to_string($notice->user_type,'user_type') }}</td>
					</tr>

				</table>
			</div>
		</div>
	</div>
</div>
@endsection