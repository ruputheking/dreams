@role('admin')
@desktop
<div class="dashboard-block">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="small-box bg-yellow">

                        <div class="inner">
                            <h3>{{ get_posts()->count() }}</h3>
                            <p>Blog</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-blog"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="small-box bg-green">

                        <div class="inner">
                            <h3>{{get_emails()->count()}}</h3>
                            <p>Email History</p>
                        </div>

                        <div class="icon">
                            <i class="far fa-envelope"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>{{ get_galleries()->count() }}</h3>
                            <p>Gallery</p>
                        </div>
                        <div class="icon">
                            <i class="fab fa-envira"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ get_contacts()->count() }}</h3>
                            <p>Notification</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bell"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@enddesktop

@mobile
<div class="dashboard-block">
    <div class="row">
        <div class="col-md-12">
            <div class="row" style="display:flex;padding: 0 10px;">
                <div style="width:33.33%; padding:5px;">
                    <div class="small-box bg-yellow" style="height:116px">

                        <div class="inner">
                            <h3>{{ get_posts()->count() }}</h3>
                            <p>Blog</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-blog"></i>
                        </div>
                    </div>
                </div>
                <div style="width:33.33%; padding:5px;">
                    <div class="small-box bg-green" style="height:116px">

                        <div class="inner">
                            <h3>{{ get_emails()->count() }}</h3>
                            <p>Email</p>
                        </div>

                        <div class="icon">
                            <i class="far fa-envelope"></i>
                        </div>
                    </div>
                </div>
                <div style="width:33.33%; padding:5px;">
                    <div class="small-box bg-purple" style="height:116px">
                        <div class="inner">
                            <h3>{{ get_galleries()->count() }}</h3>
                            <p>Gallery</p>
                        </div>
                        <div class="icon">
                            <i class="fab fa-envira"></i>
                        </div>
                    </div>
                </div>
                <div style="width:33.33%; padding:5px;height:120px">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>0</h3>
                            <p>Notification</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bell"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endmobile

@php
$i = 1;
@endphp
<div class="dashboard-block">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading clearfix ">
                    <div class="panel-title pull-left">
                        Recent Blog
                    </div>
                </div>
                <div class="panel-body no-export">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                        </thead>
                        <tbody>
                            @forelse(get_recent_posts() AS $data)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->category->title}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">No Recent Blog</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <a href="{{ route('blogs.index') }}">All Posts</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading clearfix ">
                    <div class="panel-title pull-left">
                        Recent Comments
                    </div>
                </div>
                <div class="panel-body no-export">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Comment</th>
                        </thead>
                        <tbody>
                            @php
                            $j = 1;
                            @endphp
                            @forelse(get_comments() AS $data)
                            <tr>
                                <td>{{$j++}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->review}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">No Recent Comment</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <a href="{{ route('comments.index') }}">All Comments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endrole