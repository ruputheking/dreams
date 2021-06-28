<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-bordered">
            <tr>
                <td>To Title</td>
                <td>{{ $dispatch->to_title }}</td>
            </tr>
            @if ($dispatch->address)
            <tr>
                <td>Address</td>
                <td>{{ $dispatch->address }}</td>
            </tr>
            @endif
            <tr>
                <td>From Title</td>
                <td>{{ $dispatch->from_title }}</td>
            </tr>
            <tr>
                <td>Date</td>
                <td>{{ $dispatch->date() }}</td>
            </tr>
            @if ($dispatch->image)
            <tr>
                <td>Attach Document</td>
                <td><a href="/frontend/images/dispatches/{{ $dispatch->image }}" class="btn btn-primary btn-sm" download>Download</a> </td>
            </tr>
            @endif
            @if ($dispatch->note)
            <tr>
                <td>Note</td>
                <td>{{ $dispatch->note }}</td>
            </tr>
            @endif
        </table>
    </div>
</div>