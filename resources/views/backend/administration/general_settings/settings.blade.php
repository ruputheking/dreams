@extends('layouts.backend.main')

@section('content')
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs setting-tab">
            <li class="active"><a data-toggle="tab" href="#general" aria-expanded="true">General</a></li>
            <li class=""><a data-toggle="tab" href="#email" aria-expanded="false">Email</a></li>
            <li class=""><a data-toggle="tab" href="#meta" aria-expanded="false">SEO</a></li>
            <li class=""><a data-toggle="tab" href="#payment_gateway" aria-expanded="false">Payment Gateway</a></li>
            <li class=""><a data-toggle="tab" href="#logo" aria-expanded="false">Logo</a></li>
            <li class=""><a data-toggle="tab" href="#appearance" aria-expanded="false">Social Media</a></li>
        </ul>
        <div class="tab-content">

            @include('backend.administration.general_settings.office')


            @include('backend.administration.general_settings.email')

            @include('backend.administration.general_settings.meta')

            @include('backend.administration.general_settings.bank')

            <div id="logo" class="tab-pane fade">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="panel-title">Logo Upload</span></div>
                    <div class="panel-body">
                        <form method="post" class="appsvan-submit params-panel" autocomplete="off" action="{{ route('settings.logoUpdate') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <label class="control-label">Upload Logo <span class="required">*</span></label>
                                    <input type="file" class="form-control dropify" name="logo" data-max-file-size="8M" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" data-default-file="{{ get_logo() }}" required>
                                </div>
                            </div>
                            </br>
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary btn-block">Upload</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


            @include('backend.administration.general_settings.social')

        </div>
    </div>
</div>
</div>
</div>
@endsection