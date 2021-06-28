@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('syllabus.index') }}">Syllabus List</a></li>
<li class="active">Add New Syllabus</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-plus-circled"></i>Add New Syllabus
				</div>
			</div>
			<div class="panel-body">
				<div class="col-md-10">
					<form action="{{route('syllabus.store')}}" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" autocomplete="off" method="post" accept-charset="utf-8">
						@csrf
						<div class="form-group">
							<label class="col-sm-3 control-label">Title <span class="required">*</span></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Description <span class="required">*</span></label>
							<div class="col-sm-9">
								<textarea id="summernote" class="form-control" name="description">{{ old('description') }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Course <span class="required">*</span></label>
							<div class="col-sm-9">
								<select class="form-control select2" name="class_id" required>
									<option value="">{{ ('Select One') }}</option>
									{{ create_option('courses','id','title', old('class_id')) }}
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">File <span class="required">*</span></label>
							<div class="col-sm-9">
								<input type="file" class="form-control appsvan-file" name="file" required>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<button type="submit" class="btn btn-info">Add Syllabus</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection