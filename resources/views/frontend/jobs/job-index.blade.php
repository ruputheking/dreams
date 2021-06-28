@extends('layouts.frontend.main')

@section('title', 'Jobs List –')

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
                        <li class="active">Jobs</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container pt-0 mt-4">
        <div class="row">
            <div class="col-md-9">
                @foreach ($jobs as $data)
                <div class="icon-box mb-0 p-0">
                    <h4 class="icon-box-title pt-15 mt-0 mb-0" style="font-size:1.5rem">{{ $data->title }}</h4>
                    <p class="text-gray">{{ $data->summary }}</p>
                    <a class="btn btn-dark btn-sm mt-15" href="{{ route('job.show', $data->slug) }}">Read More</a>
                    <hr class="mt-2 mb-2">
                </div>
                @endforeach
                <nav>
                    {{ $jobs->appends(request()->only(['term']))->links() }}
                </nav>
            </div>
            @include('frontend.partial.page-sidebar')
        </div>
    </div>
</section>
@endsection