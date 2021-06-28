@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Class Routine</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<div class="panel-title pull-left">Routine List</div>
				<div class="col-md-4 pull-right" style="margin-top:-3px">
					<select id="class" class="select_class select2 pull-right" onchange="showClass(this);">
						<option value="">Select Class</option>
						{{ create_option('courses','id','title',$class) }}
					</select>
				</div>
			</div>

			<div class="panel-body">
				<table class="table table-bordered data-table">
					<thead>
						<th>Class</th>
						<th>Section</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($routine_list AS $data)
						<tr>
							<td>{{ $data->title }}</td>
							<td>{{ $data->section_name }}</td>
							<td>
								<a href="{{ url('dashboard/class_routines/manage/'.$data->c_id.'/'.$data->s_id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Manage Routine</a>
								<a href="{{ url('dashboard/class_routines/show/'.$data->c_id.'/'.$data->s_id) }}" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> View Routine</a>
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
		window.location = "<?php echo url('dashboard/class_routines/class/') ?>/" + $(elem).val();
	}
</script>
@stop