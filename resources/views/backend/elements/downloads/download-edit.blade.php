@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('downloads.index') }}">Document List</a></li>
<li class="active">Update Document</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">Update Document</span>
            </div>

            <div class="panel-body">
                <form method="post" autocomplete="off" action="{{route('downloads.update', $download->id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="col-md-12">
                        <div class="form-group  {{ $errors->has('document_name') ? ' has-error' : '' }}">
                            <label class="control-label">Document Name <span class="required">*</span></label>
                            <input type="text" class="form-control" name="document_name" value="{{ $download->document_name }}" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('document_file') ? ' has-error' : '' }}">
                            <label class="control-label">Document / File <span class="required">*</span></label>
                            <input type="file" name="document_file" class="form-control dropify" data-default-file="/frontend/images/{{ $download->document_file }}"
                                data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG pdf PDF doc dot wdk docx xlsb xlsx ppt pptx" required>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection