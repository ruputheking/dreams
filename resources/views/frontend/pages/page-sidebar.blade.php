<div class="col-sm-12 col-md-4">
    <div class="sidebar sidebar-left mt-sm-30 ml-30 ml-sm-0">
        <div class="widget border-1px bg-silver-deep p-15">
            <h4 class="widget-title line-bottom-theme-colored-2">Search box</h4>
            <div class="search-form">
                <form action="{{ route('pages.home') }}" method="get">
                    <div class="input-group">
                        <input type="hidden" name="category" value="course">
                        <input type="text" name="term" value="{{ request('term') }}" placeholder="Click to Search" class="form-control search-input">
                        <span class="input-group-btn">
                            <button type="submit" class="btn search-button"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="widget border-1px bg-silver-deep p-15">
            <h4 class="widget-title line-bottom-theme-colored-2 mb-10">Categories</h4>
            <div class="categories">
                <ul class="list-border">
                    @foreach (get_course_categories() as $data)
                    <li><a href="{{ route('course.category', $data->slug) }}">{{ $data->title }}<span>({{ $data->courses->count() }})</span></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="widget border-1px bg-silver-deep p-15">
            <h4 class="widget-title line-bottom-theme-colored-2">Featured Courses</h4>
            <div class="product-list">
                @foreach (get_recent_courses() as $data)
                <div class="media">
                    <a class="media-left pull-left flip" href="{{ route('course.show', $data->slug) }}">
                        <img class="media-object thumb" style="width:80px; height:60px" src="/frontend/images/{{ $data->feature_image }}" alt="{{ $data->title }}">
                    </a>
                    <div class="media-body">
                        <h5 class="media-heading product-title mb-0"><a href="{{ route('course.show', $data->slug) }}">{{ $data->title }}</a></h5>
                        @if ($data->price)
                        <span class="price">Rs {{ decimalPlace($data->price) }}</span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>