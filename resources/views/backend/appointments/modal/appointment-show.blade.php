<!--Invoice Information-->
<div class="panel panel-default">
    <div class="panel-body">

        <table class="table table-bordered">
            <tr>
                <td>Name</td>
                <td>{{ $appointment->name }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $appointment->email }}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{ $appointment->phone }}</td>
            </tr>
            <tr>
                <td>Appointment Date & Time</td>
                <td>{{ $appointment->month() }} {{ $appointment->day() }}, {{ $appointment->year() }} - {{ $appointment->time() }}</td>
            </tr>
            <tr>
                <td>Messages</td>
                <td>{{ $appointment->message }}</td>
            </tr>
        </table>

    </div>
</div>