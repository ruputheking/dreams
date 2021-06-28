@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Customer Views</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">All Review</span>
                <a href="{{ route('reviews.create') }}" class="pull-right btn btn-primary btn-sm" style="margin-top:-3px;">Add New Review</a>
            </div>

            <div class="panel-body">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $data)
                        <tr>
                            <td>
                                <img src="{{ $data->image->image_url }}" height="50" width="50" alt="{{ $data->image->image_name }}">
                            </td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->details }}</td>
                            <td>
                                <!-- Delete Button -->
                                <a class="btn btn-xs btn-primary" href="{{ route('reviews.edit', $data->id) }}"><i class="fa fa-edit"></i> Edit</a>
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
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['reviews.destroy', $data->id]]) !!}
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