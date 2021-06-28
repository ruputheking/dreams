@extends('layouts.backend.main')

@section('header')
<li><a href="{{route('dashboard')}}">Dashboard</a></li>
<li class="active">Slider List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Slider List
                </div>
                <a href="{{ route('sliders.create') }}" class="pull-right btn btn-primary btn-sm" style="margin-top:-26px;">Add Slider</a>
            </div>
            <div class="panel-body no-export">
                <table class="table table-bordered data-table">
                    <thead>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Button First</th>
                        <th>Button Second</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($sliders AS $data)
                        <tr>
                            <td><img src="/frontend/images/{{ $data->photo }}" width="50" height="50" /></td>
                            <td>{{$data->title ?? 'Slider'}}</td>
                            <td>
                                @if ($data->button1)
                                <a href="{{ $data->url_link1 ?? '#' }}" class="label label-success">{{$data->button1}}</a>
                                @else
                                -
                                @endif
                            </td>
                            <td>
                                @if ($data->button2)
                                <a href="{{ $data->url_link2 }}" class="label label-success">{{$data->button2}}</a>
                                @else
                                <span class="text-center">-</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{route('sliders.destroy', $data->id)}}" method="post">
                                    <a href="{{ route('sliders.show', $data->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="{{route('sliders.edit',$data->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-xs btn-remove"><i class="fa fa-eraser" aria-hidden="true"></i></button>
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
@endsection