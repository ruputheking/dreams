@extends('layouts.frontend.main')

@section('content')
<div class="main-content">
    <!-- Section: home -->
    @include('frontend.home.page-slider')

    <!-- Section: About -->
    <section id="about">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="text-uppercase text-gray-darkgray mb-15">{{ get_option('journey-title') }}</h5>
                        <div class="double-line-bottom-theme-colored-2"></div>
                        {!! get_option('journey-details') !!}
                    </div>
                    <div class="col-md-6">
                        <div class="box-hover-effect about-video">
                            <div class="effect-wrapper">
                                <div class="thumb">
                                    <img class="img-responsive img-fullwidth" src="/frontend/images/{{ get_option('journey-poster') }}" alt="{{ get_option('journey-title') }}">
                                </div>
                                <div class="video-button"></div>
                                <a class="hover-link" data-lightbox-gallery="youtube-video" href="{{ get_option('journey-youtube') }}" title="Youtube Video">Youtube Video</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Courses -->
    <section id="courses" class="bg-silver-deep">
        <div class="container pb-40">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase title">Popular <span class="text-theme-colored2">Courses</span></h2>
                        <p class="text-uppercase mb-0">Choose Your Desired Course</p>
                        <div class="double-line-bottom-theme-colored-2"></div>
                    </div>
                </div>
            </div>
            <div class="row mtli-row-clearfix">
                <div class="owl-carousel-3col" data-nav="true">
                    @foreach(get_courses() as $course)
                    <div class="item">
                        <div class="course-single-item bg-white border-1px clearfix mb-30">
                            <div class="course-thumb">
                                <img class="img-fullwidth" alt="{{ $course->title }}" style="height:286.450px" src="/frontend/images/{{ $course->feature_image }}">
                                @if ($course->price)
                                <div class="price-tag">Rs {{ decimalPlace($course->price) }}</div>
                                @endif
                            </div>
                            <div class="course-details clearfix p-20 pt-15">
                                <div class="course-top-part pull-left mr-40">
                                    <a href="{{ route('course.show', $course->slug) }}">
                                        <h4 class="mt-0 mb-5">{{ $course->title }}</h4>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                                <p class="course-description mt-10" style="height:60px;overflow:hidden;">{{ Str::limit($course->summary, 144) }}</p>
                                <ul class="list-inline course-meta mt-15">
                                    @if ($course->duration)
                                    <li>
                                        <h6>{{ $course->duration }}</h6>
                                        <span> Course</span>
                                    </li>
                                    @endif
                                    @if ($course->duration || $course->total_credit)
                                    <li>
                                        <h6 class="text-center">{{ $course->comments->count() }}</h6>
                                        <span> Comments</span>
                                    </li>
                                    @endif
                                    @if ($course->total_credit)
                                    <li>
                                        <h6 class="text-center"><span class="course-time">{{ $course->total_credit }}</span></h6>
                                        <span> Credited </span>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Divider: Why Choose Us -->
    <section>
        <div class="container pt-30 pb-0">
            <div class="row">
                <div class="col-md-5">
                    <img class="img-fullwidth" src="/frontend/images/{{ get_option('why-choose-us') }}" alt="Why Choose Us">
                </div>
                <div class="col-md-7 pt-20">
                    <div class="row mtli-row-clearfix">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h2>Why <span class="text-theme-colored2">Choose</span> Us?</h2>
                            <div class="double-line-bottom-theme-colored-2 mb-30"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="icon-box left media p-0 mb-40">
                                <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-note2 text-theme-colored2 font-weight-600"></i></a>
                                <div class="media-body">
                                    <h4 class="media-heading heading mb-10">Popular Courses</h4>
                                    <p>{{ get_option('popular-courses') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="icon-box left media p-0 mb-40">
                                <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-notebook text-theme-colored2 font-weight-600"></i></a>
                                <div class="media-body">
                                    <h4 class="media-heading heading mb-10">Modern Book Library</h4>
                                    <p>{{ get_option('modern-book-library') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="icon-box left media p-0 mb-40">
                                <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-diamond text-theme-colored2 font-weight-600"></i></a>
                                <div class="media-body">
                                    <h4 class="media-heading heading mb-10">Qualified Teachers</h4>
                                    <p>{{ get_option('qualified-teacher') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="icon-box left media p-0 mb-40">
                                <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-bell text-theme-colored2 font-weight-600"></i></a>
                                <div class="media-body">
                                    <h4 class="media-heading heading mb-10">Update Notification</h4>
                                    <p>{{ get_option('update-notification') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="icon-box left media p-0 mb-40">
                                <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-musiclist text-theme-colored2 font-weight-600"></i></a>
                                <div class="media-body">
                                    <h4 class="media-heading heading mb-10">Entertainment Facilities</h4>
                                    <p>{{ get_option('entertainment-facilities') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="icon-box left media p-0 mb-40">
                                <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-global text-theme-colored2 font-weight-600"></i></a>
                                <div class="media-body">
                                    <h4 class="media-heading heading mb-10">Online Support</h4>
                                    <p>{{ get_option('online-support') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Team -->
    @if (get_faculty_members()->count() > 0)
    <section id="team" class="bg-silver-deep">
        <div class="container pb-40">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase title">Our <span class="text-theme-colored2">Faculty Member</span></h2>
                        <p class="text-uppercase mb-0">See Our faculty member and their contact</p>
                        <div class="double-line-bottom-theme-colored-2"></div>
                    </div>
                </div>
            </div>
            <div class="row mtli-row-clearfix">
                @foreach (get_faculty_members()->take(4) as $member)
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="team-members border-bottom-theme-colored2px text-center maxwidth400 mb-30">
                        <div class="team-thumb">
                            @if($member->photo)
                            <img class="img-fullwidth" alt="{{ $member->name }}" style="height:366.638px;" src="/frontend/images/{{ $member->photo }}">
                            @else
                            <img class="img-fullwidth" alt="{{ $member->name }}" style="height:366.638px;" src="/frontend/images/profile.png">
                            @endif
                            <div class="team-overlay"></div>
                            <ul class="styled-icons team-social icon-sm">
                                @if ($member->facebook)
                                <li><a href="{{ $member->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                @endif
                                @if ($member->twitter)
                                <li><a href="{{ $member->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                @endif
                                @if ($member->instagram)
                                <li><a href="{{ $member->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                @endif
                                @if ($member->skype)
                                <li><a href="{{ $member->skype }}"><i class="fab fa-skype"></i></a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="team-details">
                            <h4 class="text-uppercase text-theme-colored font-weight-600 m-5"><a href="{{ route('team_member.show', [$member->position->slug, $member->slug]) }}">{{ $member->name }}</a></h4>
                            <h6 class="text-gray font-13 font-weight-400 line-bottom-centered mt-0">{{ $member->position->title }}</h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Section: Gallery -->
    <section id="gallery" @if(get_faculty_members()->count() > 0) class="bg-silver-deep" @endif>
            <div class="container">
                <div class="section-title">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-uppercase title">Campus <span class="text-theme-colored2">Gallery</span></h2>
                            <p class="text-uppercase mb-0">See our gallery pictures</p>
                            <div class="double-line-bottom-theme-colored-2"></div>
                        </div>
                    </div>
                </div>
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
                                @foreach (get_galleries()->take(6) as $data)
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

    <!-- Divider: Reservation Form -->
    <section id="reservation" class="parallax layer-overlay overlay-theme-colored-9" data-bg-img="/frontend/images/distribution.jpg" data-parallax-ratio="0.4">
        <div class="container">
            <div class="row">
                <div class="col-md-8 sm-text-center">
                    <h3 class="text-white mt-30 mb-0">Get a Free online Registration</h3>
                    <h2 class="text-theme-colored2 font-54 mt-0">Register Now!</h2>
                    <p class="text-gray-darkgray font-15 pr-90 pr-sm-0 mb-sm-60">To help students learn to set definite goals; nurture their abilities, thereby bringing out the best in them; and help them develop a true sense of confidence.
                        Dreams
                        Academy provides free registration form to comment out on our post, events and for futher enquiry.</p>
                </div>
                <div class="col-md-4">
                    @guest
                    <div class="p-30 mt-0 bg-dark-transparent-2">
                        <h3 class="title-pattern mt-0"><span class="text-white">Register Now</span></h3>
                        <!-- Appilication Form Start-->
                        <form class="reservation-form mt-20" method="post" action="{{ route('register') }}" autocomplete="off" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-20">
                                        <input placeholder="Enter Name" name="name" required="" class="form-control" aria-required="true" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-20">
                                        <input placeholder="Email" name="email" class="form-control" required="" aria-required="true" type="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-20">
                                        <input placeholder="Phone" name="phone" class="form-control" required="" aria-required="true" type="number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-20">
                                        <input placeholder="Password" name="password" class="form-control" required="" aria-required="true" type="password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0 mt-10">
                                        <input class="form-control" type="hidden">
                                        <button type="submit" class="btn btn-colored btn-theme-colored2 text-white btn-lg btn-block" data-loading-text="Please wait...">Submit Request</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Application Form End-->
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </section>
    @if (get_testimonial()->count() > 0)
    <!-- Divider: Testimonials -->
    <section class="bg-silver-deep">
        <div class="container pt-70 pb-30">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase title">What <span class="text-theme-colored2">People </span>Say</h2>
                        <p class="text-uppercase mb-0">Student and Parents Opinion</p>
                        <div class="double-line-bottom-theme-colored-2"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-30">
                    <div class="owl-carousel-2col boxed" data-dots="true">
                        @foreach (get_testimonial() as $testimonial)
                        <div class="item">
                            <div class="testimonial pt-10">
                                <div class="thumb pull-left mb-0 mr-0">
                                    <img class="img-thumbnail img-circle" alt="{{ $testimonial->description }}" src="/frontend/images/{{ $testimonial->photo }}" width="110">
                                </div>
                                <div class="testimonial-content">
                                    <h4 class="mt-0 font-weight-300">{{ Str::limit($testimonial->description, 114) }}</h4>
                                    <h5 class="mt-10 font-16 mb-0">{{ $testimonial->name }}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Section: blog -->
    @include('frontend.partial.page-recent-news')
</div>
@endsection