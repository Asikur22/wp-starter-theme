<?php

define( 'AA_THEME_SLUG', 'theme-slug' );

/*
 * Disable CSS/JS Cache
 */
function wpse_84670_time_as_version( $url ) {
	if ( strpos( $url, 'fonts.googleapis.com' ) !== false || strpos( $url, 'font-awesome' ) !== false ) {
		return $url;
	}
	
	return add_query_arg( array( 'ver' => time() ), $url );
}

add_filter( 'script_loader_src', 'wpse_84670_time_as_version' );
add_filter( 'style_loader_src', 'wpse_84670_time_as_version' );

/**
 * WP Bootstrap Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Bootstrap_Starter
 */
if (!function_exists('wp_bootstrap_starter_setup')) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wp_bootstrap_starter_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WP Bootstrap Starter, use a find and replace
		 * to change 'wp-bootstrap-starter' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( AA_THEME_SLUG, get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		/*
		 * Disable support for Srcset Image.
		 */
		add_filter('wp_calculate_image_srcset_meta', '__return_empty_array');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary' => esc_html__('Primary', AA_THEME_SLUG),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'comment-form',
			'comment-list',
			'caption',
		));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add theme support for selective refresh for widgets.
		$defaults = array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array('site-title', 'site-description'),
		);
		add_theme_support('custom-logo', $defaults);
	}
}
add_action('after_setup_theme', 'wp_bootstrap_starter_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_bootstrap_starter_content_width()
{
	$GLOBALS['content_width'] = apply_filters('wp_bootstrap_starter_content_width', 1170);
}

add_action('after_setup_theme', 'wp_bootstrap_starter_content_width', 0);

/**
 * Remove Width and Height Attributes From Images
 */
function remove_width_attribute($html)
{
	$html = preg_replace('/(width|height)="\d*"\s/', "", $html);

	return $html;
}

add_filter('post_thumbnail_html', 'remove_width_attribute', 10);
add_filter('get_custom_logo', 'remove_width_attribute', 10);
add_filter('image_send_to_editor', 'remove_width_attribute', 10);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_bootstrap_starter_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', AA_THEME_SLUG),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', AA_THEME_SLUG),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => esc_html__('Footer 1', AA_THEME_SLUG),
		'id'            => 'footer-1',
		'description'   => esc_html__('Add widgets here.', AA_THEME_SLUG),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
}

add_action('widgets_init', 'wp_bootstrap_starter_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function wp_bootstrap_starter_scripts()
{
	// load bootstrap css
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	// fontawesome cdn
	wp_enqueue_style('fontawesome-pro-cdn', 'https://use.fontawesome.com/releases/v5.1.0/css/all.css');
	// load WP Bootstrap Starter styles
	wp_enqueue_style('theme-style', get_stylesheet_uri());
	wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/theme-style.css');

	wp_enqueue_script('jquery');
	wp_deregister_script('wp-embed');

	// Internet Explorer HTML5 support
	wp_enqueue_script('html5hiv', get_template_directory_uri() . '/assets/js/html5.js', array(), '3.7.0', false);
	wp_script_add_data('html5hiv', 'conditional', 'lt IE 9');

	// load bootstrap js
	wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '', true);
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '', true);
	wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/assets/js/theme-script.js', array(), '', true);
	wp_localize_script('theme-scripts', 'theme_ajax', array('ajax_url' => admin_url('admin-ajax.php')));

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'wp_bootstrap_starter_scripts');

/**
 * Load custom WordPress nav walker.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' ) ) {
	require_once( get_template_directory() . '/inc/wp_bootstrap_navwalker.php' );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';
