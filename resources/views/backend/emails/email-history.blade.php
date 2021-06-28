@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Email Logs</li>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">All Email List</span>
            </div>

            <div class="panel-body">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Subject</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php($n = 1)

                        @foreach ($emails as $email)
                        <tr>
                            <td>
                                {{$n}}
                                @php($n++)
                            </td>
                            <td>{{ $email->subject }}</td>
                            <td>{{ $email->email }}</td>
                            <td>{!! $email->details !!}</td>
                            <td>
                                <!-- Delete Button -->
                                <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$email->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                                <div id="{{$email->id}}deleteModal" class="delete-modal modal fade" role="dialog">
                                    <!-- Delete Modal -->
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <div class="delete-icon"></div>
                                            </div>
                                            <div class="modal-body text-center">
                                                <h4 class="modal-heading">Are You Sure ?</h4>
                                                <p>Do you really want to delete these records? This process cannot be undone.</p>
                                            </div>
                                            <div class="modal-footer">
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['email.destroy', $email->id]]) !!}
                                                {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                                                {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
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