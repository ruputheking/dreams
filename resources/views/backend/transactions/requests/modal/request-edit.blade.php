<form method="post" autocomplete="off" action="{{route('transaction_requests.update', $transaction->id)}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}

    <div class="col-md-12">
        <div class="form-group">
            {{ $transaction->title }}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group  {{ $errors->has('status') ? ' has-error' : '' }}">
            <label class="control-label">Status <span class="required">*</span></label>
            <select class="form-control select2" name="status">
                <option value="">Select One</option>
                <option @if($transaction->status == 0) selected
                    @endif value="0">Pending
                </option>
                <option @if($transaction->status == 1) selected
                    @endif value="1">Rejected
                </option>
                <option @if($transaction->status == 2) selected
                    @endif value="2">Verified
                </option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>