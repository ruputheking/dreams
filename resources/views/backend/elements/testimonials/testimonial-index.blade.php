@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Testimonial List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">All Testimonial</span>
                <a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="Add New Testimonial" style="margin-top:-3px;" href="{{route('testimonials.create')}}">Add New</a>
            </div>

            <div class="panel-body">
                <div class="content-block box">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($testimonials as $testimonial)
                                <tr>
                                    <td><img src="/frontend/images/{{ $testimonial->photo }}" style="width:50px; height: 50px;" /></td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{{ Str::limit($testimonial->description, 125) }}</td>
                                    <td>
                                        <!-- Delete Button -->
                                        <form action="{{route('testimonials.destroy', $testimonial->id)}}" method="post">
                                            <a href="{{route('testimonials.show', $testimonial->id)}}" data-title="View Testimonial" class="btn btn-primary btn-xs ajax-modal"><i class="fa fa-eye"></i> View</a>
                                            <a href="{{route('testimonials.edit', $testimonial->id)}}" data-title="Edit Testimonial" class="btn btn-warning btn-xs ajax-modal"><i class="fa fa-edit"></i> Edit</a>
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-xs btn-remove"><i class="fa fa-trash"></i> Delete</button>
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
    </div>
</div>
@endsection