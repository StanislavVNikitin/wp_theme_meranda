jQuery(document).ready(function ($){
    $('.meranda-options').on('click', '.delete-home-post', function () {
        $('#home_post, #home_post_id').val('');
        $('#home_post_title').empty();
    });

    $('#home_post').autocomplete({
        source: ajaxurl + '?action=home_post&_wpnonce=' + merandaObject.nonce,
        minLength: 2,
        delay: 500,
        select:function(event,ui){
            $('#home_post_id').val(ui.item.id);

            $('#home_post_title').html('<strong>' + merandaObject.post_selected + '</strong> ' + ui.item.label + ' <button class="button delete-home-post"><span class="dashicons dashicons-trash"></span></button>');
        }
    });


});