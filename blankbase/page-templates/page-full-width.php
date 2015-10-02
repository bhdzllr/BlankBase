<?php

/** 
 * Template Name: Full Width
 */

?>
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
			while ( have_posts() ) : the_post();
			
				get_template_part( 'partials/content/content', 'page'  );
				
				if ( comments_open() || get_comments_number() )
					comments_template();
				
			endwhile;
			
		} else {
			
			get_template_part( 'partials/content/content', 'none' );
			
		}
		
		get_template_part( 'partials/sidebar/sidebar-content' ); // get_sidebar( 'content' );

		?>
		</main>

<?php get_footer(); ?>