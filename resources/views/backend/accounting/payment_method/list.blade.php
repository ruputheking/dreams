@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Payment Method</li>
@endsection

@section('content')

<div class="row">
	<div class="col-md-8">
		<div class="panel panel-default no-export">
			<div class="panel-heading"><span class="panel-title">List Payment Method</span>
				<a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="Add Payment Method" href="{{route('payment_methods.create')}}">Add New</a>
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
							<th>Payment Method Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						@foreach($paymentmethods as $paymentmethod)
						<tr id="row_{{ $paymentmethod->id }}">
							<td class='name'>{{ $paymentmethod->name }}</td>
							<td>
								<form action="{{route('payment_methods.destroy', $paymentmethod['id'])}}" method="post">
									<a href="{{route('payment_methods.edit', $paymentmethod['id'])}}" data-title="Update Payment Method" class="btn btn-warning btn-sm ajax-modal">Edit</a>
									<a href="{{route('payment_methods.show', $paymentmethod['id'])}}" data-title="View Payment Method" class="btn btn-info btn-sm ajax-modal">View</a>
									{{ csrf_field() }}
									<input name="_method" type="hidden" value="DELETE">
									<button class="btn btn-danger btn-sm btn-remove" type="submit">Delete</button>
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