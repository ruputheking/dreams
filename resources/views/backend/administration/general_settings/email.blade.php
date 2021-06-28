<div id="email" class="tab-pane fade">
    <div class="panel panel-default">
        <div class="panel-heading"><span class="panel-title">Email Settings</span></div>
        <div class="panel-body">
            <form action="{{ route('email.setting') }}" class="form-groups-bordered validate" autocomplete="off" method="post" accept-charset="utf-8">
                {{csrf_field()}}

                <div class="params-panel">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('from_name') ? ' has-error' : '' }}">
                            <label class="control-label">Email From</label>
                            <input type="text" class="form-control" name="from_name" value="{{ get_option('from_name') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('from_email') ? ' has-error' : '' }}">
                            <label class="control-label">Email Address</label>
                            <input type="text" class="form-control" name="from_email" value="{{ get_option('from_email') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('mail_type') ? ' has-error' : '' }}">
                            <label class="control-label">Mail Type</label>
                            <input type="text" class="form-control" name="mail_type" value="{{ Str::upper(get_option('mail_type')) }}" required disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('smtp_encryption') ? ' has-error' : '' }}">
                            <label class="control-label">SMTP Encryption</label>
                            <input type="text" class="form-control" name="smtp_encryption" value="{{ Str::upper(get_option('smtp_encryption')) }}" required disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('smtp_host') ? ' has-error' : '' }}">
                            <label class="control-label">SMTP Host</label>
                            <input type="text" class="form-control" name="smtp_host" value="{{ get_option('smtp_host') }}" required disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('smtp_port') ? ' has-error' : '' }}">
                            <label class="control-label">SMTP Port</label>
                            <input type="text" class="form-control" name="smtp_port" value="{{ get_option('smtp_port') }}" required disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('smtp_username') ? ' has-error' : '' }}">
                            <label class="control-label">Email</label>
                            <input type="text" class="form-control" name="smtp_username" value="{{ get_option('smtp_username') }}" required disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('smtp_password') ? ' has-error' : '' }}">
                            <label class="control-label">Password</label>
                            <input type="password" class="form-control" name="smtp_password" value="{{ get_option('smtp_password') }}" required disabled>
                        </div>
                    </div>

                    <div class="col-sm-offset-0 col-sm-9">
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>