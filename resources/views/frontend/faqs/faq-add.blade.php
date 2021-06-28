@extends('layouts.frontend.main')

@section('title', 'Ask Your Question –')

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
                        <li><a href="{{ route('pages.faq') }}"><i class="fa fa-home"></i> FAQs</a></li>
                        <li class="active">Ask Question</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container position-relative p-0 mt-0" style="max-width: 700px;">
        <div class="section-content bg-white p-30">
            <div class="row">
                <div class="col-md-12">
                    <!-- Appointment Form -->
                    <form class="" method="post" action="{{ route('faq.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group mb-10">
                                    <input name="name" class="form-control" type="text" value="{{ old('name') }}" required="" placeholder="Enter Name" aria-required="true">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mb-10">
                                    <input name="email" class="form-control required email" type="email" value="{{ old('email') }}" placeholder="Enter Email" aria-required="true">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mb-10">
                                    <input name="phone" class="form-control requireds" type="text" value="{{ old('phone') }}" placeholder="Enter Phone Number" aria-required="true">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-10">
                            <textarea name="question" class="form-control required" placeholder="Ask your question" rows="5" aria-required="true">{{ old('question') }}</textarea>
                        </div>
                        <div class="form-group mb-0 mt-20">
                            <button type="submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait...">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection