<form method="post" autocomplete="off" action="{{route('applications.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="col-md-12">
        <div class="form-group  {{ $errors->has('subject') ? ' has-error' : '' }}">
            <label class="control-label">Subject <span class="required">*</span></label>
            <input type="text" class="form-control" name="subject" value="{{ old('subject') }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('starting_date') ? ' has-error' : '' }}">
            <label class="control-label">From <span class="required">*</span></label>
            <input type="text" class="form-control datepicker" name="starting_date" value="{{ old('starting_date') }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('ending_date') ? ' has-error' : '' }}">
            <label class="control-label">To <span class="required">*</span></label>
            <input type="text" class="form-control datepicker" name="ending_date" value="{{ old('ending_date') }}" required>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('ending_date') ? ' has-error' : '' }}">
            <label class="control-label">Reason <span class="required">*</span></label>
            <textarea name="reason" class="form-control summernote" rows="6" cols="60">{{ old('reason') }}</textarea>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('document') ? ' has-error' : '' }}">
            <label class="control-label">Document / File</label>
            <input type="file" name="document" class="form-control">
        </div>
    </div>


    <div class="col-md-12">
        <div class="form-group">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>