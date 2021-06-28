<form method="post" class="ajax-submit" autocomplete="off" action="{{route('chart_of_accounts.update', $id)}}" enctype="multipart/form-data">
	{{ csrf_field()}}
	<input name="_method" type="hidden" value="PATCH">

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Name <span class="required">*</span></label>
			<input type="text" class="form-control" name="name" value="{{ $chartofaccount->name }}" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label">Type <span class="required">*</span></label>
			<select class="form-control select2" name="type" required>
				<option value="">Select One</option>
				<option value="income" @php $chartofaccount->type=="income" ? "selected" : "" @endphp>Income</option>
					<option value="expense" @php $chartofaccount->type=="expense" ? "selected" : "" @endphp>Expense</option>
			</select>
		</div>
	</div>


	<div class="form-group">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
	</div>
</form>