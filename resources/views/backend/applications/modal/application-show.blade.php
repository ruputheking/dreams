<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-bordered">
            <tr>
                <td>Applicant Name</td>
                <td>{{ $application->user->user_name }}</td>
            </tr>
            <tr>
                <td>Applicant Type</td>
                <td>{{ $application->user->roles()->first()->display_name }}</td>
            </tr>
            <tr>
                <td>Leave Duration</td>
                <td>{{ $application->fromMonth() }} {{ $application->fromDay() }}, {{ $application->fromYear() }} - {{ $application->toMonth() }} {{ $application->toDay() }}, {{ $application->toYear() }}</td>
            </tr>
            <tr>
                <td>Subject</td>
                <td>{{ $application->subject }}</td>
            </tr>
            @if ($application->document)
            <tr>
                <td>Document</td>
                <td>
                    <a href="/frontend/images/applications/{{ $application->document }}" class="btn btn-primary btn-xs" download><i class="fa fa-download"></i> Download</a>
                </td>
            </tr>
            @endif
            @if ($application->reason)
            <tr>
                <td colspan="2">{!! $application->reason !!}</td>
            </tr>
            @endif
        </table>
    </div>
</div>