$(function() {
    $(document).ready(function() {
        $('.sessionmodal').addClass("active");
        setTimeout(function() {
            $('.sessionmodal').removeClass("active");
        }, 4500);
    });

    $(".data-table").DataTable({
        responsive: true,
        "bAutoWidth":false,
        "ordering": false,
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
    	  dom: 'Blfrtip',
          "aria": {
              "sortAscending":  ": activate to sort column ascending",
              "sortDescending": ": activate to sort column descending"
          }
      },
    });

    $('#questions_table').DataTable({
        "sDom": "<'row'><'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
        buttons: [{
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'csvHtml5',
            'excelHtml5',
            'colvis',
        ],
        columnDefs: [{
            targets: [7, 8, 9, 10],
            visible: false
        }, ]
    });

    $('#search').DataTable({
        'paging': false,
        'lengthChange': false,
        'searching': true,
        'ordering': false,
        'info': false,
        'autoWidth': true,
        "sDom": "<'row'><'row'<'col-md-4'B><'col-md-8'f>r>t<'row'>",
        buttons: [{
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'excelHtml5',
            'csvHtml5',
            'colvis',
        ]
    });

    $('#topTable').DataTable({
        "order": [
            [5, "desc"]
        ],
        "lengthMenu": [
            [5, 10, 15, -1],
            [5, 10, 15, "All"]
        ],
        "sDom": "<'row'><'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
        buttons: [{
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'excelHtml5',
            'csvHtml5',
            'colvis',
        ]
    });
    //Initialize Select2 Elements
    $('.currency-icon-picker').iconpicker({
        title: 'Currency Symbols',
        icons: ['fa fa-dollar', 'fa fa-euro', 'fa fa-gbp', 'fa fa-ils', 'fa fa-inr', 'fa fa-krw', 'fa fa-money', 'fa fa-rouble', 'fa fa-try'],
        selectedCustomClass: 'label label-primary',
        mustAccept: true,
        placement: 'topRight',
        showFooter: false,
        hideOnSelect: true
    });
});

$('.select2').select2()

$('.dropify').dropify();
$(".datepicker").datepicker();

$(".monthpicker").datepicker({
    format: "mm/yyyy",
    viewMode: "months",
    minViewMode: "months"
});
$('.datetimepicker').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:00'
});

$('.timepicker').datetimepicker({
    format: 'HH:mm:00'
});
$(".niceselect").niceSelect();
/*Summernote editor*/
if ($("#summernote,.summernote").length) {
    $('#summernote,.summernote').summernote({
        height: 200,
        dialogsInBody: true
    });
}

if ($(".notification-items").has("li").length === 0) {
    $(".notification-items").append("<li><a href='#'>No Message Found !</a></li>");
}

$(".appsvan-file").after("<input type='text' class='form-control filename' readOnly>" +
    "<button type='button' class='btn btn-info appsvan-upload-btn'>Browse</button>");

$(".appsvan-file").each(function() {
    if ($(this).data("value")) {
        $(this).parent().find(".filename").val($(this).data("value"));
    }
    if ($(this).attr("required")) {
        $(this).parent().find(".filename").prop("required", true);
    }
});

$(document).on("click", ".appsvan-upload-btn", function() {
    $(this).parent().find("input[type=file]").click();
});

