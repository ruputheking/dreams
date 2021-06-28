@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Assignments List</li>
@endsection

@section('content')
<div class="row">
    @forelse ($assignments as $key => $assignment)

    <div class="col-md-4">
        <div class="quiz-card">
            <h3 class="quiz-name">{{$assignment->title}}</h3>
            <div class="row">
                <div class="col-xs-6 pad-0">
                    <ul class="topic-detail">
                        <li>Total <i class="fa fa-long-arrow-right"></i></li>
                        <li>Class <i class="fa fa-long-arrow-right"></i></li>
                        <li>Section <i class="fa fa-long-arrow-right"></i></li>
                        <li>Deadline <i class="fa fa-long-arrow-right"></i></li>
                        <li>Subject <i class="fa fa-long-arrow-right"></i></li>
                    </ul>
                </div>
                <div class="col-xs-6">
                    <ul class="topic-detail right">
                        <li>
                            {{get_assigned_count($assignment->id)}}
                        </li>
                        <li>
                            {{$assignment->class_name}}
                        </li>
                        <li>
                            {{$assignment->section_name}}
                        </li>
                        <li>
                            {{$assignment->deadline}}
                        </li>
                        <li>
                            {{$assignment->subject_name}}
                        </li>
                    </ul>
                </div>
            </div>

            <a href="{{route('assigned_student.list', $assignment->id)}}" class="btn btn-success">View Student</a>

        </div>
    </div>
    @empty
    <div class="text-center">
        <h4>No Topic Found</h4>
    </div>
    @endforelse
</div>
@endsection