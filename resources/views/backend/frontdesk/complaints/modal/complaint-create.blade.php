<style media="screen">
    .form-group {
        margin-bottom: 5px
    }

    .mb-10 {
        margin-top: 10px;
    }
</style>
<form method="post" autocomplete="off" action="{{route('complaints.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('complaint_by') ? ' has-error' : '' }}">
            <label class="control-label">Complain By <span class="required">*</span></label>
            <input type="text" class="form-control" name="complaint_by" value="{{ old('complaint_by') }}" required>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('source') ? ' has-error' : '' }}">
            <label class="control-label">Source</label>
            <input type="text" class="form-control" name="source" value="{{ old('source') }}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
            <label class="control-label">Phone <span class="required">*</span></label>
            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
            <label class="control-label">Date <span class="required">*</span></label>
            <input type="text" class="form-control datepicker" name="date" value="{{ old('date') }}" required>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
            <label class="control-label">Description</label>
            <textarea type="text" class="form-control" name="description">{{ old('description') }}</textarea>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('action_taken') ? ' has-error' : '' }}">
            <label class="control-label">Action Taken</label>
            <input type="text" class="form-control" name="action_taken" value="{{ old('action_taken') }}">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('assigned_by') ? ' has-error' : '' }}">
            <label class="control-label">Assigned By <span class="required">*</span></label>
            <input type="text" class="form-control" name="assigned_by" value="{{ old('assigned_by') }}" required>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('note') ? ' has-error' : '' }}">
            <label class="control-label">Note</label>
            <textarea type="text" class="form-control" name="note">{{ old('note') }}</textarea>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
            <label class="control-label">Attach Document</label>
            <input type="file" name="image" class="form-control">
        </div>
    </div>


    <div class="col-md-12 mb-10">
        <div class="form-group">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>