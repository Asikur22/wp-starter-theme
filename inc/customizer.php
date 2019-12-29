<?php
/**
 * WP Bootstrap Starter Theme Customizer
 *
 * @package WP_Bootstrap_Starter
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function wp_bootstrap_starter_customize_register( $wp_customize ) {
	/* Header Banner */
	$wp_customize->add_section(
		'header_image', array(
			'title'    => __( 'Header Banner', AA_THEME_SLUG ),
			'priority' => 30,
		)
	);
	
	// Header Image
	$wp_customize->add_control(
		'header_img', array(
			'label'   => __( 'Header Image', AA_THEME_SLUG ),
			'section' => 'header_images',
			'type'    => 'text',
		)
	);
	// Header Banner Color
	$wp_customize->add_setting(
		'header_color_setting', array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'header_color_setting', array(
			'label'    => __( 'Header Banner Color', AA_THEME_SLUG ),
			'section'  => 'header_image',
			'settings' => 'header_color_setting',
		) )
	);
	// Header Banner Background Color
	$wp_customize->add_setting(
		'header_bg_color_setting', array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'header_bg_color', array(
			'label'    => __( 'Header Banner Background Color', AA_THEME_SLUG ),
			'section'  => 'header_image',
			'settings' => 'header_bg_color_setting',
		) )
	);
	// Banner Title
	$wp_customize->add_setting( 'header_banner_title_setting', array(
		'default'           => __( 'WP Bootstrap Framework', AA_THEME_SLUG ),
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_banner_title_setting', array(
		'label'    => __( 'Banner Title', AA_THEME_SLUG ),
		'section'  => 'header_image',
		'settings' => 'header_banner_title_setting',
		'type'     => 'text'
	) ) );
	// Banner Tagline
	$wp_customize->add_setting( 'header_banner_tagline_setting', array(
		'default'           => __( 'To customize the contents of this header banner and other elements of your site go to Dashboard - Appearance - Customize', AA_THEME_SLUG ),
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_banner_tagline_setting', array(
		'label'    => __( 'Banner Tagline', AA_THEME_SLUG ),
		'section'  => 'header_image',
		'settings' => 'header_banner_tagline_setting',
		'type'     => 'text'
	) ) );
	// Remove Header Banner Checkbox
	$wp_customize->add_setting( 'header_banner_visibility', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'themeslug_sanitize_checkbox',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_banner_visibility', array(
		'settings' => 'header_banner_visibility',
		'label'    => __( 'Remove Header Banner', AA_THEME_SLUG ),
		'section'  => 'header_image',
		'type'     => 'checkbox',
	) ) );
	/* Header Banner Ends */
}

add_action( 'customize_register', 'wp_bootstrap_starter_customize_register' );