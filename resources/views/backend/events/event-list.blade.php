@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Event List</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default no-export">
			<div class="panel-heading"><span class="panel-title">All Events</span>
				<a class="btn btn-primary btn-sm pull-right" data-title="Add New Event" style="margin-top:-3px;" href="{{route('events.create')}}">Add New</a>
			</div>

			<div class="panel-body">
				<div class="content-block box">
					<div class="box-body table-responsive">
						<table id="example1" class="table table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>Location</th>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								@foreach ($events as $event)
								<tr>
									<td>{{ $event->title }}</td>
									<td>{{ $event->location }}</td>
									<td>{{ date('d-M-Y - H:i' ,strtotime($event->starting_date)) }}</td>
									<td>{{ date('d-M-Y - H:i',strtotime($event->ending_date)) }}</td>
									<td>
										<!-- Edit Button -->
										<a href="{{route('events.edit', $event->slug)}}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<a href="{{route('events.show', $event->slug)}}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> View</a>
										<!-- Delete Button -->
										<a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$event->slug}}deleteModal"><i class="fa fa-close"></i> Delete</a>
										<a href="{{route('candidates.index', $event->slug)}}" class="btn btn-success btn-xs"><i class="fa fa-user"></i> Member</a>
										<div id="{{$event->slug}}deleteModal" class="delete-modal modal fade" role="dialog">
											<!-- Delete Modal -->
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<div class="delete-icon"></div>
													</div>
													<div class="modal-body text-center">
														<h4 class="modal-heading">Are You Sure ?</h4>
														<p>Do you really want to delete these records? This process cannot be undone.</p>
													</div>
													<div class="modal-footer">
														{!! Form::open(['method' => 'DELETE', 'route' => ['events.destroy', $event->slug]]) !!}
														{!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
														{!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
														{!! Form::close() !!}
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection