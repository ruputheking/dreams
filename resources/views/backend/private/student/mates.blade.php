@extends('layouts.admin')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Class Mates</li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    Class Mates
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered data-table">
                    <thead>
                        <th width="70">Profile</th>
                        <th>Friends Name</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($students as $data)
                        <tr>
                            <td><img src="{{ asset('storage/users-avatar/'.$data->avatar) }}" width="50px" height="50px" alt=""></td>
                            <td>{{ $data->student_name }}</td>
                            <td>{{ $data->class_name }}</td>
                            <td>{{ $data->section_name }}</td>
                            <td>
                                <form class="" action="{{ route('user', $data->author_id) }}" method="post">
                                    @csrf
                                    <input type="text" name="user_id" value="{{ $data->author_id }}" hidden>
                                    <button type="submit" class="btn btn-success btn-xs"><i class="fa fa-envelope"></i> Message</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">No Mates Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection