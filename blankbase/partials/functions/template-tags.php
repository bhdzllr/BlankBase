<?php

/**
 * Get the breadcrumbs
 *
 * @return string Breadcrumbs
 */
function blankbase_the_breadcrumbs() {
	if ( is_front_page() )
		return;

	$ancs = array_reverse( get_post_ancestors( $post ) );
	$breadcrumbs = null;

	foreach ( $ancs as $crumb ) {
		$breadcrumbs .= '<li class="breadcrumbs__item"><a href="'.get_permalink( $crumb ) . '" title="' . get_the_title( $crumb ) . '">' . get_the_title( $crumb ) . '</a></li>';
	}
	
	$blog_title = get_bloginfo( 'name' );
	$blog_url = esc_url( home_url( '/' ) );

	$breadcrumbs = '<ul class="breadcrumbs">'
		. '<li class="breadcrumbs__item breadcrumbs__item--page-title"><a href="' . $blog_url . '" title="' . $blog_title . '">' . $blog_title . '</a></li>'
		. $breadcrumbs
		. '<li class="breadcrumbs__item breadcrumbs__item--current">' . get_the_title( $post ) . '</li>'
		. '</ul>';

	echo $breadcrumbs;
}

/**
 * Display all children from the top parent
 *
 * @param array  $post  Array from a page
 * @param string $start HTML Start-tag (optional)
 * @param string $end   HTML End-tag (optional)
 */
function blankbase_the_parent_children( $post, $start = null, $end = null ) {	
	if( $post->post_parent ) {
		$children = wp_list_pages( array(
			'title_li' => '',
			'child_of' => $post->post_parent,
			'echo'     => 0,
		) ); 
	} else {
		$children = wp_list_pages( array(
			'title_li' => '',
			'child_of' => $post->ID,
			'echo'     => 0,
		) );
	}
	
	if( $children ) { 
		echo $start . $children . $end;
	}
}
