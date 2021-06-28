@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Visitor Book</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">Visitor Book</span>
                <a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="New Visitor" style="margin-top:-3px;" href="{{route('visitors.create')}}">Add New</a>
            </div>

            <div class="panel-body">
                <div class="content-block box">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Purpose</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>In Time</th>
                                    <th>Out Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($visitors as $key => $visitor)
                                <tr>
                                    <td>{{ $visitor->name }}</td>
                                    <td>{{ $visitor->purpose }}</td>
                                    <td>{{ $visitor->phone }}</td>
                                    <td>{{ $visitor->date() }}</td>
                                    <td>{{ $visitor->in_time() }}</td>
                                    <td>{{ $visitor->out_time() }}</td>
                                    <td>
                                        <!-- Delete Button -->
                                        <form action="{{route('visitors.destroy', $visitor->slug)}}" method="post">
                                            <a href="{{route('visitors.show', $visitor->slug)}}" data-title="View Book" class="btn btn-primary btn-xs ajax-modal"><i class="fa fa-eye"></i> View</a>
                                            <a href="{{route('visitors.edit', $visitor->slug)}}" data-title="Edit Visitor" class="btn btn-warning btn-xs ajax-modal"><i class="fa fa-edit"></i> Edit</a>
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