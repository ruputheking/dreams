@extends('layouts.frontend.main')

@section('title', 'Gallery –')

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
                        <li class="active">Gallery</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Grid 3 -->
<section>
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Portfolio Filter -->
                    @php
                    $i = 1;
                    $k = 1;
                    @endphp
                    <div class="portfolio-filter">
                        <a href="#" class="active" data-filter="*">All</a>
                        @foreach (get_gallery_folder() as $data)
                        <a href="#{{ $data->title }}" class="" data-filter=".{{ $data->title }}">{{ $data->title }}</a>
                        @endforeach
                    </div>
                    <!-- End Portfolio Filter -->

                    <!-- Portfolio Gallery Grid -->
                    <div class="gallery-isotope default-animation-effect grid-3 gutter-small clearfix" data-lightbox="gallery">
                        <!-- Portfolio Item Start -->
                        @foreach (get_galleries() as $data)
                        <div class="gallery-item {{ $data->folder->title }}">
                            <div class="thumb">
                                <img class="img-fullwidth" style="height:217.400px" src="{{ $data->image_url }}" alt="{{ $data->image_name }}">
                                <div class="overlay-shade"></div>
                                <div class="text-holder">
                                    <div class="title text-center">{{ $data->image_name }}</div>
                                </div>
                                <div class="icons-holder">
                                    <div class="icons-holder-inner">
                                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                            <a href="{{ $data->image_url }}" data-lightbox-gallery="gallery" title="{{ $data->image_name }}"><i class="fa fa-picture-o"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- Portfolio Item End -->
                    </div>
                    <!-- End Portfolio Gallery Grid -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection