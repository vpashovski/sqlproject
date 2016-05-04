jQuery(function($) {
    $('input[type="file"]').fileinput({
        showUpload: false,
        previewFileType: ['image'],
        allowedFileTypes: ['image'],
        browseLabel: "Качи",
        removeClass: "btn btn-danger",
        removeLabel: "Премахни"
    });

    $('a[href="#destroyModal"]').on('click', function() {
        $('#destroy-form').attr('action', $(this).data('url'));
        $('#modal-text').text($(this).data('text'));
    });
});