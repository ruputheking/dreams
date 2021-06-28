@extends('layouts.backend.main')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<div class="panel-title pull-left">{{ ('List Student Payment') }}</div>
				<div class="col-md-2 pull-right" style="margin-top:-10px">
					<select id="class" class="select_class select2 pull-right" onchange="showClass(this);">
						<option value="">{{ ('Select Class') }}</option>
						{{ create_option('courses','id','title',$class) }}
					</select>
				</div>
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
							<th>{{ ('Invoice ID') }}</th>
							<th>{{ ('Date') }}</th>
							<th>{{ ('Amount') }}</th>
							<th>{{ ('Note') }}</th>
							<th>{{ ('Action') }}</th>
						</tr>
					</thead>
					<tbody>
						@php $currency = get_option('currency_symbol')
						@endphp
						@foreach($studentpayments as $studentpayment)
						<tr id="row_{{ $studentpayment->id }}">
							<td class='invoice_id'>{{ $studentpayment->invoice_id }}</td>
							<td class='date'>{{ date('d-M-Y', strtotime($studentpayment->date)) }}</td>
							<td class='amount'>{{ $currency." ".$studentpayment->amount }}</td>
							<td class='note'>{{ $studentpayment->note }}</td>
							<td>
								<form action="{{route('student_payments.destroy', $studentpayment['id'])}}" method="post">
									<a href="{{route('student_payments.edit', $studentpayment['id'])}}" data-title="{{ ('Update Student Payment') }}" class="btn btn-warning btn-sm ajax-modal">{{ ('Edit') }}</a>
									<a href="{{route('student_payments.show', $studentpayment['id'])}}" data-title="{{ ('View Student Payment') }}" class="btn btn-info btn-sm ajax-modal">{{ ('View') }}</a>
									{{ csrf_field() }}
									<input name="_method" type="hidden" value="DELETE">
									<button class="btn btn-danger btn-sm btn-remove" type="submit">{{ ('Delete') }}</button>
								</form>
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
		window.location = "<?php echo url('dashboard/student_payments/class') ?>/" + $(elem).val();
	}
</script>
@stop