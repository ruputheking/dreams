<div id="general" class="tab-pane fade in active">
    <div class="panel panel-default">
        <div class="panel-heading"><span class="panel-title">General Settings</span></div>

        <div class="panel-body">
            <form action="{{ route('office.store') }}" class="form-group form-groups-bordered validate" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                {{csrf_field()}}

                <div class="params-panel">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="control-label">General Location <span class="required">*</span></label>
                            <input type="text" class="form-control" name="address" placeholder="Place Location" value="{{ get_option('address') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('starting_time') ? ' has-error' : '' }}">
                            <label class="control-label">Opening Time <span class="required">*</span></label>
                            <input type="text" class="form-control" name="starting_time" placeholder="Opening Time" value="{{ get_option('starting_time') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('ending_time') ? ' has-error' : '' }}">
                            <label class="control-label">Closing Time <span class="required">*</span></label>
                            <input type="text" class="form-control" name="ending_time" placeholder="Closing Time" value="{{ get_option('ending_time') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="control-label">Telephone <span class="required">*</span></label>
                            <input type="text" class="form-control" name="phone" placeholder="Telephone Number" value="{{ get_option('landline') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label class="control-label">Mobile <span class="required">*</span></label>
                            <input type="text" class="form-control" name="mobile" placeholder="Mobile Number" value="{{ get_option('official_phone') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('office_email') ? ' has-error' : '' }}">
                            <label class="control-label">Office Email <span class="required">*</span></label>
                            <input type="text" name="office_email" value="{{ get_option('office_email') }}" class="form-control" placeholder="Office Email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('secondary_email') ? ' has-error' : '' }}">
                            <label class="control-label">Secondary Email <span class="required">*</span></label>
                            <input type="text" name="secondary_email" value="{{ get_option('secondary_email') }}" class="form-control" placeholder="Secondary Email">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('map') ? ' has-error' : '' }}">
                            <label class="control-label">Google Map Address <span class="required">*</span></label>
                            <textarea name="map" rows="8" cols="80" class="form-control">{{ get_option('map') }}</textarea>
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