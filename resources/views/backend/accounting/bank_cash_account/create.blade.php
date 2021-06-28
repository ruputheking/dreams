@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('accounts.index') }}">Accounts</a></li>
<li class="active">Create</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">Add Account</div>

			<div class="panel-body">
				<form method="post" class="validate" autocomplete="off" action="{{route('accounts.store')}}" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Account Name <span class="required">*</span></label>
							<input type="text" class="form-control" name="account_name" value="{{ old('account_name') }}" required>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">{{ ('Opening Balance')." ".get_option('currency_symbol') }} <span class="required">*</span></label>
							<input type="text" class="form-control float-field" name="opening_balance" value="{{ old('opening_balance') }}" required>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Note</label>
							<textarea class="form-control" name="note">{{ old('note') }}</textarea>
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