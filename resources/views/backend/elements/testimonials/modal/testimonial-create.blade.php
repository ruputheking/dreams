<form method="post" autocomplete="off" action="{{route('testimonials.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="col-md-12">
        <div class="form-group  {{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label">Full Name <span class="required">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group  {{ $errors->has('description') ? ' has-error' : '' }}">
            <label class="control-label">Description <span class="required">*</span></label>
            <textarea type="text" class="form-control" name="description" required>{{ old('description') }}</textarea>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('photo') ? ' has-error' : '' }}">
            <label class="control-label">Photo <span class="required">*</span></label>
            <input type="file" name="photo" class="form-control dropify" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" required>
        </div>
    </div>


    <div class="col-md-12">
        <div class="form-group">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>