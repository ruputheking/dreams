@extends('layouts.admin')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Shared File List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    Shared File List
                </div>
            </div>
            <div class="panel-body">
                <table id="example1" class="table table-strriped data-table">
                    <thead>
                        <th>#</th>
                        <th>File Name</th>
                        <th>Subject</th>
                        <th>Section</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($files as $data)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $data->file_name }}</td>
                            <td>{{ $data->subject_name }}</td>
                            <td>{{ $data->section_name }}</td>
                            <td>
                                @if($data->file)
                                    <a href="{{ asset('uploads/files/sharefiles'.$data->file) }}" class="btn btn-primary btn-xs" download><i class="fa fa-download" aria-hidden="true" download></i> Download</a>
                                    @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection