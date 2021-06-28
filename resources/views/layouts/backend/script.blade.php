<script>
    //Show Success Message
	@if(Session::has('success'))
	   Command: toastr["success"]("{{session('success')}}")
	@endif

	//Show Single Error Message
	@if(Session::has('error'))
	   Command: toastr["error"]("{{session('error')}}")
	@endif

    <?php $i =0; ?>

    @foreach ($errors->all() as $error)
        Command: toastr["error"]("{{ $error }}");

		var name= "{{$errors->keys()[$i] }}";

		$("input[name='"+name+"']").addClass('error');
		$("select[name='"+name+"'] + span").addClass('error');

		$("input[name='"+name+"'], select[name='"+name+"']").parent().append("<span class='v-error'>{{$error}}</span>");

		<?php $i++; ?>

	@endforeach

</script>
@desktop
<script type="text/javascript">
$('#example1').DataTable({
    responsive: true,
    "bAutoWidth":false,
    "ordering": true,
    "language": {
        "decimal":        "",
        "emptyTable":     "No Data Found",
        "info":           "Showing _START_ To _END_ Of _TOTAL_ Entries",
        "infoEmpty":      "Showing 0 To 0 Of 0 Entries",
        "infoFiltered":   "(filtered from _MAX_ total entries)",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "Show _MENU_ Entries",
        "loadingRecords": "Loading...",
        "processing":     "Processing...",
        "search":         "Search",
        "zeroRecords":    "No Matching Records Found",
        "paginate": {
            "first":      "First",
            "last":       "Last",
            "next":       "Next",
            "previous":   "Previous"
        },
        "aria": {
            "sortAscending":  ": activate to sort column ascending",
            "sortDescending": ": activate to sort column descending"
        }
    },
});
</script>
@enddesktop
@mobile
<script type="text/javascript">
$('#example1').DataTable();
</script>
@endmobile
