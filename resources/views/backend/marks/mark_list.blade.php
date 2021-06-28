@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Marks List</li>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<div class="col-md-2 panel-title pull-left">View Marks</div>
				<div class="col-md-2 pull-right" style="margin-top: -10px">
					<select id="class" class="select_class select2 pull-right" onchange="showClass(this);">
						<option value="">Select Class</option>
						{{ create_option('courses','id','title',$class) }}
					</select>
				</div>
			</div>

			<div class="panel-body">
				<table class="table table-bordered data-table">
					<thead>
						<th>Profile</th>
						<th>Name</th>
						<th>Class</th>
						<th>Section</th>
						<th>Email</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($students AS $data)
						<tr>
							<td><img src="{{ asset('/frontend/images/'.$data->photo) }}" width="50px" height="50px" alt=""></td>
							<td>{{ $data->student_name }}</td>
							<td>{{ $data->title }}</td>
							<td>{{ $data->section_name }}</td>
							<td>{{ $data->email }}</td>
							<td>
								<a href="{{ url('dashboard/marks/view/'.$data->id.'/'.$data->class_id) }}" class="btn btn-primary btn-sm rect-btn"><i class="fa fa-eye"></i> View Marks</a>
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
<script>
	function showClass(elem) {
		if ($(elem).val() == "") {
			return;
		}
		window.location = "<?php echo url('dashboard/marks') ?>/" + $(elem).val();
	}
</script>
@stop