@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">List Notice</li>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default no-export">
			<div class="panel-heading"><span class="panel-title">List Notice</span>
				<a class="btn btn-primary btn-sm pull-right" href="{{route('notices.create')}}" style="margin-top:-3px;">Add New</a>
			</div>

			<div class="content-block box">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Heading</th>
								<th>Showing Area</th>
								<th>Date</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>

							@php($n = 1)

							@foreach ($notices as $notice)
							<tr>
								<td>
									{{$n}}
									@php($n++)
								</td>
								<td>{{$notice->title}}</td>
								<td>{{ object_to_string($notice->user_type,'user_type') }}</td>
								<td>{{date("d M, Y - H:i", strtotime($notice->created_at))}}</td>
								<td>
									<!-- Edit Button -->
									<a href="{{route('notices.edit', $notice->slug)}}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
									<a href="{{route('notices.show', $notice->slug)}}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> View</a>
									<!-- Delete Button -->
									<a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$notice->slug}}deleteModal"><i class="fa fa-close"></i> Delete</a>
									<div id="{{$notice->slug}}deleteModal" class="delete-modal modal fade" role="dialog">
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
													{!! Form::open(['method' => 'DELETE', 'route' => ['notices.destroy', $notice->slug]]) !!}
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

@endsection