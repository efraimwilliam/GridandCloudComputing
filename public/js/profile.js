jQuery(document).ready(function($){
    ////----- Open the modal to CREATE a link -----////
    jQuery('#btn-add').click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#modalFormData').trigger("reset");
        jQuery('#linkEditorModal').modal('show');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    ////----- Open the modal to UPDATE a link -----////
    jQuery('body').on('click', '.open-modal', function () {
        var link_id = $(this).val();
        $.get('links/' + link_id, function (data) {
            jQuery('#link_id').val(data.id);
            jQuery('#link').val(data.url);
            jQuery('#description').val(data.description);

            jQuery('#name').val(data.name);
            jQuery('#email').val(data.email);
            jQuery('#password').val(data.password);
            jQuery('#bio').val(data.bio);

            jQuery('#btn-save').val("update");
            jQuery('#linkEditorModal').modal('show');
        })
    });



    // Clicking the save button on the open modal for both CREATE and UPDATE
    $("#btn-save").click(function (e) {

        e.preventDefault();
        var formData = {
            name: jQuery('#name').val(),
            email: jQuery('#email').val(),
            password: jQuery('#password').val(),
            bio: jQuery('#bio').val(),
        };
        //var state = jQuery('#btn-save').val();
        var type = "PUT";
        var link_id = jQuery('#name_id').val();
        var ajaxurl = '/editprofile/'+link_id;

        /*if (state == "update") {
            type = "PUT";
            ajaxurl = '/editprofile'+link_id + link_id;
        }*/

        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var link = '' + data.id + '' + data.name2 + '' + data.email + ''
                + data.password + '' + data.bio + '';

                alert('berhasil');
                
                link += 'Edit ';
                link += 'Delete';
                if (state == "add") {
                    jQuery('#links-list').append(link);
                } else {
                    $("#link" + link_id).replaceWith(link);
                }
                jQuery('#modalFormData').trigger("reset");
                jQuery('#linkEditorModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    ////----- DELETE a link and remove from the page -----////
    jQuery('.delete-link').click(function () {
        var link_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: 'links/' + link_id,
            success: function (data) {
                console.log(data);
                $("#link" + link_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});