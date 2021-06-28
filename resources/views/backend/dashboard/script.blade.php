<script type="text/javascript">

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
                  title: '{{ $event->title }}',
                  start: '{{ $event->starting_date }}',
                  end: '{{ $event->ending_date }}',
                  url: '{{ route("events.show", $event->slug) }}'
                },
            @endforeach
       ],
       eventRender: function eventRender(event, element, view) {
           element.addClass('ajax-modal');
           element.data("title","View Event");
       }
    });



  });

</script>
