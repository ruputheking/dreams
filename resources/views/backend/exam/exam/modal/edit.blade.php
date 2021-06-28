<form method="post" class="ajax-submit" autocomplete="off" action="{{route('exams.update', $exam->id)}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}

    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Name <span class="required">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ $exam->name }}" required>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Note</label>
            <textarea class="form-control" name="note">{{ $exam->note }}</textarea>
        </div>
    </div>


    <div class="col-md-12">
        <div class="form-group">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>