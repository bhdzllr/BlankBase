<?php

/**
 * Display paged navigation for all posts
 * Forked from "Twenty Fourteen"
 *
 * @global WP_Query   $wp_query   WordPress Query object.
 * @global WP_Rewrite $wp_rewrite WordPress Rewrite object.
 */
function blankbase_paging_nav() {
	global $wp_query, $wp_rewrite;

	if ( $wp_query->max_num_pages < 2 )
		return;

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	$links = paginate_links( array(
		'base'      => $pagenum_link,
		'format'    => $format,
		'total'     => $wp_query->max_num_pages,
		'current'   => $paged,
		'mid_size'  => 1,
		'add_args'  => array_map( 'urlencode', $query_args ),
		'prev_text' => __( 'Previous', 'blankbase' ),
		'next_text' => __( 'Next', 'blankbase' ),
	) );

	if ( $links ) :

	?>
	<nav>
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'blankbase' ); ?></h1>

		<?php echo $links; ?>
	</nav>
	<?php
	endif;
}

/**
 * Display navigation for all posts
 *
 * Forked from "Twenty Fourteen"
 */
function blankbase_page_nav() {
	global $wp_query;
	
	if ( $wp_query->max_num_pages < 2)
		return;

	?>
	
	<nav>
		<h1 class="screen-reader-text"><?php _e('Post navigation', 'blankbase'); ?></h1>
		
		<?php 
		
		next_posts_link( __( 'Older Posts', 'blankbase' ) );
		previous_posts_link( __( 'Newer Posts', 'blankbase' ) );
		
		?>
	</nav>
	
	<?php
}

/**
 * Display post navigation
 *
 * Forked from "Twenty Fourteen"
 */
function blankbase_post_nav() {
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}

	?>
	
	<nav>
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'blankbase' ); ?></h1>
		
		<?php
		
		if ( is_attachment() ) :
			previous_post_link( '%link', __( 'Published In %title', 'blankbase' ) );
		else :
			previous_post_link( '%link', __( 'Previous Post', 'blankbase' ) );
			next_post_link( '%link', __( 'Next Post', 'blankbase' ) );
		endif;
		
		?>
	</nav>
	
	<?php
}

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
