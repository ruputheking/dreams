@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Staff Attendance</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Teacher Attendance
				</div>
			</div>
			<div class="panel-body">
				<form id="search_form" class="params-panel validate" action="{{ url('dashboard/staff/attendance') }}" method="post" autocomplete="off" accept-charset="utf-8">
					{{csrf_field()}}
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label">Role <span class="required">*</span></label>
							<select name="user_type" class="form-control select2" required>
								<option value="">Select One</option>
								<option @if($user_type=='2' ) selected
								@endif value="2">Teacher</option>
								<option @if($user_type=='5' ) selected
								@endif value="5">Accountant</option>
								<option @if($user_type=='6' ) selected
								@endif value="6">Receptionist</option>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="date" class="control-label">Date <span class="required">*</span></label>
							<div class="input-group" style="margin-top: 6px;">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="text" class="form-control datepicker" name="date" value="{{ $date }}" required>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<button type="submit" style="margin-top:38px;" class="btn btn-primary btn-block rect-btn">Manage Attendance</button>
						</div>
					</div>
				</form>
				@if( !empty($attendance) )
				<div class="col-md-12">
					<div class="panel-heading text-center">
						<div class="panel-title">
							Attendance Details<br>
							{{ date('d-M-Y', strtotime($date)) }}<br>
						</div>
					</div>
					<form action="{{url('dashboard/staff/attendance/save')}}" class="appsvan-submit-validate" method="post" accept-charset="utf-8">
						{{csrf_field()}}
						<table class="table table-bordered">
							<thead>
								<th>Name</th>
								<th><label class="c-container">Present<input type="checkbox" id="present_all" onclick="present(this)"><span class="checkmark"></span></label></th>
								<th><label class="c-container">Absent<input type="checkbox" id="absent_all" onclick="absent(this)"><span class="checkmark"></span></label></th>
								<th><label class="c-container">Late<input type="checkbox" id="late_all" onclick="late(this)"><span class="checkmark"></span></label></th>
								<th><label class="c-container">Holiday<input type="checkbox" id="holiday_all" onclick="holiday(this)"><span class="checkmark"></span></label></th>
							</thead>
							<tbody>
								@foreach($attendance AS $key => $data)
								<tr>
									<td>{{$data->user_name}}</td>
									<input type="hidden" name="date" value="{{$date}}">
									<input type="hidden" name="attendance_id[]" value="{{ $data->attendance_id }}">
									<input type="hidden" name="user_id[]" value="{{ $data->user_id }}">
									<td><label class="c-container"><input type="checkbox" name="attendance[{{$key}}][]" @if($data->attendance=='1') checked
											@endif value="1" class="present"><span class="checkmark"></span></td>
									<td><label class="c-container"><input type="checkbox" name="attendance[{{$key}}][]" @if($data->attendance=='2') checked
											@endif value="2" class="absent"><span class="checkmark"></span></td>
									<td><label class="c-container"><input type="checkbox" name="attendance[{{$key}}][]" @if($data->attendance=='3') checked
											@endif value="3" class="late"><span class="checkmark"></span></td>
									<td><label class="c-container"><input type="checkbox" name="attendance[{{$key}}][]" @if($data->attendance=='4') checked
											@endif value="4" class="holiday"><span class="checkmark"></span>
										</label></td>
								</tr>
								@endforeach
								<tr>
									<td colspan="100"><button type="submit" class="btn btn-primary pull-right">Save Attendance</button></td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$("input:checkbox").on('click', function() {
		var $box = $(this);
		if ($box.is(":checked")) {
			var group = "input:checkbox[name='" + $box.attr("name") + "']";
			$(group).prop("checked", false);
			$box.prop("checked", true);
		} else {
			$box.prop("checked", false);
		}
	});

	function present(source) {
		$(".absent,.late,.present,.holiday,#late_all,#absent_all,#holiday_all").prop("checked", false);
		var checkboxes = document.querySelectorAll('.present');
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i] != source)
				checkboxes[i].checked = source.checked;
		}
	}

	function absent(source) {
		$(".absent,.late,.present,.holiday,#present_all,#late_all,#holiday_all").prop("checked", false);
		var checkboxes = document.querySelectorAll('.absent');
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i] != source)
				checkboxes[i].checked = source.checked;
		}
	}

	function late(source) {
		$(".absent,.late,.present,.holiday,#present_all,#absent_all,#holiday_all").prop("checked", false);
		var checkboxes = document.querySelectorAll('.late');
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i] != source)
				checkboxes[i].checked = source.checked;
		}
	}

	function holiday(source) {
		$(".absent,.late,.present,.holiday,#present_all,#absent_all").prop("checked", false);
		var checkboxes = document.querySelectorAll('.holiday');
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i] != source)
				checkboxes[i].checked = source.checked;
		}
	}
</script>
@stop