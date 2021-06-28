@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('courses.index') }}">Course List</a></li>
<li class="active">View Course</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">View Course</div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr class="text-center">
                        <td colspan="2"><img src="{{ asset('/frontend/images/'. $course->feature_image) }}" style="width: 400px; border-radius: 5px"></td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{ $course->title }}</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>{{ $course->category->title }}</td>
                    </tr>
                    <tr>
                        <strong>
                            <td>Status</td>
                            <td>
                                @if ($course->status == 0)
                                <label class="label label-warning">Draft</label>
                                @endif
                                @if ($course->status == 1)
                                <label class="label label-success">Active</label>
                                @endif
                            </td>
                        </strong>
                    </tr>
                    @if ($course->starting_date)
                    <tr>
                        <td>Start Date</td>
                        <td>{{ date('d M, Y - H:i' , strtotime($course->starting_date)) }}</td>
                    </tr>
                    @endif
                    @if ($course->starting_time)
                    <tr>
                        <td>Start Time</td>
                        <td>{{ date('d M, Y - H:i', strtotime($course->starting_time)) }}</td>
                    </tr>
                    @endif
                    @if ($course->ending_time)
                    <tr>
                        <td>End Time</td>
                        <td>{{ date('d M, Y - H:i', strtotime($course->ending_time)) }}</td>
                    </tr>
                    @endif
                    @if ($course->schedule)
                    <tr>
                        <td>Schedule</td>
                        <td>{{ $course->schedule }}</td>
                    </tr>
                    @endif
                    @if ($course->max_student)
                    <tr>
                        <td>Max Students</td>
                        <td>{{ $course->max_student ?? '-' }}</td>
                    </tr>
                    @endif
                    @if ($course->total_credit)
                    <tr>
                        <td>Total Credits</td>
                        <td>{{ $course->total_credit }}</td>
                    </tr>
                    @endif
                    @if ($course->duration)
                    <tr>
                        <td>Duration</td>
                        <td>{{ $course->duration }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td>In Short</td>
                        <td>{{ $course->summary }}</td>
                    </tr>
                    <tr>
                        <td>Details</td>
                        <td>{!! $course->description !!}</td>
                    </tr>
                    @if ($course->file_2 || $course->file_3 || $course->file_4 || $course->file_5 || $course->file_6)
                    <tr>
                        <td>Extra Image</td>
                        <td>
                            @if ($course->file_2)
                            <img src="{{ asset('/frontend/images/'. $course->file_2) }}" style="width: 100px; border-radius: 5px">
                            @endif
                            @if ($course->file_3)
                            <img src="{{ asset('/frontend/images/'. $course->file_3) }}" style="width: 100px; border-radius: 5px">
                            @endif
                            @if ($course->file_4)
                            <img src="{{ asset('/frontend/images/'. $course->file_4) }}" style="width: 100px; border-radius: 5px">
                            @endif
                            @if ($course->file_5)
                            <img src="{{ asset('/frontend/images/'. $course->file_5) }}" style="width: 100px; border-radius: 5px">
                            @endif
                            @if ($course->file_6)
                            <img src="{{ asset('/frontend/images/'. $course->file_6) }}" style="width: 100px; border-radius: 5px">
                            @endif
                        </td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection