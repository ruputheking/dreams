<table class="table data-table table-bordered">
    <thead>
        <tr>
            <th>Action</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>
                {!! Form::open(['style' => 'display: inline-block;', 'method' => 'PUT', 'route' => ['news.restore', $post->id]]) !!}
                <button title="Restore" class="btn btn-xs btn-default">
                    <i class="fa fa-refresh"></i>
                </button>
                {!! Form::close() !!}
                {!! Form::open(['style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => ['news.force-destroy', $post->id]]) !!}
                <button title="Delete Permanent" onclick="return confirm('You are about to delete a post permanently. Are you sure?')" type="submit" class="btn btn-xs btn-danger">
                    <i class="fa fa-times"></i>
                </button>
                {!! Form::close() !!}
            </td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->author->user_name }}</td>
            <td>{{ $post->category->title }}</td>
            <td style="text-align:center;">
                <abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>