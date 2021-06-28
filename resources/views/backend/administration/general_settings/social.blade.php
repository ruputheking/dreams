<div id="appearance" class="tab-pane fade">
    <div class="panel panel-default">
        <div class="panel-heading"><span class="panel-title">Social Media</span></div>
        <div class="panel-body">
            <form action="{{ route('socials.store') }}" class="form-group form-groups-bordered validate" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                {{csrf_field()}}

                <div class="params-panel">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('facebook') ? ' has-error' : '' }}">
                            <label class="control-label">Facebook <span class="required">*</span></label>
                            <input type="text" class="form-control" name="facebook" placeholder="Facebook" value="{{ get_option('facebook') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('instagram') ? ' has-error' : '' }}">
                            <label class="control-label">Instagram <span class="required">*</span></label>
                            <input type="text" class="form-control" name="instagram" placeholder="Instagram" value="{{ get_option('instagram') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('youtube') ? ' has-error' : '' }}">
                            <label class="control-label">Youtube <span class="required">*</span></label>
                            <input type="text" class="form-control" name="youtube" placeholder="Youtube" value="{{ get_option('youtube') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Update Details</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>