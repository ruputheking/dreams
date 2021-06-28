<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-bordered">
            @if ($complaint->image)
            <tr>
                <td colspan="2" class="text-center"><img src="/frontend/images/complaints/{{ $complaint->image }}" width="100" height="100" /></td>
            </tr>
            @endif
            <tr>
                <td>Complain By</td>
                <td>{{ $complaint->complaint_by }}</td>
            </tr>
            @if ($complaint->source)
            <tr>
                <td>Source</td>
                <td>{{ $complaint->source }}</td>
            </tr>
            @endif
            <tr>
                <td>Phone</td>
                <td>{{ $complaint->phone }}</td>
            </tr>
            <tr>
                <td>Date</td>
                <td>{{ $complaint->date() }}</td>
            </tr>
            @if ($complaint->description)
            <tr>
                <td>Description</td>
                <td>{{ $complaint->description }}</td>
            </tr>
            @endif
            <tr>
                <td>Action Taken</td>
                <td>{{ $complaint->action_taken }}</td>
            </tr>
            <tr>
                <td>Assigned By</td>
                <td>{{ $complaint->assigned_by }}</td>
            </tr>
            @if ($complaint->note)
            <tr>
                <td>Note</td>
                <td>{{ $complaint->note }}</td>
            </tr>
            @endif
        </table>
    </div>
</div>