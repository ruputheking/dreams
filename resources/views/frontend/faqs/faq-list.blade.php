@extends('layouts.frontend.main')

@section('title', 'Frequently Ask Question –')

@section('content')
<!-- Section: inner-header -->
<section>
    <div class="container pt-0 pb-0">
        <!-- Section Content -->
        <div class="section-content">
            <div class="row">
                <div class="col-md-6">
                    <ol class="breadcrumb text-left mt-10 mb-10 white">
                        <li><a href="{{ route('pages.home') }}"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">FAQs</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container pt-0 pb-0">
        <div class="pull-right">
            <a href="{{ route('faq.create') }}" class="ajaxload-popup btn btn-success btn-sm">Ask Question</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="accordio1" class="panel-group accordion transparent">
                    @foreach ($faqs as $key => $data)
                    <div class="panel">
                        <div class="panel-title"> <a @if($key != 0) class="collapsed" aria-expanded="false"
                            @else class="active" aria-expanded="true"
                            @endif data-parent="#accordio1" data-toggle="collapse" href="#accordion{{ $key }}"> <span class="open-sub"></span> <strong>Q. {{ $data->question }}</strong></a>
                        </div>
                        <div id="accordion{{ $key }}" class="panel-collapse collapse @if($key == 0) in @endif" role="tablist"
                        @if($key == 0) aria-expanded="true"
                        @else aria-expanded="false" style="height:0px" @endif>
                            <div class="panel-content">
                                <p>{{ $data->answer }}</p>
                            </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</section>
@endsection