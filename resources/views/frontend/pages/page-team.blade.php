@extends('layouts.frontend.main')

@section('title', 'Team Members –')

@section('content')
<div class="main-content">
    <!-- Section: inner-header -->
    <section>
        <div class="container pt-0 pb-0">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <ol class="breadcrumb text-left mt-10 mb-10 white">
                            <li><a href="{{ route('pages.home') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Team Members</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Team -->
    <section id="team" class="bg-silver-deep">
        <div class="container">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase title">Our Team<span class="text-theme-colored2"> Members</span></h2>
                        <div class="double-line-bottom-theme-colored-2"></div>
                    </div>
                </div>
            </div>
            <div class="row mtli-row-clearfix">
                @foreach (get_faculty_members() as $member)
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
</div>
@endsection