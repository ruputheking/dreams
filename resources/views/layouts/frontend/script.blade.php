<script type="text/javascript">
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
