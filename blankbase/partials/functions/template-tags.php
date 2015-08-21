<?php

/**
 * Get the breadcrumbs
 *
 * @return string Breadcrumbs
 */
function blankbase_the_breadcrumbs() {
	global $post;

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

/**
 * Modify comment markup
 *
 * @param object  $comment POPO with comment data
 * @param array   $args    Array with arguments
 * @param integer $depth   Depth of comment replies
 */
function blankbase_comment_markup( $comment, $args, $depth ) {
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

	?>
	<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
	<article id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<footer>
			<div>
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				<?php printf( __( '%s <span class="says">says:</span>' ), sprintf( '<b class="fn">%s</b>', get_comment_author_link() ) ); ?>
			</div>

			<div>
				<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
					<time datetime="<?php comment_time( 'c' ); ?>">
						<?php printf( _x( '%1$s at %2$s', '1: date, 2: time' ), get_comment_date(), get_comment_time() ); ?>
					</time>
				</a>

				<?php edit_comment_link( __( 'Edit', 'blankbase' ) ); ?>
			</div>

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
			<?php endif; ?>
		</footer>

		<div>
			<?php comment_text(); ?>
		</div>

		<div>
			<?php comment_reply_link( array_merge( $args, array(
				'add_below' => 'comment',
				'depth'     => $depth,
				'max_depth' => $args['max_depth']
			) ) ); ?>
		</div>
	</article>
	<?php   
}
