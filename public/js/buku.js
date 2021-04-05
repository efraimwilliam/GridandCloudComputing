$(document).ready(function () {
    $(this).on('click', '.btn-edit-buku', function(e) {
        e.preventDefault();
        var link = $(this).attr('id');
        $.ajax({
            url : '/buku/'+id+'update',
            ...
        });
    });
});