@extends('layouts.backend.main')

@section('header')
<li><a href="{{route('dashboard')}}">Dashboard</a></li>
<li class="active">Religion</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Add New Religion
				</div>
			</div>
			<div class="panel-body">
				<form action="{{route('picklists.store')}}" class="form-horizontal validate" enctype="multipart/form-data" autocomplete="off" method="post" accept-charset="utf-8">
					{{ csrf_field() }}
					<div class="form-group">
						<div class="col-md-12">
							<label class="control-label">Religion <span class="required">*</span></label>
							<input type="text" class="form-control" name="value" value="{{ old('value') }}" placeholder="Religion Name" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Add Religion</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Religion List
				</div>
			</div>
			<div class="panel-body no-export">
				<table class="table table-bordered data-table">
					<thead>
						<th>Religion</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($picklists as $data)
						<tr>
							<td>{{$data->value}}</td>
							<td>
								<form action="{{route('picklists.destroy',$data->id)}}" method="post">
									<a href="{{route('picklists.edit',$data->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit" aria-hidden="true"></i></a>
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
									<button type="submit" class="btn btn-danger btn-xs btn-remove"><i class="fa fa-eraser" aria-hidden="true"></i></button>
								</form>
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