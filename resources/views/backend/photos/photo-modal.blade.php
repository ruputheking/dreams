<div class="modal_container">
    <div class="modal2 animate" id="id01">
        <div class="modal_content">
            <div class="modal2_title">Add New Photo</div>
            <div class="modal2_body">
                {!! Form::open(['method' => 'POST', 'route' => 'galleries.store', 'files' => TRUE, 'autocomplete' => 'off']) !!}

                <div class="col-md-12">
                    <h4>{!! Form::label('Image') !!}</h4>
                    <input type="file" id="input-file-now" name="image" class="dropify" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" />
                </div>
                <div class="col-md-12">
                    <div class="basic-form">
                        <div class="form-group {{ $errors->has('image_name') ? 'has-error' : '' }}">
                            <h4>{!! Form::label('Image Name') !!}</h4>
                            {!! Form::text('image_name', null, ['class' => 'form-control', 'placeholder' => 'Image Name']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="basic-form">
                        <div class="form-group {{ $errors->has('folder_id') ? 'has-error' : '' }}">
                            <h4>{!! Form::label('Folder') !!}</h4>
                            {!! Form::select('folder_id', [$folder->id => $folder->title], null, ['class' => 'form-control select2']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-12 modal2_footer">
                    <div class="basic-form">
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary" onclick="document.getElementById('id01').style.display='none'">Save</button>
                            <button type="button" class="btn btn-default" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>