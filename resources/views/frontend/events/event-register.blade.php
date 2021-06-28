@extends('layouts.frontend.main')

@section('title', 'Register for ' . $event->title . ' |')

@section('meta')
<meta name="keywords" content="{{ $event->seo_meta_keywords ?? $event->title }}">
<meta name="description" content="{{ $event->seo_meta_description ?? $event->quote }}">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $event->seo_meta_keywords ?? $event->title }}">
<meta name="twitter:description" content="{{ $event->seo_meta_description ?? $event->quote }}">
<meta name="twitter:image" content="{{asset('/frontend/images/'. $event->file_1)}}">

<!-- Facebook -->
<meta property="og:url" content="{{ request()->url() }}">
<meta property="og:title" content="{{ $event->seo_meta_keywords ?? $event->title }}">
<meta property="og:description" content="{{ $event->seo_meta_description ?? $event->summary }}">
<meta property="og:type" content="article">
<meta property="og:image" content="{{ asset('/frontend/images/'. $event->file_1) }}">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1000">
<meta property="og:image:height" content="500">
@endsection

@section('content')
<!-- Section: inner-header -->
<section>
    <div class="container pt-0 pb-0">
        <!-- Section Content -->
        <div class="section-content">
            <div class="row">
                <div class="col-md-6">
                    <ol class="breadcrumb text-left mt-10 mb-10 white">
                        <li><a href="{{ route('pages.home') }}"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="{{ route('pages.event') }}"> Events</a></li>
                        <li><a href="{{ route('event.show', $event->slug) }}"> {{ $event->title }}</a></li>
                        <li class="active">Register</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="divider bg-silver-deep">
    <div class="container-fluid">
        <div class="section-title">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-lg-offset-3 col-md-offset-3 col-sm-12 text-center">
                    <h3 class="title text-theme-colored">Registration Form</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-lg-offset-3 col-md-offset-3 col-sm-12">
                <form name="booking-form" action="{{ route('event.store', $event->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <input type="text" placeholder="Enter Name" name="name" required="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="email" placeholder="Enter Email" name="email" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" placeholder="Enter Phone" name="phone" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-lg=12 col-md-12 col-sm-12">
                            <div class="form-group text-center">
                                <input name="form_botcheck" class="form-control" type="hidden" value="" />
                                <button data-loading-text="Please wait..." class="btn btn-dark btn-theme-colored btn-sm btn-block mt-20 pt-10 pb-10" type="submit">Register now</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection