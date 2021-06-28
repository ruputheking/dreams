@extends('layouts.frontend.main')

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
                        <li class="active">Register</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="divider bg-silver-deep">

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6 col-md-offset-3 bg-lightest-transparent p-30 pt-0">
                <form class="reservation-form mb-0 bg-silver-deep p-30 pt-0" method="post" action="{{ route('register') }}" novalidate="novalidate">
                    @csrf
                    <h3 class="text-center mt-0 mb-30">Register your new account!</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group mb-30">
                                <input placeholder="Full Name" name="name" value="{{ old('name') }}" required class="form-control" aria-required="true" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-30">
                                <input placeholder="Email Address" name="email" value="{{ old('email') }}" class="form-control" required aria-required="true" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-30">
                                <input placeholder="Phone Number" name="phone" value="{{ old('phone') }}" class="form-control" required aria-required="true" type="number">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-30">
                                <input placeholder="Your Password" name="password" required="" class="form-control" aria-required="true" type="password">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-30">
                                <input placeholder="Confirm Password" name="password_confirmation" required="" class="form-control" aria-required="true" type="password">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-0 mt-0">
                                <input class="form-control" value="" type="hidden">
                                <button type="submit" class="btn btn-colored btn-block btn-theme-colored2 text-white btn-lg btn-flat" data-loading-text="Please wait...">Submit Now</button>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-15 text-center">
                                <p>Already have an account? <a href="{{ route('login') }}" class="text-theme-colored2 text-underline">Sign In Here</a> </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection