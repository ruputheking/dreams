<section id="blog">
    <div class="container pb-40">
        <div class="section-title">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-uppercase title">Latest <span class="text-theme-colored2">News </span></h2>
                    <p class="text-uppercase mb-0">See All Time Latest News</p>
                    <div class="double-line-bottom-theme-colored-2"></div>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel-3col owl-nav-top" data-nav="true">
                        @foreach (get_latest_news() as $data)
                        <div class="item">
                            <article class="post clearfix mb-30">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        <img src="/frontend/images/{{ $data->feature_image }}" alt="{{ $data->title }}" class="img-responsive img-fullwidth">
                                    </div>
                                    <div class="entry-date media-left text-center flip bg-theme-colored border-top-theme-colored2-3px pt-5 pr-15 pb-5 pl-15">
                                        <ul>
                                            <li class="font-16 text-white font-weight-600">{{ $data->day() }}</li>
                                            <li class="font-12 text-white text-uppercase">{{ $data->month() }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="entry-content p-15">
                                    <div class="entry-meta media no-bg no-border mt-0 mb-10">
                                        <div class="media-body pl-0">
                                            <div class="event-content pull-left flip">
                                                <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="{{ route('blog.show', $data->slug) }}">{{ Str::limit($data->title, 48) }}</a></h4>
                                                <ul class="list-inline">
                                                    <li><i class="fa fa-comments mr-5 text-theme-colored2"></i>{{ $data->commentsNumber() }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-5">{{ Str::limit($data->summary, 225) }}</p>
                                    <a class="btn btn-default btn-flat font-12 mt-10 ml-5" href="{{ route('blog.show', $data->slug) }}"> View Details</a>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>