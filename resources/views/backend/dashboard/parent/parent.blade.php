@role ('guardian')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title text-center">Notice</h4>
            </div>
            <div class="content no-export">
                <table class="table table-bordered data-table">
                    <thead>
                        <th>Notice</th>
                        <th>Created</th>
                        <th class="text-center">View</th>
                    </thead>
                    <tbody>
                        @foreach(get_notices("Guardian",100) as $notice)
                        <tr>
                            <td>{{ $notice->heading }}</td>
                            <td>{{ date("d M, Y - H:i", strtotime($notice->created_at)) }}</td>
                            <td class="text-center"><a href="{{ route('notices.show', $notice->id) }}" data-title="View Notice" class="btn btn-primary btn-sm ajax-modal">View Notice</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endrole