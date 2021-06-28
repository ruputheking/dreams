@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('invoices.index') }}">Invoices</a></li>
<li class="active">Update</li>
@endsection

@section('content')
<div class="row">
	<form method="post" class="validate" autocomplete="off" action="{{route('invoices.update', $id)}}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input name="_method" type="hidden" value="PATCH">

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading panel-title">Update Invoice</div>

				<div class="panel-body">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Class <span class="required">*</span></label>
							<select name="course_id" id="course_id" class="form-control select2" onchange="getSection();" required>
								<option value="">Select One</option>
								{{ create_option('courses','id','title',$invoice->class_id) }}
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Section <span class="required">*</span></label>
							<select name="section_id" id="section_id" onchange="get_students();" class="form-control select2" required>
								<option value="">Select One</option>
								{{ create_option('sections','id','section_name',$invoice->section_id,array("course_id="=>$invoice->class_id)) }}
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Select Student <span class="required">*</span></label>
							<select name="student_id" id="student_id" class="form-control select2" onchange="get_all_students();" required>
								<option value="">Select One</option>
							</select>
						</div>
					</div>


					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Due Date <span class="required">*</span></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="text" class="form-control datepicker" name="due_date" value="{{ $invoice->due_date }}" required>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Title <span class="required">*</span></label>
							<input type="text" class="form-control" name="title" value="{{ $invoice->title }}" required>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Description</label>
							<textarea class="form-control" name="description">{{ $invoice->description }}</textarea>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Status <span class="required">*</span></label>
							<select class="form-control niceselect wide" name="status">
								<option {{ $invoice->status=="Unpaid" ? "selected" : "" }}>Unpaid</option>
								<option {{ $invoice->status=="Paid" ? "selected" : "" }}>Paid</option>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Total <span class="required">*</span></label>
							<input type="text" class="form-control" value="{{ $invoice->total }}" id="total" name="total" value="{{ old('total') }}" readOnly="true" required>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span>Invoice Items</span>
					<button type="button" class="btn btn-danger pull-right" id="add-item-row" style="margin-top:-7px;margin-left:10px;">Add New Row</button>
					<button type="submit" class="btn btn-primary pull-right" style="margin-top:-7px;">Save Invoice</button>
				</div>

				<div class="panel-body">

					<table class="table">
						<thead style="background:#dce9f9;">
							<th>Fee Type</th>
							<th style="text-align:left">{{ ('Amount')." ".get_option('currency_symbol') }}</th>
							<th style="text-align:left">{{ ('Discount')." ".get_option('currency_symbol') }}</th>
							<th style="text-align:left">{{ ('Total')." ".get_option('currency_symbol') }}</th>
						</thead>
						<tbody id="invoice">
							@foreach($invoiceItems as $item)
							<tr>
								<td width="40%">{!! get_fee_selectbox('select2',$item->fee_id) !!}</td>
								<td><input type="text" class="form-control float-field amount" name="amount[]" value="{{ $item->amount }}" required></td>
								<td><input type="text" class="form-control float-field discount" name="discount[]" value="{{ $item->discount }}" required></td>
								<td><input type="text" class="form-control float-field total" name="sub_total[]" value="{{ $item->amount-$item->discount }}" readOnly="true" required></td>
							</tr>
							@endforeach
						</tbody>
					</table>

				</div>

			</div>
		</div>

	</form>

	<table style="display:none;">
		<tr id="fee_row">
			<td width="40%">{!! get_fee_selectbox() !!}</td>
			<td><input type="text" value="0" class="form-control float-field amount" name="amount[]" required></td>
			<td><input type="text" value="0" class="form-control float-field discount" name="discount[]" required></td>
			<td><input type="text" value="0" class="form-control float-field total" name="sub_total[]" readOnly="true" required></td>
		</tr>
	</table>

</div>
@endsection

@section('scripts')
<script type="text/javascript">
	function getSection() {
		var _token = $('input[name=_token]').val();
		var course_id = $('select[name=course_id]').val();
		$.ajax({
			type: "POST",
			url: "{{ url('dashboard/sections/section') }}",
			data: {
				_token: _token,
				course_id: course_id
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


	function get_students() {
		var course_id = "/" + $('select[name=course_id]').val();
		var section_id = "/" + $('select[name=section_id]').val();
		var link = "{{ url('dashboard/students/get_students') }}" + course_id + section_id;
		$.ajax({
			url: link,
			beforeSend: function() {
				$("#preloader").css("display", "block");
			},
			success: function(data) {
				$("#preloader").css("display", "none");
				var json = JSON.parse(data);
				$('select[name=student_id]').html("");
				$('#student_list').html("");

				jQuery.each(json, function(i, val) {
					$('select[name=student_id]').append("<option value='" + val['id'] + "'>" + val['student_name'] + "</option>");
				});

			}
		});
	}

	get_students();
	$('select[name=student_id]').val("{{ $invoice->student_id }}");

	$(document).on('click', '#add-item-row', function() {
		var row = $("#fee_row").clone();
		$(row).removeAttr("id");
		$(row).find('select').select2();
		$("#invoice").append(row);
	});

	$(document).on('keyup', '.amount,.discount', function() {
		var amount = parseFloat($(this).closest("tr").find(".amount").val());
		var discount = parseFloat($(this).closest("tr").find(".discount").val());
		$(this).closest("tr").find(".total").val(amount - discount);

		//Show Total Amount
		var total = 0;
		jQuery("#invoice > tr").each(function() {
			var sub_total = parseFloat($(this).find(".total").val());
			total += sub_total;
		});

		$("#total").val(total);
	});
</script>
@stop