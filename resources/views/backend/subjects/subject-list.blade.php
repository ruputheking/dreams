@extends('layouts.admin')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Subject</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading clearfix">
                <div class="panel-title pull-left">Subjects List</div>
                <div class="col-md-2 pull-right" style="margin-top:-3px">
                    <select id="class" class="select_class select2 pull-right" onchange="showClass(this);">
                        <option value="">Select Course</option>
                        {{ create_option('courses','id','title',$class) }}
                    </select>
                </div>
            </div>
            <div class="panel-body no-export">
                <table class="table table-bordered data-table">
                    <thead>
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Course</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse($subjects AS $data)
                        <tr>
                            <td>{{ $data->subject_name }}</td>
                            <td>{{ $data->subject_code }}</td>
                            <td>{{ $data->class_name }}</td>
                            <td>
                                <form action="{{route('subjects.destroy',$data->id)}}" method="post">
                                    <a href="{{route('subjects.edit',$data->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    {{ method_field('DELETE') }}
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-danger btn-xs btn-remove"><i class="fa fa-eraser" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center"> No data found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function showClass(elem) {
        if ($(elem).val() == "") {
            return;
        }
        window.location = "<?php echo url('dashboard/subjects/class') ?>/" + $(elem).val();
    }
</script>
@endsection