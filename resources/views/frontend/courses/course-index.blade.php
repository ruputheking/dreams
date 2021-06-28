@extends('layouts.frontend.main')

@section('title', 'Courses –')

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
                        <li class="active">Courses</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Courses -->
<section id="courses" class="bg-silver-deep">
    <div class="container">
        @if (isset($categoryName))
        <div class="alert">
            <strong>Category: </strong><span>{{ $categoryName }}</span>
        </div>
        @endif
        <div class="row">
            @foreach ($courses as $data)
            <div class="col-md-4 col-sm-6">
                <div class="item">
                    <div class="course-single-item bg-white border-1px clearfix mb-30">
                        <div class="course-thumb">
                            <img class="img-fullwidth" alt="{{ $data->title }}" style="height:318.925px;" src="/frontend/images/{{ $data->feature_image }}">
                            @if ($data->price)
                            <div class="price-tag">Rs {{ decimalPlace($data->price) }}</div>
                            @endif
                            <div class="order-btn"><a href="{{ route('course.register', $data->slug) }}" class="btn btn-xs btn-theme-colored2">Apply Now</a></div>
                        </div>
                        <div class="course-details clearfix p-20 pt-15">
                            <div class="course-top-part pull-left" style="height:120px;overflow:hidden">
                                <a href="{{ route('course.show', $data->slug) }}">
                                    <h4 class="mt-0 mb-5">{{ $data->title }}</h4>
                                </a>
                                <p class="course-description mt-20">{{ Str::limit($data->summary, 144) }}</p>
                            </div>
                            <div class="clearfix"></div>
                            <ul class="list-inline course-meta mt-15">
                                @if ($data->duration)
                                <li>
                                    <h6>{{ $data->duration }}</h6>
                                    <span> Course</span>
                                </li>
                                @endif
                                @if ($data->duration || $data->total_credit)
                                <li>
                                    <h6 class="text-center">{{ $data->comments->count() }}</h6>
                                    <span> Comments</span>
                                </li>
                                @endif
                                @if ($data->total_credit)
                                <li>
                                    <h6 class="text-center"><span class="course-time">{{ $data->total_credit }}</span></h6>
                                    <span> Credited </span>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <nav class="col-md-12">
                {{ $courses->appends(request()->only(['term']))->links() }}
            </nav>
        </div>
    </div>
</section>
@endsection