@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('assignments.index') }}">Assignments List</a></li>
<li class="active">View Assignment</li>
@endsection

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Assignment
				</div>
			</div>
			<table class="table table-striped table-bordered" width="100%">
				<tbody>
					<tr>
						<td>Title</td>
						<td colspan="5"><b>{{$assignment->title}}</b></td>
					</tr>
					<tr>
						<td>Class</td>
						<td><b>{{$assignment->class_name}}</b></td>
					</tr>
					<tr>
						<td>Section</td>
						<td><b>{{$assignment->section_name}}</b></td>
					</tr>
					<tr>
						<td>Subject</td>
						<td><b>{{$assignment->subject_name}}</b></td>
					</tr>
					<tr>
						<td>Deadline</td>
						<td><b>{{$assignment->deadline}}</b></td>
					</tr>
					<tr>
						<td>Assignment Files</td>
						<td>
							<li class="dropdown" style="display: inline;">
								<a href="#" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
									Click to Download
								</a>
								<ul class="dropdown-menu">
									@if($assignment->file)
										<li><a href="/frontend/images/{{ $assignment->file }}" download>{{$assignment->file}}</a></li>
										@endif
										@if($assignment->file_2)
											<li><a href="/frontend/images/{{ $assignment->file_2 }}" download>{{$assignment->file_2}}</a></li>
											@endif
											@if($assignment->file_3)
												<li><a href="/frontend/images/{{ $assignment->file_3 }}" download>{{$assignment->file_3}}</a></li>
												@endif
												@if($assignment->file_4)
													<li><a href="/frontend/images/{{ $assignment->file_4 }}" download>{{$assignment->file_4}}</a></li>
													@endif
								</ul>
							</li>
						</td>
					</tr>
					<tr>
						<td colspan="6">{!! $assignment->description !!}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection