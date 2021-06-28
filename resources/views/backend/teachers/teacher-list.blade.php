@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Teachers List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">Teachers</span>
                <a href="{{route('teachers.create')}}" class="btn btn-primary btn-sm pull-right" style="margin-top:-3px;">Add New Teacher</a>
            </div>
            <div class="panel-body">
                <div class="content-block box">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Teacher Name</th>
                                    <th>Birthday</th>
                                    <th>Gender</th>
                                    <th>Mobile No.</th>
                                    <th>Address</th>
                                    <th>Joining Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                <tr>
                                    <td><img src="/frontend/images/{{ $teacher->photo }}" width="50px" alt=""></td>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->birthday}}</td>
                                    <td>{{$teacher->gender}}</td>
                                    <td>{{$teacher->phone}}</td>
                                    <td>{{$teacher->address ?? '-'}}</td>
                                    <td>{{$teacher->joining_date ?? '-'}}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> View</a>
                                        <!-- Delete Button -->
                                        <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$teacher->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                                        <div id="{{$teacher->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['teachers.destroy', $teacher->id]]) !!}
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

@section('scripts')
<script>
    $('#ch1').click(function() {
        $('#pass').show();
    });

    $('#ch2').click(function() {
        $('#pass').hide();
    });
</script>
@endsection