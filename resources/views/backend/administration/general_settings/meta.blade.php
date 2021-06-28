<div id="meta" class="tab-pane fade">
    <div class="panel panel-default">
        <div class="panel-heading"><span class="panel-title">SEO Settings</span></div>
        <div class="panel-body">
            <form action="{{ route('settings.metaUpdate') }}" class="form-group" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                {{csrf_field()}}

                <div class="params-panel">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="control-label">Meta Title <span class="required">*</span></label>
                            <input type="text" class="form-control" name="title" placeholder="Meta Title" value="{{ get_option('title') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('seo_meta_keywords') ? ' has-error' : '' }}">
                            <label class="control-label">Meta Keywords <span class="required">*</span></label>
                            <textarea type="text" class="form-control" name="seo_meta_keywords" rows="4" placeholder="Meta Keywords">{{get_option('seo_meta_keywords')}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('seo_meta_description') ? ' has-error' : '' }}">
                            <label class="control-label">Meta Description <span class="required">*</span></label>
                            <textarea type="text" class="form-control" name="seo_meta_description" rows="4" placeholder="Meta Description">{{ get_option('seo_meta_description') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Feature Image <span class="required">*</span></label>
                            <input type="file" class="form-control dropify" name="image" data-default-file="{{ asset('frontend/images/'.get_option('image')) }}" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-info">Save Setting</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>