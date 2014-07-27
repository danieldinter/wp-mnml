<?php
/**
 * wp-mnml functions and definitions
 *
 * @package WordPress
 * @subpackage wp-mnml
 * @since wp-mnml 1.0
 */

if ( ! function_exists( 'wp_mnml_setup' ) ) :
/**
 * wp-mnml setup.
*
* Set up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support post thumbnails.
*
* @since wp-mnml 1.0
*/
function wp_mnml_setup() {

	/*
	 * Remove support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	remove_theme_support( 'post-formats' );
}
endif; // wp_mnml_setup
add_action( 'after_setup_theme', 'wp_mnml_setup', 11 ); // call with priority of 11 to load after the parent theme, which will fire on the default priority of 10

function wp_mnml_navbar_background_customize_register( $wp_customize ) {
	
	// Add setting
	$wp_customize->add_setting( 'wp_mnml_navbar_background' , array(
			'default'     => 'none',
			'transport'   => 'refresh',
	) );
	$wp_customize->add_setting( 'wp_mnml_navbar_link_color' , array(
			'default'     => '#27a1ff',
			'transport'   => 'refresh',
	) );
	$wp_customize->add_setting( 'wp_mnml_navbar_link_color_hover' , array(
			'default'     => '#0166b4',
			'transport'   => 'refresh',
	) );
	$wp_customize->add_setting( 'wp_mnml_navbar_link_background_hover' , array(
			'default'     => 'none',
			'transport'   => 'refresh',
	) );
	$wp_customize->add_setting( 'wp_mnml_navbar_title_color_hover' , array(
			'default'     => '#0166b4',
			'transport'   => 'refresh',
	) );
	$wp_customize->add_setting( 'wp_mnml_search_background_color' , array(
			'default'     => '#27a1ff',
			'transport'   => 'refresh',
	) );
	
	$wp_customize->add_setting( 'wp_mnml_content_link_color_hover' , array(
			'default'     => '#27a1ff',
			'transport'   => 'refresh',
	) );
	
	// Add section for customizer
	$wp_customize->add_section( 'wp_mnml_navbar_section' , array(
			'title'      => __( 'Navbar', 'wp_mnml' ),
			'priority'   => 30,
	) );
	
	$wp_customize->add_section( 'wp_mnml_content_section' , array(
			'title'      => __( 'Content', 'wp_mnml' ),
			'priority'   => 31,
	) );
	
	// Add control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_mnml_navbar_background', array(
			'label'        => __( 'Navbar Background', 'wp_mnml' ),
			'section'    => 'wp_mnml_navbar_section',
			'settings'   => 'wp_mnml_navbar_background',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_mnml_navbar_link_color', array(
			'label'        => __( 'Navbar Navigation Link Color', 'wp_mnml' ),
			'section'    => 'wp_mnml_navbar_section',
			'settings'   => 'wp_mnml_navbar_link_color',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_mnml_navbar_link_color_hover', array(
			'label'        => __( 'Navbar Navigation Link Color Hover', 'wp_mnml' ),
			'section'    => 'wp_mnml_navbar_section',
			'settings'   => 'wp_mnml_navbar_link_color_hover',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_mnml_navbar_link_background_hover', array(
			'label'        => __( 'Navbar Navigation Link Background Hover', 'wp_mnml' ),
			'section'    => 'wp_mnml_navbar_section',
			'settings'   => 'wp_mnml_navbar_link_background_hover',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_mnml_navbar_title_color_hover', array(
			'label'        => __( 'Navbar Title Color Hover', 'wp_mnml' ),
			'section'    => 'wp_mnml_navbar_section',
			'settings'   => 'wp_mnml_navbar_title_color_hover',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_mnml_search_background_color', array(
			'label'        => __( 'Search Toggle Background Color', 'wp_mnml' ),
			'section'    => 'wp_mnml_navbar_section',
			'settings'   => 'wp_mnml_search_background_color',
	) ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_mnml_content_link_color_hover', array(
			'label'        => __( 'Link Color Hover', 'wp_mnml' ),
			'section'    => 'wp_mnml_conent_section',
			'settings'   => 'wp_mnml_content_link_color_hover',
	) ) );
	
}
add_action( 'customize_register', 'wp_mnml_navbar_background_customize_register' );

function wp_mnml_navbar_background_customize_css()
{
	?>
         <style type="text/css">
         	.site-title a:hover { color: <?php echo get_theme_mod('wp_mnml_navbar_title_color_hover'); ?>; }
         	.site-header { background: <?php echo get_theme_mod('wp_mnml_navbar_background'); ?>; }
         	.primary-navigation a, .site-navigation a { color: <?php echo get_theme_mod('wp_mnml_navbar_link_color'); ?>; }
         	.primary-navigation li:hover > a, .primary-navigation li.focus > a, .site-navigation a:hover { 
         		color: <?php echo get_theme_mod('wp_mnml_navbar_link_color_hover'); ?>;
         	}
         	.primary-navigation li:hover > a, .primary-navigation li.focus > a { 
         		background-color: none;
         		background: <?php echo get_theme_mod('wp_mnml_navbar_link_background_hover'); ?>;
         	}
         	.search-toggle, .search-toggle:hover, .search-toggle.active, .search-box {
         		background-color: <?php echo get_theme_mod('wp_mnml_search_background_color'); ?>;
         	}
         	*::-moz-selection {
         		background: none repeat scroll 0 0 <?php echo get_theme_mod('wp_mnml_search_background_color'); ?>;
         	}
         	#main a:hover, .entry-title a:hover {
         		color: <?php echo get_theme_mod('wp_mnml_content_link_color_hover'); ?>;
         	}
         </style>
    <?php
}
add_action( 'wp_head', 'wp_mnml_navbar_background_customize_css');