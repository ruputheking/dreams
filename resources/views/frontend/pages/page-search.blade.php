@extends('layouts.frontend.main')

@section('content')
<div class="main-content">
    <!-- Section: inner-header -->
    <section>
        <div class="container pt-0 pb-0">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <ol class="breadcrumb text-left mt-10 mb-10 white">
                            <li><a href="{{ route('pages.home') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Search</li>
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
                    @if ($courses->count() > 0)
                    <h2>Course</h2>
                    <div class="blog-posts">
                        <div class="col-md-12">
                            <div class="row list-dashed">
                                @foreach ($courses as $course)
                                <article class="post clearfix mb-30 pb-30">
                                    <div class="entry-content border-1px p-20 pr-10">
                                        <div class="entry-meta media mt-0 no-bg no-border">
                                            <div class="media-body pl-15">
                                                <div class="event-content pull-left flip">
                                                    <h4 class="entry-title text-capitalize m-0">{{ $course->title }}</a></h4>
                                                </div>
                                                <div class="event-content pull-right flip">
                                                    <a href="{{ route('course.show', $course->slug) }}" class="entry-title text-capitalize m-0 btn btn-primary btn-sm"><i class="fa fa-eye"></i>
                                                        Visit</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            <nav>
                                {{ $courses->appends(request()->only('term'))->links() }}
                            </nav>
                        </div>
                    </div>
                    @endif
                    @if ($notices->count() > 0)
                    <h2>Notices</h2>
                    <div class="blog-posts">
                        <div class="col-md-12">
                            <div class="row list-dashed">
                                @foreach ($notices as $notice)
                                <article class="post clearfix mb-30 pb-30">
                                    <div class="entry-content border-1px p-20 pr-10">
                                        <div class="entry-meta media mt-0 no-bg no-border">
                                            <div class="media-body pl-15">
                                                <div class="event-content pull-left flip">
                                                    <h4 class="entry-title text-capitalize m-0">{{ $notice->title }}</a></h4>
                                                </div>
                                                <div class="event-content pull-right flip">
                                                    <a href="{{ route('notice.show', $notice->slug) }}" class="entry-title text-capitalize m-0 btn btn-primary btn-sm"><i class="fa fa-eye"></i>
                                                        Visit</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            <nav>
                                {{ $notices->appends(request()->only('term'))->links() }}
                            </nav>
                        </div>
                    </div>
                    @endif
                    @if ($events->count() > 0)
                    <h2>Events</h2>
                    <div class="blog-posts">
                        <div class="col-md-12">
                            <div class="row list-dashed">
                                @foreach ($events as $event)
                                <article class="post clearfix mb-30 pb-30">
                                    <div class="entry-content border-1px p-20 pr-10">
                                        <div class="entry-meta media mt-0 no-bg no-border">
                                            <div class="media-body pl-15">
                                                <div class="event-content pull-left flip">
                                                    <h4 class="entry-title text-capitalize m-0">{{ $event->title }}</a></h4>
                                                </div>
                                                <div class="event-content pull-right flip">
                                                    <a href="{{ route('event.show', $event->slug) }}" class="entry-title text-capitalize m-0 btn btn-primary btn-sm"><i class="fa fa-eye"></i>
                                                        Visit</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            <nav>
                                {{ $events->appends(request()->only('term'))->links() }}
                            </nav>
                        </div>
                    </div>
                    @endif
                    @if ($jobs->count() > 0)
                    <h2>Jobs</h2>
                    <div class="blog-posts">
                        <div class="col-md-12">
                            <div class="row list-dashed">
                                @foreach ($jobs as $job)
                                <article class="post clearfix mb-30 pb-30">
                                    <div class="entry-content border-1px p-20 pr-10">
                                        <div class="entry-meta media mt-0 no-bg no-border">
                                            <div class="media-body pl-15">
                                                <div class="event-content pull-left flip">
                                                    <h4 class="entry-title text-capitalize m-0">{{ $job->title }}</a></h4>
                                                </div>
                                                <div class="event-content pull-right flip">
                                                    <a href="{{ route('job.show', $job->slug) }}" class="entry-title text-capitalize m-0 btn btn-primary btn-sm"><i class="fa fa-eye"></i>
                                                        Visit</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            <nav>
                                {{ $jobs->appends(request()->only('term'))->links() }}
                            </nav>
                        </div>
                    </div>
                    @endif
                    @if ($news->count() > 0)
                    <h2>News</h2>
                    <div class="blog-posts">
                        <div class="col-md-12">
                            <div class="row list-dashed">
                                @foreach ($news as $blog)
                                <article class="post clearfix mb-30 pb-30">
                                    <div class="entry-content border-1px p-20 pr-10">
                                        <div class="entry-meta media mt-0 no-bg no-border">
                                            <div class="media-body pl-15">
                                                <div class="event-content pull-left flip">
                                                    <h4 class="entry-title text-capitalize m-0">{{ $blog->title }}</a></h4>
                                                </div>
                                                <div class="event-content pull-right flip">
                                                    <a href="{{ route('blog.show', $blog->slug) }}" class="entry-title text-capitalize m-0 btn btn-primary btn-sm"><i class="fa fa-eye"></i>
                                                        Visit</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            <nav>
                                {{ $news->appends(request()->only('term'))->links() }}
                            </nav>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection