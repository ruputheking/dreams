@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Student List</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="panel-title">Student List</span>
			</div>
			<div class="panel-body no-export">
				<table id="example1" class="table table-bordered">
					<thead>
						<th>Profile</th>
						<th>Student Name</th>
						<th>Course</th>
						<th>Guardian</th>
						<th>Birthday</th>
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($students as $k => $student)
						<tr>
						    @php($key = ++$k)
							<td><img src="/frontend/images/{{ $student->photo }}" width="50px" alt=""></td>
							<td>{{ $student->student_name }}</td>
							<td>{{ $student->title }}</td>
							<td>{{ $student->parent_name ?? '-' }}</td>
							<td>{{ $student->birthday }}</td>
							<td>
							    @if($student->status == 0)
							        <label class="label label-success">Active</label>
							    @endif
							    @if($student->status == 1)
							        <label class="label label-primary">Pending</label>
							    @endif
							    @if($student->status == 2)
							        <label class="label label-danger">Rejected</label>
							    @endif
							</td>
							<td>
							    @if(Auth::user()->roles()->first()->name == 'admin' || Auth::user()->roles()->first()->name == 'receptionist')
    								<a type="submit" onclick="event.preventDefault();document.getElementById('accept{{$key}}').submit();" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Accept</a>
    								<a type="submit" onclick="event.preventDefault();document.getElementById('reject{{$key}}').submit();" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Reject</a>
    								<form id="accept{{$key}}" action="{{route('user_requests.accept', $student->slug)}}" method="post" style="display:none;">
                                        {{csrf_field()}}
                                    </form>
                                    <form id="reject{{$key}}" action="{{route('user_requests.reject', $student->slug)}}" method="post" style="display:none;">
                                        {{csrf_field()}}
                                    </form>
								@endif
								<a href="{{ route('user_requests.show', $student->slug) }}" data-title="Student Requested Profile" class="btn btn-info btn-xs ajax-modal"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
								<a href="{{ route('user_requests.edit', $student->slug) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
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