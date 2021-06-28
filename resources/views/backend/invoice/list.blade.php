@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">List Invoice</li>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<div class="panel-title pull-left">List Invoice</div>
				<div class="col-md-2 pull-right" style="margin-top:-10px">
					<select id="class" class="select_class select2 pull-right" onchange="showClass(this);">
						<option value="">Select Class</option>
						{{ create_option('courses','id','title',$class) }}
					</select>
				</div>
				<a class="btn btn-primary btn-sm pull-right" data-title="Add New Invoice" href="{{route('invoices.create')}}">Add New</a>
			</div>

			<div class="panel-body">
				@if (\Session::has('success'))
				<div class="alert alert-success">
					<p>{{ \Session::get('success') }}</p>
				</div>
				<br />
				@endif
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Student</th>
							<th>Class / Section</th>
							<th>Due Date</th>
							<th>Title</th>
							<th>Total</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						@foreach($invoices as $invoice)
						<tr id="row_{{ $invoice->id }}">
							<td>{{ $invoice->id }}</td>
							<td>{{ $invoice->student_name }}</td>
							<td>{{ $invoice->title }} / {{ $invoice->section_name }}</td>
							<td>{{ date('d-M-Y', strtotime($invoice->due_date)) }}</td>
							<td style='max-width:250px;'>{{ $invoice->title }}</td>
							<td>{{ $invoice->total }}</td>
							<td>{!! $invoice->status=="Paid" ? '<i class="fa fa-circle paid"></i>'.$invoice->status : '<i class="fa fa-circle unpaid"></i>'.$invoice->status !!}</td>
							<td>
								<div class="dropdown">
									<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Action
										<span class="caret"></span></button>

									<form action="{{route('invoices.destroy', $invoice['id'])}}" method="post">
										{{ csrf_field() }}
										<input name="_method" type="hidden" value="DELETE">
										<ul class="dropdown-menu">
											<li><a href="{{ route('invoices.edit', $invoice['id']) }}">Edit</a></li>
											<li><a href="{{ route('invoices.show', $invoice['id']) }}" data-title="View Invoice" data-fullscreen="false" class="ajax-modal">View Invoice</a></li>
											<li><a href="{{ url('dashboard/student_payments/create/'.$invoice['id']) }}" data-title="Add Payment" class="ajax-modal">Take Payment</a></li>
											<li><button class="btn-remove link-btn" type="submit">Delete</button></li>
										</ul>
									</form>
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