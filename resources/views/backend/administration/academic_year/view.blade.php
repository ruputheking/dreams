@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('academic_years.index') }}">List Academic Session</a></li>
<li class="active">View Academic Year</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">View Academic Year</div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Session'</td>
                        <td>{{ $academicyear->session }}</td>
                    </tr>
                    <tr>
                        <td>Year</td>
                        <td>{{ $academicyear->year }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection