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
    register_setting('meranda_general_group', 'slider_post_cnt', function ($input){
        $input = abs((int)$input);
        return ($input < 5) ? $input : 4;
    });
    register_setting('meranda_general_group', 'main_post_cnt', function ($input){
        $input = abs((int)$input);
        return ($input < 5) ? $input : 4;
    });
    register_setting('meranda_general_group', 'home_post');
    register_setting('meranda_general_group', 'home_category1');
    register_setting('meranda_general_group', 'home_category2');
    register_setting('meranda_general_group', 'home_category_post_cnt', function ($input){
        $input = abs((int)$input);
        return ($input < 5) ? $input : 4;
    });
    register_setting('meranda_general_group', 'socialnetwork1');
    register_setting('meranda_general_group', 'socialnetwork1_url');
    register_setting('meranda_general_group', 'socialnetwork2');
    register_setting('meranda_general_group', 'socialnetwork2_url');
    register_setting('meranda_general_group', 'socialnetwork3');
    register_setting('meranda_general_group', 'socialnetwork3_url');

    add_settings_section('meranda_slider_section', __('Slider setting', 'meranda'), '', 'meranda-options');
    add_settings_section('meranda_general_section', __('Home page setting', 'meranda'), '', 'meranda-options');
    add_settings_section('meranda_home_main_section', __('Home main post setting', 'meranda'), '', 'meranda-options');
    add_settings_section('meranda_category_section', __('Home Categories post setting', 'meranda'), '', 'meranda-options');
    add_settings_section('meranda_socialnet_section', __('Social Network icons setting', 'meranda'), '', 'meranda-options');

    add_settings_field('slider_check', __('Slider enable', 'meranda'), 'meranda_general_slider_check', 'meranda-options', 'meranda_slider_section');
    add_settings_field('slider_post_cnt', __('Slider of post', 'meranda'), 'meranda_general_slider_post_cnt', 'meranda-options', 'meranda_slider_section',array('label_for' => 'slider_post_cnt'));
    add_settings_field('main_post_cnt', __('Number of featured post', 'meranda'), 'meranda_general_main_post_cnt', 'meranda-options', 'meranda_general_section',array('label_for' => 'main_post_cnt'));
    add_settings_field('home_post', __('Home post', 'meranda'), 'meranda_general_home_post', 'meranda-options', 'meranda_home_main_section');
    add_settings_field('home_category1', __('Category 1', 'meranda'), 'meranda_home_category1', 'meranda-options', 'meranda_category_section');
    add_settings_field('home_category2', __('Category 2', 'meranda'), 'meranda_home_category2', 'meranda-options', 'meranda_category_section');
    add_settings_field('home_category_post_cnt', __('Number of featured post', 'meranda'), 'meranda_home_category_post_cnt', 'meranda-options', 'meranda_category_section',array('label_for' => 'home_category_post_cnt'));
    add_settings_field('socialnetwork1', __('Social Network 1', 'meranda'), 'meranda_social_network_1', 'meranda-options', 'meranda_socialnet_section');
    add_settings_field('socialnetwork2', __('Social Network 2', 'meranda'), 'meranda_social_network_2', 'meranda-options', 'meranda_socialnet_section');
    add_settings_field('socialnetwork3', __('Social Network 3', 'meranda'), 'meranda_social_network_3', 'meranda-options', 'meranda_socialnet_section');
}

function meranda_social_network($social_network_name_options,$social_network_url_options){
    $social_network = esc_attr(get_option($social_network_name_options));
    $social_network_url = esc_attr(get_option($social_network_url_options));
    $social_network_icon = array(
        "icon-instagram" => "Instagram",
        "icon-facebook" => "Facebook",
        "icon-telegram" => "Telegram",
        "icon-twitter" => "Twitter",
        "icon-vk" => "VK",
        "icon-whatsapp" => "Whatsapp",
        "icon-youtube" => "YouTube",
    );

    echo "<span><select name={$social_network_name_options} id={$social_network_name_options}>";
    echo "<option value='' >...Выберите социальную суть...</option>";
    foreach($social_network_icon as $social_net_icon => $social_net_name){
        if ($social_net_icon == $social_network) {
            $selected = "selected";
        }else{
            $selected = "";
        }
        echo "<option value={$social_net_icon} {$selected}>{$social_net_name}</option>";
    }
    echo '</select>';
    echo "<input type='text' id={$social_network_url_options} name={$social_network_url_options} class='regular-text' value={$social_network_url}>";
}

function meranda_social_network_1(){
    meranda_social_network('socialnetwork1','socialnetwork1_url');
}
function meranda_social_network_2(){
    meranda_social_network('socialnetwork2','socialnetwork2_url');
}
function meranda_social_network_3(){
    meranda_social_network('socialnetwork3','socialnetwork3_url');
}

function meranda_home_category_post_cnt(){
    $home_category_post_cnt = abs((int)get_option('home_category_post_cnt'));
    //$main_post_cnt = (!empty($main_post_cnt) && $main_post_cnt < 4 ) ? $main_post_cnt : 4;
    echo '<input type="number" min=0 max=4 id="home_category_post_cnt_id" name="home_category_post_cnt" class="regular-text" value="' . $home_category_post_cnt . '">';
}

function meranda_home_category1()
{
    $home_category1_id = esc_attr(get_option('home_category1'));
    if ($home_category1_id) {
        $home_category1 = get_category($home_category1_id);
    }
    $all_categories = get_categories();
    echo '<select name="home_category1" id="home_category1_id">';
    echo "<option value='' >...Выберите категорию...</option>";
        foreach ($all_categories as $category){
            if ($category->cat_ID == $home_category1_id) {
                $selected = "selected";
            }else{
                $selected = "";
            }
            echo "<option value={$category->cat_ID} {$selected}>{$category->name}</option>";
            }
    echo '</select>';

}
function meranda_home_category2()
{
    $home_category2_id = esc_attr(get_option('home_category2'));
    if ($home_category2_id) {
        $home_category2 = get_category($home_category2_id);
    }
    $all_categories = get_categories();
    echo '<select name="home_category2" id="home_category2_id">';
    echo "<option value='' >...Выберите категорию...</option>";
    foreach ($all_categories as $category){
        if ($category->cat_ID == $home_category2_id) {
            $selected = "selected";
        }else{
            $selected = "";
        }
        echo "<option value={$category->cat_ID} {$selected}>{$category->name}</option>";
    }
    echo '</select>';

}

function meranda_general_home_post()
{
    $home_post_id = esc_attr(get_option('home_post'));
    if ($home_post_id) {
        $home_post = get_post($home_post_id);
    }
    $home_post_title = !empty($home_post) ? $home_post->post_title : '';
    echo '<input type="text" id="home_post" class="regular-text">';
    echo '<p class="description" id="home_post">';
    if ($home_post_title) {
        echo '<strong>' . __('HOME Post selected: ', 'meranda') . '</strong>' . $home_post_title . ' <button class="button delete-home-post"><span class="dashicons dashicons-trash"></span></span></button>';
    }
    echo '</p>';
    echo '<input type="hidden" id="home_post_id" name="home_post" value="' . $home_post_id . '">';


}
function meranda_general_slider_post_cnt(){
    $slider_post_cnt = abs((int)get_option('slider_post_cnt'));
    //$main_post_cnt = (!empty($main_post_cnt) && $main_post_cnt < 4 ) ? $main_post_cnt : 4;
    echo '<input type="number" min=2 max=4 id="slider_post_cnt_id" name="slider_post_cnt" class="regular-text" value="' . $slider_post_cnt . '">';
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
add_action('wp_ajax_home_post', function () {
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

