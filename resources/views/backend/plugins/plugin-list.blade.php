@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Plugins List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">All Plugins</span>
                <a href="{{ route('plugins.create') }}" class="pull-right btn btn-primary btn-sm" style="margin-top:-3px;">Add New Plugin</a>
            </div>

            <div class="panel-body">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Your Code</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php($n = 1)

                        @foreach ($plugins as $plugin)
                        <tr>
                            <td>
                                {{$n}}
                                @php($n++)
                            </td>
                            <td>{{ $plugin->title }}</td>
                            <td>{{ $plugin->code }}</td>
                            <td>
                                <!-- Delete Button -->
                                <a class="btn btn-xs btn-warning" href="{{ route('plugins.edit', $plugin->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$plugin->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                                <div id="{{$plugin->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['plugins.destroy', $plugin->id]]) !!}
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