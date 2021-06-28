@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Assign Subjects</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Assign Subjects
                </div>
            </div>
            <div class="panel-body">
                <form id="search_form" action="" class="form-horizontal" method="post" autocomplete="off" accept-charset="utf-8">
                    {{csrf_field()}}

                    <div class="form-group {{ $errors->has('course_id') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                            <label class="control-label">Course <span class="required">*</span></label>
                            <select name="course_id" class="form-control select2" onChange="getData(this.value);" required>
                                <option value="">Select One</option>
                                {{ create_option('courses','id','title',old('course_id')) }}
                            </select>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('section_id') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                            <label class="control-label">Section <span class="required">*</span></label>
                            <select name="section_id" class="form-control select2" required>
                                <option value="">Select One</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" data-target="#search">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Assign Subjects
                </div>
            </div>
            <div class="panel-body no-export">
                <form id="assign_teacher_form" action="{{route('assignsubjects.store')}}" method="post">
                    {{csrf_field()}}
                    <table class="table table-bordered">
                        <thead>
                            <th>Subject</th>
                            <th>Teacher</th>
                        </thead>
                        <tbody id="list">

                        </tbody>
                    </table>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<!--  jQuery Validation   -->
<script type="text/javascript" src="{{ asset('backend') }}/js/jquery.validate.min.js"></script>

<script type="text/javascript">
    function getData(val) {
        var _token = $('input[name=_token]').val();
        var course_id = $('select[name=course_id]').val();
        $.ajax({
            type: "POST",
            url: "{{url('dashboard/sections/section')}}",
            data: {
                _token: _token,
                course_id: course_id
            },
            success: function(sections) {
                $('select[name=section_id]').html(sections);
            }
        });
    }
    $("#search_form").validate({
        submitHandler: function(form) {
            search();
            return false;
        },
        invalidHandler: function(form, validator) {},
        errorPlacement: function(error, element) {}
    });


    $(document).on('click', '#assign_teacher', function() {
        $(this).prop("disabled", true);
        $.ajax({
            type: "POST",
            url: $("#assign_teacher_form").attr("action"),
            data: $("#assign_teacher_form").serialize(),
            beforeSend: function() {
                $("#assign_teacher").html('<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>');
            },
            success: function(data) {
                var json = JSON.parse(JSON.stringify(data));
                if (json['result'] == "success") {
                    search();
                    Command: toastr["success"](json['message']);
                }
                $("#assign_teacher").html('Save');
                $("#assign_teacher").attr('disabled', false);
            }
        });
        return false;
    });


    function search() {
        $.ajax({
            type: "POST",
            url: "{{url('dashboard/assignsubjects/search')}}",
            data: $("#search_form").serialize(),
            success: function(data) {
                $('#list').html(data);
                $(".select2").select2();
            }
        });
    }
</script>
@stop