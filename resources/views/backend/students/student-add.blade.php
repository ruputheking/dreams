@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('students.index') }}">Student</a></li>
<li class="active">Add New Student</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Add New Student
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <form action="{{route('students.store')}}" autocomplete="off" class="form-group" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{csrf_field()}}
                        <div class="col-md-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label">Student Name <span class="required">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name">
                        </div>
                        <div class="col-md-12">
                            <label class="control-label">Guardian <span class="required">*</span></label>
                        </div>
                        <div class="col-sm-11">
                            <select name="guardian" id="guardian" class="form-control">
                            </select>
                        </div>
                        <a style="margin-top:6px" href="{{route('parents.create')}}" data-title="Add New Parent" class="btn btn-primary btn-sm ajax-modal"><i class="fa fa-plus"></i>Quick Add</a>

                        <div class="col-md-6 {{ $errors->has('class') ? ' has-error' : '' }}">
                            <label class="control-label">Course <span class="required">*</span></label>
                            <select name="class" class="form-control select2" id="class">
                                <option value="">Select One</option>
                                {{ create_option('courses','id','title',old('class')) }}
                            </select>
                        </div>
                        <div class="col-md-6 {{ $errors->has('section') ? ' has-error' : '' }}">
                            <label class="control-label">Section <span class="required">*</span></label>
                            <select name="section" class="form-control select2" id="section">
                                <option value="">Select One</option>
                                @foreach($sections AS $data)
                                <option @if($data->id == old('section')) selected
                                    @endif data-class="{{$data->course_id}}" value="{{$data->id}}">{{$data->section_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="control-label">Phone <span class="required">*</span></label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Mobile Number">
                        </div>
                        <div class="col-md-6 {{ $errors->has('birthday') ? ' has-error' : '' }}">
                            <label class="control-label">Birthday <span class="required">*</span></label>
                            <input type="text" class="form-control datepicker" name="birthday" value="{{ old('birthday') }}" placeholder="Date of Birth">
                        </div>
                        <div class="col-md-6 {{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label class="control-label">Gender <span class="required">*</span></label>
                            <select name="gender" class="form-control select2">
                                <option value="">Select One</option>
                                <option @if(old('gender') == 'Male') selected
                                @endif value="Male">Male</option>
                                <option @if(old('gender') == 'Female') selected
                                @endif value="Female">Female</option>
                                <option @if(old('gender') == 'Other') selected
                                @endif value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 {{ $errors->has('religion') ? ' has-error' : '' }}">
                            <label class="control-label">Religion <span class="required">*</span></label>
                            <select name="religion" class="form-control select2">
                                <option value="">Select One</option>
                                {{ create_option("picklists","value","value",old('religion')) }}
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label">Blood Group</label>
                            <select name="blood_group" class="form-control select2" required>
                                <option value="">Select One</option>
                                <option @if(old('blood_group') == 'A+') selected
                                @endif value="A+">N/A</option>
                                <option @if(old('blood_group') == 'A+') selected
                                @endif value="A+">A+</option>
                                <option @if(old('blood_group') == 'A-') selected
                                @endif value="A-">A-</option>
                                <option @if(old('blood_group') == 'B+') selected
                                @endif value="B+">B+</option>
                                <option @if(old('blood_group') == 'B-') selected
                                @endif value="B-">B-</option>
                                <option @if(old('blood_group') == 'AB+') selected
                                @endif value="AB+">AB+</option>
                                <option @if(old('blood_group') == 'AB-') selected
                                @endif value="AB-">AB-</option>
                                <option @if(old('blood_group') == 'O+') selected
                                @endif value="O+">O+</option>
                                <option @if(old('blood_group') == 'O-') selected
                                @endif value="O-">O-</option>
                            </select>
                        </div>
                        <div class="col-md-12 {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="control-label">Address <span class="required">*</span></label>
                            <input class="form-control" name="address" value="{{ old('address') }}" placeholder="Current Address">
                        </div>
                        <div class="col-md-6 {{ $errors->has('citizenship_no') ? ' has-error' : '' }}">
                            <label class="control-label">Citizenship Number <span class="required">*</span></label>
                            <input class="form-control" name="citizenship_no" value="{{ old('citizenship_no') }}" placeholder="Citizenship Number">
                        </div>
                        <div class="col-md-6 {{ $errors->has('passport') ? ' has-error' : '' }}">
                            <label class="control-label">Passport Number</label>
                            <input class="form-control" name="passport" value="{{ old('passport') }}" placeholder="Passport Number">
                        </div>
                        <div class="col-md-12">
                            <label class="control-label">Remarks</label>
                            <input type="text" class="form-control" name="remarks" value="{{ old('remarks') }}" placeholder="Remarks">
                        </div>

                        <div class="col-md-12">
                            <hr>
                            <div class="page-header">
                                <h4>Login Details</h4>
                            </div>
                        </div>

                        <div class="col-md-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label">Email <span class="required">*</span></label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address">
                        </div>
                        <div class="col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="control-label">Password <span class="required">*</span></label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="col-md-6 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="control-label">Confirm Password <span class="required">*</span></label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                        </div>

                        <div class="col-md-12 {{ $errors->has('image') ? ' has-error' : '' }}">
                            <label class="control-label">Profile Picture</label>
                            <input type="file" class="form-control dropify" name="image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                        </div>

                        <div class="col-sm-5" style="margin-top:20px;">
                            <button type="submit" class="btn btn-info">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@role(['admin'])
<script type="text/javascript">
    $(window).on('load', function() {
        $("#section").next().find("ul li").css("display", "none");
        $(document).on("change", "#class", function() {
            $("#section").next().find("ul li").css("display", "none");
            var course_id = $(this).val();
            $('#section option[data-class="' + course_id + '"]').each(function() {
                var section_id = $(this).val();
                $("#section").next().find("ul li[data-value='" + section_id + "']").css("display", "block");
            });
        });

        $('#guardian').select2({
            placeholder: "Select One",

            ajax: {
                dataType: "json",
                url: "{{ url('dashboard/parents/get_parents/list') }}",
                delay: 400,
                data: function(params) {
                    return {
                        term: params.term
                    }
                },
                processResults: function(data, page) {
                    return {
                        results: data
                    };
                },
            }
        });

    });
</script>
@endrole
@endsection