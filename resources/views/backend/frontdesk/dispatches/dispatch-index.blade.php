@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Postal Dispatch</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">Add Postal Dispatch</span>
            </div>
            <div class="panel-body">
                <form method="post" autocomplete="off" action="{{route('dispatches.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('to_title') ? ' has-error' : '' }}">
                            <label class="control-label">To Title<span class="required">*</span></label>
                            <input type="text" class="form-control" name="to_title" value="{{ old('to_title') }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="control-label">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('note') ? ' has-error' : '' }}">
                            <label class="control-label">Note</label>
                            <textarea type="text" class="form-control" name="note">{{ old('note') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('from_title') ? ' has-error' : '' }}">
                            <label class="control-label">From Title <span class="required">*</span></label>
                            <input type="text" class="form-control" name="from_title" value="{{ old('from_title') }}" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                            <label class="control-label">Date <span class="required">*</span></label>
                            <input type="text" class="form-control datepicker" name="date" value="{{ old('date') }}" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                            <label class="control-label">Attach Document</label>
                            <input type="file" class="form-control appsvan-file" name="image">
                        </div>
                    </div>
                    <input type="hidden" name="status" value="0">
                    <div class="col-md-12 mb-10">
                        <div class="form-group">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">Postal Dispatch</span>
            </div>

            <div class="panel-body">
                <div class="content-block box">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>To Title</th>
                                    <th>Address</th>
                                    <th>From Title</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($dispatches as $dispatch)
                                <tr>
                                    <td>{{ $dispatch->to_title }}</td>
                                    <td>{{ $dispatch->address }}</td>
                                    <td>{{ $dispatch->from_title }}</td>
                                    <td>{{ $dispatch->date() }}</td>
                                    <td>
                                        <!-- Delete Button -->
                                        <form action="{{route('dispatches.destroy', $dispatch->slug)}}" method="post">
                                            <a href="{{route('dispatches.show', $dispatch->slug)}}" data-title="View Postal Dispatch" class="btn btn-primary btn-xs ajax-modal"><i class="fa fa-eye"></i> View</a>
                                            <a href="{{route('dispatches.edit', $dispatch->slug)}}" data-title="Edit Postal Dispatch" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
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