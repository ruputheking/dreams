@extends('layouts.frontend.main')

@section('title', 'Notices –')

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
                        <li class="active">Notices</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container mt-0 mb-30 pt-30 pb-30">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="blog-posts">
                    <div class="col-md-12">
                        <div class="row list-dashed">
                            @foreach ($notices as $data)
                            <article class="post clearfix mb-30 pb-30">
                                <div class="entry-content border-1px p-20 pr-10">
                                    <div class="entry-meta media mt-0 no-bg no-border">
                                        <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                            <ul>
                                                <li class="font-16 text-white font-weight-600">{{ $data->day() }}</li>
                                                <li class="font-12 text-white text-uppercase">{{ $data->month() }}</li>
                                            </ul>
                                        </div>
                                        <div class="media-body pl-15">
                                            <div class="event-content pull-left flip">
                                                <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="{{ route('notice.show', $data->slug) }}">{{ $data->title }}</a></h4>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="far fa-commenting mr-5 text-theme-colored"></i> {{ $data->commentsNumber() }}</span>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="far fa-calendar mr-5 text-theme-colored"></i> {{ date("d M, Y - H:i", strtotime($data->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-10">{{ $data->summary }}</p>
                                    <a href="{{ route('notice.show', $data->slug) }}" class="btn-read-more">Read more</a>
                                    <div class="clearfix"></div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12">
                        <nav>
                            {{ $notices->appends(request()->only(['term']))->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection