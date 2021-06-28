@extends('layouts.frontend.main')

@section('title', 'Admission –')

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
                        <li class="active">Admissions</li>
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
                <form action="{{ route('admission.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>First Name <small>*</small></label>
                                <input name="first_name" type="text" placeholder="Enter First Name" value="{{ old('first_name') }}" required="" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Last Name <small>*</small></label>
                                <input name="last_name" type="text" placeholder="Enter Last Name" value="{{ old('last_name') }}" required="" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Course</label>
                                <select class="form-control required" name="course_id">
                                    <option>Select One</option>
                                    @foreach ($courses as $data)
                                    <option @if($data->title == old('course_id')) selected
                                        @endif value="{{ $data->id }}">{{ $data->title }}
                                    </option>
                                    @endforeach
                                </select>
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
                                <label>Date of Birth <small>*</small></label>
                                <input class="form-control" type="date" name="birthday" value="{{ old('birthday') }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email <small>*</small></label>
                                <input name="email" class="form-control required email" type="email" placeholder="Enter Email" required value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone">Phone <small>*</small></label>
                                <input name="phone" class="form-control" type="text" placeholder="Enter Phone Number" required value="{{ old('phone') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Qualification <small>*</small></label>
                                <input type="text" name="qualification" value="{{ old('qualification') }}" required class="form-control" placeholder="Enter Qualification">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>PP Size Photo <small>*</small></label>
                                <input type="file" name="photo" class="file" data-show-upload="true" data-show-caption="true">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Attachment <span>*</span></label>
                                <input name="attachment" class="file" type="file" data-show-upload="true" data-show-caption="true">
                            </div>
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