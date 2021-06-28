@extends('layouts.backend.main')

@section('styles')
<style media="screen">
	.form-group {
		margin-bottom: 0
	}

	.panel {
		margin-bottom: 0
	}
</style>
@endsection

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('events.index') }}">Event List</a></li>
<li class="active">Add Event</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Add New Event</div>

			<div class="panel-body">
				<form method="post" class="validate" autocomplete="off" action="{{ route('events.store') }}" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="col-md-12">
						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<label class="control-label">Name <span class="required">*</span></label>
							<input id="title" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Event Name" required>
							<small class="text-danger">{{ $errors->first('name') }}</small>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
							<label class="control-label">Slug <span class="required">*</span></label>
							<input id="slug" type="text" class="form-control" name="slug" value="{{ old('slug') }}" placeholder="Event Slug" required>
							<small class="text-danger">{{ $errors->first('slug') }}</small>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group {{ $errors->has('start_date') ? ' has-error' : '' }}">
							<label class="control-label">Start Date <span class="required">*</span></label>
							<input type="text" class="form-control datetimepicker" name="start_date" value="{{ old('start_date') }}" placeholder="Starting Event" required>
							<small class="text-danger">{{ $errors->first('start_date') }}</small>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group {{ $errors->has('end_date') ? ' has-error' : '' }} {{ $errors->has('subject_name') ? ' has-error' : '' }}">
							<label class="control-label">End Date <span class="required">*</span></label>
							<input type="text" class="form-control datetimepicker" name="end_date" value="{{ old('end_date') }}" placeholder="Ending Event" required>
							<small class="text-danger">{{ $errors->first('end_date') }}</small>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group {{ $errors->has('start_time') ? ' has-error' : '' }}">
							<label class="control-label">Start Time <span class="required">*</span></label>
							<input type="text" class="form-control timepicker" name="start_time" value="{{ old('start_time') }}" placeholder="Event Start Time" required>
							<small class="text-danger">{{ $errors->first('start_time') }}</small>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group {{ $errors->has('end_time') ? ' has-error' : '' }}">
							<label class="control-label">End Time <span class="required">*</span></label>
							<input type="text" class="form-control timepicker" name="end_time" value="{{ old('end_time') }}" placeholder="Event End Time" required>
							<small class="text-danger">{{ $errors->first('end_time') }}</small>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group {{ $errors->has('host') ? ' has-error' : '' }}">
							<label class="control-label">Host By <span class="required">*</span></label>
							<input type="text" class="form-control" name="host" value="{{ old('host') }}" placeholder="Event host">
							<small class="text-danger">{{ $errors->first('host') }}</small>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group {{ $errors->has('quote') ? ' has-error' : '' }}">
							<label class="control-label">In Short </label>
							<textarea class="form-control" name="quote" placeholder="Event quote">{{ old('quote') }}</textarea>
							<small class="text-danger">{{ $errors->first('quote') }}</small>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group {{ $errors->has('details') ? ' has-error' : '' }}">
							<label class="control-label">Details <span class="required">*</span></label>
							<textarea class="form-control summernote" name="details">{{ old('details') }}</textarea>
							<small class="text-danger">{{ $errors->first('details') }}</small>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
							<label class="control-label">Location <span class="required">*</span></label>
							<input type="text" class="form-control" name="location" value="{{ old('location') }}" placeholder="Event Location" required>
							<small class="text-danger">{{ $errors->first('location') }}</small>
						</div>
					</div>

					<div class="col-md-4 {{ $errors->has('file_1') ? 'has-error' : '' }}">
						<label class="control-label">File <span class="required">*</span> </label>
						<input type="file" class="form-control appsvan-file" name="file_1">
					</div>
					<div class="col-md-4 {{ $errors->has('file_2') ? 'has-error' : '' }}">
						<label class="control-label">File <span class="required">*</span> </label>
						<input type="file" class="form-control appsvan-file" name="file_2">
					</div>
					<div class="col-md-4 {{ $errors->has('file_3') ? 'has-error' : '' }}">
						<label class="control-label">File <span class="required">*</span> </label>
						<input type="file" class="form-control appsvan-file" name="file_3">
					</div>
					<div class="col-md-4 {{ $errors->has('file_4') ? 'has-error' : '' }}">
						<label class="control-label">File (Optional)</label>
						<input type="file" class="form-control appsvan-file" name="file_4">
					</div>
					<div class="col-md-4 {{ $errors->has('file_5') ? 'has-error' : '' }}">
						<label class="control-label">File (Optional)</label>
						<input type="file" class="form-control appsvan-file" name="file_5">
					</div>
					<div class="col-md-4 {{ $errors->has('file_6') ? 'has-error' : '' }}">
						<label class="control-label">File (Optional)</label>
						<input type="file" class="form-control appsvan-file" name="file_6">
					</div>
					<div class="form-group">
						<div class="col-md-12 mt-15">
							<button type="reset" class="btn btn-danger">Reset</button>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection