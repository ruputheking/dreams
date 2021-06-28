@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('events.index') }}">Event list</a></li>
<li class="active">Candidate List</li>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading"><span class="panel-title">All Candidate</span></div>

            <div class="panel-body">
                <div class="content-block box">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php($n = 1)

                                @foreach ($candidates as $candidate)
                                <tr>
                                    <td>
                                        {{ $n++ }}
                                    </td>
                                    <td>{{ $candidate->name }}</td>
                                    <td>{{ $candidate->email }}</td>
                                    <td>{{ $candidate->phone }}</td>
                                    <td>{{ date('d-M-Y - H:i' ,strtotime($candidate->created_at)) }}</td>
                                    <td>
                                        <!-- Delete Button -->
                                        <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$candidate->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                                        <div id="{{$candidate->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['candidates.destroy', $candidate->id]]) !!}
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
    </div>
</div>

@endsection