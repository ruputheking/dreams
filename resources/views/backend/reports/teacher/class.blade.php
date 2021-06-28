@role(['teacher', 'c_teacher'])
<div class="col-sm-3">
    <div class="form-group">
        <label class="control-label">Class</label>
        <select name="course_id" class="form-control select2" required>
            <option value="">Select One</option>
            @foreach (get_teacher_course() as $data)
            <option value="{{$data->course_id}}">{{ $data->class_name }}</option>
            @endforeach
        </select>
    </div>
</div>
@role('teacher')
<div class="col-sm-3">
    <div class="form-group">
        <label class="control-label">Section</label>
        <select name="section_id" onchange="getSubject()" class="form-control select2" required>
            <option value="">Select One</option>
            @foreach (get_teacher_course() as $data)
            <option value="{{$data->section_id}}">{{ $data->section_name }}</option>
            @endforeach
        </select>
    </div>
</div>
@endrole
@role('c_teacher')
<div class="col-sm-3">
    <div class="form-group">
        <label class="control-label">Section</label>
        <select name="section_id" onchange="getSubject()" class="form-control select2" required>
            <option value="">Select One</option>
            <option value="{{get_teacher_course()->id}}">{{ get_teacher_course()->section_name }}</option>
        </select>
    </div>
</div>
@endrole
<div class="col-sm-3">
    <div class="form-group">
        <label class="control-label">Subject</label>
        <span class="required">*</span>
        <select name="subject_id" class="form-control select2" required>
            <option value="">{{ 'Select One' }}</option>
        </select>
    </div>
</div>
@endrole