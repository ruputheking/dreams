@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Phone Call Log List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">Add Phone Call Log</span>
            </div>
            <div class="panel-body">
                <form method="post" autocomplete="off" action="{{route('generalcalls.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label">Full Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('contact') ? ' has-error' : '' }}">
                            <label class="control-label">Phone <span class="required">*</span></label>
                            <input type="text" class="form-control" name="contact" value="{{ old('contact') }}" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                            <label class="control-label">Date <span class="required">*</span></label>
                            <input type="text" class="form-control datepicker" name="date" value="{{ old('date') }}" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="control-label">Description</label>
                            <textarea type="text" class="form-control" name="description">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('follow_up_date') ? ' has-error' : '' }}">
                            <label class="control-label">Follow up Date</label>
                            <input type="text" class="form-control datepicker" name="follow_up_date" value="{{ old('follow_up_date') }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('call_duration') ? ' has-error' : '' }}">
                            <label class="control-label">Call Duration</label>
                            <input type="text" class="form-control" name="call_duration" value="{{ old('call_duration') }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('note') ? ' has-error' : '' }}">
                            <label class="control-label">Note</label>
                            <textarea type="text" class="form-control" name="note">{{ old('note') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('call_type') ? ' has-error' : '' }}">
                            <label class="control-label">Call Type <span class="required">*</span></label>
                            <select class="form-control select2" name="call_type">
                                <option value="">Select One</option>
                                <option @if(old('call_type') == 'Incoming') selected
                                @endif value="Incoming">Incoming
                                </option>
                                <option @if(old('call_type') == 'Outgoing') selected
                                @endif value="Outgoing">Outgoing
                                </option>
                            </select>
                        </div>
                    </div>


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
                <span class="panel-title">Phone Call Log List</span>
                {{-- <a class="btn btn-primary btn-sm pull-right" data-title="Add Phone Call Log" style="margin-top:-3px;" href="{{route('generalcalls.create')}}">Add Phone Call Log</a> --}}
            </div>

            <div class="panel-body">
                <div class="content-block box">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>Next Follow Up Date</th>
                                    <th>Call Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($generalcalls as $key => $generalcall)
                                <tr>
                                    <td>{{ $generalcall->name }}</td>
                                    <td>{{ $generalcall->phone }}</td>
                                    <td>{{ $generalcall->date() }}</td>
                                    <td>{{ $generalcall->follow_up_date }}</td>
                                    <td>{{ $generalcall->call_type }}</td>
                                    <td>
                                        <!-- Delete Button -->
                                        <form action="{{route('generalcalls.destroy', $generalcall->slug)}}" method="post">
                                            <a href="{{route('generalcalls.show', $generalcall->slug)}}" data-title="View Phone Call Log" class="btn btn-primary btn-xs ajax-modal"><i class="fa fa-eye"></i> View</a>
                                            <a href="{{route('generalcalls.edit', $generalcall->slug)}}" data-title="Edit Phone Call Log" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
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