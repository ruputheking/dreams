@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('faqs.index') }}">FAQ List</a></li>
<li class="active">Update FAQ</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">Update FAQ</span>
            </div>

            <div class="panel-body">
                <form method="post" autocomplete="off" action="{{route('faqs.update', $faq->id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="col-md-12">
                        <div class="form-group">
                            {{ $faq->question }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group  {{ $errors->has('answer') ? ' has-error' : '' }}">
                            <label class="control-label">Description <span class="required">*</span></label>
                            <textarea type="text" class="form-control" name="answer" required>{{ $faq->answer }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group  {{ $errors->has('status') ? ' has-error' : '' }}">
                            <label class="control-label">Status <span class="required">*</span></label>
                            <select class="form-control select2" name="status">
                                <option value="">Select One</option>
                                <option @if($faq->status == 0) selected
                                    @endif value="0">Active
                                </option>
                                <option @if($faq->status == 1) selected
                                    @endif value="1">Disable
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Reply</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection