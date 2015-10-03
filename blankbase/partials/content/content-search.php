<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_post_thumbnail(); ?>
	
	<header>
		<h1>
			<a href="<?php esc_url( the_permalink() ); ?>" title="<?php _e( 'Permalink to ', 'blankbase' ); the_title(); ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>
		</h1>
	</header>
	
	<div>
		<?php the_excerpt(); ?>

		<a href="<?php echo get_permalink($post->ID); ?>"><?php _e( 'Continue reading', 'blankbase' ); ?></a>
	</div>
	
	<?php if ( 'post' == get_post_type() ) : ?>
	<footer>

		<?php edit_post_link( __( 'Edit', 'blankbase' ) ); ?>

	</footer>	
	<?php else :?>

		<?php edit_post_link( __( 'Edit', 'blankbase' ) ); ?>

	<?php endif; ?>
</article>