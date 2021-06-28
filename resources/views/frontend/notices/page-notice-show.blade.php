@extends('layouts.frontend.main')

@section('title', $notice->title . ' |')

@section('meta')
<meta name="keywords" content="{{ $notice->seo_meta_keywords ?? $notice->title }}">
<meta name="description" content="{{ $notice->seo_meta_description ?? $notice->summary }}">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $notice->seo_meta_keywords ?? $notice->title }}">
<meta name="twitter:description" content="{{ $notice->seo_meta_description ?? $notice->summary }}">
<meta name="twitter:image" content="{{asset('/frontend/images/'. get_option('image'))}}">

<!-- Facebook -->
<meta property="og:url" content="{{ request()->url() }}">
<meta property="og:title" content="{{ $notice->seo_meta_keywords ?? $notice->title }}">
<meta property="og:description" content="{{ $notice->seo_meta_description ?? $notice->summary }}">
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
                        <li><a href="{{ route('pages.notice') }}">Notices</a></li>
                        <li class="active">{{ $notice->title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Blog -->
<section>
    <div class="container mb-30 pt-30 pb-30">
        <div class="row">
            <div class="col-md-9">
                <div class="blog-posts single-post">
                    <article class="post clearfix mb-0">
                        <div class="entry-content">
                            <div class="entry-meta media no-bg no-border mt-15 pb-20">
                                <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                    <ul>
                                        <li class="font-16 text-white font-weight-600">{{ $notice->day() }}</li>
                                        <li class="font-12 text-white text-uppercase">{{ $notice->month() }}</li>
                                    </ul>
                                </div>
                                <div class="media-body pl-15">
                                    <div class="event-content pull-left flip">
                                        <h3 class="entry-title text-white text-uppercase pt-0 mt-0"><a href="{{ route('notice.show', $notice->slug) }}">{{ $notice->title }}</a></h3>
                                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="far fa-commenting mr-5 text-theme-colored"></i> {{ $notice->commentsNumber() }}</span>
                                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="far fa-calendar mr-5 text-theme-colored"></i> {{ date("d M, Y - g:i A", strtotime($notice->created_at)) }}</span>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-15">{!! $notice->details !!}</p>
                            <div class="mt-30 mb-0 row">
                                <div class="col-md-8">
                                    <h5 class="pull-left flip mt-10 mr-20 text-theme-colored">Share:</h5>
                                    <ul class="styled-icons icon-circled m-0">
                                        <li><a target="_blank" onclick="javascript:window.open(this.href, '', 'menubar = no,toolbar = no, resizable=yes,scrollbars=yes,height:600, width:600')"
                                                href="https://www.facebook.com/sharer/sharer.php?u={{ route('notice.show', $notice->slug) }}" data-bg-color="#3A5795"><i class="fab fa-facebook-f text-white"></i></a></li>
                                        <li><a target="_blank" onclick="javascript:window.open(this.href, '', 'menubar = no,toolbar = no, resizable=yes,scrollbars=yes,height:600, width:600')"
                                                href="https://twitter.com/share?url={{ route('notice.show', $notice->slug) }}" data-bg-color="#55ACEE"><i class="fab fa-twitter text-white"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </article>
                    @include('frontend.notices.page-comment')
                </div>
            </div>
            @include('frontend.partial.page-sidebar')
        </div>
    </div>
</section>
@endsection