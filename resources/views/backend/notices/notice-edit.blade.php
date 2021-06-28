@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('notices.index') }}">List Notice</a></li>
<li class="active">Update Notice</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading panel-title">Update Notice</div>

			<div class="panel-body">
				<form method="post" class="validate" autocomplete="off" action="{{route('notices.update', $notice->slug)}}" enctype="multipart/form-data">
					{{ csrf_field()}}
					<input name="_method" type="hidden" value="PATCH">

					<div class="col-md-12">
						<div class="form-group {{ $errors->has('heading') ? ' has-error' : '' }}">
							<label class="control-label">Heading</label>
							<span class="required">*</span>
							<input id="title" type="text" class="form-control" name="heading" value="{{ $notice->title }}" placeholder="Notice Title" required>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
							<label class="control-label">Slug</label>
							<span class="required">*</span>
							<input id="slug" type="text" class="form-control" name="slug" value="{{ $notice->slug }}" placeholder="Notice Slug" required>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group {{ $errors->has('summary') ? ' has-error' : '' }}">
							<label class="control-label">Summary</label>
							<span class="required">*</span>
							<textarea class="form-control" name="summary" placeholder="Notice Summary" rows="6" required>{{ $notice->summary }}</textarea>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group {{ $errors->has('details') ? ' has-error' : '' }}">
							<label class="control-label">Details</label>
							<span class="required">*</span>
							<textarea class="form-control summernote" name="details">{{ $notice->details }}</textarea>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group {{ $errors->has('user_type[]') ? ' has-error' : '' }}">
							<label class="control-label">User Type</label>
							<span class="required">*</span>
							<select class="form-control select2" name="user_type[]" id="user_type" multiple="multiple">
								<option value="Student">Student
								</option>
								<option value="Guardian">Guardian
								</option>
								<option value="Teacher">Teacher
								</option>
								<option value="Receptionist">Receptionist
								</option>
								<option value="Accountant">Accountant
								</option>
								<option value="Website">Website
								</option>
							</select>
						</div>
					</div>
					<div class="col-md-12 mb-4">
						<div class="card-header mb-15" style="border-bottom:1px solid #ccc;" id="headingTwo">
							<h4 class="mb-0">
								<span style="cursor:pointer;" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									SEO Details <i class="fa fa-arrow-down"></i>
								</span>
							</h4>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
							<div class="col-md-12 {{ $errors->has('seo_meta_keywords') ? ' has-error' : '' }}">
								<label class="control-label mt-0">Meta Keywords</label>
								<textarea type="text" class="form-control" name="seo_meta_keywords" value="{{ $notice->seo_meta_keywords }}" placeholder="Meta Keywords"></textarea>
							</div>
							<div class="col-md-12 mb-15 {{ $errors->has('seo_meta_description') ? ' has-error' : '' }}">
								<label class="control-label">Meta Description</label>
								<textarea type="text" class="form-control" name="seo_meta_description" value="{{ $notice->seo_meta_description }}" placeholder="Meta Description"></textarea>
							</div>
						</div>
					</div>


					<div class="form-group">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')

<script>
	$("#user_type").val([{!! object_to_string($notice->user_type, 'user_type', true) !!}]);
</script>
@endsection
