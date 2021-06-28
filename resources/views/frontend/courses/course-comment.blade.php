<h4 class="line-bottom-theme-colored-2 mb-0">{{ $course->commentsNumber() }}</h4>
<div class="row">
    <div class="col-md-12">
        <div class="blog-posts single-post">
            <div class="comments-area">
                <ul class="comment-list">
                    @foreach (get_course_comments($course->id) as $data)
                    <li>
                        <div class="media comment-author"> <a class="media-left pull-left flip" href="#"><img class="img-thumbnail" src="images/blog/comment2.jpg" alt=""></a>
                            <div class="media-body">
                                <h5 class="media-heading comment-heading">{{ $data->name }} says:</h5>
                                <div class="comment-date">{{ $data->date }}</div>
                                <p class="mb-0">{{ $data->comments }}</p>
                                <a class="replay-icon pull-right text-theme-colored2" href="{{ route('course.index', [$course->slug, $data->id]) }}"> <i class="fa fa-commenting-o text-theme-colored2"></i> Replay</a>
                                <div class="clearfix"></div>
                                @foreach (get_course_comment($course->id, $data->id) as $key)
                                <div class="media comment-author nested-comment mt-0"> <a href="#" class="media-left pull-left flip pt-20"><img alt="{{ $key->comments }}" src="/frontend/images/blog/comment3.jpg" class="img-thumbnail"></a>
                                    <div class="media-body p-20 bg-lighter">
                                        <h5 class="media-heading comment-heading">{{ $key->name }} says:</h5>
                                        <div class="comment-date">{{ $key->date }}</div>
                                        <p>{{ $key->comments }}</p>
                                        <a class="replay-icon pull-right text-theme-colored2" href="{{ route('course.index', [$course->slug, $data->id]) }}"> <i class="fa fa-commenting-o text-theme-colored2"></i> Replay</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="comment-box">
                <div class="row">
                    <div class="col-sm-12">
                        @if (isset($comment))
                        <h5>Reply</h5>
                        @else
                        <h5>Leave a Comment</h5>
                        @endif
                        <div class="row">
                            @if (isset($comment))
                            <form role="form" action="{{ route('course.reply') }}" autocomplete="off" method="post">
                                @csrf
                                <input type="text" name="comment_id" value="{{ $comment }}" hidden>
                                <input type="text" name="course_id" value="{{ $course->id }}" hidden>
                                <div class="col-sm-6 pt-0 pb-0">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" required class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Phone Number" required class="form-control" value="{{ old('phone') }}" name="phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <textarea class="form-control" required name="comments" placeholder="Enter Message" rows="7">{{ old('comments') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark btn-flat pull-right m-0" data-loading-text="Please wait...">Submit</button>
                                    </div>
                                </div>
                            </form>
                            @else
                            <form role="form" action="{{ route('course.comment') }}" autocomplete="off" method="post">
                                @csrf
                                <input type="text" name="course_id" value="{{ $course->id }}" hidden>
                                <div class="col-sm-6 pt-0 pb-0">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" required class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Phone Number" required class="form-control" value="{{ old('phone') }}" name="phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <textarea class="form-control" required name="comments" placeholder="Enter Message" rows="7">{{ old('comments') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark btn-flat pull-right m-0" data-loading-text="Please wait...">Submit</button>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>