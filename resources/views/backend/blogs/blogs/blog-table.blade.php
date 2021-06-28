<table class="table data-table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
        $i = 1;
        @endphp
        @foreach ($posts as $post)
        <tr>
            <td><img src="/frontend/images/{{ $post->feature_image }}" width="50px" height="50px" alt="{{ $post->title }}" /></td>
            <td>{{Str::words($post->title, 5)}}</td>
            <td>{{$post->author->user_name}}</td>
            <td>{{$post->category->title}}</td>
            <td>{{ $post->dateFormatted(true) }}</td>
            <td style="text-align:center;">
                {!! $post->publicationLabel() !!}
            </td>
            <td>
                {!! Form::open(['method' => 'DELETE', 'route' => ['news.destroy', $post->slug]]) !!}
                @csrf
                <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-xs btn-primary">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{ route('news.edit', $post->slug) }}" class="btn btn-xs btn-warning">
                    <i class="fa fa-edit"></i>
                </a>
                <button type="submit" class="btn btn-xs btn-danger">
                    <i class="fa fa-trash"></i>
                </button>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>