$(document).on('click','#modal-fullscreen',function(){
   $("#main_modal >.modal-dialog").toggleClass("fullscreen-modal");
});

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

 //Ajax submit with validate
 $(".appsvan-submit-validate").validate({
     submitHandler: function(form) {
         var elem = $(form);
         $(elem).find("button[type=submit]").prop("disabled",true);
         var link = $(form).attr("action");
         $.ajax({
             method: "POST",
             url: link,
             data:  new FormData(form),
             mimeType:"multipart/form-data",
             contentType: false,
             cache: false,
             processData:false,
             beforeSend: function(){
               button_val = $(elem).find("button[type=submit]").text();
               $(elem).find("button[type=submit]").html('<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>');

             },success: function(data){
                $(elem).find("button[type=submit]").html(button_val);
                $(elem).find("button[type=submit]").attr("disabled",false);
                var json = JSON.parse(data);
                if(json['result'] == "success"){
                    Command: toastr["success"](json['message']);
                }else{
                    jQuery.each( json['message'], function( i, val ) {
                       Command: toastr["error"](val);
                    });
                }
             }
         });

        return false;
    },invalidHandler: function(form, validator) {},
      errorPlacement: function(error, element) {}
 });

 //Ajax Modal Submit
 $(document).on("submit",".ajax-submit",function(){
     var link = $(this).attr("action");
     $.ajax({
         method: "POST",
         url: link,
         data:  new FormData(this),
         mimeType:"multipart/form-data",
         contentType: false,
         cache: false,
         processData:false,
         beforeSend: function(){

         },success: function(data){

            var json = JSON.parse(data);
            if(json['result'] == "success"){
                $("#main_modal .alert-success").html(json['message']);
                $("#main_modal .alert-success").css("display","block");
                if(json['action'] == "update"){
                    $('#row_'+json['data']['id']).find('td').each (function() {
                       if(typeof $(this).attr("class") != "undefined"){
                           $(this).html(json['data'][$(this).attr("class")]);
                       }
                    });

                }else if(json['action'] == "store"){
                    $('.ajax-submit')[0].reset();
                    //store = true;

                    var new_row = $("table").find('tr:eq(1)').clone();

                    $(new_row).attr("id", "row_"+json['data']['id']);

                    $(new_row).find('td').each (function() {
                       if($(this).attr("class") == "dataTables_empty"){
                           window.location.reload();
                       }
                       if(typeof $(this).attr("class") != "undefined"){
                           $(this).html(json['data'][$(this).attr("class")]);
                       }
                    });

                    var url  = window.location.href;
                    $(new_row).find('form').attr("action",url+"/"+json['data']['id']);
                    $(new_row).find('.btn-warning').attr("href",url+"/"+json['data']['id']+"/edit");
                    $(new_row).find('.btn-info').attr("href",url+"/"+json['data']['id']);

                    $("table").prepend(new_row);

                    //window.setTimeout(function(){window.location.reload()}, 2000);
                }
            }else{
                jQuery.each( json['message'], function( i, val ) {
                   $("#main_modal .alert-danger").append("<p>"+val+"</p>");
                });
                $("#main_modal .alert-danger").css("display","block");
            }
         }
     });

     return false;
 });

 //Ajax submit without validate
 $(document).on("submit",".appsvan-submit",function(){
     var elem = $(this);
     $(elem).find("button[type=submit]").prop("disabled",true);
     var link = $(this).attr("action");
     $.ajax({
         method: "POST",
         url: link,
         data:  new FormData(this),
         mimeType:"multipart/form-data",
         contentType: false,
         cache: false,
         processData:false,
         beforeSend: function(){
           button_val = $(elem).find("button[type=submit]").text();
           $(elem).find("button[type=submit]").html('<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>');

         },success: function(data){
            $(elem).find("button[type=submit]").html(button_val);
            $(elem).find("button[type=submit]").attr("disabled",false);
            var json = JSON.parse(data);
            if(json['result'] == "success"){
                Command: toastr["success"](json['message']);
            }else{
                jQuery.each( json['message'], function( i, val ) {
                   Command: toastr["error"](val);
                });

            }
         }
     });

     return false;
 });

 //Print Command
$(document).on('click','.print',function(){
    $("#preloader").css("display","block");
    var div = "#"+$(this).data("print");
    $(div).print({
        timeout: 1000,
    });
});


$("#main_modal").on("hidden.bs.modal", function () {

});

$(document).on('change', '.appsvan-file', function() {
    readFileURL(this);
});

function readFileURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {};

        $(input).parent().find(".filename").val(input.files[0].name);
        reader.readAsDataURL(input.files[0]);
    }
}

$('#title').on('blur', function() {
    var theTitle = this.value.toLowerCase().trim(),
        slugInput = $('#slug'),
        theSlug = theTitle.replace(/&/g, '-and-')
        .replace(/[^a-z0-9-]+/g, '-')
        .replace(/\-\-+/g, '-')
        .replace(/^-+|-+$/g, '');

    slugInput.val(theSlug);
});

var editor_config = {
    path_absolute: "/",
    selector: ".textarea",
    theme: "modern",
    width: '100%',
    height: 200,
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback: function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
            file: cmsURL,
            title: 'Filemanager',
            width: x * 0.8,
            height: y * 0.8,
            resizable: "yes",
            close_previous: "no"
        });
    }
};

tinymce.init(editor_config);

function readURLimage(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#image').attr('src', e.target.result);
			$('#image').css("max-width","100%");
		};
		reader.readAsDataURL(input.files[0]);
	}
}

// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		clearTimeout(timeout);
		timeout = setTimeout(function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		}, wait);
		if (immediate && !timeout) func.apply(context, args);
	};
};
