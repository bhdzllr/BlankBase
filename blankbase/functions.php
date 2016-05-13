<?php

/**
 * BlankBase Setup
 */
if ( ! function_exists( 'blankbase_setup' ) ) :

	function blankbase_setup() {
		/** WordPress manages `<title>`. */
		add_theme_support( 'title-tag' );
		
		/** Add RSS feed links to `<head>` for posts and comments. */
		add_theme_support( 'automatic-feed-links' );

		/** Add custom header. */
		add_theme_support( 'custom-header', array(
			'default-text-color' => '#222222',
			'width'              => 980,
			'height'             => 300,
			'flex-height'        => true,
			'flex-width'         => true,

			// Callback for styling the header.
			'wp-head-callback'   => 'blankbase_header_style',
		) );

		/** Add support for custom logo. */
		add_theme_support( 'custom-logo' );
		
		/** Add support for featured content. */
		add_theme_support( 'featured-content', array(
			'max_posts' => 3,
		) );

		/** Add post thumbnails. */
		add_theme_support( 'post-thumbnails' );
		
		/** Add post formats. */
		add_theme_support( 'post-formats', array(
			'audio',
			'aside',
			'gallery',
			'image',
			'link',
			'quote',
			'video'
		) );
		
		/**
		 * Register menus to allow changes in backend.
		*/
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'blankbase' ),
			'secondary' => __( 'Secondary Menu', 'blankbase' ), 
		) );

		/** Language support. */
		load_theme_textdomain( 'blankbase', get_template_directory() . '/languages' );

		/** Load editor style. */
		add_editor_style( 'css/editor-style.css' );
		
		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		
		/** Use own style on galleries. */
		add_filter( 'use_default_gallery_style', '__return_false' );

		/** Remove `h1` from editor. */
		add_filter( 'tiny_mce_before_init', function( $init ) {
			$init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Address=address;Pre=pre';	

			return $init;
		});
	}

endif;

/**
 * Add header style for title and tagline.
 */
if ( ! function_exists( 'blankbase_header_style' ) ) :

	function blankbase_header_style() {
		$text_color = get_header_textcolor();

		?>
		<style type="text/css" id="blankbase-header-css">

		.site-title,
		.site-title a,
		.site-tagline {
			color: #<?php echo esc_attr( $text_color ); ?>;
		}

		</style>
		<?php
	}

endif;

/**
 * Sidebars and widgets.
 */
if ( ! function_exists( 'blankbase_widgets_init' ) ) :

	function blankbase_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Primary Sidebar', 'blankbase' ),
			'id'            => 'sidebar-primary',
			'description'   => __( 'Primary sidebar, e.g. for secondary menu', 'blankbase' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		) );
		
		register_sidebar( array(
			'name'          => __( 'Content Aside', 'blankbase' ),
			'id'            => 'aside-content',
			'description'   => __( 'Content Aside, additional sidebar that appears in the content.', 'blankbase' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		) );
		
		register_sidebar( array(
			'name'          => __( 'Footer Widget Area', 'blankbase' ),
			'id'            => 'aside-footer',
			'description'   => __( 'Footer Widget Area, appears in the footer section of the site.', 'blankbase' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		) );
	}

endif;

/**
 * Add styles and scripts to "wp_head()".
 */
if ( ! function_exists( 'blankbase_stylesnscripts' ) ) :

	function blankbase_stylesnscripts() {
		/** Load HTML5-Tag generator for IE .*/
		// Hardcoded in "header.php", because it must be loaded before all stylesheets.
		// wp_enqueue_script( 'createHTML5Elements', get_template_directory_uri() . '/js/createHTML5Elements.js' );
		// wp_script_add_data( 'createHTML5Elements', 'conditional', 'lte IE 9' );

		/** Load main stylesheet. */
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		
		/** Load IE specific stylesheet. */
		wp_enqueue_style( 'lte8-fix', get_template_directory_uri() . '/css/lte8-fix.css', array( 'style' ) );
		wp_style_add_data( 'lte8-fix', 'conditional', 'lte IE 8' );
		
		/** Load IE specific stylesheet. */
		wp_enqueue_style( 'lte7-fix', get_template_directory_uri() . '/css/lte7-fix.css', array( 'style' ) );
		wp_style_add_data( 'lte7-fix', 'conditional', 'lte IE 7' );

		/** Remove WP jQuery. */
		// wp_deregister_script( 'jquery' );

		/** Add plugins.js to footer. */
		wp_enqueue_script( 'plugins-js', get_template_directory_uri() . '/js/vendor/plugins.js', array( 'jquery-blankbase' ), false, true );
		
		/** Add main.js to footer. */
		wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array( 'plugins-js' ), false, true );
	}

endif;

/**
 * Include helpers and custom functions.
 * Can be outsourced into plug-ins later.
 */
if ( ! function_exists( 'blankbase_includes' ) ) :

	function blankbase_includes() {
		include_once 'partials/functions/template-tags.php';
		include_once 'partials/functions/modifications.php';
		include_once 'partials/functions/helpers.php';
	}

endif;

/**
 * Initialize all functions.
 */
add_action( 'after_setup_theme',  'blankbase_setup',            1 );
add_action( 'customize_register', 'blankbase_theme_customizer'    );
add_action( 'widgets_init',       'blankbase_widgets_init'        );
add_action( 'wp_enqueue_scripts', 'blankbase_stylesnscripts'      );
add_action( 'after_setup_theme',  'blankbase_includes',         1 );
