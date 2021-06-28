@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Contact List</li>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default no-export">
			<div class="panel-heading">
				<span class="panel-title">All Contact</span>
			</div>

			<div class="panel-body">
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						@foreach ($contacts as $key => $contact)
						<tr>
							<td>
								{{ ++$key }}
							</td>
							<td>{{ $contact->name }}</td>
							<td>{{ $contact->email }}</td>
							<td>{{ $contact->message }}</td>
							<td>
								@if ($contact->status == 1)
								<label class="label label-success">Seen</label>
								@endif
								@if ($contact->status == 0)
								<label class="label label-warning">Unseen</label>
								@endif
							</td>
							<td>
								<!-- Edit Button -->
								<!-- Delete Button -->
								@if($contact->status == 0)
									<form class="form-group" action="{{route('contacts.update', $contact->id)}}" method="post">
										@csrf
										{{ method_field('put') }}
										<button type="submit" class="btn btn-xs btn-success"><i class="fa fa-eye"></i> Seen</button>
										<a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$contact->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
									</form>
									@else
									<a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$contact->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
									@endif
									<div id="{{$contact->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
													{!! Form::open(['method' => 'DELETE', 'route' => ['contacts.destroy', $contact->id]]) !!}
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

@endsection