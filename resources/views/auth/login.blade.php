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
                        <li class="active">Login</li>
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
                <h3 class="text-center text-theme-colored mb-20 mt-0">Login</h3>
                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ old('email') }}" autocomplete="email autofocus" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" required />
                    </div>
                    <div class="form-footer pb-4">
                        <a href="{{ route('password.request') }}" class="lost-link font-secondary">Lost your password?</a>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection