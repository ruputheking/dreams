@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Message From the Director</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Edit Message From the Director
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form action="{{ route('abouts.store') }}" class="form-horizontal form-groups-bordered validate" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{csrf_field()}}

                        <input type="text" name="about_title" value="message-from-director" hidden>
                        <div class="form-group {{ $errors->has('Details') ? ' has-error' : '' }}">
                            <label class="control-label mb-10">Details <span class="required">*</span></label>
                            <textarea name="details" class="form-control summer-note" rows="8" cols="150">{{ get_option('message-from-director') }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Update Message From the Director</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $('#summer-note,.summer-note').summernote({
        height: 320,
        dialogsInBody: true
    });
</script>
@endsection