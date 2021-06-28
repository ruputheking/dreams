@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Student ID Card</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="panel-title">
					Student ID Card
				</span>
			</div>
			<div class="panel-body">
				<form id="search_form" class="params-panel validate" action="{{ url('dashboard/reports/student_id_card/view') }}" method="post" autocomplete="off" accept-charset="utf-8">
					@csrf
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label">Course <span class="required">*</span></label>
							<select name="class_id" class="form-control select2" onChange="getData(this.value);" required>
								<option value="">Select One</option>
								{{ create_option('courses','id','title',$class_id) }}
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label">Section <span class="required">*</span></label>
							<select name="section_id" class="form-control select2" onchange="get_students();" required>
								<option value="">Select One</option>
								{{ create_option('sections','id','section_name',$section_id,array("course_id="=>$class_id)) }}
							</select>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label">Select Student <span class="required">*</span></label>
							<select name="student_id" id="student_id" class="form-control select2">
								<option value="">Select One</option>
							</select>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							<button type="submit" style="margin-top:38px;" class="btn btn-primary btn-block rect-btn">Show ID Card</button>
						</div>
					</div>
				</form>

				@if( isset($student) )
				<div class="col-md-12 params-panel">
					<div id="id_card">
						<div class="card_header">
							<h5>{{ get_option('welcome_txt')}}</h5>
							<p>STUDENT IDENTITY CARD</p>
						</div>
						<div class="image">
							<img width="80px" src="{{ asset('frontend/images/'.$student->photo) }}">
							<p><span>{{ $student->student_name }}</span></p>
						</div>
						<div class="id-card">
							<p>
								<span class="lbl">Course :</span>
								<span>{{ $student->title }}</span>
							</p>

							<p>
								<span class="lbl">Section :</span>
								<span>{{ $student->section_name }}</span>
							</p>
							<p>
								<span class="lbl">Academic Year :</span>
								<span>{{ get_academic_year() }}</span>
							</p>
						</div>

						<div class="card_footer">
							<p>Emergency Contact : {{ get_option('official_phone') }}</p>
						</div>

					</div>

					<p>&nbsp;</p>
					<div class="col-md-4 col-md-offset-4">
						<button type="button" class="btn btn-primary btn-block print" data-print="id_card">Print ID Card</button>
					</div>

				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	function getData(val) {
		var _token = $('input[name=_token]').val();
		var class_id = $('select[name=class_id]').val();
		$.ajax({
			type: "POST",
			url: "{{url('dashboard/sections/section')}}",
			data: {
				_token: _token,
				course_id: class_id
			},
			beforeSend: function() {
				$("#preloader").css("display", "block");
			},
			success: function(sections) {
				$("#preloader").css("display", "none");
				$('select[name=section_id]').html(sections);
			}
		});
	}

	function get_students() {

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

				jQuery.each(json, function(i, val) {
					$('select[name=student_id]').append("<option value='" + val['id'] + "'>" + val['student_name'] + "</option>");
				});

			}
		});
	}
</script>
@stop