<?php get_header(); ?>

		<nav>
		<?php if (blankbase_the_breadcrumbs()) : ?>

			<?php blankbase_the_breadcrumbs(); ?>

		<?php endif; ?>
		</nav>
		
		<main role="main">
		<?php
		
		if ( have_posts() ) {
		
			/** the loop */
			while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1>', '</h1>' ); ?>
					
					<nav>
						<?php previous_image_link( false, __( 'Previous Image', 'blankbase' ) ); ?>
						<?php next_image_link( false, __( 'Next Image', 'blankbase' ) ); ?>
					</nav>
				</header>

				<div>
					<?php echo wp_get_attachment_image( get_the_ID(), 'large' ); ?>
					<?php if ( has_excerpt() ) the_excerpt(); ?>
					<?php the_content(); ?>
				</div>

				<?php edit_post_link( __( 'Edit', 'blankbase' ) ); ?>
			</article>
				
			<?php endwhile;
			
			if ( comments_open() || get_comments_number() )
				comments_template();
			
		} else {
			
			get_template_part( 'partials/content/content', 'none' );
			
		}

		get_template_part( 'partials/sidebar/sidebar-content' ); // get_sidebar( 'content' );
		
		?>
		</main>
		
		<?php get_sidebar(); ?>

<?php get_footer(); ?>