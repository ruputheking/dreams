<div class="col-md-12 col-sm-12 col-lg-3">
    <div class="sidebar sidebar-left mt-sm-30">
        <div class="widget">
            <h5 class="widget-title line-bottom">Search box</h5>
            <div class="search-form">
                <form>
                    <div class="input-group">
                        <input type="text" placeholder="Click to Search" class="form-control search-input">
                        <span class="input-group-btn">
                            <button type="submit" class="btn search-button"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="widget">
            <h5 class="widget-title line-bottom">Categories</h5>
            <div class="categories">
                <ul class="list list-border angle-double-right">
                    @foreach (get_news_categories() as $data)
                    <li><a href="{{ route('category.show', $data->slug) }}">{{ $data->title }}<span class="pull-right">({{ $data->posts->count() }})</span></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="widget">
            <h5 class="widget-title line-bottom">Latest News</h5>
            <div class="latest-posts">
                @foreach (get_recent_news() as $data)
                <article class="post media-post clearfix pb-0 mb-10">
                    <a class="post-thumb" href="{{ route('blog.show', $data->slug) }}"><img src="/frontend/images/{{ $data->feature_image }}" width="75" height="75" alt="{{ $data->title }}"></a>
                    <div class="post-right">
                        <h4 class="post-title mt-0 mb-0"><a href="{{ route('blog.show', $data->slug) }}">{{ $data->title }}</a></h4>
                        <p>{{ Str::limit($data->title, 80) }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        <div class="widget">
            <h5 class="widget-title line-bottom">Tags</h5>
            <div class="tags">
                @foreach (get_news_tags() as $data)
                <a href="{{ route('tag.show', $data->slug) }}">{{ $data->title }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>