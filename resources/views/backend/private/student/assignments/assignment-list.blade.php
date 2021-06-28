@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">My Assignments</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					My Assignments
				</div>
			</div>
			<div class="panel-body table-responsive">
				<table id="example1" class="table table-striped">
					<thead>
						<th>#</th>
						<th>Title</th>
						<th>Subject</th>
						<th>Due Date</th>
						<th>Status</th>
						<th>Details</th>
					</thead>
					<tbody>
						@php
						$i = 1;
						@endphp
						@foreach($assignments AS $data)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$data->title}}</td>
							<td>{{$data->subject_name}}</td>
							<td>{{$data->deadline}}</td>
							<td>
								@if ($data->deadline <= Carbon\Carbon::now()) <label class="label label-danger">Expired</label>
									@endif
									@if ($data->deadline > Carbon\Carbon::now()) <label class="label label-success">Active</label>
									@endif
							</td>
							<td>
								@if($data->file)
									<li class="dropdown" style="display: inline;">
										<a href="#" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown">
											<i class="fa fa-download"></i>
										</a>
										<ul class="dropdown-menu">
											@if($data->file)
												<li><a href="{{ asset('frontend/images/assignments/'.$data->file) }}" download>File 1</a></li>
												@endif
												@if($data->file_2)
													<li><a href="{{ asset('frontend/images/assignments/'.$data->file_2) }}" download>File 2</a></li>
													@endif
													@if($data->file_3)
														<li><a href="{{ asset('frontend/images/assignments/'.$data->file_3) }}" download>File 3</a></li>
														@endif
														@if($data->file_4)
															<li><a href="{{ asset('frontend/images/assignments/'.$data->file_4) }}" download>File 4</a></li>
															@endif
										</ul>
									</li>
									@endif
									<a href="{{ route('student.view_assignment', $data->id) }}" class="btn btn-primary btn-xs ajax-modal" data-title="View Assignment" data-fullscreen="false"><i class="fa fa-eye" aria-hidden="true"></i> View
									</a>
									<a href="{{ route('student.submit_assignment', $data->id) }}" class="btn btn-primary btn-xs" data-title="Submit Assignment" data-fullscreen="true">Submit</a>
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