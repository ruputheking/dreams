@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('faqs.index') }}">FAQ List</a></li>
<li class="active">View FAQ</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">View FAQ</span>
            </div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Full Name</td>
                        <td>{{ $faq->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $faq->email }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $faq->phone }}</td>
                    </tr>
                    <tr>
                        <td>Question</td>
                        <td>{{ $faq->question }}</td>
                    </tr>
                    @if ($faq->answer)
                    <tr>
                        <td>Answer</td>
                        <td>{{ $faq->answer }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td>Status</td>
                        <td>
                            @if ($faq->status == 0)
                            <label class="label label-success">Active</label>
                            @endif
                            @if ($faq->status == 1)
                            <label class="label label-warning">Disable</label>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection