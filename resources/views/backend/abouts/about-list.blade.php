@extends('layouts.backend.main')

@section('header')
<li><a href="{{route('dashboard')}}">Dashboard</a></li>
<li class="active">About List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <div class="panel-title">
                    About List
                </div>
                <a href="{{ route('abouts.create') }}" class="pull-right btn btn-primary btn-sm" style="margin-top:-26px;">Add New Content</a>
            </div>
            <div class="panel-body">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($abouts AS $data)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $data->title }}</td>
                            <td><img src="/frontend/img/{{$data->file}}" width="50" height="50"></td>
                            <td>
                                <a href="{{route('abouts.edit', $data->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$data->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                                <div id="{{$data->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['abouts.destroy', $data->id]]) !!}
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