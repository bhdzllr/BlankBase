<?php get_header(); ?>

		<?php if (blankbase_the_breadcrumbs()) : ?>
		<?php blankbase_the_breadcrumbs(); ?>
		<?php endif; ?>
		
		<main role="main">
		<?php
		
		if ( have_posts() ) {
		
			/** the loop */
			while ( have_posts() ) : the_post();
			
				get_template_part( 'partials/content/content', get_post_format() );
				
			endwhile;
			
			blankbase_post_nav();
			
			if ( comments_open() || get_comments_number() ) 
				comments_template();
			
		} else {
			
			get_template_part( 'partials/content/content', 'none' );
			
		}
		
		?>
		</main>

		<?php get_template_part( 'partials/sidebar/sidebar-content' ); // get_sidebar( 'content' ); ?>
		
		<?php get_sidebar(); ?>

<?php get_footer(); ?>