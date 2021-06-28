@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Outbox Message</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="panel-title">
					Send Items
				</span>
				<a href="{{ route('messages.compose') }}" class="btn btn-primary btn-sm pull-right" style="margin-top:-3px">New Message</a>
			</div>
			<div class="panel-body no-export">
				<table class="table table-bordered">
					<thead>
						<th>Date</th>
						<th>Receiver</th>
						<th>Subject</th>
						<th>View</th>
					</thead>
					<tbody>
						@foreach($messages as $data)
						<tr>
							<td>{{ date('d/M/Y - H:m', strtotime($data->date)) }}</td>
							<td>{{ $data->receiver }}</td>
							<td>{{ $data->subject }}</td>
							<td><a href="{{ url('dashboard/message/outbox/'. $data->id) }}" data-title="View Message" class="btn btn-primary btn-sm ajax-modal">View</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>

				<div class="pull-right">
					{{ $messages->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection