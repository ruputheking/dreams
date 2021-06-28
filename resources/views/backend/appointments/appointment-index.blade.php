@extends('layouts.backend.main')

@section('header')
<li><a href="{{route('dashboard')}}">Dashboard</a></li>
<li class="active">Appointment List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Appointment List
                </div>
            </div>
            <div class="panel-body no-export">
                <table class="table table-bordered data-table">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Appointment Date & Time</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($appointments AS $appointment)
                        <tr>
                            <td>{{ $appointment->name }}</td>
                            <td>{{$appointment->email }}</td>
                            <td>{{$appointment->phone }}</td>
                            <td>{{$appointment->month() }} {{ $appointment->day() }}, {{ $appointment->year() }} - {{ $appointment->time() }}</td>
                            <td>
                                <form action="{{route('appointments.destroy', $appointment->id)}}" method="post">
                                    <a href="{{ route('appointments.show', $appointment->id) }}" data-title="View Appointment" class="btn btn-primary btn-xs ajax-modal"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
</div>
@endsection