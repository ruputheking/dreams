@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">My Invoice List</li>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="panel-title">My Invoice List</span>
				<a class="btn btn-primary btn-sm pull-right" data-title="Add New Invoice" href="{{route('invoices.create')}}">Add New</a>
			</div>

			<div class="panel-body">
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Student</th>
							<th>Course / Section</th>
							<th>Due Date</th>
							<th>Title</th>
							<th>Total</th>
							<th>Status</th>
							<th>Action</th>{{get_option('esewa_active')}}
						</tr>
					</thead>
					<tbody>

						@php $currency = get_option('currency_symbol')
						@endphp
						@foreach($invoices as $invoice)
						<tr id="row_{{ $invoice->id }}">
							<td>{{ $invoice->id }}</td>
							<td>{{ $invoice->student_name }}</td>
							<td>{{ $invoice->title }} / {{ $invoice->section_name }}</td>
							<td>{{ date('d-M-Y', strtotime($invoice->due_date)) }}</td>
							<td style='max-width:250px;'>{{ $invoice->title }}</td>
							<td>{{ $currency." ".$invoice->total }}</td>
							<td>{!! $invoice->status=="Paid" ? '<i class="fa fa-circle paid"></i>'.$invoice->status : '<i class="fa fa-circle unpaid"></i>'.$invoice->status !!}</td>
							<td>
								<div class="dropdown">
									<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Action
										<span class="caret"></span></button>
									<ul class="dropdown-menu">
										<li><a href="{{ url('dashboard/student/view_invoice/'.$invoice->id) }}" data-title="View Invoice" data-fullscreen="true" class="ajax-modal">View Invoice</a></li>
										@if($invoice->status != "Paid")
											<li><a class="ajax-modal" data-title="Pay Via Esewa" href="{{ url('dashboard/student/invoice_payment/paypal/'.$invoice->id) }}">Pay Via Esewa</a></li>
											<li><a class="ajax-modal" data-title="Pay Via Bank" href="{{ url('dashboard/student/invoice_payment/stripe/'.$invoice->id) }}">Pay Via Bank</a></li>
											@endif
									</ul>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
	function showClass(elem) {
		if ($(elem).val() == "") {
			return;
		}
		window.location = "<?php echo url('dashboard/invoices/class') ?>/" + $(elem).val();
	}
</script>
@stop