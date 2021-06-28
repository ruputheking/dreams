@extends('layouts.frontend.main')

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
                            <li class="active">Download</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container mt-0 mb-30 pt-30 pb-30">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="blog-posts">
                        <div class="col-md-12">
                            <div class="row list-dashed">
                                @foreach ($downloads as $download)
                                <article class="post clearfix mb-30 pb-30">
                                    <div class="entry-content border-1px p-20 pr-10">
                                        <div class="entry-meta media mt-0 no-bg no-border">
                                            <div class="media-body pl-15">
                                                <div class="event-content pull-left flip">
                                                    <h4 class="entry-title text-capitalize m-0">{{ $download->document_name }}</a></h4>
                                                </div>
                                                <div class="event-content pull-right flip">
                                                    <a href="/frontend/images/downloads/{{ $download->document_file }}" download class="entry-title text-capitalize m-0 btn btn-primary btn-sm"><i class="fa fa-download"></i>
                                                        Download</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            <nav>
                                {{ $downloads->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection