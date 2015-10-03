<?php get_header(); ?>
		
		<main role="main">
		<?php
		
		if ( have_posts() ) : ?>

			<header>
				<h1><?php printf( __( 'Search Results for: %s', 'blankbase' ), get_search_query() ); ?></h1>
			</header>

			<?php
		
			/** the loop */
			while ( have_posts() ) : the_post();
				
				get_template_part( 'partials/content/content', 'search' );
				
			endwhile;

			// the_posts_navigation();
			the_posts_pagination( array(
				'mid_size'           => 1,
				'prev_text'          => __( 'Previous', 'blankbase' ),
				'next_text'          => __( 'Next', 'blankbase' ), 
				'screen_reader_text' => __( 'Posts navigation', 'blankbase') 
			) );
			
		else :
			
			get_template_part( 'partials/content/content', 'none' );
			
		endif;

		?>
		</main>

		<?php get_sidebar(); ?>

<?php get_footer(); ?>