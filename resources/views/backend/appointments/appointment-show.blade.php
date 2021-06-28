@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('appointments.index') }}">Appointment List</a></li>
<li class="active">Appointment View</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    Appointment View
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered" width="100%">
                    <tbody>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection