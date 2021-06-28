@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Assignments List</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading clearfix ">
				@role(['admin', 'teacher'])
				<div class="panel-title pull-left">
					Assignments List
				</div>
				<div class="pull-right">
					<a href="{{ route('teacher.create_assignment')}}" class="btn btn-info btn-sm">Add New Assignment</a>
				</div>
				@endrole
				@role('c_teacher')
				<a href="{{route('teacher.create_assignment')}}" class="btn btn-primary btn-sm pull-right">Add Assignment</a>
				<div class=" pull-left" style="width:200px;margin-top:-10px">

					<select id="class" class="form-control select2" onchange="showClass(this);">
						<option value="">Select Class</option>
						{{ create_option('courses','id','class_name',$course_id) }}
					</select>
				</div>
				@endrole
			</div>
			<div class="panel-body table-responsive">
				<table id="example1" class="table table-striped">
					<thead>
						<th>#</th>
						<th>Title</th>
						<th>Course</th>
						<th>Section</th>
						<th>Subject</th>
						<th>Deadline</th>
						<th style="width: 155px;">Action</th>
					</thead>
					<tbody>
						@php
						$i = 1;
						@endphp
						@foreach($assignments AS $data)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$data->title}}</td>
							<td>{{$data->class_name}}</td>
							<td>{{$data->section_name}}</td>
							<td>{{$data->subject_name}}</td>
							<td>
								{{$data->deadline}}
							</td>
							<td>
								@if($data->file)
									<li class="dropdown" style="display: inline;">
										<a href="#" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown">
											<i class="fa fa-download"></i> Download
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
									<a href="{{ route('teacher.show_assignment', $data->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
									<a href="{{ route('teacher.edit_assignment', $data->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
									<a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$data->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
									<div id="{{$data->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
													{!! Form::open(['method' => 'DELETE', 'route' => ['teacher.destroy_assignment', $data->id]]) !!}
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

@section('scripts')
@role('c_teacher')
<script>
	function showClass(elem) {
		if ($(elem).val() == "") {
			return;
		}
		window.location = "<?php echo url('dashboard/teacher/assignments/class') ?>/" + $(elem).val();
	}
</script>
@endrole
@stop