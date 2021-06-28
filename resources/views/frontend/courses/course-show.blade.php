@extends('layouts.frontend.main')

@section('title', $course->title . ' |')

@section('meta')
<meta name="keywords" content="{{ $course->seo_meta_keywords ?? $course->title }}">
<meta name="description" content="{{ $course->seo_meta_description ?? $course->summary }}">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $course->seo_meta_keywords ?? $course->title }}">
<meta name="twitter:description" content="{{ $course->seo_meta_description ?? $course->summary }}">
<meta name="twitter:image" content="{{asset('/frontend/images/'. $course->feature_image)}}">

<!-- Facebook -->
<meta property="og:url" content="{{ request()->url() }}">
<meta property="og:title" content="{{ $course->seo_meta_keywords ?? $course->title }}">
<meta property="og:description" content="{{ $course->seo_meta_description ?? $course->summary }}">
<meta property="og:type" content="article">
<meta property="og:image" content="{{asset('/frontend/images/'. $course->feature_image) }}">
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
                <div class="col-md-12">
                    <ol class="breadcrumb text-left mt-10 mb-10 white">
                        <li><a href="{{ route('pages.home') }}"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="{{ route('pages.course') }}">Courses</a></li>
                        <li class="active">{{ $course->title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Services Details -->
<section>
    <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row">
            <div class="col-md-8">
                <div class="single-service">
                    <ul class="list-inline mb-15">
                        <li>
                            <i class="pe-7s-comment text-theme-colored2 font-48"></i>
                            <div class="pull-right ml-5">
                                <span>Comments</span>
                                <h5 class="mt-0">{{ $course->comments->count() }}</h5>
                            </div>
                        </li>
                        <li>
                            <i class="pe-7s-ribbon text-theme-colored2 font-48"></i>
                            <div class="pull-right ml-5">
                                <span>Category</span>
                                <h5 class="mt-0">{{ $course->category->title }}</h5>
                            </div>
                        </li>
                        @if ($course->price)
                        <li>
                            <i class="pe-7s-cash text-theme-colored2 font-48"></i>
                            <div class="pull-right ml-10">
                                <span>Course Price</span>
                                <h5 class="mt-0">Rs {{ decimalPlace($course->price) }}</h5>
                            </div>
                        </li>
                        @endif
                    </ul>
                    <img src="/frontend/images/{{ $course->feature_image }}" style="height: 435px; width: 750px;" alt="{{ $course->title }}">
                    <h3 class="text-uppercase mt-30 mb-10">{{ $course->title }}</h3>
                    <div class="double-line-bottom-theme-colored-2 mt-10"></div>
                    <p>{{ $course->summary }}</p>
                    <ul id="myTab" class="nav nav-tabs mt-30">
                        <li class="active"><a href="#tab1" data-toggle="tab">Description</a></li>
                        @if ($course->starting_date || $course->ending_time || $course->starting_time || $course->total_credit || $course->duration || $course->schedule)
                        <li><a href="#tab2" data-toggle="tab">Course Info</a></li>
                        @endif
                        <li><a href="#tab5" data-toggle="tab">Comments</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="tab1">
                            <h4 class="line-bottom-theme-colored-2 mb-15">Course Details</h4>
                            <p>{!! $course->description !!}</p>
                        </div>
                        <div class="tab-pane fade" id="tab2">
                            <h4 class="line-bottom-theme-colored-2 mb-15">Course Information</h4>
                            <ul class="course-info-list font-14 mt-20">
                                @if ($course->starting_date)
                                <li>
                                    <span class="course-info-title">
                                        <i class="pe-7s-date font-26 vertical-align-middle text-theme-colored2 mr-10"></i>Class Start:</span>
                                    <span class="course-info-details">{{ date('d-M-Y', strtotime($course->starting_date)) }}</span>
                                </li>
                                @endif
                                @if ($course->duration)
                                <li>
                                    <span class="course-info-title">
                                        <i class="pe-7s-timer font-26 vertical-align-middle text-theme-colored2 mr-10"></i>Course Duration:</span>
                                    <span class="course-info-details">{{ $course->duration }}</span>
                                </li>
                                @endif
                                @if ($course->total_credit)
                                <li>
                                    <span class="course-info-title">
                                        <i class="pe-7s-diamond font-26 vertical-align-middle text-theme-colored2 mr-10"></i>Total Credits:</span>
                                    <span class="course-info-details">{{ $course->total_credit }}</span>
                                </li>
                                @endif
                                @if ($course->max_student)
                                <li>
                                    <span class="course-info-title">
                                        <i class="pe-7s-umbrella font-26 vertical-align-middle text-theme-colored2 mr-10"></i>Student Capacity:</span>
                                    <span class="course-info-details">Max {{ $course->max_student }} Students</span>
                                </li>
                                @endif
                                @if ($course->schedule)
                                <li>
                                    <span class="course-info-title">
                                        <i class="pe-7s-note2 font-26 vertical-align-middle text-theme-colored2 mr-10"></i>Class Schedule:</span>
                                    <span class="course-info-details">{{ $course->schedule }}</span>
                                </li>
                                @endif
                                @if ($course->starting_time && $course->ending_time)
                                <li>
                                    <span class="course-info-title">
                                        <i class="pe-7s-alarm font-26 vertical-align-middle text-theme-colored2 mr-10"></i>Class Time:</span>
                                    <span class="course-info-details">{{ $course->start_time() }} - {{ $course->end_time() }}</span>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="tab5">
                            @include('frontend.courses.course-comment')
                        </div>
                    </div>
                    <div><a class="btn btn-xl btn-theme-colored2 mt-30 pr-40 pl-40" href="{{ route('course.register', $course->slug) }}">Apply Now</a></div>
                </div>
            </div>
            @include('frontend.pages.page-sidebar')
        </div>
    </div>
</section>
@endsection