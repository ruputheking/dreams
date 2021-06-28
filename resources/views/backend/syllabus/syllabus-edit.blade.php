@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('syllabus.index') }}">Syllabus List</a></li>
<li class="active">Edit Syllabus</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="entypo-plus-circled"></i>Edit Syllabus
				</div>
			</div>
			<div class="panel-body">
				<div class="col-md-10">
					<form action="{{route('syllabus.update',$syllabus->id)}}" class="form-group" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						@csrf
						{{ method_field('PATCH') }}
						<div class="form-group">
							<label class="control-label">Title <span class="required">*</span></label>
							<input type="text" class="form-control" name="title" value="{{ $syllabus->title }}" required>
						</div>
						<div class="form-group">
							<label class="control-label">Description <span class="required">*</span></label>
							<textarea id="summernote" class="form-control" name="description">{{ $syllabus->description }}</textarea>
						</div>
						<div class="form-group">
							<label class="control-label">Course <span class="required">*</span></label>
							<select class="form-control select2" name="class_id" required>
								<option value="">Select One</option>
								{{ create_option('courses','id','title',$syllabus->class_id) }}
							</select>
						</div>

						<div class="form-group">
							<label class="control-label">File <span class="required">*</span></label>
							<input type="file" class="form-control appsvan-file" name="file" data-value="{{ $syllabus->file }}">
						</div>

						<div class="form-group">
							<div class="col-sm-offset-0 col-sm-5">
								<button type="submit" class="btn btn-info">Update Syllabus</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection