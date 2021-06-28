@extends('layouts.frontend.main')

@section('title', $job->title . ' |')

@section('meta')
<meta name="keywords" content="{{ $job->seo_meta_keywords ?? $job->title }}">
<meta name="description" content="{{ $job->seo_meta_description ?? $job->summary }}">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $job->seo_meta_keywords ?? $job->title }}">
<meta name="twitter:description" content="{{ $job->seo_meta_description ?? $job->summary }}">
<meta name="twitter:image" content="{{asset('/frontend/images/'. get_option('image'))}}">

<!-- Facebook -->
<meta property="og:url" content="{{ request()->url() }}">
<meta property="og:title" content="{{ $job->seo_meta_keywords ?? $job->title }}">
<meta property="og:description" content="{{ $job->seo_meta_description ?? $job->summary }}">
<meta property="og:type" content="article">
<meta property="og:image" content="{{asset('/frontend/images/'. get_option('image')) }}">
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
                        <li><a href="{{ route('pages.job') }}">Jobs</a></li>
                        <li class="active">{{ $job->title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="job-overview">
                    <dl class="dl-horizontal">
                        <dt><i class="fa fa-calendar text-theme-colored mt-5 font-15"></i></dt>
                        <dd>
                            <h5 class="mt-0">Date Posted:</h5>
                            <p>Posted {{ Carbon\Carbon::parse($job->published_at)->diffForHumans() }}</p>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><i class="fa fa-calendar-alt text-theme-colored mt-5 font-15"></i></dt>
                        <dd>
                            <h5 class="mt-0">Deadline:</h5>
                            <p>{{ Carbon\Carbon::parse($job->deadlines)->format('d F Y g:i A') }}</p>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><i class="fa fa-map-marker text-theme-colored mt-5 font-15"></i></dt>
                        <dd>
                            <h5 class="mt-0">Location:</h5>
                            <p>{{ $job->location }}</p>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><i class="fa fa-user text-theme-colored mt-5 font-15"></i></dt>
                        <dd>
                            <h5 class="mt-0">Required Candidate:</h5>
                            <p>
                                @if (!empty($job->candidate))
                                {{ $job->candidate }}
                                @else
                                <span class="text-center">-</span>
                                @endif
                            </p>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><i class="fa fa-money text-theme-colored mt-5 font-15"></i></dt>
                        <dd>
                            <h5 class="mt-0">Salary:</h5>
                            <p>
                                @if (is_numeric($job->salary))
                                Rs
                                @endif
                                {{ $job->salary }}
                            </p>
                        </dd>
                    </dl>
                    <a class="btn btn-dark mt-20" href="{{ route('job.create', $job->slug) }}">Apply Now</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="icon-box mb-0 p-0">
                    <h3 class="icon-box-title pt-15 mt-0 mb-0">{{ $job->title }}</h3>
                    <hr>
                    <p class="text-gray">{!! $job->details !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection