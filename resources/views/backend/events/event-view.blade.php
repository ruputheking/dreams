@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('events.index') }}">Event List</a></li>
<li class="active">View Event</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">View Event</div>

			<div class="panel-body">
				<table class="table table-bordered">
					<tr class="text-center">
						<td colspan="2"><img src="{{ asset('/frontend/images/'. $event->file_1) }}" style="width: 400px; border-radius: 5px"></td>
					</tr>
					<tr>
						<td>Name</td>
						<td>{{ $event->title }}</td>
					</tr>
					<tr>
						<td>Start Date</td>
						<td>{{ date('d M, Y - H:i' , strtotime($event->starting_date)) }}</td>
					</tr>
					<tr>
						<td>End Date</td>
						<td>{{ date('d M, Y - H:i' ,strtotime($event->ending_date)) }}</td>
					</tr>
					<tr>
						<td>Start Time</td>
						<td>{{ $event->start_time() }}</td>
					</tr>
					<tr>
						<td>End Time</td>
						<td>{{ $event->end_time() }}</td>
					</tr>
					<tr>
						<td>Quote</td>
						<td>{{ $event->quote ?? '-' }}</td>
					</tr>
					<tr>
						<td>Host</td>
						<td>{{ $event->host }}</td>
					</tr>
					<tr>
						<td>Location</td>
						<td>{{ $event->location }}</td>
					</tr>
					<tr>
						<td>Details</td>
						<td>{!! $event->details !!}</td>
					</tr>
					<tr>
						<td>Extra Image</td>
						<td>
							<img src="{{ asset('/frontend/images/'. $event->file_2) }}" style="width: 100px; border-radius: 5px">
							<img src="{{ asset('/frontend/images/'. $event->file_3) }}" style="width: 100px; border-radius: 5px">
							@if ($event->file_4)
							<img src="{{ asset('/frontend/images/'. $event->file_4) }}" style="width: 100px; border-radius: 5px">
							@endif
							@if ($event->file_5)
							<img src="{{ asset('/frontend/images/'. $event->file_5) }}" style="width: 100px; border-radius: 5px">
							@endif
							@if ($event->file_6)
							<img src="{{ asset('/frontend/images/'. $event->file_6) }}" style="width: 100px; border-radius: 5px">
							@endif
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection