<form method="post" autocomplete="off" action="{{route('generalcalls.update', $generalcall->slug)}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label">Full Name</label>
            <input type="text" class="form-control" name="name" value="{{ $generalcall->name }}">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
            <label class="control-label">Phone <span class="required">*</span></label>
            <input type="text" class="form-control" name="phone" value="{{ $generalcall->phone }}" required>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
            <label class="control-label">Date <span class="required">*</span></label>
            <input type="text" class="form-control datepicker" name="date" value="{{ $generalcall->date }}" required>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
            <label class="control-label">Description</label>
            <textarea type="text" class="form-control" name="description">{{ $generalcall->description }}</textarea>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('follow_up_date') ? ' has-error' : '' }}">
            <label class="control-label">Follow up Date</label>
            <input type="text" class="form-control datepicker" name="follow_up_date" value="{{ $generalcall->follow_up_date }}">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('call_duration') ? ' has-error' : '' }}">
            <label class="control-label">Call Duration</label>
            <input type="text" class="form-control" name="call_duration" value="{{ $generalcall->call_duration }}">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('note') ? ' has-error' : '' }}">
            <label class="control-label">Note</label>
            <textarea type="text" class="form-control" name="note">{{ $generalcall->note }}</textarea>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
            <label class="control-label">Attach Document</label>
            <select class="form-control select2" name="call_type">
                <option value="">Select One</option>
                <option @if($generalcall->call_type == 'Incoming') selected
                    @endif value="Incoming">Incoming
                </option>
                <option @if($generalcall->call_type == 'Outgoing') selected
                    @endif value="Outgoing">Outgoing
                </option>
            </select>
        </div>
    </div>


    <div class="col-md-12 mb-10">
        <div class="form-group">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>