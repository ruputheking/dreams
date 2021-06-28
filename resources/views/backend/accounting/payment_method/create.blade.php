@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('payee_payers.index') }}">Payment Method</a></li>
<li class="active">Add Payment Method</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">Add Payment Method</div>

			<div class="panel-body">
				<form method="post" class="validate" autocomplete="off" action="{{route('payment_methods.store')}}" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Payment Method Name <span class="required">*</span></label>
							<input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
						</div>
					</div>


					<div class="form-group">
						<div class="col-md-12">
							<button type="reset" class="btn btn-danger">Reset</button>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection