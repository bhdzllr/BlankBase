<?php

/**
 * Blank Base Child Setup
 */
function blankbase_child_setup() {
	/** Remove feed links */
	remove_theme_support( 'automatic-feed-links' );

	/** Add new custom image sizes */
	add_image_size( 'thumbnail-75',   100,   75 );
	add_image_size( 'large-cropped', 1024, 1024, array( 'center', 'top' ) );

	/** Add custom image sizes to dropdown in backend */
	add_filter( 'image_size_names_choose', function( $sizes ) {
		return array_merge( $sizes, array(
			'thumbnail-75'  => __( 'Thumbnail Smaller' ),
			'large-cropped' => __( 'Large Cropped' ),
		) );
	});

	/** Remove specific templates from backend */
	add_filter( 'theme_page_templates', function ( $page_templates ) {
		unset( $page_templates['page-templates/page-full-width.php'] );

		return $page_templates;
	});
}

/**
 * Load stylesheets and scripts
 */
function blankbase_enqueue_stylesnscripts() {
	wp_enqueue_style( 'parent_style', get_template_directory_uri() . '/style.css' );
}

/**
 * Remove unnecessary styles and scripts
 */
function blankbase_dequeue_stylesnscripts() {
	/** Remove unneeded styles */
	wp_dequeue_style( 'lte8-fix' );
	wp_dequeue_style( 'lte7-fix' );

	/** Remove unneeded scripts in footer */
	wp_dequeue_script( 'main-js' );
	wp_dequeue_script( 'plugins-js' );
}

/**
 * Initialize all functions
 */
add_action( 'after_setup_theme',  'blankbase_child_setup',              2 );
add_action( 'wp_enqueue_scripts', 'blankbase_enqueue_stylesnscripts',   2 );
add_action( 'wp_enqueue_scripts', 'blankbase_dequeue_stylesnscripts', 100 );
