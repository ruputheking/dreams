@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Compose Message</li>
@endsection

@section('content')
<div class="row">
    <form action="{{ route('messages.send') }}" class="validate" autocomplete="off" method="post" accept-charset="utf-8">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        Compose Message
                    </div>
                </div>
                <div class="panel-body">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">User Type <span class="required">*</span></label>
                            <select name="user_type" id="user_type" class="form-control select2" required>
                                <option value="">Select One</option>
                                <option value="Admin">Admin</option>
                                <option value="Student">Student</option>
                                <option value="Guardian">Parent</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Accountant">Accountant</option>
                                <option value="Receptionist">Receptionist</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 student-group">
                        <div class="form-group">
                            <label class="control-label">Select Class <span class="required">*</span></label>
                            <select name="class_id" onchange="getSection();" class="form-control select2">
                                <option value="">Select One</option>
                                {{ create_option('courses','id','title', old('class_id')) }}
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 student-group">
                        <div class="form-group">
                            <label class="control-label">Select Section <span class="required">*</span></label>
                            <select name="section_id" onchange="get_students();" id="section_id" class="form-control select2">
                                <option value="">Select One</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 student-group">
                        <div class="form-group">
                            <label class="control-label">Select Student <span class="required">*</span></label>
                            <select name="student_id" id="student_id" onchange="get_all_students();" class="form-control select2">
                                <option value="">Select One</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 general-group">
                        <div class="form-group">
                            <label class="control-label">Select Receiver <span class="required">*</span></label>
                            <select name="user_id" id="user_id" onchange="get_all_users();" class="form-control select2">
                                <option value="">Select One</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Subject <span class="required">*</span></label>
                            <input class="form-control" name="subject" value="{{ old('subject') }}" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Message <span class="required">*</span></label>
                            <textarea class="form-control summernote" name="body" required>{{ old('body') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">User List</div>
                <div class="panel-body" id="user_list">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).on('change', '#user_type', function() {
        var user_type = $(this).val();

        if (user_type == "Student") {
            $(".student-group").fadeIn();
            $(".general-group").css("display", "none");
            $("#student_id").prop("required", true);
            $("#user_id").prop("required", false);
        } else {
            $(".student-group").css("display", "none");
            $(".general-group").fadeIn();
            $("#student_id").prop("required", false);
            $("#user_id").prop("required", true);
            getUsers(user_type);
        }
    });

    function getUsers(type) {
        $.ajax({
            url: "{{ url('dashboard/users/get_users') }}/" + type,
            beforeSend: function() {
                $("#preloader").css("display", "block");
            },
            success: function(data) {
                $("#preloader").css("display", "none");
                var json = JSON.parse(data);
                $('select[name=user_id]').html("");
                $('#user_list').html("");

                jQuery.each(json, function(i, val) {
                    $('select[name=user_id]').append("<option value='" + val['id'] + "'>" + val['user_name'] + "</option>");
                });

                if ($('#user_id').has('option').length > 0) {
                    $('select[name=user_id]').prepend("<option value='all'>All " + type + "</option>");
                }
            }
        });
    }

    function getSection() {

        if ($('select[name=class_id]').val() != "") {
            var _token = $('input[name=_token]').val();
            var class_id = $('select[name=class_id]').val();
            $.ajax({
                type: "POST",
                url: "{{ url('dashboard/sections/section') }}",
                data: {
                    _token: _token,
                    course_id: class_id
                },
                beforeSend: function() {
                    $("#preloader").css("display", "block");
                },
                success: function(data) {
                    $("#preloader").css("display", "none");
                    $('select[name=section_id]').html(data);
                }
            });
        }
    }


    function get_students() {

        if ($("#user_type").val() == "Student" && $('select[name=section_id]').val() != "") {
            var class_id = "/" + $('select[name=class_id]').val();
            var section_id = "/" + $('select[name=section_id]').val();
            var link = "{{ url('dashboard/students/get_students') }}" + class_id + section_id;
            $.ajax({
                url: link,
                beforeSend: function() {
                    $("#preloader").css("display", "block");
                },
                success: function(data) {
                    $("#preloader").css("display", "none");
                    var json = JSON.parse(data);
                    $('select[name=student_id]').html("");
                    $('#user_list').html("");

                    jQuery.each(json, function(i, val) {
                        $('select[name=student_id]').append("<option value='" + val['author_id'] + "'>" + val['student_name'] + "</option>");
                    });

                    if ($('#student_id').has('option').length > 0) {
                        $('select[name=student_id]').prepend("<option value='all'>All Student</option>");
                    }
                }
            });
        }
    }

    function get_all_students() {
        if ($("#student_id").val() == "all") {
            var class_id = "/" + $('select[name=class_id]').val();
            var section_id = "/" + $('select[name=section_id]').val();
            var link = "{{ url('dashboard/students/get_students') }}" + class_id + section_id;
            $.ajax({
                url: link,
                beforeSend: function() {
                    $("#preloader").css("display", "block");
                },
                success: function(data) {
                    $("#preloader").css("display", "none");
                    var json = JSON.parse(data);
                    $('#user_list').html("");

                    jQuery.each(json, function(i, val) {
                        $('#user_list')
                            .append('<div class="col-md-12">' +
                                '<label class="c-container">' +
                                '<input type="checkbox" value="' + val['user_id'] + '" name="students[]" checked="true">' + val['student_name'] +
                                '<span class="checkmark"></span>' +
                                '</label>' +
                                '</div>');
                    });

                }
            });
        } else {
            $('#user_list').html("");
        }
    }

    function get_all_users() {
        if ($("#user_id").val() == "all") {
            var user_type = "/" + $('select[name=user_type]').val();
            var link = "{{ url('dashboard/users/get_users') }}" + user_type;
            $.ajax({
                url: link,
                beforeSend: function() {
                    $("#preloader").css("display", "block");
                },
                success: function(data) {
                    $("#preloader").css("display", "none");
                    var json = JSON.parse(data);
                    $('#user_list').html("");

                    jQuery.each(json, function(i, val) {
                        $('#user_list')
                            .append('<div class="col-md-12">' +
                                '<label class="c-container">' +
                                '<input type="checkbox" value="' + val['id'] + '" name="users[]" checked="true">' + val['user_name'] +
                                '<span class="checkmark"></span>' +
                                '</label>' +
                                '</div>');
                    });

                }
            });
        } else {
            $('#user_list').html("");
        }
    }
</script>
@stop