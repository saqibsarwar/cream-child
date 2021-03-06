<?php
/*-----------------------------------------------------------------------------------*/
/*	Enqueue Styles in Child Theme
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'inspiry_enqueue_child_styles' ) ) {
	function inspiry_enqueue_child_styles() {
		if ( ! is_admin() ) {
			/* dequeue and deregister parent default styles */
			wp_dequeue_style( 'parent-default' );
			wp_deregister_style( 'parent-default' );

			/* dequeue parent custom css */
			wp_dequeue_style( 'parent-custom' );

			/* enqueue parent default styles */
			wp_enqueue_style( 'parent-default', get_template_directory_uri() . '/style.css' );

			wp_enqueue_style( 'parent-custom' );

			/* enqueue child default styles */
			wp_enqueue_style( 'child-default', get_stylesheet_uri(), array( 'parent-default' ), '1.0.3', 'all' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'inspiry_enqueue_child_styles', PHP_INT_MAX );
}

function inspiry_cream_child_theme_setup() {
	load_child_theme_textdomain( 'cream-theme-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'inspiry_cream_child_theme_setup' );