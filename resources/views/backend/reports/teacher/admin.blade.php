@role('admin')
<div class="col-sm-3">
    <div class="form-group">
        <label class="control-label">Section</label>
        <select name="course_id" class="form-control select2" onChange="getData(this.value);" required>
            <option value="">Select One</option>
            {{ create_option('courses','id','class_name') }}
        </select>
    </div>
</div>
<div class="col-sm-3">
    <div class="form-group">
        <label class="control-label">Section</label>
        <select name="section_id" class="form-control select2" required>
            <option value="">Select One</option>
        </select>
    </div>
</div>
<div class="col-sm-3">
    <div class="form-group">
        <label class="control-label">Subject</label>
        <span class="required">*</span>
        <select name="subject_id" class="form-control select2" required>
            <option value="">{{ 'Select One' }}</option>
        </select>
        @if($errors->has('subject_id'))
            <span class="help-block">{{ $errors->first('subject_id') }}</span>
            @endif
    </div>
</div>
@endrole