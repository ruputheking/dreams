@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('team_members.index') }}">Team Member</a></li>
<li class="active">Profile</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    Profile
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered" width="100%">
                    <tbody style="text-align: center;">
                        <tr class="text-center">
                            <td colspan="2">
                                @if($faculty->photo)
                                <img src="{{ asset('/frontend/images/'.$faculty->photo) }}" style="width: 200px; border-radius: 5px">
                                @else
                                <img src="{{ asset('/frontend/images/profile.png') }}" style="width: 200px; border-radius: 5px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><strong>{{ $faculty->name }}</strong></td>
                        </tr>
                        <tr>
                            <td>Position</td>
                            <td>{{ $faculty->position->title }}</td>
                        </tr>
                        <tr class="text-center">
                            <td>Social Media</td>
                            <td>
                                @if ($faculty->facebook)
                                <a href="{{ $faculty->facebook }}" class="btn btn-primary btn-xs"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                @endif
                                @if ($faculty->instagram)
                                <a href="{{ $faculty->instagram }}" class="btn btn-secondary btn-xs"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                                @endif
                                @if ($faculty->twitter)
                                <a href="{{ $faculty->twitter }}" class="btn btn-info btn-xs"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                @endif
                                @if ($faculty->skype)
                                <a href="{{ $faculty->skype }}" class="btn btn-info btn-xs"><i class="fab fa-skype" aria-hidden="true"></i></a>
                                @endif
                            </td>
                        </tr>
                        @if ($faculty->details)
                        <tr>
                            <td>Bio</td>
                            <td>{!! $faculty->details !!}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection