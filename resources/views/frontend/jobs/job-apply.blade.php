@extends('layouts.frontend.main')

@section('title', 'Apply for ' . $job->title . ' –')

@section('meta')
<meta name="keywords" content="{{ $job->seo_meta_keywords ?? $job->title }}">
<meta name="description" content="{{ $job->seo_meta_description ?? $job->summary }}">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $job->seo_meta_keywords ?? $job->title }}">
<meta name="twitter:description" content="{{ $job->seo_meta_description ?? $job->summary }}">
<meta name="twitter:image" content="{{asset('/frontend/images/'. get_option('image'))}}">

<!-- Facebook -->
<meta property="og:url" content="{{ request()->url() }}">
<meta property="og:title" content="{{ $job->seo_meta_keywords ?? $job->title }}">
<meta property="og:description" content="{{ $job->seo_meta_description ?? $job->summary }}">
<meta property="og:type" content="article">
<meta property="og:image" content="{{asset('/frontend/images/'. get_option('image')) }}">
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
                        <li><a href="{{ route('pages.job') }}">Jobs</a></li>
                        <li><a href="{{ route('job.show', $job->slug) }}">{{ $job->title }}</a></li>
                        <li class="active">Apply</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Job Apply Form -->
<section class="divider bg-silver-deep">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 bg-lightest-transparent p-30 pt-10">
                <h3 class="text-center text-theme-colored mb-20">Apply Now</h3>
                <form action="{{ route('job.store', $job->slug) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Name <small>*</small></label>
                                <input name="name" type="text" placeholder="Enter Name" required="" value="{{ old('name') }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email <small>*</small></label>
                                <input name="email" class="form-control required email" type="email" placeholder="Enter Email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone">Phone <small>*</small></label>
                                <input name="phone" class="form-control required" type="phone" placeholder="Enter Phone" value="{{ old('phone') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date of Birth <small>*</small></label>
                                <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Current Address <small>*</small></label>
                                <input class="form-control" type="text" name="address" value="{{ old('address') }}" required placeholder="Enter Current Address">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Gender <small>*</small></label>
                                <select name="gender" class="form-control required">
                                    <option value="">Select One</option>
                                    <option @if(old('gender') == 'Male') selected
                                    @endif value="Male">Male</option>
                                    <option @if(old('gender') == 'Female') selected
                                    @endif value="Female">Female</option>
                                    <option @if(old('gender') == 'Others') selected
                                    @endif value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Qualification <small>*</small></label>
                                <input class="form-control" type="text" name="qualification" value="{{ old('qualification') }}" placeholder="Your Qualification" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Previous Job <small>*</small></label>
                                <input class="form-control" type="text" name="previous_job" value="{{ old('previous_job') }}" placeholder="Enter Previous Job" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Experience <small>*</small></label>
                                <input class="form-control" type="text" name="experience" value="{{ old('experience') }}" placeholder="Your Experience" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Message <small>*</small></label>
                        <textarea name="message" class="form-control required" rows="5" placeholder="Your cover letter/message sent to the employer"></textarea>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>PP Size Photo</label>
                            <input name="photo" class="file" type="file" data-show-upload="false" data-show-caption="true">
                            <small>Maximum upload file size: 12 MB</small>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>C/V Upload</label>
                            <input name="attachment" class="file" type="file" data-show-upload="false" data-show-caption="true">
                            <small>Maximum upload file size: 12 MB</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" data-loading-text="Please wait...">Apply Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection