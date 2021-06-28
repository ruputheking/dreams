<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-bordered">
            <tr>
                <td>Start Date</td>
                <td>{{ date('d M, Y - H:i' ,strtotime($event->start_date)) }}</td>
            </tr>
            <tr>
                <td>End Date</td>
                <td>{{ date('d M, Y - H:i' ,strtotime($event->end_date)) }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $event->name }}</td>
            </tr>
            <tr>
                <td>Details</td>
                <td>{!! $event->details !!}</td>
            </tr>
            <tr>
                <td>Location</td>
                <td>{{ $event->location }}</td>
            </tr>
        </table>
    </div>
</div>