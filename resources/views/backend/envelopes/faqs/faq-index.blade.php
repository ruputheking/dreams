@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Frequently Asked Question</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">All Question</span>
            </div>

            <div class="panel-body">
                <div class="content-block box">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($faqs as $faq)
                                <tr>
                                    <td>{{ $faq->name }}</td>
                                    <td>{{ $faq->email }}</td>
                                    <td>{{ $faq->phone }}</td>
                                    <td>
                                        @if ($faq->status == 0)
                                        <label class="label label-success">Active</label>
                                        @endif
                                        @if ($faq->status == 1)
                                        <label class="label label-warning">Disable</label>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Delete Button -->
                                        <form action="{{route('testimonials.destroy', $faq->id)}}" method="post">
                                            <a href="{{route('faqs.show', $faq->id)}}" data-title="View Question" class="btn btn-primary btn-xs ajax-modal"><i class="fa fa-eye"></i> View</a>
                                            <a href="{{route('faqs.reply', $faq->id)}}" data-title="Answer The Question" class="btn btn-warning btn-xs ajax-modal"><i class="fa fa-reply"></i> Reply</a>
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