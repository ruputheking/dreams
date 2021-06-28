@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('user_requests.index') }}">Student Request</a></li>
<li class="active">Requested Profile</li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Requested Profile
                </div>
            </div>

            <table class="table table-striped table-bordered" width="100%">
                <tbody>
                    <tr>
                        <td style="text-align: center;" colspan="4">
                            <img width="200px" style="border-radius: 7px;" src="/frontend/images/{{$student->photo }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Name</td>
                        <td colspan="2">{{$student->student_name}}</td>
                    </tr>
                    <tr>
                        <td>Guardian</td>
                        <td>{{$student->parent_name ?? '-'}}</td>
                        <td>Guardian</td>
                        <td>{{$student->parent_name ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td>Father's Name</td>
                        <td>{{$student->f_name}}</td>
                        <td>Mother's Name</td>
                        <td>{{$student->m_name}}</td>
                    </tr>
                    <tr>
                        <td>Date Of Birth</td>
                        <td>{{$student->birthday}}</td>
                        <td>Gender</td>
                        <td>{{$student->gender}}</td>
                    </tr>
                    <tr>
                        <td>Religion</td>
                        <td>{{$student->religion}}</td>
                        <td>Address</td>
                        <td>{{$student->address ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{$student->phone}}</td>
                        <td>Email</td>
                        <td>{{$student->email}}</td>
                    </tr>
                    <tr>
                        <td>Course</td>
                        <td>{{$student->title}}</td>
                        <td>Section</td>
                        <td>{{$student->section_name}}</td>
                    </tr>
                    <tr>
                        <td>Passport No</td>
                        <td>{{$student->passport ?? '-'}}</td>
                        <td>Citizenship No</td>
                        <td>{{$student->citizenship_no}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection