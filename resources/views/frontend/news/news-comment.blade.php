<div class="comments-area">
    <h5 class="comments-title">{{ $news->commentsNumber() }}</h5>
    <ul class="comment-list">
        @foreach (get_news_comments($news->id) as $data)
        <li>
            <div class="media comment-author"> <a class="media-left" href="#"><img class="media-object img-thumbnail" width="75" height="75" src="/frontend/images/blog/comment2.jpg" alt="{{ $data->name }}"></a>
                <div class="media-body">
                    <h5 class="media-heading comment-heading">{{ $data->name }} says:</h5>
                    <div class="comment-date">{{ $data->date }}</div>
                    <p>{{ $data->comments }}</p>
                    <a href="{{ route('comment.index', [$news->slug, $data->id]) }}" class="replay-icon pull-right flip text-theme-colored"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a>
                    <div class="clearfix"></div>
                    @foreach (get_news_comment($news->id,$data->id) as $newComment)
                    <div class="media comment-author nested-comment"> <a href="#" class="media-left"><img class="media-object img-thumbnail" width="75" height="75" src="/frontend/images/blog/comment3.jpg" alt=""></a>
                        <div class="media-body p-20 bg-lighter">
                            <h5 class="media-heading comment-heading">{{ $newComment->name }} says:</h5>
                            <div class="comment-date">{{ $newComment->date }}</div>
                            <p>{{ $newComment->comments }}</p>
                            <a class="replay-icon pull-right flip text-theme-colored" href="{{ route('comment.index', [$news->slug, $data->id]) }}"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
<div class="comment-box" id="#comments">
    <div class="row">
        <div class="col-sm-12">
            @if (isset($comment))
            <h5>Reply</h5>
            @else
            <h5>Leave a Comment</h5>
            @endif
            <div class="row">
                @if (isset($comment))
                <form role="form" action="{{ route('comment.reply') }}" autocomplete="off" method="post">
                    @csrf
                    <input type="text" name="comment_id" value="{{ $comment }}" hidden>
                    <input type="text" name="post_id" value="{{ $news->id }}" hidden>
                    <div class="col-sm-6 pt-0 pb-0">
                        <div class="form-group">
                            <input type="text" class="form-control" required name="name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control" name="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <input type="number" placeholder="Enter Phone" required class="form-control" name="phone">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <textarea class="form-control" required name="message" placeholder="Enter Message" rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark btn-flat pull-right m-0" data-loading-text="Please wait...">Submit</button>
                        </div>
                    </div>
                </form>
                @else
                <form role="form" action="{{ route('blog.comment') }}" autocomplete="off" method="post">
                    @csrf
                    <input type="text" name="post_id" value="{{ $news->id }}" hidden>
                    <div class="col-sm-6 pt-0 pb-0">
                        <div class="form-group">
                            <input type="text" class="form-control" required name="name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control" name="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <input type="number" placeholder="Enter Phone" required class="form-control" name="phone">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <textarea class="form-control" required name="message" placeholder="Enter Message" rows="7"></textarea>
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