<?php

/**
 * Change excerpt length
 * 
 * @return int Excerpt length by words
 */
function blankbase_new_excerpt_length() {
	return 55;
}

/**
 * Modify comment form
 */
function blankbase_comment_form() {
	global $allowedtags;

	$allowedtags = array(
		'a' => array(
			'href'  => array(),
			'title' => array()
		),
		// 'abbr' => array(
		// 	'title' => array()
		// ),
		// 'acronym' => array(
		// 	'title' => array()
		// ),
		// 'b' => array(),
		'blockquote' => array(
			'cite'  => array(),
		),
		'cite' => array(),
		'code' => array(),
		'del' => array(
			'datetime' => array()
		),
		// 'em' => array(),
		// 'i' => array(),
		'q' => array(
			'cite' => array()
		),
		's' => array(),
		'strike' => array(),
		// 'strong' => array()
	);
}

/**
 * Add custom style to login form
 */
function blankbase_custom_login() {
	wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/style-login.css' );
}

/**
 * Add custom URL to login logo
 *
 * @return string Home URL
 */
function blankbase_custom_login_logo_url() {
	return home_url();
}

/**
 * Add custom title to login logo
 *
 * @return string Title for logo URL
 */
function blankbase_custom_login_logo_url_title() {
	return get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' );
}

/**
 * Add custom dashboard logo
 */
function blankbase_custom_dashboard_logo() {
	echo '
	<style type="text/css">
		#header-logo {
			background-image: url(' . get_bloginfo('template_directory') . '/img/logo-dashboard.png) !important;
		}
	</style>
	';
}

/**
 * Remove admin color scheme picker for user with less permissions
 * and add new color schemes
 */
function blankbase_admin_color_scheme() {
	if ( ! current_user_can( 'update_core' ) )
		remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
	
	/* wp_admin_css_color(
		'classic',
		__('classic'),
		admin_url("css/colors-classic.css"),
		array('#654321', '#14568A', '#D54E21', '#2683AE')
	); */
}

/**
 * Hide updates from users with less permissions
 */
function blankbase_hide_update_notice() {
	if ( ! current_user_can( 'update_core' ) )
		remove_action( 'admin_notices', 'update_nag', 3 );
}

/**
 * Remove some menus from users which are not administrators
 * for WP >= 3.1
 */
function blankbase_remove_menus() {
	global $menu;
	global $current_user;
	// get_currentuserinfo();

	// if ( $current_user->user_login == 'username' ) {
	if ( !current_user_can( 'administrator' ) ) {
		remove_menu_page( 'link-manager.php' );
		remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'plugins.php' );
		remove_menu_page( 'users.php' );
		remove_menu_page( 'tools.php' );
		remove_menu_page( 'options-general.php' );
        remove_menu_page( 'edit.php?post_type=cfs' );
		remove_menu_page( 'wpcf7' );
	}
}

/**
 * Remove Version from source
 */
function blankbase_remove_version() {
	return;
}

/**
 * Fix validation error with "rel" attribute
 *
 * @return string Empty string
 */
function blankbase_remove_category_list_rel( $output ) {
	return str_replace( ' rel="category tag"', '', $output );
}

/**
 * Initialize all functions
 */
add_filter( 'excerpt_length',              'blankbase_new_excerpt_length');
add_filter( 'comment_form_default_fields', 'blankbase_comment_form' );
add_action( 'login_enqueue_scripts',       'blankbase_custom_login' );
add_filter( 'login_headerurl',             'blankbase_custom_login_logo_url' );
add_filter( 'login_headertitle',           'blankbase_custom_login_logo_url_title' );
add_action( 'admin_head',                  'blankbase_custom_dashboard_logo' );
add_action( 'admin_head',                  'blankbase_admin_color_scheme');
add_action( 'after_setup_theme',           'blankbase_hide_update_notice' );
add_action( 'admin_menu',                  'blankbase_remove_menus' );
add_filter( 'the_generator',               'blankbase_remove_version' );
add_filter( 'wp_list_categories',          'blankbase_remove_category_list_rel' );
add_filter( 'the_category',                'blankbase_remove_category_list_rel' );
