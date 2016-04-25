jQuery(function($) {
    $('a[href="#destroyModal"]').on('click', function() {
        $('#destroy-form').attr('action', $(this).data('url'));
        $('#modal-text').text($(this).data('text'));
    });
});