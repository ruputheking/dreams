@extends('layouts.frontend.main')

@section('title', 'Contact Us –')

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
                            <li><a href="{{ route('pages.contact') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Contact Us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider: Contact -->
    <section class="divider">
        <div class="container pt-30 pb-70">
            <div class="row pt-10">
                <div class="col-md-5">
                    <h4 class="mt-0 mb-30 line-bottom-theme-colored-2">Find Our Location</h4>
                    <!-- Google Map HTML Codes -->
                    {!! get_option('map') !!}
                </div>
                <div class="col-md-7">
                    <h4 class="mt-0 mb-30 line-bottom-theme-colored-2">Interested in discussing?</h4>
                    <!-- Contact Form -->
                    <form name="contact_form" class="" action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-30">
                                    <input id="form_name" name="name" class="form-control" type="text" placeholder="Enter Name" required="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-30">
                                    <input id="form_email" name="email" class="form-control required email" type="email" placeholder="Enter Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-30">
                                    <input id="form_subject" name="subject" class="form-control required" type="text" placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-30">
                                    <input id="form_phone" name="phone" class="form-control" type="text" placeholder="Enter Phone">
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-30">
                            <textarea id="form_message" name="message" class="form-control required" rows="7" placeholder="Enter Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                            <button type="submit" class="btn btn-flat btn-theme-colored2 bg-hover-theme-colored mr-5" data-loading-text="Please wait...">Send your message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-60">
                <div class="col-sm-12 col-md-3">
                    <div class="contact-info text-center bg-silver-light border-1px pt-60 pb-60">
                        <i class="fa fa-phone font-36 mb-10 text-theme-colored2"></i>
                        <h4>Call Us</h4>
                        <h6 class="text-gray">Phone: {{get_option('official_phone')}}</h6>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="contact-info text-center bg-silver-light border-1px pt-60 pb-60">
                        <i class="fa fa-map-marker font-36 mb-10 text-theme-colored2"></i>
                        <h4>Address</h4>
                        <h6 class="text-gray">{{ get_option('address') }}</h6>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="contact-info text-center bg-silver-light border-1px pt-60 pb-60">
                        <i class="fa fa-envelope font-36 mb-10 text-theme-colored2"></i>
                        <h4>Email</h4>
                        <h6 class="text-gray">{{ get_option('official_email') }}</h6>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="contact-info text-center bg-silver-light border-1px pt-60 pb-60">
                        <i class="fa fa-fax font-36 mb-10 text-theme-colored2"></i>
                        <h4>Fax</h4>
                        <h6 class="text-gray">-</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection