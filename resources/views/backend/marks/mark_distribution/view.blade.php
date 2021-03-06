@extends('layouts.backend.main')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">View Mark Distribution</div>

			<div class="panel-body">
				<table class="table table-bordered">
					<tr>
						<td>Mark Distribution Type</td>
						<td>{{ $markdistribution->mark_distribution_type }}</td>
					</tr>
					<tr>
						<td>Mark Percentage</td>
						<td>{{ $markdistribution->mark_percentage }}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection