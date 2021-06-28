@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Home</li>
@endsection

@section('style')
<style media="screen">
    .icon i {
        text-align: center;
        font-size: 72px;
    }
</style>
@endsection

@section('content')

@include('backend.dashboard.admin.admin')
@include('backend.dashboard.teacher.teacher')
@include('backend.dashboard.student.student')
@include('backend.dashboard.parent.parent')
@include('backend.dashboard.accountant.accountant')
@include('backend.dashboard.receptionist.receptionist')



<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<h4 class="title text-center">{{ ('Event Calendar') }}</h4>
			</div>
			<div class="content">
				<div id='event_calendar'></div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
@role(['admin', 'accountant'])
$(document).ready(function() {
    dashboard.admin_init();
});
@endrole
  $(document).ready(function() {

    $('#event_calendar').fullCalendar({
		themeSystem: 'bootstrap4',
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,basicWeek,basicDay'
		},
		//defaultDate: '2018-03-12',
		eventBackgroundColor: "#0984e3",
		navLinks: true, // can click day/week names to navigate views
		editable: true,
		eventLimit: true, // allow "more" link when too many events
		timeFormat: 'h:mm',
		events: [
			@foreach(get_events(100) as $event)
				{
				  title: '{{ $event->name }}',
				  start: '{{ $event->start_date }}',
				  end: '{{ $event->end_date }}',
				  url: '{{ route("events.show", $event->id) }}'
				},
			@endforeach
	   ],
	   eventRender: function eventRender(event, element, view) {
		   element.addClass('ajax-modal');
		   element.data("title","{{ ('View Event') }}");
	   }
    });
  });

</script>
@endsection
