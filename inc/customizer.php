<?php
/**
 * AA Wetech Clipping Theme Customizer
 *
 * @package AA_Wetech_Clipping
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function wp_bootstrap_starter_customize_register( $wp_customize ) {
	/* Theme Options */
	$wp_customize->add_section(
		'theme_options', array(
			'title'    => __( 'Theme Options', AA_THEME_SLUG ),
			'priority' => 30,
		)
	);
	// Copyright Text
	$wp_customize->add_setting( 'copyright_text', array(
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'copyright_text', array(
		'label'    => __( 'Copyright Text', AA_THEME_SLUG ),
		'section'  => 'theme_options',
		'settings' => 'copyright_text',
		'type'     => 'text'
	) ) );
	/* Theme Options Ends */
	
	/* Blog Page Options */
	$wp_customize->add_section(
		'blog_page', array(
			'title'    => __( 'Blog Page Options', AA_THEME_SLUG ),
			'priority' => 30,
		)
	);
	// Blog Page Title
	$wp_customize->add_setting( 'blog_title', array(
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blog_title', array(
		'label'    => __( 'Blog Page Title', AA_THEME_SLUG ),
		'section'  => 'blog_page',
		'settings' => 'blog_title',
		'type'     => 'text'
	) ) );
	
	// Blog Page Text
	$wp_customize->add_setting( 'blog_text', array(
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blog_text', array(
		'label'    => __( 'Blog Page Text', AA_THEME_SLUG ),
		'section'  => 'blog_page',
		'settings' => 'blog_text',
		'type'     => 'text'
	) ) );
	
	// Blog Page Header BG
	$wp_customize->add_setting( 'blog_bg', array(
		'sanitize_callback' => 'esc_url',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blog_bg', array(
		'label'    => __( 'Blog Page Header BG', AA_THEME_SLUG ),
		'section'  => 'blog_page',
		'settings' => 'blog_bg',
	) ) );
	/* Blog Page Options Ends */
}

add_action( 'customize_register', 'wp_bootstrap_starter_customize_register' );