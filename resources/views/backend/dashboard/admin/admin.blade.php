@role('admin')
<div class="row">
	<div class="col-lg-3 col-sm-6">
		<div class="card">
			<div class="content">
				<div class="row">
					<div class="col-xs-5">
						<div class="icon-big icon-warning text-center">
							<i class="ti-user"></i>
						</div>
					</div>
					<div class="col-xs-7">
						<div class="numbers">
							<p>{{ ('Students') }}</p>
							{{ $total_student }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card">
			<div class="content">
				<div class="row">
					<div class="col-xs-5">
						<div class="icon-big icon-success text-center">
							<i class="ti-user"></i>
						</div>
					</div>
					<div class="col-xs-7">
						<div class="numbers">
							<p>{{ ('Teachers') }}</p>
							{{ user_count("Teacher") }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card">
			<div class="content">
				<div class="row">
					<div class="col-xs-5">
						<div class="icon-big icon-danger text-center">
							<i class="ti-user"></i>
						</div>
					</div>
					<div class="col-xs-7">
						<div class="numbers">
							<p>{{ ('Receptionist') }}</p>
							{{ user_count("Receptionist") }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-sm-6">
		<div class="card">
			<div class="content">
				<div class="row">
					<div class="col-xs-5">
						<div class="icon-big icon-info text-center">
							<i class="ti-user"></i>
						</div>
					</div>
					<div class="col-xs-7">
						<div class="numbers">
							<p>{{ ('Accountant') }}</p>
							{{ user_count("Accountant") }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-sm-6">
		<div class="card">
			<div class="content">
				<div class="row">
					<div class="col-xs-5">
						<div class="icon-big icon-danger text-center">
							<i class="ti-user"></i>
						</div>
					</div>
					<div class="col-xs-7">
						<div class="numbers">
							<p>{{ ('Parent') }}</p>
							{{ user_count("Guardian") }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card">
			<div class="content">
				<div class="row">
					<div class="col-xs-5">
						<div class="icon-big icon-info text-center">
							<i class="ti-user"></i>
						</div>
					</div>
					<div class="col-xs-7">
						<div class="numbers">
							<p>{{ ('Users') }}</p>
							{{ user_count('User') }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card">
			<div class="content">
				<div class="row">
					<div class="col-xs-5">
						<div class="icon-big icon-success text-center">
							<i class="ti-user"></i>
						</div>
					</div>
					<div class="col-xs-7">
						<div class="numbers">
							<p>{{ ('Admin') }}</p>
							{{ user_count('Admin') }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<a href="{{ url('dashboard/message/inbox') }}">
			<div class="card">
				<div class="content">
					<div class="row">
						<div class="col-xs-5">
							<div class="icon-big icon-danger text-center">
								<i class="ti-email"></i>
							</div>
						</div>
						<div class="col-xs-7">
							<div class="numbers">
								<p>{{ ('Unread Inbox') }}</p>
								{{ count_inbox() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
</div>

<div class="row">
   <div class="col-md-4">
		<div class="card">
			<div class="content">
				<div class="row">
					<div class="col-md-5">
						<div class="icon-big icon-primary text-center">
							<i class="ti-credit-card"></i>
						</div>
					</div>
					<div class="col-md-7">
						<div class="numbers">
							<p>{{ ('Monthly Student Payments') }}</p>
								{{ $currency." ".$student_payments }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

   <div class="col-md-4">
		<div class="card">
			<div class="content">
				<div class="row">
					<div class="col-md-5">
						<div class="icon-big icon-success text-center">
							<i class="ti-credit-card"></i>
						</div>
					</div>
					<div class="col-md-7">
						<div class="numbers">
							<p>{{ ('Current Month Income') }}</p>
							{{ $currency." ".$monthly_income }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

   <div class="col-md-4">
		<div class="card">
			<div class="content">
				<div class="row">
					<div class="col-md-5">
						<div class="icon-big icon-danger text-center">
							<i class="ti-credit-card"></i>
						</div>
					</div>
					<div class="col-md-7">
						<div class="numbers">
							<p>{{ ('Current Month Expense') }}</p>
							{{ $currency." ".$monthly_expense }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<h4 class="title text-center">{{ ('Income and Expense Summary of')." ".date("Y") }}</h4>
			</div>
			<div class="content">
				<div id="income_vs_expense_chart" style="width: 100%; height:400px;"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
  var yearly_income = {{ $yearly_income }};
  var yearly_expense = {{ $yearly_expense }};
</script>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<h4 class="title text-center">{{ ('Notice') }}</h4>
			</div>
			<div class="content no-export">
				<table id="example1" class="table table-bordered">
				   <thead>
				     <th>{{ ('Notice') }}</th>
				     <th>{{ ('Created') }}</th>
				     <th class="text-center">{{ ('View') }}</th>
				   </thead>
				   <tbody>
						@foreach(get_notices("Admin",100) as $notice)
						  <tr>
							<td>{{ $notice->heading }}</td>
							<td>{{ date("d M, Y - H:i", strtotime($notice->created_at)) }}</td>
						    <td class="text-center"><a href="{{ route('notices.show', $notice->id) }}" data-title="{{ ('View Notice') }}" class="btn btn-primary btn-sm ajax-modal">{{ ('View Notice') }}</a></td>
						  </tr>
						@endforeach
				   </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endrole
