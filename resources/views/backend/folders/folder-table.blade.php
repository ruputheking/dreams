<div class="col-md-8">
    <div class="panel panel-default" data-collapsed="0">
        <div class="panel-heading">
            <div class="panel-title">
                Folder List
            </div>
        </div>
        <div class="panel-body no-export">
            <table class="table table-bordered data-table">
                <thead>
                    <th>Folder Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse($folders AS $data)
                    <tr>
                        <td>{{$data->title}}</td>
                        <td>{{ $data->images->count() }}</td>
                        <td>
                            <form action="{{route('folders.destroy',$data->id)}}" method="post">
                                <a href="{{route('folders.edit',$data->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit   " aria-hidden="true"></i></a>
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-xs btn-remove"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="2">No Data Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>