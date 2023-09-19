<?php
/**
 * Meranda functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Meranda
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function meranda_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Meranda, use a find and replace
		* to change 'meranda' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'meranda', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
            'header_menu' => esc_html__( 'Header Menu', 'meranda' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'meranda_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'meranda_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function meranda_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'meranda_content_width', 640 );
}
add_action( 'after_setup_theme', 'meranda_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function meranda_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'meranda' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'meranda' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'meranda_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function meranda_scripts() {

    //Add Styles
    wp_enqueue_style('meranda-google-fonts','https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap');
    wp_enqueue_style('meranda-fonts-icomoon',get_template_directory_uri() . '/assets/fonts/icomoon/style.css');
    wp_enqueue_style('meranda-bootstrap',get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('meranda-jquery-ui',get_template_directory_uri() . '/assets/css/jquery-ui.css');
    wp_enqueue_style('meranda-owl-carousel',get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
    wp_enqueue_style('meranda-owl-theme',get_template_directory_uri() . '/assets/css/owl.theme.default.min.css');
    wp_enqueue_style('meranda-jquery-fancybox',get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css');
    wp_enqueue_style('meranda-bootstrap-datepicker',get_template_directory_uri() . '/assets/css/bootstrap-datepicker.css');
    wp_enqueue_style('meranda-fonts-flaticon',get_template_directory_uri() . '/assets/fonts/flaticon/font/flaticon.css');
    wp_enqueue_style('meranda-aos',get_template_directory_uri() . '/assets/css/aos.css');
    wp_enqueue_style('meranda-jquery-mb-YTPlayer',get_template_directory_uri() . '/assets/css/jquery.mb.YTPlayer.min.css');
    wp_enqueue_style('meranda-style',get_template_directory_uri() . '/assets/css/style.css');

    //Add Scripts
    //wp_deregister_script('jquery');
    //wp_register_script('jquery',get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', array(),false,['in_footer' => true]);
    wp_enqueue_script('jquery');

    //wp_deregister_script('jquery-migrate');
    //wp_register_script('jquery-migrate',get_template_directory_uri() . '/assets/js/jquery-migrate-3.0.1.min.js', array(),false,['in_footer' => true]);
    wp_enqueue_script('jquery-migrate');

    //wp_deregister_script('jquery-ui-core');
    //wp_register_script('jquery-ui-core',get_template_directory_uri() . '/assets/js/jquery-ui.js', array(),false,['in_footer' => true]);
    wp_enqueue_script('jquery-ui-core');

    wp_enqueue_script('meranda-popper',get_template_directory_uri() . '/assets/js/popper.min.js',array(),false,['in_footer' => true]);
    wp_enqueue_script('meranda-bootstrap',get_template_directory_uri() . '/assets/js/bootstrap.min.js',array(),false,['in_footer' => true]);
    wp_enqueue_script('meranda-owl-carousel',get_template_directory_uri() . '/assets/js/owl.carousel.min.js',array(),false,['in_footer' => true]);
    wp_enqueue_script('meranda-jquery-stellar',get_template_directory_uri() . '/assets/js/jquery.stellar.min.js',array(),false,['in_footer' => true]);
    wp_enqueue_script('meranda-jquery-countdown',get_template_directory_uri() . '/assets/js/jquery.countdown.min.js',array(),false,['in_footer' => true]);
    wp_enqueue_script('meranda-bootstrap-datepicker',get_template_directory_uri() . '/assets/js/bootstrap-datepicker.min.js',array(),false,['in_footer' => true]);
    wp_enqueue_script('meranda-jquery-easing',get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js',array(),false,['in_footer' => true]);
    wp_enqueue_script('meranda-aos',get_template_directory_uri() . '/assets/js/aos.js',array(),false,['in_footer' => true]);
    wp_enqueue_script('meranda-jquery-fancybox',get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js',array(),false,['in_footer' => true]);
    wp_enqueue_script('meranda-jquery-sticky',get_template_directory_uri() . '/assets/js/jquery.sticky.js',array(),false,['in_footer' => true]);
    wp_enqueue_script('meranda-jquery-mb-YTPlayer',get_template_directory_uri() . '/assets/js/jquery.mb.YTPlayer.min.js',array(),false,['in_footer' => true]);
    wp_enqueue_script('meranda-main',get_template_directory_uri() . '/assets/js/main.js',array(),false,['in_footer' => true]);

}
add_action( 'wp_enqueue_scripts', 'meranda_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Meranda debug
 */
function meranda_debug($data){
    echo '<pre>' . print_r($data,1) . '</pre>';
}

/**
 * Menu Walker
 */
require get_template_directory() . '/inc/Meranda_Menu.php';

/**
 * Admin function
 */

require get_template_directory() . '/inc/admin-functions.php';

/**
 * Metaboxes
 */

require get_template_directory() . '/inc/meranda_metaboxes.php';


function meranda_post_meta($post_id, $human_time_view=false){
    $read_minutes = get_post_meta($post_id,'read_minutes',true);
    $out = '<span class="date-read">';
    if ($human_time_view){
        $date = human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) . __( ' ago', 'meranda' );
    }else{
        $date = get_the_time('M j');
    }
    $out .= $date;
    if ($read_minutes){
        $out.='<span class="mx-1">&bullet;</span> ' . $read_minutes . __( ' min read ','meranda');
    }
    $out .= '<span class="icon-star2"></span></span>';
    return $out;
}


function meranda_read_post( $post_id ) {
    $read_minutes = get_post_meta( $post_id, 'read_minutes', true );
    if ( $read_minutes ) {
        return ' &middot; ' . $read_minutes . __( ' min read', 'mundana' );
    }

    return '';
}

function meranda_get_avatar(){
    return get_avatar(get_the_author_meta('user_email'), 40, '', '', array('class' => 'rounded-circle'));
}
