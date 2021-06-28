@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('sliders.index') }}">Slider Items</a></li>
<li class="active">Slider View</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    Slider View
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered" width="100%">
                    <tbody style="text-align: center;">
                        <tr class="text-center">
                            <td colspan="2"><img src="{{ asset('/frontend/images/'.$slider->photo) }}" style="width: 200px; border-radius: 5px"></td>
                        </tr>
                        @if ($slider->title)
                        <tr class="text-center">
                            <td>Title</td>
                            <td>{{ $slider->title }}</td>
                        </tr>
                        @endif
                        @if ($slider->button1 && $slider->url_link1)
                        <tr class="text-center">
                            <td>First Button</td>
                            <td>
                                <a href="{{ $slider->url_link1 }}" class="label label-success">{{ $slider->button1 }}</a>
                            </td>
                        </tr>
                        @endif
                        @if ($slider->url_link2 && $slider->button2)
                        <tr class="text-center">
                            <td>Second Button</td>
                            <td>
                                <a href="{{ $slider->url_link2 }}" class="label label-success">{{ $slider->button2 }}</a>
                            </td>
                        </tr>
                        @endif
                        @if ($slider->details)
                        <tr>
                            <td>Summary</td>
                            <td>{{ $slider->details }}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection