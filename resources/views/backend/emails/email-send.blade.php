@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Send Email</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Send Email
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form action="{{ route('email.send') }}" class="form-horizontal form-groups-bordered validate" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{csrf_field()}}
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label">Email <span class="required">*</span></label>
                            <input type="text" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }}">
                            <label class="control-label">Subject <span class="required">*</span></label>
                            <input type="text" class="form-control" name="subject" value="{{ old('subject') }}" placeholder="Subejct" required>
                        </div>

                        <div class="form-group {{ $errors->has('details') ? ' has-error' : '' }}">
                            <label class="control-label">Message</label>
                            <textarea type="text" class="form-control textarea" name="details" value="{{ old('details') }}"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Send Email</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection