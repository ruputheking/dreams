@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>4
<li class="active">My Class Schedule</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<span class="panel-title">
					My Class Schedule
				</span>
				<button type="button" data-print="classic_routine" class="btn btn-primary btn-sm pull-right print"><i class="fa fa-print"></i> Print Class Schedule</button>
			</div>
			<div class="panel-body">
				<div class="col-md-12">
					<table class="table table-bordered routine-table" id="classic_routine">
						<tbody>
							<tr>
								<td colspan="100" class="text-center">
									<span class="f-20">{{ get_option('welcome_txt') }}</span></br>
									<span class="f-18">My Class Schedule</span></br>
								</td>
							</tr>
							@foreach($routine as $key=>$data)
							<tr>
								<td>{{ $key }}</td>
								@php
								$i = 1;
								$j = 1;
								@endphp

								@foreach($data as $field)
								@if($field->start_time >0)
									<td>
										{{ $field->subject_name }}</br>
										Teacher - {{ $field->name }}</br>
										Class - <b>{{ $field->title }}</b><br>
										Section - <b>{{ $field->section_name }}</b></br>
										{{ $field->start_time }} - {{ $field->end_time }}
									</td>
									@php ($i++)
									@endif


									@if($j == count($data))
									@for ($l = $i; $l <= count($data); $l++) <td>&nbsp;</br>&nbsp;</br>&nbsp;</td>
										@endfor
										@endif

										@php ($j++)
										@endforeach
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection