@extends('layouts.frontend.main')

@section('title', $event->title . ' |')

@section('meta')
<meta name="keywords" content="{{ $event->seo_meta_keywords ?? $event->title }}">
<meta name="description" content="{{ $event->seo_meta_description ?? $event->quote }}">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $event->seo_meta_keywords ?? $event->title }}">
<meta name="twitter:description" content="{{ $event->seo_meta_description ?? $event->quote }}">
<meta name="twitter:image" content="{{asset('/frontend/images/'. $event->file_1)}}">

<!-- Facebook -->
<meta property="og:url" content="{{ request()->url() }}">
<meta property="og:title" content="{{ $event->seo_meta_keywords ?? $event->title }}">
<meta property="og:description" content="{{ $event->seo_meta_description ?? $event->summary }}">
<meta property="og:type" content="article">
<meta property="og:image" content="{{ asset('/frontend/images/'. $event->file_1) }}">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1000">
<meta property="og:image:height" content="500">
@endsection

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
                        <li><a href="{{ route('pages.event') }}">Events</a></li>
                        <li class="active">{{ $event->title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="container  bg-theme-colored  pt-0 pb-0">
        <div class="row">
            <div class="col-md-12 clearfix">
                <h3 id="basic-coupon-clock" class="text-white mt-2 mb-2 pull-left"></h3>
                <a href="{{ route('event.register', $event->slug) }}" class="btn btn-success pull-right" style="margin-top: 9px">Register Now</a>
                <!-- Final Countdown Timer Script -->
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#basic-coupon-clock').countdown('{{ $event->starting_date }}', function(event) {
                            $(this).html(event.strftime('%D days %H:%M:%S'));
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 clearfix pb-3 post">
                <ul>
                    <li>
                        <h5>Topics:</h5>
                        <p>{{ $event->title }}</p>
                    </li>
                    <li>
                        <h5>Host:</h5>
                        <p>{{ $event->host }}</p>
                    </li>
                    <li>
                        <h5>Location:</h5>
                        <p>{{ $event->location }}</p>
                    </li>
                    <li>
                        <h5>Time:</h5>
                        <p>{{ $event->start_time() }} - {{ $event->end_time() }}</p>
                    </li>
                    <li>
                        <h5>Start Date:</h5>
                        <p>{{ $event->starting_date }}</p>
                    </li>
                    <li>
                        <h5>End Date:</h5>
                        <p>{{ $event->ending_date }}</p>
                    </li>
                    <li>
                        <h5>Share:</h5>
                        <div class="styled-icons icon-sm icon-gray icon-circled">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('event.show', $event->slug) }}" target="_blank"
                                onclick="javascript:window.open(this.href, '', 'menubar=no, toolbar=no, resizable=yes,scrollbars=yes, height:600;width:600)"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.twitter.com/share?url={{ route('event.show', $event->slug) }}" target="_blank"
                                onclick="javascript:window.open(this.href, '', 'menubar=no, toolbar=no, resizable=yes,scrollbars=yes, height:600;width:600)"><i class="fab fa-twitter"></i></a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="owl-carousel-1col" data-nav="false">
                    @if ($event->file_1)
                    <div class="item"><img src="/frontend/images/{{ $event->file_1 }}" alt="{{ $event->title }}" style="height:480px;width:755px;"></div>
                    @endif
                    @if ($event->file_2)
                    <div class="item"><img src="/frontend/images/{{ $event->file_2 }}" alt="{{ $event->title }}" style="height:480px;width:755px;"></div>
                    @endif
                    @if ($event->file_3)
                    <div class="item"><img src="/frontend/images/{{ $event->file_3 }}" alt="{{ $event->title }}" style="height:480px;width:755px;"></div>
                    @endif
                    @if ($event->file_4)
                    <div class="item"><img src="/frontend/images/{{ $event->file_4 }}" alt="{{ $event->title }}" style="height:480px;width:755px;"></div>
                    @endif
                    @if ($event->file_5)
                    <div class="item"><img src="/frontend/images/{{ $event->file_5 }}" alt="{{ $event->title }}" style="height:480px;width:755px;"></div>
                    @endif
                    @if ($event->file_6)
                    <div class="item"><img src="/frontend/images/{{ $event->file_6 }}" alt="{{ $event->title }}" style="height:480px;width:755px;"></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <h2 id="basic-coupon-clock" class="text-white"></h2>
                <!-- Final Countdown Timer Script -->
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#basic-coupon-clock').countdown('{{ $event->starting_date }}', function(event) {
                            $(this).html(event.strftime('%D days %H:%M:%S'));
                        });
                    });
                </script>
            </div>
        </div>
        <div class="row mt-60">
            <div class="col-md-12">
                <h4 class="mt-0">Event Description</h4>
                <p>{!! $event->details !!}</p>
            </div>
        </div>
        <div class="row mt-40">
            <div class="col-md-12">
                <h4 class="mb-20">Keynote Speakers</h4>
                <div class="owl-carousel-6col" data-nav="true">
                    @foreach ($event->speakers as $data)
                    <div class="item">
                        <div class="attorney">
                            <div class="thumb"><img src="/frontend/images/{{ $data->photo }}" alt="{{ $data->name }}"></div>
                            <div class="content text-center">
                                <h5 class="author mb-0"><a class="text-theme-colored" href="{{ $data->facebook ?? '#' }}">{{ $data->name }}</a></h5>
                                @if ($data->position)
                                <h6 class="title text-gray font-12 mt-0 mb-0">{{ $data->position }}</h6>
                                @endif
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