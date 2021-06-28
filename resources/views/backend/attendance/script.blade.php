@role('admin')
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
            beforeSend: function() {
                $("#preloader").css("display", "block");
            },
            success: function(sections) {
                $("#preloader").css("display", "none");
                $('select[name=section_id]').html(sections);
            }
        });
        $.ajax({
            type: "POST",
            url: "{{url('dashboard/subjects/subject')}}",
            data: {
                _token: _token,
                course_id: course_id
            },
            beforeSend: function() {
                $("#preloader").css("display", "block");
            },
            success: function(subjects) {
                $("#preloader").css("display", "none");
                $('select[name=subject_id]').html(subjects);
            }
        });
    }
</script>
@endrole

@role(['teacher', 'c_teacher'])
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
                $('select[name=subject_id]').html("");
                $('select[name=section_id]').html(sections);
            }
        });


    }

    function getSubject() {
        var _token = $('input[name=_token]').val();
        var course_id = $('select[name=course_id]').val();
        var section_id = $('select[name=section_id]').val();
        $.ajax({
            type: "POST",
            url: "{{ url('dashboard/teacher/get_teacher_subject') }}",
            data: {
                _token: _token,
                course_id: course_id,
                section_id: section_id
            },
            success: function(subjects) {
                $('select[name=subject_id]').html(subjects);
            }
        });
    }
</script>
@endrole