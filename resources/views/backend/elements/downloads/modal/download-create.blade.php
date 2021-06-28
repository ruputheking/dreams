<form method="post" autocomplete="off" action="{{route('downloads.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="col-md-12">
        <div class="form-group  {{ $errors->has('document_name') ? ' has-error' : '' }}">
            <label class="control-label">Document Name <span class="required">*</span></label>
            <input type="text" class="form-control" name="document_name" value="{{ old('document_name') }}" required>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('document_file') ? ' has-error' : '' }}">
            <label class="control-label">Document / File <span class="required">*</span></label>
            <input type="file" name="document_file" class="form-control dropify" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG pdf PDF doc dot wdk docx xlsb xlsx ppt pptx" required>
        </div>
    </div>


    <div class="col-md-12">
        <div class="form-group">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>