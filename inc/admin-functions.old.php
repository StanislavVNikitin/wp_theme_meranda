<?php

add_action('admin_menu', 'meranda_add_admin_page');

function meranda_add_admin_page()
{
    $hook_suffix = add_menu_page(__('Meranda Theme Options', 'meranda'), __('MerandaTheme', 'meranda'), 'manage_options', 'meranda-options', 'meranda_create_page', 'dashicons-admin-generic');

    add_action("admin_print_scripts-{$hook_suffix}", 'meranda_admin_scripts');
    add_action('admin_init', 'meranda_custom_settings');
}

function meranda_custom_settings()
{
    register_setting('meranda_general_group', 'slider_check');
    register_setting('meranda_general_group', 'home_slider_post1');
    register_setting('meranda_general_group', 'home_slider_post2');
    register_setting('meranda_general_group', 'main_post_cnt', function ($input){
        $input = abs((int)$input);
        return ($input < 5) ? $input : 4;
    });

    add_settings_section('meranda_slider_section', __('Slider setting', 'meranda'), '', 'meranda-options');

    add_settings_section('meranda_general_section', __('Home page setting', 'meranda'), '', 'meranda-options');


    add_settings_field('slider_check', __('Slider enable', 'meranda'), 'meranda_general_slider_check', 'meranda-options', 'meranda_slider_section');
    add_settings_field('home_slider_post1', __('Slider article 1', 'meranda'), 'meranda_general_home_slider_post1', 'meranda-options', 'meranda_slider_section');
    add_settings_field('home_slider_post2', __('Slider article 2', 'meranda'), 'meranda_general_home_slider_post2', 'meranda-options', 'meranda_slider_section');

    add_settings_field('main_post_cnt', __('Number of featured post', 'meranda'), 'meranda_general_main_post_cnt', 'meranda-options', 'meranda_general_section',array('label_for' => 'main_post_cnt'));
}

function meranda_general_main_post_cnt(){
    $main_post_cnt = abs((int)get_option('main_post_cnt'));
    //$main_post_cnt = (!empty($main_post_cnt) && $main_post_cnt < 4 ) ? $main_post_cnt : 4;
    echo '<input type="number" min=0 max=4 id="main_post_cnt_id" name="main_post_cnt" class="regular-text" value="' . $main_post_cnt . '">';
}
function meranda_general_slider_check(){
    $home_slider_check = esc_attr(get_option('slider_check'));
    ?>
        <input type="checkbox" id="slider_check_id" name="slider_check"' <?php checked('on', $home_slider_check );?> >
    <?php
}
function meranda_general_home_slider_post1()
{
    $home_slider_post1_id = esc_attr(get_option('home_slider_post1'));
    if ($home_slider_post1_id) {
        $home_slider_post1 = get_post($home_slider_post1_id);
    }
    $home_slider_post1_title = !empty($home_slider_post1) ? $home_slider_post1->post_title : '';
    echo '<input type="text" id="home_slider_post1" class="regular-text">';
    echo '<p class="description" id="home_slider_post1">';
    if ($home_slider_post1_title) {
        echo '<strong>' . __('Post slider selected: ', 'meranda') . '</strong>' . $home_slider_post1_title . ' <button class="button delete-slider-post-1"><span class="dashicons dashicons-trash"></span></span></button>';
    }
    echo '</p>';
    echo '<input type="hidden" id="home_slider_post1_id" name="home_slider_post1" value="' . $home_slider_post1_id . '">';

}

function meranda_general_home_slider_post2()
{
    $home_slider_post2_id = esc_attr(get_option('home_slider_post2'));
    if ($home_slider_post2_id) {
        $home_slider_post2 = get_post($home_slider_post2_id);
    }
    $home_slider_post2_title = !empty($home_slider_post2) ? $home_slider_post2->post_title : '';
    echo '<input type="text" id="home_slider_post2" class="regular-text">';
    echo '<p class="description" id="home_slider_post2">';
    if ($home_slider_post2_title) {
        echo '<strong>' . __('Post slider selected: ', 'meranda') . '</strong>' . $home_slider_post2_title . ' <button class="button delete-slider-post-2"><span class="dashicons dashicons-trash"></span></span></button>';
    }
    echo '</p>';
    echo '<input type="hidden" id="home_slider_post2_id" name="home_slider_post2" value="' . $home_slider_post2_id . '">';

}

function meranda_create_page()
{
    require get_template_directory() . '/inc/templates/meranda-options.php';
}

function meranda_admin_scripts()
{
    //Add Admin style
    wp_enqueue_style('meranda-main-style', get_template_directory_uri() . '/assets/css/admin-main.css');

    //Add Admin scripts
    wp_enqueue_style('meranda-jquery-ui-style', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.1/themes/base/jquery-ui.css');
    wp_register_script('meranda-main-js', get_template_directory_uri() . '/assets/js/admin-main.js', array('jquery', 'jquery-ui-autocomplete'), false, true);
    wp_localize_script('meranda-main-js', 'merandaObject', array(
        'nonce' => wp_create_nonce('meranda-nonce'),
        'post_selected' => __('Post slider selected: ','meranda')
    ));
    wp_enqueue_script('meranda-main-js');
}

/**
 * AJAX function
 */
add_action('wp_ajax_home_slider_post', function () {
    check_ajax_referer('meranda-nonce');
    $search_post_s = $_GET['term'];
    $search_posts = get_posts(array(
        's' => $search_post_s,
        'posts_per_page' => 10,
    ));

    $result = [];

    if ($search_posts){
        foreach ($search_posts as $search_post){
            $res['label'] = $search_post->post_title;
            $res['id'] = $search_post->ID;
            $result[] = $res;
        }
    }

    echo json_encode($result);
    wp_die();
});