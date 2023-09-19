<?php

function meranda_add_metabox()
{
    add_meta_box('meranda_metabox-1', __('Post Data', 'meranda'),
        'meranda_add_metabox_cb', array('post'));
}

function meranda_add_metabox_cb($post)
{
    wp_nonce_field('meranda_action', 'meranda_nonce');

    $read_minutes = (int)get_post_meta($post->ID, 'read_minutes', true);
    $is_featured = get_post_meta($post->ID, 'is_featured', true);
    $is_slider = get_post_meta($post->ID, 'is_slider', true);
    $is_trending = get_post_meta($post->ID, 'is_trending', true);
    ?>
    <table class="form-table">
        <tbody>

        <tr>
            <th><label for="read_minutes"><?php esc_html_e('Number of minutes to read', 'meranda'); ?></label></th>
            <td><input type="number" min="0" id="read_minutes" name="read_minutes" class="regular-text"
                       value="<?php echo $read_minutes ?>"></td>
        </tr>

        <tr>
            <th><label for="is_featured"><?php esc_html_e('Add to featured posts', 'meranda'); ?></label></th>
            <td><input type="checkbox" id="is_featured" name="is_featured"
                       class="regular-text" <?php checked('yes', $is_featured) ?>></td>
        </tr>

        <tr>
            <th><label for="is_slider"><?php esc_html_e('Add post to slider', 'meranda'); ?></label></th>
            <td><input type="checkbox" id="is_slider" name="is_slider"
                       class="regular-text" <?php checked('yes', $is_slider) ?>></td>
        </tr>
        <tr>
            <th><label for="is_trending"><?php esc_html_e('Post is treding', 'meranda'); ?></label></th>
            <td><input type="checkbox" id="is_trending" name="is_trending"
                       class="regular-text" <?php checked('yes', $is_trending) ?>></td>
        </tr>

        </tbody>
    </table>


    <?php

}

add_action('add_meta_boxes', 'meranda_add_metabox');

function meranda_save_metabox($post_id)
{
    if (!isset($_POST['meranda_nonce']) || !wp_verify_nonce($_POST['meranda_nonce'], 'meranda_action')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (!empty($_POST['read_minutes'])) {
        update_post_meta($post_id, 'read_minutes', (int)$_POST['read_minutes']);
    } else {
        delete_post_meta($post_id, 'read_minutes');
    }

    if (isset($_POST['is_featured']) && $_POST['is_featured'] == 'on') {
        update_post_meta($post_id, 'is_featured', 'yes');
    } else {
        delete_post_meta($post_id, 'is_featured');
    }
    if (isset($_POST['is_slider']) && $_POST['is_slider'] == 'on') {
        update_post_meta($post_id, 'is_slider', 'yes');
    } else {
        delete_post_meta($post_id, 'is_slider');
    }

    if (isset($_POST['is_trending']) && $_POST['is_trending'] == 'on') {
        update_post_meta($post_id, 'is_trending', 'yes');
    } else {
        delete_post_meta($post_id, 'is_trending');
    }


}

add_action( 'save_post', 'meranda_save_metabox' );