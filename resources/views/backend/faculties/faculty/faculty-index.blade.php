@extends('layouts.backend.main')

@section('header')
<li><a href="{{route('dashboard')}}">Dashboard</a></li>
<li class="active">Team Members</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Team Members
                </div>
                <a href="{{ route('team_members.create') }}" class="pull-right btn btn-primary btn-sm" style="margin-top:-26px;">Add New</a>
            </div>
            <div class="panel-body no-export">
                <table class="table table-bordered data-table">
                    <thead>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Social Media</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($faculties AS $data)
                        <tr>
                            @if($data->photo)
                            <td><img src="/frontend/images/{{ $data->photo }}" width="50" height="50" /></td>
                            @else
                            <td><img src="/frontend/images/profile.png" width="50" height="50" /></td>
                            @endif
                            <td>{{$data->name}}</td>
                            <td>{{$data->position->title}}</td>
                            <td>
                                @if ($data->facebook)
                                <a href="{{ $data->facebook }}" class="btn btn-primary btn-xs"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                @endif
                                @if ($data->instagram)
                                <a href="{{ $data->instagram }}" class="btn btn-secondary btn-xs"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                                @endif
                                @if ($data->twitter)
                                <a href="{{ $data->twitter }}" class="btn btn-info btn-xs"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                @endif
                                @if ($data->skype)
                                <a href="{{ $data->skype }}" class="btn btn-info btn-xs"><i class="fab fa-skype" aria-hidden="true"></i></a>
                                @endif
                            </td>
                            <td>
                                <form action="{{route('team_members.destroy', $data->slug)}}" method="post">
                                    <a href="{{ route('team_members.show', $data->slug) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="{{route('team_members.edit',$data->slug)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-xs btn-remove"><i class="fa fa-eraser" aria-hidden="true"></i></button>
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
@endsection