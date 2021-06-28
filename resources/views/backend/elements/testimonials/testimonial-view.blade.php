@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('testimonials.index') }}">Testimonial List</a></li>
<li class="active">View Testimonial</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">View Testimonial</span>
            </div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td colspan="2" class="text-center"><img src="/frontend/images/{{ $testimonial->photo }}" width="100" height="100" /></td>
                    </tr>
                    <tr>
                        <td>Full Name</td>
                        <td>{{ $testimonial->name }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">{{ $testimonial->description }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection