<div class="container position-relative p-0 mt-90" style="max-width: 570px;">
    <h3 class="bg-theme-colored p-15 pt-10 mt-0 mb-0 text-white">Login Form</h3>
    <div class="section-content bg-white p-30">
        <div class="row">
            <div class="col-md-12">
                <!-- Register Form Starts -->
                <form class="reservation-form mb-0 bg-silver-deep p-30" method="post" action="{{ route('login') }}" novalidate="novalidate" autocomplete="off">
                    <h3 class="text-center mt-0 mb-30">Login Form</h3>
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group mb-30">
                                <input type="email" placeholder="Enter Email" value="{{ old('email') }}" name="email" class="form-control" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-30">
                                <input placeholder="Enter Your Password" name="password" required="" class="form-control" aria-required="true" type="password">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-0 mt-0">
                                <button type="submit" class="btn btn-colored btn-block btn-theme-colored2 text-white btn-lg btn-flat" data-loading-text="Please wait...">Login Now</button>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-15 text-center">
                                <p>Create new account? <a href="{{ route('register') }}" class="text-theme-colored2 text-underline">Register Now</a> </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <button title="Close (Esc)" type="button" class="mfp-close font-36">×</button>
</div>