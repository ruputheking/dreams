@extends('layouts.frontend.main')

@section('title', 'Events –')

@section('content')
<!-- Section: inner-header -->
<section>
    <div class="container pt-0 pb-0">
        <!-- Section Content -->
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb text-left mt-10 mb-10 white">
                        <li><a href="{{ route('pages.home') }}"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Events</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: event calendar -->
<section>
    <div class="container pt-30">
        <div class="row">
            <div class="col-md-12">
                @foreach ($events as $data)
                <div class="upcoming-events bg-white-f3 mb-20">
                    <div class="row">
                        <div class="col-sm-3 pr-0 pr-sm-15">
                            <div class="thumb p-15">
                                <img class="img-fullwidth" src="/frontend/images/{{ $data->file_1 }}" alt="{{ $data->title }}" style="height:195px;width:265px">
                            </div>
                        </div>
                        <div class="col-sm-6 pl-0 pl-sm-15">
                            <div class="event-details p-15 mt-20">
                                <h4 class="media-heading text-uppercase font-weight-500">{{ $data->title }}</h4>
                                <p>{{ Str::limit($data->quote, 120) }}</p>
                                <a href="{{ route('event.show', $data->slug) }}" class="btn btn-flat btn-dark btn-theme-colored btn-sm">Details <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="event-count p-15 mt-15">
                                <ul class="event-date list-inline font-16 text-uppercase mt-10 mb-20">
                                    <li class="p-15 mr-5 bg-lightest">{{ $data->month() }}</li>
                                    <li class="p-15 pl-20 pr-20 mr-5 bg-lightest"> {{ $data->day() }}</li>
                                    <li class="p-15 bg-lightest">{{ $data->year() }}</li>
                                </ul>
                                <ul>
                                    <li class="mb-10 text-theme-colored"><i class="fa fa-clock-o mr-5"></i> at {{ $data->start_time() }} - {{ $data->end_time() }}</li>
                                    <li class="text-theme-colored"><i class="fa fa-map-marker mr-5"></i> {{ $data->location }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="row">
                    <div class="col-sm-12">
                        <nav>
                            {{ $events->appends(request()->only(['term']))->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection