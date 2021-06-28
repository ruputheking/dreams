@extends('layouts.frontend.main')

@section('title', $faculty->name . ' |')

@section('content')
<section>
    <div class="container pt-0 pb-0">
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb text-left mt-10 mb-10 white">
                        <li><a href="{{ route('pages.home') }}"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="{{ route('pages.team') }}">Team Members</a></li>
                        <li class="active">{{ $faculty->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="thumb">
                        @if($faculty->photo)
                        <img src="/frontend/images/{{ $faculty->photo }}" style="height:360px;width: 360px" alt="{{ $faculty->name }}">
                        @else
                        <img src="/frontend/images/profile.png" style="height:360px;width: 360px" alt="{{ $faculty->name }}">
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <h4 class="name font-24 mt-0 mb-0">{{ $faculty->name }}</h4>
                    <h5 class="mt-5">{{ $faculty->position->title }}</h5>
                    {!! $faculty->details !!}
                    <ul class="styled-icons icon-dark icon-theme-colored2 icon-sm mt-15 mb-0 p-0">
                        @if ($faculty->facebook)
                        <li><a href="{{ $faculty->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                        @endif
                        @if ($faculty->twitter)
                        <li><a href="{{ $faculty->twitter }}"><i class="fab fa-twitter"></i></a></li>
                        @endif
                        @if ($faculty->instagram)
                        <li><a href="{{ $faculty->instagram }}"><i class="fab fa-instagram"></i></a></li>
                        @endif
                        @if ($faculty->skype)
                        <li><a href="{{ $faculty->skype }}"><i class="fab fa-skype"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection