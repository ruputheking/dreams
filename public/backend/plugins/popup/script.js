var input = document.getElementById('input-file-now');
input.addEventListener('change', showFileName);

function showFileName(event) {
    var input = event.srcElement;
    document.getElementById("result").value = input.files[0].name;
}

// Pop Up Box Js
var modal = document.getElementById('id01');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Pop Up Box Js
var modal = document.getElementById('id02');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

$(document).ready(function() {
    // Basic
    $('.dropify').dropify();

    // Translated
    $('.dropify-fr').dropify({
        messages: {
            default: 'Glissez-déposez un fichier ici ou cliquez',
            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
            remove: 'Remove',
            error: 'Désolé, le fichier trop volumineux'
        }
    });

    // Used events
    var drEvent = $('#input-file-events').dropify();

    drEvent.on('dropify.beforeClear', function(event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element) {
        alert('File deleted');
    });

    drEvent.on('dropify.errors', function(event, element) {
        console.log('Has Errors');
    });

    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify')
    $('#toggleDropify').on('click', function(e) {
        e.preventDefault();
        if (drDestroy.isDropified()) {
            drDestroy.destroy();
        } else {
            drDestroy.init();
        }
    })
});


$('ul.pagination').addClass('no-margin pagination-sm');

$('#datetimepicker1').datetimepicker({
    format: 'YYYY-MM-DD',
    showClear: true
});
$('#title').on('blur', function() {
    var theTitle = this.value.toLowerCase().trim(),
        slugInput = $('#slug'),
        theSlug = theTitle.replace(/&/g, '-and-')
        .replace(/[^a-z0-9-]+/g, '-')
        .replace(/\-\-+/g, '-')
        .replace(/^-+|-+$/g, '');

    slugInput.val(theSlug);
});

$('#datetimepicker5').datetimepicker({
    format: 'YYYY-MM-DD',
    showClear: true
});

$('#draft-btn').click(function(e) {
    e.preventDefault();
    $('#published_at').val("");
    $('#post-form').submit();
});