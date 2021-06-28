@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Document List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">All Documents</span>
                <a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="Add New Document" style="margin-top:-3px;" href="{{route('downloads.create')}}">Add New</a>
            </div>

            <div class="panel-body">
                <div class="content-block box">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Document Name</th>
                                    <th>Document / File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($downloads as $key => $download)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $download->document_name }}</td>
                                    <td><a href="/frontend/images/{{ $download->document_file }}" class="btn btn-primary btn-xs" download><i class="fa fa-download"></i> Download</a></td>
                                    <td>
                                        <!-- Delete Button -->
                                        <form action="{{route('downloads.destroy', $download->id)}}" method="post">
                                            <a href="{{route('downloads.show', $download->id)}}" data-title="View Document" class="btn btn-primary btn-xs ajax-modal"><i class="fa fa-eye"></i> View</a>
                                            <a href="{{route('downloads.edit', $download->id)}}" data-title="Edit Document" class="btn btn-warning btn-xs ajax-modal"><i class="fa fa-edit"></i> Edit</a>
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