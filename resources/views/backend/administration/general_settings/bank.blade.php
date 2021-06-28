<div id="payment_gateway" class="tab-pane fade">
    <div class="panel panel-default">
        <div class="panel-heading"><span class="panel-title">Payment Gateway</span></div>
        <div class="panel-body">
            <form method="post" class="appsvan-submit params-panel" autocomplete="off" action="{{ route('general_settings.bank') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <h5>Esewa</h5>
                <div class="params-panel">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Esewa Name <span class="required">*</span></label>
                            <input type="text" class="form-control" name="esewa_payee" value="{{ get_option('esewa_payee') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Esewa Id <span class="required">*</span></label>
                            <input type="text" class="form-control" name="esewa_id" value="{{ get_option('esewa_id') }}">
                        </div>
                    </div>
                </div>

                <h5>Bank Account</h5>
                <div class="params-panel">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Account Name <span class="required">*</span></label>
                            <input type="text" class="form-control" name="bank_account_name" value="{{ get_option('bank_account_name') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Account Number <span class="required">*</span></label>
                            <input type="text" class="form-control" name="bank_id" value="{{ get_option('bank_id') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Bank Name <span class="required">*</span></label>
                            <input type="text" class="form-control" name="bank_name" value="{{ get_option('bank_name') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Bank Branch <span class="required">*</span></label>
                            <input type="text" class="form-control" name="bank_branch" value="{{ get_option('bank_branch') }}">
                        </div>
                    </div>

                </div>

                </br>
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right">Save Settings</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>