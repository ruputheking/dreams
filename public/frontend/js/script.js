$(document).ready(function(){
    //Ajax Modal Function
    $(document).on("click",".ajax-modal",function(){
         var link = $(this).attr("href");
         var title = $(this).data("title");
         var fullscreen = $(this).data("fullscreen");
         $.ajax({
             url: link,
             beforeSend: function(){
                $("#preloader").css("display","block");
             },success: function(data){
                $("#preloader").css("display","none");
                $('#main_modal .modal-title').html(title);
                $('#main_modal .modal-body').html(data);
                $("#main_modal .alert-success").css("display","none");
                $("#main_modal .alert-danger").css("display","none");
                $('#main_modal').modal('show');

                if(fullscreen ==true){
                    $("#main_modal >.modal-dialog").addClass("fullscreen-modal");
                }else{
                    $("#main_modal >.modal-dialog").removeClass("fullscreen-modal");
                }

                //init Essention jQuery Library
                $("select.select2").select2();
                $('.year').mask('0000-0000');
                $(".ajax-submit").validate();
                $(".datepicker").datepicker();
                $(".dropify").dropify();
                $("input:required, select:required, textarea:required").prev().append("<span class='required'> *</span>");
             }
         });

         return false;
     });

     $("#main_modal").on('show.bs.modal', function () {
         $('#main_modal').css("overflow-y","hidden");
     });

	 $("#main_modal").on('shown.bs.modal', function () {
		setTimeout(function(){
		  $('#main_modal').css("overflow-y","auto");
		}, 1000);
     });
});
