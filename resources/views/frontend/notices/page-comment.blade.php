<div class="comments-area">
    <h5 class="comments-title">Comments</h5>
    <ul class="comment-list">
        @foreach (get_notice_comments($notice->id) as $data)
        <li>
            <div class="media comment-author"> <a class="media-left" href="#"><img class="media-object img-thumbnail" src="/frontend/images/blog/comment2.jpg" alt=""></a>
                <div class="media-body">
                    <h5 class="media-heading comment-heading">{{ $data->name }} says:</h5>
                    <div class="comment-date">{{ $data->date }}</div>
                    <p>{{ $data->comments }}</p>
                    <a class="replay-icon pull-right flip text-theme-colored" href="{{ route('notice.index', [$notice->slug, $data->id]) }}"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a>
                    <div class="clearfix"></div>
                    @foreach (get_notice_comment($notice->id, $data->id) as $key)
                    <div class="media comment-author nested-comment"> <a href="#" class="media-left"><img class="media-object img-thumbnail" src="/frontend/images/blog/comment3.jpg" alt=""></a>
                        <div class="media-body p-20 bg-lighter">
                            <h5 class="media-heading comment-heading">{{ $key->name }} says:</h5>
                            <div class="comment-date">{{ $key->date }}</div>
                            <p>{{ $key->comments }}</p>
                            <a class="replay-icon pull-right flip text-theme-colored" href="{{ route('notice.index', [$notice->slug, $data->id]) }}"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a>
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
                <form role="form" method="post" action="{{ route('notice.reply') }}" autocomplete="off">
                    @csrf
                    <input type="text" name="notice_comment_id" value="{{ $comment }}" hidden>
                    <input type="text" name="notice_id" value="{{ $notice->id }}" hidden>
                    <div class="col-sm-6 pt-0 pb-0">
                        <div class="form-group">
                            <input type="text" class="form-control" required value="{{ old('name') }}" name="name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control" value="{{ old('email') }}" name="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <input type="number" placeholder="Enter Phone" value="{{ old('phone') }}" required class="form-control" name="phone">
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
                <form role="form" action="{{ route('notice.comment') }}" autocomplete="off" method="post">
                    @csrf
                    <input type="text" name="notice_id" value="{{ $notice->id }}" hidden>
                    <div class="col-sm-6 pt-0 pb-0">
                        <div class="form-group">
                            <input type="text" class="form-control" required name="name" value="{{ old('name') }}" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <input type="number" placeholder="Enter Phone" value="{{ old('phone') }}" required class="form-control" name="phone">
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