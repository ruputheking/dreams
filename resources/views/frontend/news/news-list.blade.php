@extends('layouts.frontend.main')

@section('title', 'News –')

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
                        <li class="active">News</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container mb-30 pt-30 pb-30">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12">
                @if (isset($categoryName))
                <div class="alert">
                    <strong>Category: </strong><span>{{ $categoryName }}</span>
                </div>
                @endif
                @if (isset($tagName))
                <div class="alert">
                    <strong>Tag: </strong><span>{{ $tagName }}</span>
                </div>
                @endif
                <div class="blog-posts">
                    <div class="col-md-12">
                        <div class="row list-dashed">
                            @foreach ($news as $data)
                            <article class="post clearfix mb-30 pb-30">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        @if ($data->feature_image && $data->first_image)
                                        <div class="gallery-isotope default-animation-effect grid-5 masonry gutter-small clearfix" data-lightbox="gallery">
                                            <!-- Portfolio Item Start -->
                                            <div class="gallery-item">
                                                <a href="/frontend/images/{{ $data->feature_image }}" data-lightbox="gallery-item" title="{{ $data->title }}"><img src="/frontend/images/{{ $data->feature_image }}" alt="{{ $data->title }}"></a>
                                            </div>
                                            <!-- Portfolio Item End -->

                                            <!-- Portfolio Item Start -->
                                            <div class="gallery-item">
                                                <a href="/frontend/images/{{ $data->first_image }}" data-lightbox="gallery-item" title="{{ $data->title }}"><img src="/frontend/images/{{ $data->first_image }}" alt="{{ $data->title }}"></a>
                                            </div>
                                            <!-- Portfolio Item End -->

                                            <!-- Portfolio Item Start -->
                                            <div class="gallery-item">
                                                <a href="/frontend/images/{{ $data->second_image }}" data-lightbox="gallery-item" title="{{ $data->title }}"><img src="/frontend/images/{{ $data->second_image }}" alt="{{ $data->title }}"></a>
                                            </div>
                                            <!-- Portfolio Item End -->

                                            <!-- Portfolio Item Start -->
                                            <div class="gallery-item">
                                                <a href="/frontend/images/{{ $data->third_image }}" data-lightbox="gallery-item" title="{{ $data->title }}"><img src="/frontend/images/{{ $data->third_image }}" alt="{{ $data->title }}"></a>
                                            </div>
                                            <!-- Portfolio Item End -->

                                            <!-- Portfolio Item Start -->
                                            <div class="gallery-item">
                                                <a href="/frontend/images/{{ $data->fourth_image }}" data-lightbox="gallery-item" title="{{ $data->title }}"><img src="/frontend/images/{{ $data->fourth_image }}" alt="{{ $data->title }}"></a>
                                            </div>
                                            <!-- Portfolio Item End -->
                                        </div>
                                        @endif
                                        @if ($data->feature_image && !($data->first_image))
                                        <img height="450" width="900" src="/frontend/images/{{ $data->feature_image }}" class="img-responsive img-fullwidth" alt="{{ $data->title }}">
                                        @endif
                                        @if ($data->youtube)
                                        <iframe width="600" height="340" src="http://www.youtube.com/embed/oIDqz2BrVec?autoplay=0" allowfullscreen>
                                        </iframe>
                                        @endif
                                    </div>
                                </div>
                                <div class="entry-content border-1px p-20 pr-10">
                                    <div class="entry-meta media mt-0 no-bg no-border">
                                        <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                            <ul>
                                                <li class="font-16 text-white font-weight-600">{{ $data->day() }}</li>
                                                <li class="font-12 text-white text-uppercase">{{ $data->month() }}</li>
                                                <li class="font-12 text-white text-uppercase">{{ $data->year() }}</li>
                                            </ul>
                                        </div>
                                        <div class="media-body pl-15">
                                            <div class="event-content pull-left flip">
                                                <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="{{ route('blog.show', $data->slug) }}">{{ $data->title }}</a></h4>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="far fa-comments mr-5 text-theme-colored"></i> {{ $data->commentsNumber() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-10">{{ $data->summary }}</p>
                                    <a href="{{ route('blog.show', $data->slug) }}" class="btn-read-more">Read more</a>
                                    <div class="clearfix"></div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12">
                        <nav>
                            {{ $news->appends(request()->only(['term', 'month', 'year']))->links() }}
                        </nav>
                    </div>
                </div>
            </div>
            @include('frontend.partial.page-sidebar')
        </div>
    </div>
</section>
@endsection