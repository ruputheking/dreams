<div class="col-md-8">
    <div class="panel panel-default" data-collapsed="0">
        <div class="panel-heading">
            <div class="panel-title">
                Category List
            </div>
        </div>
        <div class="panel-body no-export">
            <table class="table table-bordered data-table">
                <thead>
                    <th>Title</th>
                    <th>Post</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($categories AS $data)
                    <tr>
                        <td>{{$data->title}}</td>
                        <td>{{ $data->posts->count() }}</td>
                        <td>
                            <form action="{{route('categories.destroy',$data->slug)}}" method="post">
                                <a href="{{route('categories.edit',$data->slug)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-xs btn-remove"><i class="fa fa-eraser" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>