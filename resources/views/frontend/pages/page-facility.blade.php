@extends('layouts.frontend.main')

@section('title', 'Facility & Resources –')

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
                            <li class="active">Facility & Resources</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section About -->
    <section>
        <div class="container pt-40 pb-40">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-8">
                        {!! get_option('facility-and-resource') !!}
                    </div>
                    @include('frontend.pages.page-sidebar')
                </div>
            </div>
        </div>
    </section>
</div>
@endsection