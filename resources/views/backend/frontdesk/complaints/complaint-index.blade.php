@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Complain Book</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">Complain Book</span>
                <a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="New Complain" style="margin-top:-3px;" href="{{route('complaints.create')}}">Add New</a>
            </div>

            <div class="panel-body">
                <div class="content-block box">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Complain By</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>Assigned By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($complaints as $key => $complaint)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $complaint->complaint_by }}</td>
                                    <td>{{ $complaint->phone }}</td>
                                    <td>{{ $complaint->date() }}</td>
                                    <td>{{ $complaint->assigned_by }}</td>
                                    <td>
                                        <!-- Delete Button -->
                                        <form action="{{route('complaints.destroy', $complaint->slug)}}" method="post">
                                            <a href="{{route('complaints.show', $complaint->slug)}}" data-title="View Complain" class="btn btn-primary btn-xs ajax-modal"><i class="fa fa-eye"></i> View</a>
                                            <a href="{{route('complaints.edit', $complaint->slug)}}" data-title="Edit Complain" class="btn btn-warning btn-xs ajax-modal"><i class="fa fa-edit"></i> Edit</a>
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-xs btn-remove"><i class="fa fa-trash"></i> Delete</button>
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
    </div>
</div>
@endsection