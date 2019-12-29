<?php

/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package AA_Wetech_Clipping
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
<<<<<<< HEAD
function wp_bootstrap_starter_body_classes($classes)
{
=======
function wp_bootstrap_starter_body_classes( $classes ) {
>>>>>>> a8107f9eed075d6803dc28447db88aa4125fd3e0
	global $post;
	if (isset($post) && $post->post_type == 'page' && !is_search() && !is_archive()) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}

	return $classes;
}

add_filter('body_class', 'wp_bootstrap_starter_body_classes');

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function wp_bootstrap_starter_pingback_header()
{
	if (is_singular() && pings_open()) {
		echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
	}
}

add_action('wp_head', 'wp_bootstrap_starter_pingback_header');

function wp_bootstrap_starter_password_form()
{
	global $post;
<<<<<<< HEAD
	$label = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);
	$o     = '<form action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">
    <div class="d-block mb-3">' . __("To view this protected post, enter the password below:", "wp-bootstrap-starter") . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __(
		"Password:",
		"wp-bootstrap-starter"
	) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__(
		"Submit",
		"wp-bootstrap-starter"
	) . '" class="btn btn-primary"/></div>
=======
	$label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );
	$o     = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "wp-bootstrap-starter" ) . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __(
			"Password:",
			"wp-bootstrap-starter"
		) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__(
		         "Submit",
		         "wp-bootstrap-starter"
	         ) . '" class="btn btn-primary"/></div>
>>>>>>> a8107f9eed075d6803dc28447db88aa4125fd3e0
    </form>';

	return $o;
}

add_filter('the_password_form', 'wp_bootstrap_starter_password_form');

/**
 * Disable the emoji's
 */
function disable_emojis()
{
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}

add_action('init', 'disable_emojis');

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 *
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins)
{
	if (is_array($plugins)) {
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}

/*
 * Show Image Id on Media Edit
 */
function wp96_media_custom_field( $form_fields, $post ) {
	$form_fields['info_ID'] = array(
		'label' => __( 'Image ID' ),
		'input' => 'html',
		'html'  => "<input type='text' class='text' readonly='readonly' onfocus='this.select();' value='" . esc_attr( $post->ID ) . "' /><br />",
	);
	
	return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'wp96_media_custom_field', null, 2 );

/*
 * Remove Menu item's Class and ID
 */
function my_css_attributes_filter( $var ) {
	return is_array( $var ) ? array_intersect( $var, array( 'current-menu-item', 'dropdown', 'btn-menu', 'btn-menu-outline' ) ) : '';
}

add_filter( 'nav_menu_css_class', 'my_css_attributes_filter', 100, 1 );
add_filter( 'nav_menu_item_id', 'my_css_attributes_filter', 100, 1 );
add_filter( 'page_css_class', 'my_css_attributes_filter', 100, 1 );

/*
 * WP Nav Modification.
 */
function parsec_nav_menu_args( $args ) {
	$args['container'] = false;
	
	return $args;
}

add_filter( 'wp_nav_menu_args', 'parsec_nav_menu_args' );

/*
 * Make Phone Number Clean & Clickable
 */
function make_clickable_phone( $phone ) {
	$c = array( ' ', '(', ')', '-', '+' );
	
	return '<a href="tel:' . str_replace( $c, '', $phone ) . '">' . esc_html( $phone ) . '</a>';
}

/**
 * If more than one page exists, return TRUE.
 */
function show_posts_nav() {
	global $wp_query;
	
	return ( $wp_query->max_num_pages > 1 );
}

/*
 * Wrapper Function for WP Image
 */
function aa_wp_image( $id, $size = 'full', $class = '' ) {
	$args = array(
		'class' => 'img-fluid '
	);
	if ( ! empty( $class ) ) {
		$args['class'] .= $class;
	}
	$html = wp_get_attachment_image( $id, $size, null, $args );
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	
	if ( empty( $args['class'] ) ) {
		$html = preg_replace( '/class=".*?"/', '', $html );
	}
	
	echo $html;
}

/*
 * Filter a few parameters into YouTube oEmbed requests
 */
function aa_modify_oEmbed( $html ) {
	$html = str_replace( 'frameborder="0"', '', $html );
	
	return $html;
}

add_filter( 'oembed_result', 'aa_modify_oEmbed' );
