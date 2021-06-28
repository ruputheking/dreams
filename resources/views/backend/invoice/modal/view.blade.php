<!--Invoice Information-->
<div class="panel panel-default">
	<div class="panel-heading">
		<button type="button" data-print="print-invoice" class="btn btn-primary btn-sm print"><i class="fa fa-print"></i> {{ ('Print Invoice') }}</button>
	</div>
	<div class="panel-body">

		<div class="invoice-box" id="print-invoice">
			@php $currency = get_option('currency_symbol')
			@endphp
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td>
									<b>{{ ('Invoice ID') }}: {{ $invoice->id }}</b><br>
									<b>{{ ('Invoice No') }}: {{ strrev ( date('Ym', strtotime( $invoice->due_date ))) }}{{ $invoice->id }}</b><br>
									{{ ('Due Date') }} : {{ date('d-M-Y', strtotime( $invoice->due_date )) }}
									<div class="invoice-status">{{ ('Payment Status') }} : <b class="{{ $invoice->status }}">{{ $invoice->status }}</b></div>
								</td>

								<td class="title">
									<img src="{{ get_logo() }}" style="width:100px;">
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr>
					<td>
						<h4 align="center">{{ $invoice->title }}</h4>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									<h4><b>{{ ('Invoice To') }}</b></h4>
									{{ ("Name")." : ".$invoice->student_name }}
									</br>
									{{ ("Class")." : ".$invoice->title }},
									{{ ("Section")." : ".$invoice->section_name }}<br>
								</td>

								<!--School Address-->
								<td>
									<h4><b>{{ get_option("welcome_txt") }}</b></h4>
									{{ ('Address')." : ".get_option("address") }}<br>
									{{ ('Email')." : ".get_option('office_email') }}<br>
									</br>
									<!--Invoice Payment Information-->
									<h4>{{ ('Invoice Total') }} : &nbsp;{{ $currency." ".decimalPlace($invoice->total) }}</h4>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>

			<!--End Invoice Information-->

			<!--Invoice Product-->
			<div class="col-md-12">
				<table class="table">
					<thead style="background:#dce9f9;">
						<th>{{ ('Fee Type') }}</th>
						<th style="text-align:right">{{ ('Amount')." ".get_option('currency_symbol') }}</th>
						<th style="text-align:right">{{ ('Discount')." ".get_option('currency_symbol') }}</th>
						<th style="text-align:right">{{ ('Total')." ".get_option('currency_symbol') }}</th>
					</thead>
					<tbody id="invoice">
						@foreach($invoiceItems as $item)
						<tr>
							<td width="40%">{{ $item->fee_type }}</td>
							<td style="text-align:right">{{ $currency." ".$item->amount }}</td>
							<td style="text-align:right">{{ $currency." ".$item->discount }}</td>
							<td style="text-align:right">{{ $currency." ".($item->amount-$item->discount) }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!--End Invoice Product-->

			<!--Summary Table-->
			<div class="col-md-4 pull-right" style="background:#dce9f9">
				<table class="table" width="100%">
					<tr>
						<td>{{ ('Total') }}</td>
						<td style="text-align:right; width:120px;">{{ $currency." ".decimalPlace($invoice->total) }}</td>
					</tr>
					<tr>
						<td>{{ ('Paid') }}</td>
						<td style="text-align:right; width:120px;">{{ $currency." ".decimalPlace($invoice->paid) }}</td>
					</tr>
					<tr>
						<td>{{ ('Amount Due') }}</td>
						<td style="text-align:right; width:120px;">{{ $currency." ".decimalPlace($invoice->total-$invoice->paid) }}</td>
					</tr>
				</table>
			</div>
			<!--End Summary Table-->
			<div class="clear"></div>

			<!--related Transaction-->
			@if( count($transactions) > 0 )
			<table class="table table-bordered" style="margin-top:30px">
				<thead>
					<th colspan="3" style="text-align: center;">{{ ('Related Transaction') }}</th>
				</thead>
				<thead>
					<th>{{ ('Date') }}</th>
					<th>{{ ('Note') }}</th>
					<th style="text-align: right;">{{ ('Amount') }}</th>
				</thead>
				<tbody>
					@foreach($transactions as $trans)
					<tr>
						<td>{{ date('d/M/Y - H:m', strtotime($trans->created_at)) }}</td>
						<td style="text-align: left;">{{ $trans->note }}</td>
						<td style="text-align: right;">{{ $currency." ".decimalPlace($trans->amount) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif
			<!--End related Transaction-->

			<!--Invoice Note-->
			@if( $invoice->description !="" )
			<div class="invoice-note">{{ $invoice->description }}</div>
			@endif
			<!--End Invoice Note-->

		</div>
		<!--End Invoice Box-->
	</div>
</div>