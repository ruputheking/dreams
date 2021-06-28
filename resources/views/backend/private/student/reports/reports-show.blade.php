@extends('layouts.admin')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('my_report') }}">MCQ Report</a></li>
<li class="active">{{$topic->title}}</li>
@endsection

@section('content')
<div class="content-block box">
    <div class="box-body table-responsive">
        <table id="example1" class="table table-striped table-hover">
            <thead class="info">
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Correct Answer</th>
                    <th>My Answer</th>
                    <th>Answer Explanation</th>
                    <th>Marks</th>
                    <th>Total Marks</th>
                </tr>
            </thead>
            <tbody>
                @if($topic->show_ans ==1)
                    @if ($answers)
                    @foreach ($answers as $key => $answer)
                    <tr>
                        <td>
                            {{$key+1}}
                            @php
                            $correct_answer = Str::lower($answer->answer);
                            $user_answer = Str::lower($answer->user_answer);
                            @endphp
                        </td>
                        <td>{{$answer->question->question}}</td>
                        <td>{{$answer->question->$correct_answer}}</td>
                        <td>{{$answer->question->$user_answer}}</td>
                        <td>{{$answer->question->answer_exp ? $answer->question->answer_exp : '-'}}</td>
                        <td>
                            @if ($answer->answer == $answer->user_answer)
                            {{1*$topic->per_q_mark}}
                            @else
                            0
                            @endif
                        </td>
                        <td>
                            {{$topic->per_q_mark}}
                        </td>
                    </tr>
                    @endforeach
                    @endif
                    @endif
            </tbody>
        </table>
    </div>
</div>
@endsection